@extends('layouts.app')

@section('content')
<div class="container py-5" style="background: linear-gradient(135deg, #e0e7ff, #ffffff); min-height: 100vh;">
    <div class="text-center mb-5">
        <h1 class="display-4 fw-bold text-primary mb-3">
            <i class="fas fa-book-open me-2"></i>Sistema Registu Monografia
        </h1>
        <p class="lead text-secondary">
            Bem-vindu ba plataforma online atu submete no haree monografia sira iha
            <strong class="text-primary">Fakuldade Enghenaria</strong>.
        </p>
    </div>

    <div class="row g-4 justify-content-center">
        <!-- Submete Monografia -->
        <div class="col-12 col-md-6 col-lg-4">
            <div class="card border-0 shadow glass">
                <div class="card-body text-center">
                    <div class="mb-3 text-primary fs-1">
                        <i class="fas fa-upload"></i>
                    </div>
                    <h5 class="card-title fw-bold mb-2">Submete Monografia</h5>
                    <p class="card-text text-muted">Preenche formuláriu atu submete monografia foun online.</p>
                    <a href="{{ route('monografia.form') }}" class="btn btn-primary w-100 mt-3">
                        Submete Agora
                    </a>
                </div>
            </div>
        </div>

        <!-- Historiku Monografia -->
        <div class="col-12 col-md-6 col-lg-4">
            <div class="card border-0 shadow glass">
                <div class="card-body text-center">
                    <div class="mb-3 text-success fs-1">
                        <i class="fas fa-history"></i>
                    </div>
                    <h5 class="card-title fw-bold mb-2">Historiku Monografia</h5>
                    <p class="card-text text-muted">Haree lista monografia ne’ebé ita submete ona iha sistema.</p>

                    <form method="GET" action="{{ route('monografia.history') }}" class="mt-3">
                        <input type="text" name="numeru_estudante" placeholder="Hatama Numeru Estudante" class="form-control mb-2" required />
                        <button type="submit" class="btn btn-success w-100">
                            Liat Historiku
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Dashboard Estudante -->
        <div class="col-12 col-md-6 col-lg-4">
            <div class="card border-0 shadow glass">
                <div class="card-body text-center">
                    <div class="mb-3 text-purple fs-1" style="color: #6f42c1;">
                        <i class="fas fa-user-graduate"></i>
                    </div>
                    <h5 class="card-title fw-bold mb-2">Dashboard Estudante</h5>
                    <p class="card-text text-muted">Akses dashboard estudante hodi haree estadu monografia sira.</p>

                    <form method="GET" action="{{ route('estudante.dashboard') }}" class="mt-3">
                        <input type="text" name="nim" placeholder="Hatama NIM" class="form-control mb-2" required />
                        <button type="submit" class="btn btn-secondary w-100" style="background-color: #6f42c1;">
                            Akses Dashboard
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

   
</div>

<style>
    .glass {
        background: rgba(255, 255, 255, 0.75);
        backdrop-filter: blur(10px);
        border-radius: 15px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .glass:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }
</style>
@endsection
