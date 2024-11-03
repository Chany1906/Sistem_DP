<!-- resources/views/usuarios/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Editar Usuario</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="usuario">Nombre de Usuario</label>
                <input type="text" class="form-control" id="usuario" name="usuario" value="{{ $usuario->usuario }}" required>
            </div>
            <div class="form-group">
                <label for="rol">Rol</label>
                <select class="form-control" id="rol" name="rol" required>
                    <option value="admin" {{ $usuario->rol == 'admin' ? 'selected' : '' }}>Administrador</option>
                    <option value="usuario" {{ $usuario->rol == 'usuario' ? 'selected' : '' }}>Usuario</option>
                    <option value="vendedor" {{ $usuario->rol == 'vendedor' ? 'selected' : '' }}>Vendedor</option>
                </select>
            </div>
            <div class="form-group">
                <label for="estado">Estado</label>
                <select class="form-control" id="estado" name="estado" required>
                    <option value="activo" {{ $usuario->estado == 'activo' ? 'selected' : '' }}>Activo</option>
                    <option value="inactivo" {{ $usuario->estado == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
                </select>
            </div>
            <div class="form-group">
                <label for="password">Nueva Contraseña (dejar en blanco para mantener la actual)</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirmar Nueva Contraseña</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
            </div>
            <button type="submit" class="btn btn-primary">Actualizar Usuario</button>
        </form>
    </div>
@endsection
