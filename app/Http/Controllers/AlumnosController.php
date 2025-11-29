<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno;

class AlumnosController extends Controller
{
    /**
     * Mostrar listado de alumnos
     */
    public function index()
    {
        $alumnos = Alumno::all();
        return view('alumnos.index', compact('alumnos'));
    }

    /**
     * Mostrar formulario para crear un alumno
     */
    public function create()
    {
        return view('alumnos.create');
    }

    /**
     * Guardar un nuevo alumno
     */
    public function store(Request $request)
    {
        $request->validate([
            'codigo' => 'required|unique:alumnos,codigo|max:10',
            'nombre' => 'required|string|max:100',
            'correo' => 'required|email|unique:alumnos,correo',
            'fecha_nacimiento' => 'required|date',
            'sexo' => 'required|in:M,F',
            'carrera' => 'required|string|max:100',
        ]);

        Alumno::create($request->only([
            'codigo',
            'nombre',
            'correo',
            'fecha_nacimiento',
            'sexo',
            'carrera'
        ]));

        return redirect()->route('alumnos.index')->with('success', 'Alumno creado correctamente.');
    }

    /**
     * Mostrar detalles de un alumno específico
     */
    public function show(Alumno $alumno)
    {
        return view('alumnos.show', compact('alumno'));
    }

    /**
     * Mostrar formulario para editar un alumno
     */
    public function edit(Alumno $alumno)
    {
        return view('alumnos.edit', compact('alumno'));
    }

    /**
     * Actualizar un alumno
     */
    public function update(Request $request, Alumno $alumno)
    {
        $request->validate([
            'codigo' => 'required|unique:alumnos,codigo,'.$alumno->id.'|max:10',
            'nombre' => 'required|string|max:100',
            'correo' => 'required|email|unique:alumnos,correo,'.$alumno->id,
            'fecha_nacimiento' => 'required|date',
            'sexo' => 'required|in:M,F',
            'carrera' => 'required|string|max:100',
        ]);

        $alumno->update($request->only([
            'codigo',
            'nombre',
            'correo',
            'fecha_nacimiento',
            'sexo',
            'carrera'
        ]));

        return redirect()->route('alumnos.index')->with('success', 'Alumno actualizado correctamente.');
    }

    /**
     * Eliminar un alumno
     */
    public function destroy(Alumno $alumno)
    {
        $alumno->delete();
        return redirect()->route('alumnos.index')->with('success', 'Alumno eliminado correctamente.');
    }
}
