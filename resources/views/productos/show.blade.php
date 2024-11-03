<!-- resources/views/productos/show.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Detalles del Producto</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $producto->descripcion }}</h5>
            <div class="row">
                <div class="col-md-6">
                    <p><strong>ID:</strong> {{ $producto->id }}</p>
                    <p><strong>Código Interno:</strong> {{ $producto->codigo_interno }}</p>
                    <p><strong>Categoría:</strong> {{ $producto->categoria->nombre }}</p>
                    <p><strong>Tienda:</strong> {{ $producto->tienda->razon_social }}</p>
                    <p><strong>Código Fabricante:</strong> {{ $producto->codigo_fabricante }}</p>
                    <p><strong>Código OEM:</strong> {{ $producto->codigo_oem }}</p>
                    <p><strong>Origen:</strong> {{ $producto->origen }}</p>
                    <p><strong>Marca:</strong> {{ $producto->marca }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Múltiplos:</strong> {{ $producto->multiplos }}</p>
                    <p><strong>Medida:</strong> {{ $producto->medida }}</p>
                    <p><strong>Stock:</strong> {{ $producto->stock }}</p>
                    <p><strong>Precio de Compra:</strong> {{ number_format($producto->precio_compra, 2) }}</p>
                    <p><strong>Precio de Venta:</strong> {{ number_format($producto->precio_venta, 2) }}</p>
                    <p><strong>Precio Mínimo:</strong> {{ number_format($producto->precio_minimo, 2) }}</p>
                    <p><strong>Creado el:</strong> {{ $producto->created_at->format('d/m/Y H:i:s') }}</p>
                    <p><strong>Actualizado el:</strong> {{ $producto->updated_at->format('d/m/Y H:i:s') }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-warning">Editar</a>
        <a href="{{ route('productos.index') }}" class="btn btn-secondary">Volver a la lista</a>
    </div>
</div>
@endsection
