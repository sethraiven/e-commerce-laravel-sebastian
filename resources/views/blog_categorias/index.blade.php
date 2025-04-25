@extends('layouts.app')

@section('content')
    <div class="container p-0 text-center">
        <h1>Categorías del Blog</h1>

        {{-- Botón para crear nueva categoría --}}
        <button class="btn btn-primary my-3">
            <a href="{{ route('categorias_blog.create') }}">Nueva categoría</a>
        </button>

        {{-- Mensaje de éxito --}}
        @if (session('success'))
            <div style="color: green; margin-bottom: 10px;">
                {{ session('success') }}
            </div>
        @endif
    </div>

    <div class="container">
        <div class="row ">
            {{-- Lista de categorías --}}
            @foreach ($blog_categorias as $categoria)
                <div class="col-12 col-md-5 col-lg-3 d-flex flex-column justify-content-center align-items-center gap-2 text-center border border-2 rounded-3 p-2 my-2">
                    <h2>{{ $categoria->nombre }}</h2>
                    <p><strong>Descripción:</strong> {{ $categoria->descripcion }}</p>
                    <div>
                        <button class="btn btn-primary">
                            <a href="{{ route('categorias_blog.edit', $categoria->id) }}">Editar</a>
                        </button>

                        <form action="{{ route('categorias_blog.destroy', $categoria->id) }}" method="POST"
                            style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit"
                                onclick="return confirm('¿Estás seguro de eliminar esta categoría?')">Eliminar</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection