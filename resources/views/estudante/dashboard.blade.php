@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Dashboard Estudante</h1>

    <div class="mb-6">
        <h2 class="text-xl font-semibold">Ola, {{ $estudante->naran }}</h2>
        <p>NIM: {{ $estudante->nim }}</p>
        <p>Departamentu: {{ $estudante->departamentu->naran ?? '-' }}</p>
    </div>

    <div class="mb-6">
        <a href="{{ route('monografia.create', ['estudante_id' => $estudante->id]) }}" 
           class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
           Submit Monografia Foun
        </a>
    </div>

    <div>
        <h3 class="text-lg font-semibold mb-2">Lista Monografia</h3>
        @if($monografias->count())
            <table class="min-w-full border">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border px-4 py-2">Titulo</th>
                        <th class="border px-4 py-2">Area</th>
                        <th class="border px-4 py-2">Estado</th>
                        <th class="border px-4 py-2">Data Registu</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($monografias as $m)
                        <tr>
                            <td class="border px-4 py-2">{{ $m->titulun }}</td>
                            <td class="border px-4 py-2">{{ $m->area_estudu }}</td>
                            <td class="border px-4 py-2 capitalize">{{ $m->estadu }}</td>
                            <td class="border px-4 py-2">{{ $m->created_at->format('d/m/Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>La iha monografia nebee regista.</p>
        @endif
    </div>
</div>
@endsection
