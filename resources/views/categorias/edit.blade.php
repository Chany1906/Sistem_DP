<!-- resources/views/categorias/edit.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Editar Categoría</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('categorias.update', $categoria->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $categoria->nombre }}" required>
        </div>
        <div class="form-group">
            <label for="campo_medicion">Campo de Medición</label>
            <input type="text" class="form-control" id="campo_medicion" name="campo_medicion" value="{{ $categoria->campo_medicion }}" required>
        </div>
        <div class="form-group">
            <label for="tipo">Tipo</label>
            <input type="text" class="form-control" id="tipo" name="tipo" value="{{ $categoria->tipo }}" required>
        </div>
        <div class="form-group">
            <label for="imagen">Imagen</label>
            @if($categoria->imagen)
                <img src="{{ asset('storage/' . $categoria->imagen) }}" alt="{{ $categoria->nombre }}" style="max-width: 200px; max-height: 200px;">
            @endif
            <input type="file" class="form-control-file" id="imagen" name="imagen">
        </div>
        <button type="submit" class="btn btn-primary">Actualizar Categoría</button>
    </form>
</div>
@endsection
