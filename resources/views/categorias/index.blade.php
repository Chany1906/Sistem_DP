<!-- resources/views/categorias/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Lista de Categorías</h1>
        <a href="{{ route('categorias.create') }}" class="btn btn-primary mb-3">Crear Nueva Categoría</a>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Campo de Medición</th>
                    <th>Tipo</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categorias as $categoria)
                    <tr>
                        <td>{{ $categoria->id }}</td>
                        <td>{{ $categoria->nombre }}</td>
                        <td>{{ $categoria->campo_medicion }}</td>
                        <td>{{ $categoria->tipo }}</td>
                        <td>
                            @if ($categoria->imagen)
                                <img src="{{ asset('storage/' . $categoria->imagen) }}" alt="{{ $categoria->nombre }}"
                                    style="max-width: 50px; max-height: 50px;">
                            @else
                                Sin imagen
                            @endif
                        </td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('categorias.show', $categoria->id) }}" class="btn btn-info btn-sm"
                                    title="Ver">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('categorias.edit', $categoria->id) }}" class="btn btn-warning btn-sm"
                                    title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST"
                                    style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('¿Estás seguro de que quieres eliminar esta categoría?')"
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
