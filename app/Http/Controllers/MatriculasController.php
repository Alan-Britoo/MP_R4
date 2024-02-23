<?php

namespace App\Http\Controllers;

use App\Models\Matriculas;
use Illuminate\Http\Request;

class MatriculasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $matriculas = Matriculas::all();
        return response()->json(['Matriculas' => $matriculas,] );
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
            'estudiante_id' => 'required',
            'materias_id' => 'required',
        ]);

        $matriculas = Matriculas::create($request->all());
        return response()->json(['Matriculas: ' => $matriculas,] );
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $matriculas = Matriculas::findOrFail($id);
        return response()->json(['Matricula' => $matriculas,] );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Matriculas $matriculas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'estudiante_id' => 'required',
            'materias_id' => 'required',

        ]);

        $matriculas = Matriculas::findOrFail($id);
        $matriculas->update($request->all());
        return response()->json(['message' => 'Matricula actualizada correctamente','Matricula:' => $matriculas,] );

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $matriculas = Matriculas::findOrFail($id);
        $matriculas->delete();
        return response()->json(['message' => 'Matricula Eliminada correctamente'] );
    }
}
