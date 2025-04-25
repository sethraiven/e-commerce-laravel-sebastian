@extends('layouts.app')

@section('content')

<div class="card text-center">
    <div class="card-body">
        @if($articulo->imagen_url)
        <img src="{{ asset('storage/' . $articulo->imagen_url) }}" alt="Imagen del articulo" width="200">
        @endif  
        <h5 class="card-title mt-3">{{ $articulo->titulo }}</h5>
        <p class="card-text">{{ $articulo->contenido }}</p>
        <p><strong>Autor: </strong>{{ $articulo->autor }}</p>
        <a class="btn btn-primary" href="{{ route('articulos_blog.edit', $articulo->id) }}">Editar</a>
    </div>
    <div class="card-footer text-muted">
        {{ $articulo->fecha_publicacion }}
    </div>
  </div>

  {{-- Comentarios del articulo --}}

@endsection