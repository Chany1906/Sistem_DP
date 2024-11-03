<!-- resources/views/categorias/show.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Detalles de la Categoría</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $categoria->nombre }}</h5>
            <p class="card-text"><strong>ID:</strong> {{ $categoria->id }}</p>
            <p class="card-text"><strong>Campo de Medición:</strong> {{ $categoria->campo_medicion }}</p>
            <p class="card-text"><strong>Tipo:</strong> {{ $categoria->tipo }}</p>
            @if($categoria->imagen)
                <p class="card-text"><strong>Imagen:</strong></p>
                <img src="{{ asset('storage/' . $categoria->imagen) }}" alt="{{ $categoria->nombre }}" style="max-width: 300px; max-height: 300px;">
            @else
                <p class="card-text"><strong>Imagen:</strong> No disponible</p>
            @endif
            <p class="card-text"><strong>Creado el:</strong> {{ $categoria->created_at->format('d/m/Y H:i:s') }}</p>
            <p class="card-text"><strong>Actualizado el:</strong> {{ $categoria->updated_at->format('d/m/Y H:i:s') }}</p>
        </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('categorias.edit', $categoria->id) }}" class="btn btn-warning">Editar</a>
        <a href="{{ route('categorias.index') }}" class="btn btn-secondary">Volver a la lista</a>
    </div>
</div>
@endsection
