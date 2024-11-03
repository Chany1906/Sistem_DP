<!-- resources/views/usuarios/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Lista de Usuarios</h1>
        <a href="{{ route('usuarios.create') }}" class="btn btn-primary mb-3">Crear Nuevo Usuario</a>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Usuario</th>
                    <th>Rol</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $usuario)
                    <tr>
                        <td>{{ $usuario->id }}</td>
                        <td>{{ $usuario->usuario }}</td>
                        <td>{{ $usuario->rol }}</td>
                        <td>{{ $usuario->estado }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('usuarios.show', $usuario->id) }}" class="btn btn-info btn-sm"
                                    title="Ver usuario">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn btn-warning btn-sm"
                                    title="Editar usuario">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST"
                                    style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('¿Estás seguro de que quieres eliminar este usuario?')"
                                        title="Eliminar usuario">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
