<!-- resources/views/imagen_productos/show.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Detalles de la Imagen de Producto</h1>

    <div class="card">
        <img src="{{ asset('storage/' . $imagenProducto->imagen) }}" class="card-img-top" alt="Imagen del producto">
        <div class="card-body">
            <h5 class="card-title">Código Interno: {{ $imagenProducto->codigo_interno }}</h5>
            <p class="card-text"><strong>ID:</strong> {{ $imagenProducto->id }}</p>
            <p class="card-text"><strong>Ruta de la imagen:</strong> {{ $imagenProducto->imagen }}</p>
            <p class="card-text"><strong>Creado el:</strong> {{ $imagenProducto->created_at->format('d/m/Y H:i:s') }}</p>
            <p class="card-text"><strong>Actualizado el:</strong> {{ $imagenProducto->updated_at->format('d/m/Y H:i:s') }}</p>
        </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('imagen_productos.edit', $imagenProducto->id) }}" class="btn btn-warning">Editar</a>
        <a href="{{ route('imagen_productos.index') }}" class="btn btn-secondary">Volver a la lista</a>
    </div>
</div>
@endsection
