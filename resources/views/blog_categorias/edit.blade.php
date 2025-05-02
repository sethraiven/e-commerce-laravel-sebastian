@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center mt-4">
    <div class="card shadow-lg border-0 w-75">
        <div class="card-header bg-primary text-white text-center rounded-top">
            <h4 class="mb-0">Editar Categoría del Blog</h4>
        </div>

        <div class="card-body bg-light">
            <div class="w-100" style="max-width: 500px; margin: 0 auto;">
                @if ($errors->any())
                    <div class="alert alert-danger py-2 px-3 mb-3">
                        <ul class="mb-0 small">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('categorias_blog.update', $categorias_blog->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="nombre" class="form-label fw-bold">Nombre</label>
                        <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $categorias_blog->nombre) }}" class="form-control" placeholder="Ej: Deportes" required>
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label fw-bold">Descripción</label>
                        <textarea class="form-control" name="descripcion" id="descripcion" rows="3" placeholder="Escribe una breve descripción">{{ old('descripcion', $categorias_blog->descripcion) }}</textarea>
                    </div>
                    <div class="d-flex justify-content-between">
                        <a class="btn btn-outline-secondary" href="{{ route('categorias_blog.index') }}">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection