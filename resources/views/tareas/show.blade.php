@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Detalle de Tarea</h1>

    <div class="card">
        <div class="card-header">
            {{ $tarea->nombre }}
        </div>
        <div class="card-body">
            <p><strong>Descripción:</strong> {{ $tarea->descripcion }}</p>
            <p><strong>Usuario:</strong> {{ $tarea->user ? $tarea->user->name : 'Usuario eliminado' }}</p>
            <p><strong>Fecha de entrega:</strong> {{ $tarea->fecha_entrega }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('tareas.index') }}" class="btn btn-secondary">Volver</a>

            @can('update', $tarea)
                <a href="{{ route('tareas.edit', $tarea->id) }}" class="btn btn-warning">Editar</a>
            @endcan

            @can('delete', $tarea)
                <form action="{{ route('tareas.destroy', $tarea->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Eliminar</button>
                </form>
            @endcan
        </div>
    </div>
</div>
@endsection
