<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/57c6e4493e.js" crossorigin="anonymous"></script>
    
</head>
<body>

    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">TIENDA DE MOTORES</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('inicio*') ? 'active' : '' }}" href="{{ url('/') }}">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('productos*') ? 'active' : '' }}" href="{{ route('productos.index') }}">Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('categorias*') ? 'active' : '' }}" href="{{ route('categorias.index') }}">Categorías</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('categorias_blog.*') ? 'active' : '' }}" href="{{ route('categorias_blog.index') }}">Categorias-Blog</a>
                    </li>
                    <li class="nav-item">
                        {{-- <a class="nav-link {{ request()->is('blog*') ? 'active' : '' }}" href="{{ route('blog.index') }}">Blog</a> --}}
                    </li>
                    
                    {{-- //codigo para el inicio de sesión del profe daniel--}}

                   
                    <li class="nav-item"><a class="nav-link" href="{{ route('register')}}">Registrar Usuario</a></li>
                    
                    
                    
                    @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}"><i class="fa-solid fa-user"></i></a>
                
            </li>
        @endguest

        @auth
            <li><a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit()">Cerrar Sesion</a></li>

            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
            </form>
        @endauth

                
                    
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>
</body>

<style>
    /* Estilo militar moderno con colores más visibles */
    .navbar {
        background: linear-gradient(90deg, #3e4e50, #4a6b40); /* Degradado verde más claro */
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.5); /* Sombra robusta */
        
    }

    .navbar-brand {
        font-size: 1.8rem;
        font-weight: bold;
        color: #f4d03f; /* Amarillo militar */
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.7); /* Sombra en el texto */
        
    }

    .navbar-nav .nav-link {
        color: #ffffff;
        font-size: 1.1rem;
        font-weight: 600;
        transition: color 0.3s, transform 0.3s; /* Transición suave */
    }

        i{
            transition: color 0.3s, transform 1s; /* Transición suave */
            
            height: 30px;
            width: 30px;
            font-size: 30px;
            text-align: center;
            line-height: 30px;
        }
       

    .navbar-nav .nav-link:hover {
        color: #f4d03f; /* Amarillo militar al pasar el mouse */
        transform: scale(1.1); /* Efecto de zoom */
    }

    .navbar-toggler {
        border: none;
        background-color: #f4d03f; /* Botón de menú amarillo */
    }

    .navbar-toggler-icon {
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3E%3Cpath stroke='rgba%28244, 208, 63, 1%29' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
    }

    body {
        background-color: #2e3b3f; /* Fondo verde oscuro */
        color: #ffffff; /* Texto blanco */
    }

    .container {
        background-color: #3e4e50; /* Fondo de contenedor verde más claro */
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.5); /* Sombra robusta */
    }

    .carousel-inner {
        border-radius: 15px;
        overflow: hidden;
    }

    .carousel-item img {
        height: 200px; /* Altura más compacta */
        object-fit: 100px; /* Ajusta la imagen al contenedor */
    }

    .carousel-indicators button {
        background-color: #f4d03f; /* Amarillo militar */
        width: 12px;
        height: 12px;
        border-radius: 50%;
    }

    .carousel-indicators .active {
        background-color: #d4af37; /* Dorado militar */
    }

    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        background-color: rgba(244, 208, 63, 0.8); /* Amarillo con transparencia */
        border-radius: 50%;
        width: 40px;
        height: 40px;
    }

    .carousel-control-prev-icon:hover,
    .carousel-control-next-icon:hover {
        background-color: rgba(244, 208, 63, 1); /* Amarillo más visible al pasar el mouse */
    }
</style>
</html>