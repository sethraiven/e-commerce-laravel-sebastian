@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center mt-4">
    <div class="card shadow-lg border-0 w-75">
        <div class="card-header text-center bg-primary text-white rounded-top">
            <h4 class="mb-0">Crear Nuevo Artículo</h4>
        </div>

        <div class="card-body d-flex justify-content-center bg-light">
            <div class="w-100" style="max-width: 600px;">
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
                        <label for="titulo" class="form-label fw-bold">Título</label>
                        <input type="text" name="titulo" id="titulo" class="form-control" placeholder="Ej: Deportes" required>
                    </div>
                    <div class="mb-3">
                        <label for="contenido" class="form-label fw-bold">Contenido</label>
                        <textarea class="form-control" name="contenido" id="contenido" rows="4" placeholder="Escribe el contenido del artículo"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="imagen_url" class="form-label fw-bold">Imagen</label>
                        <input type="file" name="imagen_url" id="imagen_url" class="form-control" accept="image/*">
                    </div>
                    <div class="mb-3">
                        <label for="autor" class="form-label fw-bold">Autor</label>
                        <input type="text" name="autor" id="autor" class="form-control" placeholder="Ej: Gabriel Mosquera" required>
                    </div>
                    <div class="mb-3">
                        <label for="id_categoria" class="form-label fw-bold">Categoría</label>
                        <select name="id_categoria" id="id_categoria" class="form-select" required>
                            <option value="">Seleccionar</option>
                            @foreach($categorias as $categoria)
                                <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="d-flex justify-content-between">
                        <a class="btn btn-outline-secondary" href="{{ route('articulos_blog.index') }}">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Crear</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection