<?php

namespace App\Http\Controllers;

use App\Models\Materias;
use Illuminate\Http\Request;

class MateriasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materias = Materias::all();
        return response()->json(['Materias:' => $materias,] );
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
            'descripcion' => 'required',
        ]);

        $materias = Materias::create($request->all());
        return response()->json(['message' => 'Materia Registrada correctamente','Materia:' => $materias,] );
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $materias = Materias::findOrFail($id);
        return response()->json(['Materia:' => $materias,] );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Materias $materias)
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
            'descripcion' => 'required',
        ]);

        $materias = Materias::findOrFail($id);
        $materias->update($request->all());
        return response()->json(['message' => 'Materia actualizada correctamente','Materias:' => $materias,] );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $materias = Materias::findOrFail($id);
        $materias->delete();
        return response()->json(['message' => 'Matricula Eliminada correctamente'] );
    }
}
