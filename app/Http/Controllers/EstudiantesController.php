<?php

namespace App\Http\Controllers;

use App\Models\Estudiantes;
use Illuminate\Http\Request;

class EstudiantesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $estudiantes = Estudiantes::all();
        return response()->json(['Estudiantes' => $estudiantes,] );   
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
            'nombre' => 'required',
            'apellido' => 'required',
            'correo' => 'required|email|unique:estudiantes',
        ]);

        $estudiantes = Estudiantes::create($request->all());
        return response()->json(['message' => 'Estudiante registrado correctamente','Estudiante' => $estudiantes,] );
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $estudiantes = Estudiantes::findOrFail($id);
        return response()->json(['Estudiante' => $estudiantes,] );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Estudiantes $estudiantes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'correo' => 'required|email|unique:estudiantes,correo,' . $id,

        ]);

        $estudiantes = Estudiantes::findOrFail($id);
        $estudiantes->update($request->all());
        return response()->json(['message' => 'Estudiante actualizado correctamente','Estudiante' => $estudiantes,] );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $estudiantes = Estudiantes::findOrFail($id);
        $estudiantes->delete();
        return response()->json(['message' => 'Estudiante Eliminado correctamente'] );
    }
}
