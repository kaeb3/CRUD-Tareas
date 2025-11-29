@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-bold mb-4">Editar Tarea</h1>

    <form action="{{ route('tareas.update', $tarea) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Nombre -->
        <label class="block mb-2 font-semibold">Nombre</label>
        <input type="text" name="nombre"
               class="w-full border rounded p-2"
               value="{{ old('nombre', $tarea->nombre) }}">

        @error('nombre')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror

        <!-- Descripción -->
        <label class="block mt-4 mb-2 font-semibold">Descripción</label>
        <textarea name="descripcion"
                  class="w-full border rounded p-2">{{ old('descripcion', $tarea->descripcion) }}</textarea>

        @error('descripcion')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror

        <!-- Fecha -->
        <label class="block mt-4 mb-2 font-semibold">Fecha de entrega</label>
        <input type="date" name="fecha_entrega"
               class="w-full border rounded p-2"
               value="{{ old('fecha_entrega', $tarea->fecha_entrega->format('Y-m-d')) }}">

        @error('fecha_entrega')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror

        <button class="mt-4 bg-yellow-600 text-white px-4 py-2 rounded hover:bg-yellow-700">
            Actualizar
        </button>
    </form>
</div>
@endsection
