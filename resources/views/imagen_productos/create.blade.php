<!-- resources/views/imagen_productos/create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Agregar Nueva Imagen de Producto</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('imagen_productos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="codigo_interno">Código Interno del Producto</label>
            <input type="text" class="form-control" id="codigo_interno" name="codigo_interno" required>
        </div>
        <div class="form-group">
            <label for="imagen">Imagen</label>
            <input type="file" class="form-control-file" id="imagen" name="imagen" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar Imagen</button>
    </form>
</div>
@endsection
