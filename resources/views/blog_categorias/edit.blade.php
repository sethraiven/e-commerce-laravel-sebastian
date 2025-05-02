@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center mt-4">
    <div class="card shadow-lg border-0 w-75" style="background-color: #2b3e50; color: #ffffff;">
        <div class="card-header text-center rounded-top" style="background-color: #4a6b40; color: #ffffff;">
            <h4 class="mb-0">Editar Categoría del Blog</h4>
        </div>

        <div class="card-body">
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
                        <label for="nombre" class="form-label fw-bold" style="color: #d4af37;">Nombre</label>
                        <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $categorias_blog->nombre) }}" class="form-control" placeholder="Ej: Deportes" style="border: 2px solid #4a6b40; background-color: #1e2a34; color: #ffffff;" required>
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label fw-bold" style="color: #d4af37;">Descripción</label>
                        <textarea class="form-control" name="descripcion" id="descripcion" rows="3" placeholder="Escribe una breve descripción" style="border: 2px solid #4a6b40; background-color: #1e2a34; color: #ffffff;">{{ old('descripcion', $categorias_blog->descripcion) }}</textarea>
                    </div>
                    <div class="d-flex justify-content-between">
                        <a class="btn btn-outline-danger" href="{{ route('categorias_blog.index') }}" style="border-color: #d4af37; color: #d4af37;">
                            <i class="bi bi-x-circle"></i> Cancelar
                        </a>
                        <button type="submit" class="btn btn-success" style="background-color: #4a6b40; border-color: #4a6b40;">
                            <i class="bi bi-check-circle"></i> Actualizar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection