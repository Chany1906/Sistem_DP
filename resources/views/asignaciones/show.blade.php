<!-- resources/views/asignaciones/show.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Detalles de la Asignación</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Asignación #{{ $asignacion->id }}</h5>
            <p class="card-text"><strong>Usuario:</strong> {{ $asignacion->usuario->usuario }}</p>
            <p class="card-text"><strong>Tienda:</strong> {{ $asignacion->tienda->razon_social }}</p>
            <p class="card-text"><strong>Creado el:</strong> {{ $asignacion->created_at->format('d/m/Y H:i:s') }}</p>
            <p class="card-text"><strong>Actualizado el:</strong> {{ $asignacion->updated_at->format('d/m/Y H:i:s') }}</p>
        </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('asignaciones.edit', $asignacion->id) }}" class="btn btn-warning">Editar</a>
        <a href="{{ route('asignaciones.index') }}" class="btn btn-secondary">Volver a la lista</a>
    </div>
</div>
@endsection
