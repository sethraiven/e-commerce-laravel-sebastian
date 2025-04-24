@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center mb-4">Agregar una Categoría</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Por favor corrige los siguientes errores:</strong>
            <ul class="mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('categorias.store') }}" method="POST" class="p-4 shadow-sm rounded bg-white">
        @csrf
        <div class="mb-3">
            <label for="nombre" class="form-label fw-bold">Nombre de la categoría:</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre') }}" placeholder="Ingrese el nombre de la categoría" required>
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label fw-bold">Descripción:</label>
            <textarea name="descripcion" id="descripcion" class="form-control" rows="4" placeholder="Ingrese una descripción">{{ old('descripcion', $categoria->descripcion ?? '') }}</textarea>
        </div>

        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('categorias.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
@endsection