<!-- resources/views/imagen_productos/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Lista de Imágenes de Productos</h1>
    <a href="{{ route('imagen_productos.create') }}" class="btn btn-primary mb-3">Agregar Nueva Imagen</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">
        @foreach($imagenProductos as $imagenProducto)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ asset('storage/' . $imagenProducto->imagen) }}" class="card-img-top" alt="Imagen del producto">
                    <div class="card-body">
                        <h5 class="card-title">Código Interno: {{ $imagenProducto->codigo_interno }}</h5>
                        <p class="card-text">ID: {{ $imagenProducto->id }}</p>
                        <a href="{{ route('imagen_productos.show', $imagenProducto->id) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('imagen_productos.edit', $imagenProducto->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('imagen_productos.destroy', $imagenProducto->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que quieres eliminar esta imagen?')">Eliminar</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
