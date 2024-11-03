<!-- resources/views/asignaciones/edit.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Editar Asignación</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('asignaciones.update', $asignacion->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="usuario_id">Usuario</label>
            <select name="usuario_id" id="usuario_id" class="form-control" required>
                @foreach($usuarios as $usuario)
                    <option value="{{ $usuario->id }}" {{ $asignacion->usuario_id == $usuario->id ? 'selected' : '' }}>
                        {{ $usuario->usuario }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="tienda_id">Tienda</label>
            <select name="tienda_id" id="tienda_id" class="form-control" required>
                @foreach($tiendas as $tienda)
                    <option value="{{ $tienda->id }}" {{ $asignacion->tienda_id == $tienda->id ? 'selected' : '' }}>
                        {{ $tienda->razon_social }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar Asignación</button>
    </form>
</div>
@endsection
