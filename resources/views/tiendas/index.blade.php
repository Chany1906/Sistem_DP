<!-- resources/views/tiendas/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Lista de Tiendas</h1>
        <a href="{{ route('tiendas.create') }}" class="btn btn-primary mb-3">Crear Nueva Tienda</a>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>RUC</th>
                    <th>Razón Social</th>
                    <th>Dirección</th>
                    <th>Encargado</th>
                    <th>Celular</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tiendas as $tienda)
                    <tr>
                        <td>{{ $tienda->id }}</td>
                        <td>{{ $tienda->ruc }}</td>
                        <td>{{ $tienda->razon_social }}</td>
                        <td>{{ $tienda->direccion }}</td>
                        <td>{{ $tienda->encargado }}</td>
                        <td>{{ $tienda->celular }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('tiendas.show', $tienda->id) }}" class="btn btn-info btn-sm" title="Ver">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('tiendas.edit', $tienda->id) }}" class="btn btn-warning btn-sm"
                                    title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('tiendas.destroy', $tienda->id) }}" method="POST"
                                    style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('¿Estás seguro de que quieres eliminar esta tienda?')"
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
