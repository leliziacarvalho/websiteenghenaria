@extends('layouts.app')

@section('title', 'Daftar Monografia')

@section('content')
    <h1 class="mb-4">Daftar Monografia</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('monografia.create') }}" class="btn btn-primary mb-3">Tambah Monografia Baru</a>

    @if($monografias->count())
        <table class="table table-bordered table-hover">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Título</th>
                    <th>Área Estudo</th>
                    <th>Estudante</th>
                    <th>Orientador</th>
                    <th>Estado</th>
                    <th>Data Registro</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($monografias as $index => $monografia)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $monografia->titulun }}</td>
                        <td>{{ $monografia->area_estudu }}</td>
                        <td>{{ $monografia->estudante->naran ?? '-' }}</td>
                        <td>{{ $monografia->orientador->naran ?? '-' }}</td>
                        <td>{{ ucfirst($monografia->estadu) }}</td>
                        <td>{{ $monografia->created_at->format('d/m/Y') }}</td>
                        <td>
                            <a href="{{ route('monografia.show', $monografia->id) }}" class="btn btn-info btn-sm">Lihat</a>
                            <a href="{{ route('monografia.edit', $monografia->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('monografia.destroy', $monografia->id) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Konfirma hodi hamos Monografia ida ne?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hamos</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $monografias->links() }}
    @else
        <p>Sei la iha Monografia ho registu iha ne.</p>
    @endif
@endsection
