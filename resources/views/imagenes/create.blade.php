<!-- resources/views/imagenes/create.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Agregar Nuevas Imágenes de Producto</h1>
            <a href="{{ route('imagenes.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Volver a la lista
            </a>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card">
            <div class="card-body">
                <form action="{{ route('imagenes.store') }}" method="POST" enctype="multipart/form-data" id="uploadForm">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="codigo_interno">Código Interno del Producto</label>
                                <select name="codigo_interno" id="codigo_interno" class="form-control" required>
                                    <option value="">Seleccione un producto</option>
                                    @foreach ($productos as $producto)
                                        <option value="{{ $producto->codigo_interno }}">
                                            {{ $producto->codigo_interno }} - {{ $producto->descripcion }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="imagenes">Imágenes (Máximo 2MB por imagen)</label>
                                <input type="file" class="form-control" id="imagenes" name="imagenes[]" multiple
                                    accept="image/*" required>
                                <small class="text-muted">Formatos permitidos: JPG, PNG, GIF. Tamaño máximo: 2MB por
                                    imagen.</small>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-upload"></i> Subir Imágenes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            document.getElementById('uploadForm').addEventListener('submit', function(e) {
                const files = document.getElementById('imagenes').files;
                const maxSize = 2 * 1024 * 1024; // 2MB en bytes

                for (let i = 0; i < files.length; i++) {
                    if (files[i].size > maxSize) {
                        e.preventDefault();
                        alert(`La imagen "${files[i].name}" excede el tamaño máximo permitido de 2MB`);
                        return;
                    }
                }
            });

            document.getElementById('imagenes').addEventListener('change', function(e) {
                const files = e.target.files;
                const maxSize = 2 * 1024 * 1024; // 2MB en bytes

                for (let i = 0; i < files.length; i++) {
                    if (files[i].size > maxSize) {
                        alert(`La imagen "${files[i].name}" excede el tamaño máximo permitido de 2MB`);
                        e.target.value = ''; // Limpiar la selección
                        return;
                    }
                }
            });
        </script>
    @endpush
@endsection
