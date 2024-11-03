<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Deybiparts</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Custom CSS -->
    <style>
        body {
            overflow-x: hidden;
        }

        #sidebar-wrapper {
            min-height: 100vh;
            margin-left: -15rem;
            transition: margin 0.25s ease-out;
        }

        #sidebar-wrapper .sidebar-heading {
            padding: 0.875rem 1.25rem;
            font-size: 1.2rem;
        }

        #sidebar-wrapper.show {
            margin-left: 0;
        }

        #page-content-wrapper {
            min-width: 100vw;
        }

        .sidebar {
            background-color: #f8f9fa;
            width: 15rem;
        }

        .content {
            padding: 20px;
        }

        .navbar {
            margin-bottom: 20px;
        }

        @media (min-width: 768px) {
            #sidebar-wrapper {
                margin-left: 0;
            }

            #page-content-wrapper {
                min-width: 0;
                width: 100%;
            }

            #wrapper.toggled #sidebar-wrapper {
                margin-left: -15rem;
            }
        }

        .nav-link {
            color: #333;
            padding: 0.5rem 1rem;
            transition: all 0.3s;
        }

        .nav-link:hover {
            background-color: #e9ecef;
            color: #0d6efd;
        }

        .nav-link i {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="sidebar" id="sidebar-wrapper">
            <div class="sidebar-heading border-bottom bg-light">Sistema DEYBIPARTS</div>
            <div class="list-group list-group-flush">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('usuarios.index') }}">
                            <i class="bi bi-people"></i> Usuarios
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('tiendas.index') }}">
                            <i class="bi bi-shop"></i> Tiendas
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('asignaciones.index') }}">
                            <i class="bi bi-diagram-3"></i> Asignaciones
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('categorias.index') }}">
                            <i class="bi bi-tags"></i> Categorías
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('productos.index') }}">
                            <i class="bi bi-box"></i> Productos
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('imagenes.index') }}">
                            <i class="fas fa-images"></i> Imágenes Productos
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <!-- Navigation bar -->
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <div class="container-fluid">
                    <button class="btn btn-primary" id="sidebarToggle">
                        <i class="bi bi-list"></i>
                    </button>
                    <a class="navbar-brand ms-2" href="/">Sistema de Inventario</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
            </nav>

            <!-- Content section -->
            <div class="container-fluid content">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @yield('content')
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom JavaScript -->
    <script>
        window.addEventListener('DOMContentLoaded', event => {
            // Toggle the side navigation
            const sidebarToggle = document.getElementById('sidebarToggle');
            const wrapper = document.getElementById('wrapper');
            const sidebarWrapper = document.getElementById('sidebar-wrapper');

            if (sidebarToggle) {
                sidebarToggle.addEventListener('click', event => {
                    event.preventDefault();
                    wrapper.classList.toggle('toggled');

                    // Para dispositivos móviles
                    if (window.innerWidth < 768) {
                        sidebarWrapper.classList.toggle('show');
                    }
                });
            }

            // Cierra el sidebar en móviles cuando se hace clic fuera
            document.addEventListener('click', function(event) {
                if (window.innerWidth < 768) {
                    if (!sidebarWrapper.contains(event.target) &&
                        !sidebarToggle.contains(event.target) &&
                        sidebarWrapper.classList.contains('show')) {
                        sidebarWrapper.classList.remove('show');
                    }
                }
            });
        });
    </script>
    @yield('scripts')
</body>
</html>
