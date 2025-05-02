@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="text-center mb-4">
        <h1 class="fw-bold" style="color: #d4af37;">Artículos del Blog</h1>
        {{-- Botón para crear --}}
        <a href="{{ route('articulos_blog.create') }}" class="btn btn-success mt-3" style="background-color: #4a6b40; border-color: #4a6b40;">
            <i class="bi bi-plus-circle"></i> Agregar Artículo
        </a>
    </div>

    {{-- Mensaje de éxito --}}
    @if (session('success'))
        <div class="alert alert-success text-center" style="background-color: #4a6b40; color: #ffffff; border: none;">
            {{ session('success') }}
        </div>
    @endif

    <div class="row g-4">
        {{-- Lista de artículos --}}
        @foreach ($articulos as $articulo)
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card shadow-sm border-0 h-100" style="background-color: #2b3e50; color: #ffffff;">
                    <div class="card-body">
                        <h5 class="card-title" style="color: #d4af37;">{{ $articulo->titulo }}</h5>
                        <p class="card-text text-muted" style="color: #c0cac1;">{{ Str::limit($articulo->contenido, 100, '...') }}</p>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('articulos_blog.show', $articulo->id) }}" class="btn btn-primary btn-sm" style="background-color: #4a6b40; border-color: #4a6b40;">
                                <i class="bi bi-eye"></i> Ver
                            </a>
                            <a href="{{ route('articulos_blog.edit', $articulo->id) }}" class="btn btn-warning btn-sm" style="background-color: #d4af37; border-color: #d4af37; color: #000;">
                                <i class="bi bi-pencil-square"></i> Editar
                            </a>
                            <form action="{{ route('articulos_blog.destroy', $articulo->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" type="submit" style="background-color: #8b0000; border-color: #8b0000;" onclick="return confirm('¿Estás seguro de eliminar este artículo?')">
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