<!-- resources/views/asignaciones/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Lista de Asignaciones</h1>
        <a href="{{ route('asignaciones.create') }}" class="btn btn-primary mb-3">Crear Nueva Asignación</a>

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
                    <th>Tienda</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($asignaciones as $asignacion)
                    <tr>
                        <td>{{ $asignacion->id }}</td>
                        <td>{{ $asignacion->usuario->usuario }}</td>
                        <td>{{ $asignacion->tienda->razon_social }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('asignaciones.show', $asignacion->id) }}" class="btn btn-info btn-sm"
                                    title="Ver">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('asignaciones.edit', $asignacion->id) }}" class="btn btn-warning btn-sm"
                                    title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('asignaciones.destroy', $asignacion->id) }}" method="POST"
                                    style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('¿Estás seguro de que quieres eliminar esta asignación?')"
                                        title="Eliminar">
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
