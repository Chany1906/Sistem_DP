<!-- resources/views/imagenes/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Gestión de Imágenes de Productos</h1>
            <a href="{{ route('imagenes.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Nuevas Imágenes
            </a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Lista de imágenes -->
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Imágenes de Productos</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Código Interno</th>
                                <th>Descripción</th>
                                <th>Marca</th>
                                <th>Imágenes</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $groupedImages = $imagenes->groupBy('codigo_interno');
                            @endphp
                            @foreach ($groupedImages as $codigoInterno => $imagenGroup)
                                <tr>
                                    <td>{{ $codigoInterno }}</td>
                                    <td>{{ $imagenGroup->first()->producto->descripcion }}</td>
                                    <td>{{ $imagenGroup->first()->producto->marca }}</td>
                                    <td>
                                        @foreach ($imagenGroup as $imagen)
                                            <img src="{{ asset('storage/' . $imagen->imagen) }}" alt="Miniatura"
                                                style="height: 50px; width: 50px; object-fit: cover;"
                                                class="img-thumbnail mr-2">
                                        @endforeach
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#modalImagen{{ $codigoInterno }}">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <form action="{{ route('imagenes.destroyAll', $codigoInterno) }}" method="POST"
                                                style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm ms-1"
                                                    onclick="return confirm('¿Está seguro de eliminar todas las imágenes de este producto?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Modal para ver imágenes -->
                                <div class="modal fade" id="modalImagen{{ $codigoInterno }}" tabindex="-1">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">
                                                    Imágenes del Producto: {{ $codigoInterno }}
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    @foreach ($imagenGroup as $imagen)
                                                        <div class="col-md-4 mb-3">
                                                            <img src="{{ asset('storage/' . $imagen->imagen) }}"
                                                                alt="Imagen del producto" class="img-fluid">
                                                            <form action="{{ route('imagenes.destroy', $imagen->id) }}"
                                                                method="POST" class="mt-2">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger btn-sm"
                                                                    onclick="return confirm('¿Está seguro de eliminar esta imagen?')">
                                                                    <i class="fas fa-trash"></i> Eliminar
                                                                </button>
                                                            </form>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
