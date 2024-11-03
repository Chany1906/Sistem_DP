<!-- resources/views/usuarios/show.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Detalles del Usuario</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $usuario->usuario }}</h5>
                <p class="card-text"><strong>ID:</strong> {{ $usuario->id }}</p>
                <p class="card-text"><strong>Rol:</strong> {{ ucfirst($usuario->rol) }}</p>
                <p class="card-text"><strong>Estado:</strong> {{ ucfirst($usuario->estado) }}</p>
                <p class="card-text"><strong>Creado el:</strong> {{ $usuario->created_at->format('d/m/Y H:i:s') }}</p>
                <p class="card-text"><strong>Actualizado el:</strong> {{ $usuario->updated_at->format('d/m/Y H:i:s') }}</p>
            </div>
        </div>

        <div class="mt-3">
            <a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn btn-warning">Editar</a>
            <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Volver a la lista</a>
        </div>
    </div>
@endsection
