<!-- resources/views/imagen_productos/edit.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Editar Imagen de Producto</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('imagen_productos.update', $imagenProducto->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="codigo_interno">Código Interno del Producto</label>
            <input type="text" class="form-control" id="codigo_interno" name="codigo_interno" value="{{ $imagenProducto->codigo_interno }}" required>
        </div>
        <div class="form-group">
            <label for="imagen">Imagen Actual</label>
            <img src="{{ asset('storage/' . $imagenProducto->imagen) }}" alt="Imagen actual" class="img-thumbnail" style="max-width: 200px;">
        </div>
        <div class="form-group">
            <label for="nueva_imagen">Nueva Imagen (dejar en blanco para mantener la actual)</label>
            <input type="file" class="form-control-file" id="nueva_imagen" name="nueva_imagen">
        </div>
        <button type="submit" class="btn btn-primary">Actualizar Imagen</button>
    </form>
</div>
@endsection
