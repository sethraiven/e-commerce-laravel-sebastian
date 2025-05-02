@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-lg border-0">
        <div class="card-header bg-primary text-white text-center">
            <h4 class="mb-0">{{ $articulo->titulo }}</h4>
        </div>
        <div class="card-body text-center bg-light">
            @if($articulo->imagen_url)
                <img src="{{ asset('storage/' . $articulo->imagen_url) }}" alt="Imagen del artículo" class="img-fluid rounded mb-3" style="max-height: 300px; object-fit: cover;">
            @endif  
            <p class="card-text text-muted">{{ $articulo->contenido }}</p>
            <p class="text-secondary"><strong>Autor:</strong> {{ $articulo->autor }}</p>
            <a class="btn btn-warning btn-sm" href="{{ route('articulos_blog.edit', $articulo->id) }}">
                <i class="bi bi-pencil-square"></i> Editar
            </a>
            <a class="btn btn-outline-secondary btn-sm" href="{{ route('articulos_blog.index') }}">
                <i class="bi bi-arrow-left"></i> Volver
            </a>
        </div>
        <div class="card-footer text-muted text-center">
            Publicado el: {{ $articulo->fecha_publicacion }}
        </div>
    </div>

    {{-- Comentarios del artículo --}}
    <div class="mt-4">
        <h5 class="fw-bold text-primary">Comentarios</h5>
        {{-- Aquí puedes agregar la lógica para mostrar los comentarios --}}
        <p class="text-muted">No hay comentarios disponibles.</p>
    </div>
</div>
@endsection