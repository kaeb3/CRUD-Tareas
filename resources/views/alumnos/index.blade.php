@extends('layouts.app')

@section('content')
<div class="card animate__animated animate__fadeInUp p-4">
    <h2> ⋆𐙚 ̊. Lista de Alumnos ⋆𐙚 ̊.</h2>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<a href="{{ route('alumnos.create') }}" class="btn btn-coquette mb-3">✦ Añadir alumno</a>

<table class="table table-striped align-middle">
    <thead>
        <tr>
            <th>Código</th>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Carrera</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($alumnos as $alumno)
        <tr>
            <td>{{ $alumno->codigo }}</td>
            <td>{{ $alumno->nombre }}</td>
            <td>{{ $alumno->correo }}</td>
            <td>{{ $alumno->carrera }}</td>
            <td>
                <a href="{{ route('alumnos.show', $alumno->id) }}" class="btn btn-secondary btn-sm">Ver</a>
                <a href="{{ route('alumnos.edit', $alumno->id) }}" class="btn btn-warning btn-sm">Editar</a>
                <form action="{{ route('alumnos.destroy', $alumno->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás segura de eliminar a {{ $alumno->nombre }}? 💔')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>

@endsection
