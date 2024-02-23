<?php

namespace App\Http\Controllers;

use App\Models\Docentes;
use Illuminate\Http\Request;

class DocentesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $docentes = Docentes::all();
        // return response()->json($docentes);
        return response()->json([ 'Docentes' => $docentes], 201);
        
        //nombre
// apellido
// cel
// correo
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
            'nombre'=> 'required',
            'apellido'=> 'required',
            'cel' => 'required',
            'correo'=> 'required|email|unique:docentes',
        ]);
        $docentes = Docentes::create($request->all());
        return response()->json(['message' => 'Profesor registrado correctamente', 'Docente: ' => $docentes], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $docentes = Docentes::findOrFail($id);
        return response()->json(['Docente:' => $docentes], 201);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Docentes $docentes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        {
            $request->validate([
                'nombre' => 'required',
                'apellido' => 'required',
                'cel' => 'required',
                'correo' => 'required|email|unique:docentes,correo,' . $id,
    
            ]);
    
            $docentes = Docentes::findOrFail($id);
            $docentes->update($request->all());
            return response()->json(['message' => 'Datos del Docente actualizado correctamente', 'Docente: ' => $docentes], 201);

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $docentes = Docentes::findOrFail($id);
        $docentes->delete();
        return response()->json(['message' => 'Docente eliminado correctamente'], 201);  }
}
