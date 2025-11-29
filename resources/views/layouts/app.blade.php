<!DOCTYPE html>
<html lang="es">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>⋆. 𐙚˚࿔ CRUD de Alumnos 𝜗𝜚˚⋆</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <style>
    /* Suaviza las animaciones de Animate.css */
    .animate__animated {
        --animate-duration: 2.0s;  
    }
</style>

    <!-- Estilo coquette -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&family=Playfair+Display:wght@500&display=swap" rel="stylesheet">
    <style>
        body {
            background-image:url('https://i.pinimg.com/736x/dc/fa/ab/dcfaabb0314da3e84c26194c0cca3820.jpg');
            font-family: 'Poppins', sans-serif;
            color: #4a3c4c;
        }
        .navbar {
            background: linear-gradient(90deg, #ffc6d9, #ffddee);
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
        }
        .navbar-brand {
            font-family: 'Playfair Display', serif;
            color: #b30059 !important;
            font-weight: 600;
        }
        .card {
            border-radius: 15px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
            background-color: #fff;
        }
        .btn-coquette {
            background-color: #ffb6c1;
            color: white;
            border: none;
            border-radius: 8px;
            transition: 0.3s;
        }
        .btn-coquette:hover {
            background-color: #ff9bb3;
            transform: scale(1.05);
        }
        .btn-secondary {
            background-color: #d8bfd8;
            border: none;
        }
        .table thead {
            background-color: #ffe0ec;
        }
        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #fff9fb;
        }
        footer {
            text-align: center;
            padding: 15px;
            color: #a17488;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="{{ route('alumnos.index') }}">❀ Panel de Alumnos</a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('alumnos.index') }}">Alumnos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('tareas.index') }}">Tareas</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

    <footer>
        <p>꒷꒦︶꒷꒦︶ ๋ ࣭ ⭑꒷꒦ Creado con amor ꒷꒦︶꒷꒦︶ ๋ ࣭ ⭑꒷꒦</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

