@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Listado de Tareas</h1>

    @if(isset($tareas) && $tareas->count() > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Usuario</th>
                    <th>Fecha de entrega</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tareas as $tarea)
                    <tr>
                        <td>{{ $tarea->nombre }}</td>
                        <td>{{ $tarea->descripcion }}</td>
                        <td>{{ $tarea->user ? $tarea->user->name : 'Usuario eliminado' }}</td>
                        <td>{{ $tarea->fecha_entrega }}</td>
                        <td>
                            @can('update', $tarea)
                                <a href="{{ route('tareas.edit', $tarea->id) }}" class="btn btn-sm btn-warning">Editar</a>
                            @endcan
                            @can('delete', $tarea)
                                <form action="{{ route('tareas.destroy', $tarea->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Eliminar</button>
                                </form>
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No hay tareas disponibles</p>
    @endif
</div>
@endsection


