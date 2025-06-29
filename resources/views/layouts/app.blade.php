<!DOCTYPE html>
<html lang="tl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'Fakuldade Enghenaria')</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

    <!-- Custom Styles -->
    <style>
        body {
            padding-top: 70px;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            background: linear-gradient(to bottom right, #f3f0ff, #ffffff);
            font-family: 'Segoe UI', sans-serif;
        }

        nav.navbar {
            background-color: #5a189a !important;
        }

        .navbar-nav .nav-link {
            transition: all 0.3s ease;
            color: #ffffff !important;
        }

        .navbar-nav .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.15);
            border-radius: 5px;
        }

        main {
            flex: 1;
            animation: fadeIn 0.5s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(15px); }
            to { opacity: 1; transform: translateY(0); }
        }

        footer {
            background-color: #f8f9fa;
            padding: 15px 0;
            text-align: center;
            font-size: 14px;
        }

        .navbar-brand i {
            margin-right: 8px;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top shadow-sm">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
                <i class="fas fa-university"></i> Fakuldade Enghenaria
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarMain">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                            <i class="fas fa-home me-1"></i> Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('monografia.form') ? 'active' : '' }}" href="{{ route('monografia.form') }}">
                            <i class="fas fa-file-upload me-1"></i> Submit Monografia
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('monografia.history') ? 'active' : '' }}"
                           href="{{ route('monografia.history', ['numeru_estudante' => request()->query('numeru_estudante') ?? '']) }}">
                            <i class="fas fa-history me-1"></i> History Monografia
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('estudante.dashboard') ? 'active' : '' }}"
                           href="{{ route('estudante.dashboard', ['nim' => request()->query('nim') ?? '']) }}">
                            <i class="fas fa-user-graduate me-1"></i> Dashboard Estudante
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <main class="container my-4">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @yield('content')
    </main>

    <!-- Footer -->
    <footer>
        &copy; {{ date('Y') }} Fakuldade Enghenaria. Website create by Odevrio.
    </footer>

    <!-- Bootstrap 5 JS with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
