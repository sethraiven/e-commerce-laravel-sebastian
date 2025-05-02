@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="text-center mb-4">
        <h1 class="fw-bold text-primary">Categorías del Blog</h1>
        {{-- Botón para crear nueva categoría --}}
        <a href="{{ route('categorias_blog.create') }}" class="btn btn-success mt-3">
            <i class="bi bi-plus-circle"></i> Nueva Categoría
        </a>
    </div>

    {{-- Mensaje de éxito --}}
    @if (session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    <div class="row g-4">
        {{-- Lista de categorías --}}
        @foreach ($blog_categorias as $categoria)
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body text-center">
                        <h5 class="card-title text-primary fw-bold">{{ $categoria->nombre }}</h5>
                        <p class="card-text text-muted"><strong>Descripción:</strong> {{ $categoria->descripcion }}</p>
                        <div class="d-flex justify-content-center gap-2">
                            <a href="{{ route('categorias_blog.edit', $categoria->id) }}" class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil-square"></i> Editar
                            </a>
                            <form action="{{ route('categorias_blog.destroy', $categoria->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('¿Estás seguro de eliminar esta categoría?')">
                                    <i class="bi bi-trash"></i> Eliminar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection