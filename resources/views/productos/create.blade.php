<!-- resources/views/productos/create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Crear Nuevo Producto</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('productos.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="categoria_id">Categoría</label>
                    <select name="categoria_id" id="categoria_id" class="form-control" required>
                        @foreach($categorias as $categoria)
                            <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="tienda_id">Tienda</label>
                    <select name="tienda_id" id="tienda_id" class="form-control" required>
                        @foreach($tiendas as $tienda)
                            <option value="{{ $tienda->id }}">{{ $tienda->razon_social }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="codigo_interno">Código Interno</label>
                    <input type="text" class="form-control" id="codigo_interno" name="codigo_interno" required>
                </div>
                <div class="form-group">
                    <label for="codigo_fabricante">Código Fabricante</label>
                    <input type="text" class="form-control" id="codigo_fabricante" name="codigo_fabricante">
                </div>
                <div class="form-group">
                    <label for="codigo_oem">Código OEM</label>
                    <input type="text" class="form-control" id="codigo_oem" name="codigo_oem">
                </div>
                <div class="form-group">
                    <label for="origen">Origen</label>
                    <input type="text" class="form-control" id="origen" name="origen">
                </div>
                <div class="form-group">
                    <label for="marca">Marca</label>
                    <input type="text" class="form-control" id="marca" name="marca">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <textarea class="form-control" id="descripcion" name="descripcion" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="multiplos">Múltiplos</label>
                    <input type="text" class="form-control" id="multiplos" name="multiplos">
                </div>
                <div class="form-group">
                    <label for="medida">Medida</label>
                    <input type="text" class="form-control" id="medida" name="medida">
                </div>
                <div class="form-group">
                    <label for="stock">Stock</label>
                    <input type="number" class="form-control" id="stock" name="stock">
                </div>
                <div class="form-group">
                    <label for="precio_compra">Precio Compra</label>
                    <input type="number" step="0.01" class="form-control" id="precio_compra" name="precio_compra">
                </div>
                <div class="form-group">
                    <label for="precio_venta">Precio Venta</label>
                    <input type="number" step="0.01" class="form-control" id="precio_venta" name="precio_venta">
                </div>
                <div class="form-group">
                    <label for="precio_minimo">Precio Mínimo</label>
                    <input type="number" step="0.01" class="form-control" id="precio_minimo" name="precio_minimo">
                </div>
            </div>
        </div>
        <div class="form-group mt-3">
            <button type="submit" class="btn btn-primary">Crear Producto</button>
            <a href="{{ route('productos.index') }}" class="btn btn-secondary ml-2">Cancelar</a>
        </div>
    </form>
</div>
@endsection
