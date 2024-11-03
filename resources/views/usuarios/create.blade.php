<!-- resources/views/usuarios/create.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Crear Nuevo Usuario</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('usuarios.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="usuario">Nombre de Usuario</label>
                <input type="text" class="form-control" id="usuario" name="usuario" required>
            </div>
            <div class="form-group">
                <label for="rol">Rol</label>
                <select class="form-control" id="rol" name="rol" required>
                    <option value="admin">Administrador</option>
                    <option value="usuario">Usuario</option>
                    <option value="vendedor">Vendedor</option>
                </select>
            </div>
            <div class="form-group">
                <label for="estado">Estado</label>
                <select class="form-control" id="estado" name="estado" required>
                    <option value="activo">Activo</option>
                    <option value="inactivo">Inactivo</option>
                </select>
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirmar Contraseña</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
            </div>
            <button type="submit" class="btn btn-primary">Crear Usuario</button>
        </form>
    </div>
@endsection
