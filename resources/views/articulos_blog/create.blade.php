@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center">
    <div class="card text-white bg-dark border-0 w-75">
        <div class="card-header text-center border-bottom border-secondary">
            <h4 class="mb-0">Nuevo Articulo</h4>
        </div>

        <div class="card-body d-flex justify-content-center">
            <div class="w-100" style="max-width: 500px;">
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
                        <label for="exampleFormControlInput1" class="form-label">Titulo</label>
                        <input type="text" name="titulo" class="form-control" placeholder="Ej: Deportes" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Contenido</label>
                        <textarea class="form-control" name="contenido" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="imagen_url" class="form-label">Imagen:</label>
                        <input type="file" name="imagen_url" id="imagen_url" class="form-control form-control-sm bg-dark text-white border-secondary w-100" accept="image/*">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Autor</label>
                        <input type="text" name="autor" class="form-control" placeholder="Ej: Gabriel Mosquera" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small">Categoría</label>
                        <select name="id_categoria" class="form-select form-select-sm bg-dark text-white border-secondary w-100" required>
                            <option value="">Seleccionar</option>
                            @foreach($categorias as $categoria)
                                <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <a class="btn btn-outline-secondary ms-2" href="{{ route('articulos_blog.index') }}">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Crear</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection