@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto p-6 bg-white rounded shadow mt-10">
    <h1 class="text-3xl font-bold mb-6">Historiku Monografia</h1>

    <div class="mb-6">
        <h2 class="text-xl font-semibold">Informasaun Estudante</h2>
        <p><strong>Naran:</strong> {{ $estudante->naran }}</p>
        <p><strong>Numeru Estudante:</strong> {{ $estudante->numeru_estudante }}</p>
        <p><strong>Departamentu:</strong> {{ $estudante->departamentu->naran ?? '-' }}</p>
    </div>

    <div>
        <h2 class="text-xl font-semibold mb-4">Lista Monografia</h2>
        @if($monografias->count() > 0)
            <table class="min-w-full border border-gray-300 rounded">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border px-4 py-2 text-left">Titulo</th>
                        <th class="border px-4 py-2 text-left">Area Estudu</th>
                        <th class="border px-4 py-2 text-left">Orientador</th>
                        <th class="border px-4 py-2 text-left">Estado</th>
                        <th class="border px-4 py-2 text-left">Data Submisaun</th>
                        <th class="border px-4 py-2 text-left">Komentariu</th>  <!-- Kolom baru -->
                    </tr>
                </thead>
                <tbody>
                    @foreach($monografias as $m)
                        <tr>
                            <td class="border px-4 py-2">{{ $m->titulun }}</td>
                            <td class="border px-4 py-2">{{ $m->area_estudu }}</td>
                            <td class="border px-4 py-2">{{ $m->orientador->naran ?? '-' }}</td>
                            <td class="border px-4 py-2 capitalize">{{ $m->estadu }}</td>
                            <td class="border px-4 py-2">{{ $m->created_at->format('d/m/Y') }}</td>
                            <td class="border px-4 py-2">{{ $m->komentariu ?? '-' }}</td>  <!-- Data komentar -->
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-gray-600">La iha monografia nebee regista.</p>
        @endif
    </div>
</div>
@endsection
