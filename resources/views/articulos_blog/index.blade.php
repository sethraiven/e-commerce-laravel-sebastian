@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="text-center mb-4">
        <h1 class="fw-bold text-primary">Artículos del Blog</h1>
        {{-- Botón para crear --}}
        <a href="{{ route('articulos_blog.create') }}" class="btn btn-success mt-3">
            <i class="bi bi-plus-circle"></i> Agregar Artículo
        </a>
    </div>

    {{-- Mensaje de éxito --}}
    @if (session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    <div class="row g-4">
        {{-- Lista de artículos --}}
        @foreach ($articulos as $articulo)
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body">
                        <h5 class="card-title text-primary fw-bold">{{ $articulo->titulo }}</h5>
                        <p class="card-text text-muted">{{ Str::limit($articulo->contenido, 100, '...') }}</p>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('articulos_blog.show', $articulo->id) }}" class="btn btn-primary btn-sm">
                                <i class="bi bi-eye"></i> Ver
                            </a>
                            <a href="{{ route('articulos_blog.edit', $articulo->id) }}" class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil-square"></i> Editar
                            </a>
                            <form action="{{ route('articulos_blog.destroy', $articulo->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('¿Estás seguro de eliminar este artículo?')">
                                    <i class="bi bi-trash"></i> Eliminar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{-- Paginación --}}
    <div class="mt-4">
        {{ $articulos->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection