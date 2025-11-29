@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-5">
        <div class="card p-4 shadow-sm">
            <h2 class="text-center mb-4" style="font-family: 'Playfair Display', serif; color: #b30059;">🔐 Iniciar Sesión</h2>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">Correo electrónico</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autofocus>
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

                <!-- Recordarme -->
                <div class="mb-3 form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">
                        Recuérdame
                    </label>
                </div>

                <!-- Botón login -->
                <div class="d-grid mb-3">
                    <button type="submit" class="btn btn-coquette btn-lg">Iniciar Sesión</button>
                </div>

                <!-- Enlace para registrarse -->
                <div class="text-center mt-3">
                    <p>¿No tienes cuenta? <a href="{{ route('register') }}" class="btn btn-outline-coquette btn-sm">Regístrate</a></p>
                </div>

            </form>
        </div>
    </div>
</div>

<style>
    /* Botón de registro estilo coquette */
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
