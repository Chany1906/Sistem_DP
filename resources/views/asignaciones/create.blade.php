<!-- resources/views/asignaciones/create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Crear Nueva Asignación</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('asignaciones.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="usuario_id">Usuario</label>
            <select name="usuario_id" id="usuario_id" class="form-control" required>
                @foreach($usuarios as $usuario)
                    <option value="{{ $usuario->id }}">{{ $usuario->usuario }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="tienda_id">Tienda</label>
            <select name="tienda_id" id="tienda_id" class="form-control" required>
                @foreach($tiendas as $tienda)
                    <option value="{{ $tienda->id }}">{{ $tienda->razon_social }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Crear Asignación</button>
    </form>
</div>
@endsection
