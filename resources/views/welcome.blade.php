@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="text-center mb-4 fw-bold">Explora nuestras categorías</h2>

    <div id="categoriasCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner shadow-lg rounded">
            @php
                $imagenes = [
                    'Motos'=>'https://i.pinimg.com/originals/90/bc/ac/90bcacd50bf9aee78fc5f4248cff786a.jpg',
                    'Carros'=>'https://www.shutterstock.com/image-vector/luxury-premium-realistic-fast-speed-600nw-2283337919.jpg',
                    'Aviones'=>'https://static.vecteezy.com/system/resources/thumbnails/049/462/030/small/two-f-16-fighter-jets-flying-high-above-the-desert-landscape-photo.jpg',
                    'Barcos'=>'https://media.istockphoto.com/id/104241367/es/foto/barco-crucero.jpg?s=612x612&w=0&k=20&c=xxxpTOheDTVJ_vkNqBKkefBTjah2CljSBKSR4wOmpEY=',
                    'cohetes'=>"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQi-Lertr3lvn5HmOr-s9FqKqVGLBM53oOUNQ&s",
                    
                    // Agregar más categorías con sus imágenes
                ];
            @endphp

            @foreach ($categorias as $index => $categoria)
                <div class="carousel-item @if($index == 0) active @endif">
                    <div class="d-flex justify-content-center align-items-center flex-column" style="height: 400px; background-color: #f8f9fa; border-radius: 10px;">

                        <img src="{{ $imagenes[$categoria->nombre] ?? 'https://via.placeholder.com/800x350' }}" 
                             class="d-block w-100 rounded" 
                             alt="{{ $categoria->nombre }}" 
                             style="height: 300px; width: 10px;  ">

                        <h5 class="mt-3 text-center fw-bold">{{ $categoria->descripcion }}</h5>

                        <a href="{{ route('categorias.producto', $categoria->id) }}" class="btn btn-primary mt-2">
                            Ver productos de {{ $categoria->nombre }}
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <style>
            .carousel-control-prev-icon,
            .carousel-control-next-icon {
                background-color: rgba(0, 0, 0, 0.5);
                border-radius: 50%;
                width: 40px;
                height: 40px;
            }

            .carousel-control-prev-icon:hover,
            .carousel-control-next-icon:hover {
                background-color: rgba(0, 0, 0, 0.8);
            }

            .navbar-nav .nav-link:hover {
            color: #00d4ff; /* Azul brillante al pasar el mouse */
            transform: scale(1.1); /* Efecto de zoom */
        }

        .navbar-toggler {
            border: none;
            background-color: #00d4ff; /* Botón de menú futurista */
        }
        .navbar {
            background: linear-gradient(90deg, #0f2027, #203a43, #2c5364); /* Degradado oscuro */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3); /* Sombra */
        }

        .navbar-nav .nav-link {
            color: #ffffff;
            font-size: 1rem;
            font-weight: 500;
            transition: color 0.3s, transform 0.3s; /* Transición suave */
        }

        .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
            color: #ffffff;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.5); /* Sombra en el texto */
        
        }
        </style>
        
        <button class="carousel-control-prev" type="button" data-bs-target="#categoriasCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
        </button>

        <button class="carousel-control-next" type="button" data-bs-target="#categoriasCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Siguiente</span>
        </button>
    </div>
</div>
@endsection