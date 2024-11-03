<!-- resources/views/tiendas/edit.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Editar Tienda</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tiendas.update', $tienda->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="ruc">RUC</label>
            <input type="text" class="form-control" id="ruc" name="ruc" value="{{ $tienda->ruc }}" required>
        </div>
        <div class="form-group">
            <label for="razon_social">Razón Social</label>
            <input type="text" class="form-control" id="razon_social" name="razon_social" value="{{ $tienda->razon_social }}" required>
        </div>
        <div class="form-group">
            <label for="direccion">Dirección</label>
            <input type="text" class="form-control" id="direccion" name="direccion" value="{{ $tienda->direccion }}" required>
        </div>
        <div class="form-group">
            <label for="encargado">Encargado</label>
            <input type="text" class="form-control" id="encargado" name="encargado" value="{{ $tienda->encargado }}" required>
        </div>
        <div class="form-group">
            <label for="celular">Celular</label>
            <input type="text" class="form-control" id="celular" name="celular" value="{{ $tienda->celular }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar Tienda</button>
    </form>
</div>
@endsection
