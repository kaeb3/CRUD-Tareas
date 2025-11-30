@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <h2 class="mb-4" style="color:#b30059; font-family:'Playfair Display', serif;">
        ✧ Crear nueva tarea ✧
    </h2>

    {{-- Errores --}}
    @if ($errors->any())
        <div class="alert alert-danger" style="border-radius: 12px;">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>❌ {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card p-4" style="
        border-radius: 18px;
        background-color: #fff;
        box-shadow: 0 4px 12px rgba(255, 182, 193, 0.3);
        border: 2px solid #ffd9e6;
    ">

        <form method="POST" action="{{ route('tareas.store') }}">
            @csrf

            {{-- Nombre --}}
            <div class="mb-3">
                <label class="form-label" style="font-weight:600; color:#b30059;">Nombre de la tarea</label>
                <input type="text" 
                       name="nombre" 
                       class="form-control"
                       style="border-radius: 10px; border: 1px solid #ffb6c1;"
                       value="{{ old('nombre') }}" required>
            </div>

            {{-- Descripción --}}
            <div class="mb-3">
                <label class="form-label" style="font-weight:600; color:#b30059;">Descripción</label>
                <textarea name="descripcion" 
                          class="form-control"
                          rows="4"
                          style="border-radius: 10px; border: 1px solid #ffb6c1;">{{ old('descripcion') }}</textarea>
            </div>

            {{-- Fecha entrega --}}
            <div class="mb-3">
                <label class="form-label" style="font-weight:600; color:#b30059;">Fecha de entrega</label>
                <input type="date" 
                       name="fecha_entrega"
                       class="form-control"
                       style="border-radius: 10px; border: 1px solid #ffb6c1;"
                       value="{{ old('fecha_entrega') }}" required>
            </div>

            {{-- Botones --}}
            <div class="d-flex justify-content-end mt-4">
                <a href="{{ route('tareas.index') }}" 
                   class="btn btn-secondary me-2"
                   style="border-radius: 10px; background-color:#d8bfd8; border:none;">
                    Cancelar
                </a>

                <button type="submit" 
                        class="btn btn-coquette"
                        style="
                            background-color:#ffb6c1;
                            border:none;
                            border-radius:10px;
                            color:white;
                            padding: 8px 20px;
                            font-weight:600;
                        ">
                    Guardar tarea ✧
                </button>
            </div>

        </form>

    </div>

</div>
@endsection
