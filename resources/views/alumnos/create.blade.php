@extends('layouts.app')

@section('content')
<h2>Agregar nuevo alumno</h2>

@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('alumnos.store') }}" method="POST">
    @csrf
    <input type="text" name="codigo" placeholder="Código" value="{{ old('codigo') }}" required>
    <input type="text" name="nombre" placeholder="Nombre" value="{{ old('nombre') }}" required>
    <input type="email" name="correo" placeholder="Correo" value="{{ old('correo') }}" required>
    <input type="date" name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}" required>
    <select name="sexo" required>
        <option value="">Seleccione...</option>
        <option value="M" {{ old('sexo')=='M'?'selected':'' }}>Masculino</option>
        <option value="F" {{ old('sexo')=='F'?'selected':'' }}>Femenino</option>
    </select>
    <input type="text" name="carrera" placeholder="Carrera" value="{{ old('carrera') }}" required>
    <button type="submit" class="btn btn-success">Guardar</button>
</form>
@endsection
