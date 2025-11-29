@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <h2 class="mb-4">✨ Lista de Tareas ✨</h2>

        <a href="{{ route('tareas.create') }}" class="btn btn-coquette mb-3">➕ Nueva Tarea</a>

        @if($tareas->count())
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Fecha de entrega</th>
                        <th>Dueño</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tareas as $tarea)
                    <tr>
                        <td>{{ $tarea->nombre }}</td>
                        <td>{{ $tarea->descripcion }}</td>
                        <td>{{ $tarea->fecha_entrega }}</td>
                        <td>{{ $tarea->user->name }}</td>
                        <td>
                            <a href="{{ route('tareas.show', $tarea->id) }}" class="btn btn-info btn-sm">Ver</a>

                            @can('update', $tarea)
                                <a href="{{ route('tareas.edit', $tarea->id) }}" class="btn btn-warning btn-sm">Editar</a>
                            @endcan

                            @can('delete', $tarea)
                                <form action="{{ route('tareas.destroy', $tarea->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
            <div class="alert alert-info">No hay tareas disponibles.</div>
        @endif
    </div>
</div>
@endsection
