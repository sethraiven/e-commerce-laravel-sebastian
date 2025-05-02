@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-lg border-0">
        <div class="card-header bg-primary text-white text-center">
            <h4 class="mb-0">Editar Artículo</h4>
        </div>
        <div class="card-body bg-light">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('articulos_blog.update', $articulo->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="titulo" class="form-label fw-bold">Título</label>
                    <input type="text" name="titulo" id="titulo" class="form-control" value="{{ old('titulo', $articulo->titulo) }}" placeholder="Ingrese el título del artículo" required>
                </div>

                <div class="mb-3">
                    <label for="contenido" class="form-label fw-bold">Contenido</label>
                    <textarea name="contenido" id="contenido" class="form-control" rows="4" placeholder="Escriba el contenido del artículo">{{ old('contenido', $articulo->contenido) }}</textarea>
                </div>

                @if ($articulo->imagen_url)
                    <div class="mb-3 text-center">
                        <img src="{{ asset('storage/' . $articulo->imagen_url) }}" alt="Imagen del artículo" class="img-thumbnail" width="200">
                    </div>
                @endif

                <div class="mb-3">
                    <label for="imagen_url" class="form-label fw-bold">Actualizar Imagen</label>
                    <input type="file" name="imagen_url" id="imagen_url" class="form-control" accept="image/*">
                </div>

                <div class="mb-3">
                    <label for="autor" class="form-label fw-bold">Autor</label>
                    <input type="text" name="autor" id="autor" class="form-control" value="{{ old('autor', $articulo->autor) }}" placeholder="Ingrese el nombre del autor" required>
                </div>

                <div class="mb-3">
                    <label for="id_categoria" class="form-label fw-bold">Categoría</label>
                    <select name="id_categoria" id="id_categoria" class="form-select" required>
                        <option value="" disabled>Seleccione una categoría</option>
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}" {{ old('id_categoria', $articulo->id_categoria) == $categoria->id ? 'selected' : '' }}>
                                {{ $categoria->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('articulos_blog.index') }}" class="btn btn-outline-secondary">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection