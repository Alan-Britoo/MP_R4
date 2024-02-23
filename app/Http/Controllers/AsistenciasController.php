<?php

namespace App\Http\Controllers;

use App\Models\Asistencias;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AsistenciasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $asistencias = Asistencias::all();
        return response()->json([ 'Asistencias' => $asistencias], 201);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'matriculas_id' => 'required',
            'fecha'         => 'required|date',
            'asistencias' => 'required|in:A,T,F',
        ]);

        // Crea un nuevo registro de asistencia
        $asistencias = Asistencias::create([
            'matriculas_id' => $request->matriculas_id,
            'fecha' => Carbon::now(),      
            'asistencias' => $request->asistencias,
        ]);

        
        return response()->json(['message' => 'Asistencia registrada correctamente', 'data' => $asistencias], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $asistencias = Asistencias::findOrFail($id);
        return response()->json($asistencias);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Asistencias $asistencias)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'matriculas_id' => 'required',
            'fecha' => 'required|date',
            'asistencias' => 'required|in:A,T,F',

        ]);

        $estudiantes = Asistencias::findOrFail($id);
        $estudiantes->update($request->all());
        return response()->json($estudiantes);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $asistencias = Asistencias::findOrFail($id);
        $asistencias->delete();
        return response()->json(['message' => 'Asistencia Eliminada correctamente', 'data' => $asistencias], 201);
    }
}
