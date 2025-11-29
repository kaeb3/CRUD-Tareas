@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-bold mb-4">Crear Tarea</h1>

    <form action="{{ route('tareas.store') }}" method="POST">
        @csrf

        <!-- Nombre -->
        <label class="block mb-2 font-semibold">Nombre</label>
        <input type="text" name="nombre"
               class="w-full border rounded p-2 @error('nombre') border-red-500 @enderror"
               value="{{ old('nombre') }}">
        @error('nombre')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror

        <!-- Descripción -->
        <label class="block mt-4 mb-2 font-semibold">Descripción</label>
        <textarea name="descripcion"
                  class="w-full border rounded p-2 @error('descripcion') border-red-500 @enderror">{{ old('descripcion') }}</textarea>
        @error('descripcion')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror

        <!-- Fecha -->
        <label class="block mt-4 mb-2 font-semibold">Fecha de entrega</label>
        <input type="date" name="fecha_entrega"
               class="w-full border rounded p-2 @error('fecha_entrega') border-red-500 @enderror"
               value="{{ old('fecha_entrega') }}">
        @error('fecha_entrega')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror

        <button class="mt-4 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Guardar
        </button>
    </form>
</div>
@endsection
