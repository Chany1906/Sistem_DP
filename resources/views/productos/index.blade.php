@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="mb-4">Lista de Productos</h1>

        <div class="row mb-3">
            <div class="col-md-4">
                <a href="{{ route('productos.create') }}" class="btn btn-primary">Crear Nuevo Producto</a>
            </div>
            <div class="col-md-4">
                <div class="input-group">
                    <input type="text" id="search" class="form-control" placeholder="Buscar productos...">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button" id="search-button">
                            <i class="fas fa-search"></i> Buscar
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <form action="{{ route('productos.import') }}" method="POST" enctype="multipart/form-data"
                    class="form-inline justify-content-end">
                    @csrf
                    <div class="input-group">
                        <input type="file" name="excel_file" class="form-control" id="excel_file" required>
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-file-excel mr-1"></i> Importar Excel
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class="card">
            <div class="card-body">
                <div class="table-responsive" style="max-height: 600px; overflow-y: auto;">
                    <table class="table table-striped table-bordered table-hover">
                        <thead class="thead-dark sticky-top bg-dark">
                            <tr>
                                <th>ID</th>
                                <th>Categoría</th>
                                <th>Tienda</th>
                                <th>Código Interno</th>
                                <th>Código Fabricante</th>
                                <th>Código OEM</th>
                                <th>Origen</th>
                                <th>Marca</th>
                                <th>Descripción</th>
                                <th>Múltiplos</th>
                                <th>Medida</th>
                                <th>Stock</th>
                                <th>Precio Compra</th>
                                <th>Precio Venta</th>
                                <th>Precio Mínimo</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="productos-body">
                            @include('productos.partials.producto_row')
                        </tbody>
                    </table>
                </div>
                <div id="loading" class="text-center d-none mt-2">
                    <div class="spinner-border" role="status">
                        <span class="sr-only">Cargando...</span>
                    </div>
                </div>
                <div id="total-productos" class="mt-2">
                    Total de productos: {{ $productos->count() }}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            let searchTimeout = null;

            function loadProducts() {
                $('#loading').removeClass('d-none');
                const searchQuery = $('#search').val();

                $.ajax({
                    url: '{{ route('productos.index') }}',
                    method: 'GET',
                    data: {
                        search: searchQuery
                    },
                    success: function(response) {
                        $('#productos-body').html(response.productos);
                        $('#total-productos').text('Total de productos: ' + response.total);
                        $('#loading').addClass('d-none');
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                        $('#loading').addClass('d-none');
                        alert('Error al cargar los productos. Por favor, intente nuevamente.');
                    }
                });
            }

            // Manejar la búsqueda con debounce
            $('#search').on('input', function() {
                clearTimeout(searchTimeout);
                searchTimeout = setTimeout(loadProducts, 500);
            });

            // Manejar el botón de búsqueda
            $('#search-button').click(function(e) {
                e.preventDefault();
                loadProducts();
            });

            // Manejar la tecla Enter en el campo de búsqueda
            $('#search').keypress(function(e) {
                if (e.which == 13) {
                    e.preventDefault();
                    loadProducts();
                }
            });
        });
    </script>
@endsection
