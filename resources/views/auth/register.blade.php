@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-5">
        <div class="card p-4 shadow-sm">
            <h2 class="text-center mb-4" style="font-family: 'Playfair Display', serif; color: #b30059;">📝 Registrarse</h2>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Nombre -->
                <div class="mb-3">
                    <label for="name" class="form-label">Nombre completo</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Correo electrónico -->
                <div class="mb-3">
                    <label for="email" class="form-label">Correo electrónico</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Contraseña -->
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Confirmar contraseña -->
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirmar contraseña</label>
                    <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required>
                </div>

                <!-- Botón registro -->
                <div class="d-grid mb-3">
                    <button type="submit" class="btn btn-coquette btn-lg">Registrarse</button>
                </div>

                <!-- Enlace para login -->
                <div class="text-center mt-3">
                    <p>¿Ya tienes cuenta? <a href="{{ route('login') }}" class="btn btn-outline-coquette btn-sm">Iniciar Sesión</a></p>
                </div>

            </form>
        </div>
    </div>
</div>

<style>
    /* Botón estilo coquette */
    .btn-outline-coquette {
        color: #b30059;
        border: 2px solid #ffb6c1;
        border-radius: 8px;
        transition: 0.3s;
    }
    .btn-outline-coquette:hover {
        background-color: #ffb6c1;
        color: white;
        transform: scale(1.05);
    }

    /* Card más coquette */
    .card {
        border-radius: 15px;
        background-color: rgba(255,255,255,0.95);
        box-shadow: 0 8px 20px rgba(0,0,0,0.1);
    }
</style>
@endsection
