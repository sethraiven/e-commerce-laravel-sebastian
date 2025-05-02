@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-lg border-0" style="background-color: #2b3e50; color: #ffffff;">
        <div class="card-header text-center rounded-top" style="background-color: #4a6b40; color: #ffffff;">
            <h4 class="mb-0">Editar Artículo</h4>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger py-2 px-3 mb-3">
                    <ul class="mb-0 small">
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
                    <label for="titulo" class="form-label fw-bold" style="color: #d4af37;">Título</label>
                    <input type="text" name="titulo" id="titulo" class="form-control" value="{{ old('titulo', $articulo->titulo) }}" placeholder="Ingrese el título del artículo" style="border: 2px solid #4a6b40; background-color: #1e2a34; color: #ffffff;" required>
                </div>

                <div class="mb-3">
                    <label for="contenido" class="form-label fw-bold" style="color: #d4af37;">Contenido</label>
                    <textarea name="contenido" id="contenido" class="form-control" rows="4" placeholder="Escriba el contenido del artículo" style="border: 2px solid #4a6b40; background-color: #1e2a34; color: #ffffff;">{{ old('contenido', $articulo->contenido) }}</textarea>
                </div>

                @if ($articulo->imagen_url)
                    <div class="mb-3 text-center">
                        <img src="{{ asset('storage/' . $articulo->imagen_url) }}" alt="Imagen del artículo" class="img-thumbnail" style="max-width: 200px; border: 2px solid #4a6b40;">
                    </div>
                @endif

                <div class="mb-3">
                    <label for="imagen_url" class="form-label fw-bold" style="color: #d4af37;">Actualizar Imagen</label>
                    <input type="file" name="imagen_url" id="imagen_url" class="form-control" accept="image/*" style="border: 2px solid #4a6b40; background-color: #1e2a34; color: #ffffff;">
                </div>

                <div class="mb-3">
                    <label for="autor" class="form-label fw-bold" style="color: #d4af37;">Autor</label>
                    <input type="text" name="autor" id="autor" class="form-control" value="{{ old('autor', $articulo->autor) }}" placeholder="Ingrese el nombre del autor" style="border: 2px solid #4a6b40; background-color: #1e2a34; color: #ffffff;" required>
                </div>

                <div class="mb-3">
                    <label for="id_categoria" class="form-label fw-bold" style="color: #d4af37;">Categoría</label>
                    <select name="id_categoria" id="id_categoria" class="form-select" style="border: 2px solid #4a6b40; background-color: #1e2a34; color: #ffffff;" required>
                        <option value="" disabled>Seleccione una categoría</option>
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}" {{ old('id_categoria', $articulo->id_categoria) == $categoria->id ? 'selected' : '' }}>
                                {{ $categoria->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('articulos_blog.index') }}" class="btn btn-outline-danger" style="border-color: #d4af37; color: #d4af37;">
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
@endsection