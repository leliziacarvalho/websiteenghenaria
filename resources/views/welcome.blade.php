@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h1 class="display-4 fw-bold">Selamat Datang iha Sistema Registu Monografia</h1>
        <p class="lead mt-3">Aplikasaun ida ne'e ajuda estudante sira atu submete no haree prosesu monografia sira.</p>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <a href="{{ route('monografia.index') }}" class="btn btn-outline-primary m-2">
                📄 Lista Monografia
            </a>
            <a href="{{ route('monografia.create') }}" class="btn btn-outline-success m-2">
                ➕ Submete Monografia
            </a>
            <a href="{{ route('estudante.dashboard', ['nim' => '22.06.03.0054']) }}" class="btn btn-outline-info m-2">
                🎓 Dashboard Estudante
            </a>
        </div>
    </div>
</div>
@endsection
