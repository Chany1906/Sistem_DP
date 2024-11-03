<!-- resources/views/productos/edit.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Editar Producto</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('productos.update', $producto->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="categoria_id">Categoría</label>
                    <select name="categoria_id" id="categoria_id" class="form-control" required>
                        @foreach($categorias as $categoria)
                            <option value="{{ $categoria->id }}" {{ $producto->categoria_id == $categoria->id ? 'selected' : '' }}>
                                {{ $categoria->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="tienda_id">Tienda</label>
                    <select name="tienda_id" id="tienda_id" class="form-control" required>
                        @foreach($tiendas as $tienda)
                            <option value="{{ $tienda->id }}" {{ $producto->tienda_id == $tienda->id ? 'selected' : '' }}>
                                {{ $tienda->razon_social }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="codigo_interno">Código Interno</label>
                    <input type="text" class="form-control" id="codigo_interno" name="codigo_interno" value="{{ $producto->codigo_interno }}" required>
                </div>
                <div class="form-group">
                    <label for="codigo_fabricante">Código Fabricante</label>
                    <input type="text" class="form-control" id="codigo_fabricante" name="codigo_fabricante" value="{{ $producto->codigo_fabricante }}">
                </div>
                <div class="form-group">
                    <label for="codigo_oem">Código OEM</label>
                    <input type="text" class="form-control" id="codigo_oem" name="codigo_oem" value="{{ $producto->codigo_oem }}">
                </div>
                <div class="form-group">
                    <label for="origen">Origen</label>
                    <input type="text" class="form-control" id="origen" name="origen" value="{{ $producto->origen }}">
                </div>
                <div class="form-group">
                    <label for="marca">Marca</label>
                    <input type="text" class="form-control" id="marca" name="marca" value="{{ $producto->marca }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <textarea class="form-control" id="descripcion" name="descripcion" rows="3">{{ $producto->descripcion }}</textarea>
                </div>
                <div class="form-group">
                    <label for="multiplos">Múltiplos</label>
                    <input type="text" class="form-control" id="multiplos" name="multiplos" value="{{ $producto->multiplos }}">
                </div>
                <div class="form-group">
                    <label for="medida">Medida</label>
                    <input type="text" class="form-control" id="medida" name="medida" value="{{ $producto->medida }}">
                </div>
                <div class="form-group">
                    <label for="stock">Stock</label>
                    <input type="number" class="form-control" id="stock" name="stock" value="{{ $producto->stock }}">
                </div>
                <div class="form-group">
                    <label for="precio_compra">Precio Compra</label>
                    <input type="number" step="0.01" class="form-control" id="precio_compra" name="precio_compra" value="{{ $producto->precio_compra }}">
                </div>
                <div class="form-group">
                    <label for="precio_venta">Precio Venta</label>
                    <input type="number" step="0.01" class="form-control" id="precio_venta" name="precio_venta" value="{{ $producto->precio_venta }}">
                </div>
                <div class="form-group">
                    <label for="precio_minimo">Precio Mínimo</label>
                    <input type="number" step="0.01" class="form-control" id="precio_minimo" name="precio_minimo" value="{{ $producto->precio_minimo }}">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar Producto</button>
    </form>
</div>
@endsection
