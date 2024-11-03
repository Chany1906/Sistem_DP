<!-- resources/views/tiendas/show.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Detalles de la Tienda</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $tienda->razon_social }}</h5>
            <p class="card-text"><strong>ID:</strong> {{ $tienda->id }}</p>
            <p class="card-text"><strong>RUC:</strong> {{ $tienda->ruc }}</p>
            <p class="card-text"><strong>Dirección:</strong> {{ $tienda->direccion }}</p>
            <p class="card-text"><strong>Encargado:</strong> {{ $tienda->encargado }}</p>
            <p class="card-text"><strong>Celular:</strong> {{ $tienda->celular }}</p>
            <p class="card-text"><strong>Creado el:</strong> {{ $tienda->created_at->format('d/m/Y H:i:s') }}</p>
            <p class="card-text"><strong>Actualizado el:</strong> {{ $tienda->updated_at->format('d/m/Y H:i:s') }}</p>
        </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('tiendas.edit', $tienda->id) }}" class="btn btn-warning">Editar</a>
        <a href="{{ route('tiendas.index') }}" class="btn btn-secondary">Volver a la lista</a>
    </div>
</div>
@endsection
