@forelse($productos as $producto)
    <tr>
        <td>{{ $producto->id }}</td>
        <td>{{ $producto->categoria->nombre }}</td>
        <td>{{ $producto->tienda->razon_social }}</td>
        <td>{{ $producto->codigo_interno }}</td>
        <td>{{ $producto->codigo_fabricante }}</td>
        <td>{{ $producto->codigo_oem }}</td>
        <td>{{ $producto->origen }}</td>
        <td>{{ $producto->marca }}</td>
        <td>{{ Str::limit($producto->descripcion, 50) }}</td>
        <td>{{ $producto->multiplos }}</td>
        <td>{{ $producto->medida }}</td>
        <td>{{ $producto->stock }}</td>
        <td>{{ number_format($producto->precio_compra, 2) }}</td>
        <td>{{ number_format($producto->precio_venta, 2) }}</td>
        <td>{{ number_format($producto->precio_minimo, 2) }}</td>
        <td>
            <div class="btn-group" role="group">
                <a href="{{ route('productos.show', $producto) }}" class="btn btn-info btn-sm" title="Ver">
                    <i class="fas fa-eye"></i>
                </a>
                <a href="{{ route('productos.edit', $producto) }}" class="btn btn-warning btn-sm" title="Editar">
                    <i class="fas fa-edit"></i>
                </a>
                <form action="{{ route('productos.destroy', $producto) }}" method="POST"
                    style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm"
                        onclick="return confirm('¿Estás seguro de que quieres eliminar este producto?')"
                        title="Eliminar">
                        <i class="fas fa-trash"></i>
                    </button>
                </form>
            </div>
        </td>
    </tr>
@empty
    <tr>
        <td colspan="16" class="text-center">No se encontraron productos</td>
    </tr>
@endforelse
