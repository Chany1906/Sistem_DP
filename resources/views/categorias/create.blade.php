<!-- resources/views/categorias/create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Crear Nueva Categoría</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('categorias.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <div class="form-group">
            <label for="campo_medicion">Campo de Medición</label>
            <input type="text" class="form-control" id="campo_medicion" name="campo_medicion" required>
        </div>
        <div class="form-group">
            <label for="tipo">Tipo</label>
            <input type="text" class="form-control" id="tipo" name="tipo" required>
        </div>
        <div class="form-group">
            <label for="imagen">Imagen</label>
            <input type="file" class="form-control-file" id="imagen" name="imagen">
        </div>
        <button type="submit" class="btn btn-primary">Crear Categoría</button>
    </form>
</div>
@endsection
