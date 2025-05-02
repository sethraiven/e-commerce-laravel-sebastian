@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center mt-4">
    <div class="card shadow-lg border-0 w-75" style="background-color: #2b3e50; color: #ffffff;">
        <div class="card-header text-center rounded-top" style="background-color: #4a6b40; color: #ffffff;">
            <h4 class="mb-0">Crear Nuevo Artículo</h4>
        </div>

        <div class="card-body">
            <div class="w-100" style="max-width: 600px; margin: 0 auto;">
                @if ($errors->any())
                    <div class="alert alert-danger py-2 px-3 mb-3">
                        <ul class="mb-0 small">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('articulos_blog.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="titulo" class="form-label fw-bold" style="color: #d4af37;">Título</label>
                        <input type="text" name="titulo" id="titulo" class="form-control" placeholder="Ej: Deportes" style="border: 2px solid #4a6b40; background-color: #1e2a34; color: #ffffff;" required>
                    </div>
                    <div class="mb-3">
                        <label for="contenido" class="form-label fw-bold" style="color: #d4af37;">Contenido</label>
                        <textarea class="form-control" name="contenido" id="contenido" rows="4" placeholder="Escribe el contenido del artículo" style="border: 2px solid #4a6b40; background-color: #1e2a34; color: #ffffff;"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="imagen_url" class="form-label fw-bold" style="color: #d4af37;">Imagen</label>
                        <input type="file" name="imagen_url" id="imagen_url" class="form-control" accept="image/*" style="border: 2px solid #4a6b40; background-color: #1e2a34; color: #ffffff;">
                    </div>
                    <div class="mb-3">
                        <label for="autor" class="form-label fw-bold" style="color: #d4af37;">Autor</label>
                        <input type="text" name="autor" id="autor" class="form-control" placeholder="Ej: Gabriel Mosquera" style="border: 2px solid #4a6b40; background-color: #1e2a34; color: #ffffff;" required>
                    </div>
                    <div class="mb-3">
                        <label for="id_categoria" class="form-label fw-bold" style="color: #d4af37;">Categoría</label>
                        <select name="id_categoria" id="id_categoria" class="form-select" style="border: 2px solid #4a6b40; background-color: #1e2a34; color: #ffffff;" required>
                            <option value="">Seleccionar</option>
                            @foreach($categorias as $categoria)
                                <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="d-flex justify-content-between">
                        <a class="btn btn-outline-danger" href="{{ route('articulos_blog.index') }}" style="border-color: #d4af37; color: #d4af37;">
                            <i class="bi bi-x-circle"></i> Cancelar
                        </a>
                        <button type="submit" class="btn btn-success" style="background-color: #4a6b40; border-color: #4a6b40;">
                            <i class="bi bi-check-circle"></i> Crear
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection