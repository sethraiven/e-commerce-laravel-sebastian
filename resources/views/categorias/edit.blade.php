@extends('layouts.app')

@section('content')
<div class="container">
    {{-- <h1 class="text-center mb-4 text-success ">Editar Categoría</h1> --}}
    <h1 >Editar Categoría</h1>
    <style>
        h1 {
            text-align: center;
            color: #c0cac1; /* Verde */
            font-size: 2.5rem;
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); /* Sombra en el texto */
            margin-bottom: 20px;
        }

        label {
            font-size: 1.2rem;
            color: #4a6b40; /* Verde */
        }
        .form-control {
            border: 2px solid #4a6b40; /* Verde */
            border-radius: 5px;
            padding: 10px;
            font-size: 1rem;
        }

        .cancelar {
            text-decoration: none;
            color: #4a6b40; /* Verde */
            font-weight: bold;
            font-size: 1.2rem;
            padding: 10px 20px;
            border: 2px solid #4a6b40; /* Verde */
            border-radius: 5px;
            background-color: #b1c0b3; /* Verde claro */
            transition: background-color 0.3s, color 0.3s;
        }

        .cancelar:hover {
            background-color: #4a6b40; /* Verde */
            color: #ffffff; /* Blanco */
        }
        .btn-success {
            background-color: #4a6b40; /* Verde */
            border: none;
            padding: 10px 20px;
            font-size: 1.2rem;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
        }
    </style>

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

    <form action="{{ route('categorias.update', $categoria->id) }}" method="POST" class="p-4 shadow-sm rounded" style="background-color: #b1c0b3;">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nombre" class="form-label fw-bold text-primary">Nombre de la categoría:</label>
            <input type="text" name="nombre" id="nombre" class="form-control border-success" value="{{ old('nombre', $categoria->nombre) }}" placeholder="Ingrese el nombre de la categoría" required>
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label fw-bold text-primary">Descripción:</label>
            <textarea name="descripcion" id="descripcion" class="form-control border-success" rows="4" placeholder="Ingrese una descripción">{{ old('descripcion', $categoria->descripcion ?? '') }}</textarea>
        </div>

        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-success">Actualizar</button>
            <a  href="{{ route('categorias.index') }}" class="cancelar">Cancelar</a>
            
        </div>
    </form>
</div>
@endsection