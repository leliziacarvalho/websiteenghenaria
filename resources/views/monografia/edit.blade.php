@extends('layouts.app')

@section('content')
    <h1>Edit Monografia</h1>

    @if($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('monografia.update', $monografia) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label>Estudante:</label>
        <select name="estudante_id" required>
            <option value="">-- Pilih Estudante --</option>
            @foreach($estudantes as $est)
                <option value="{{ $est->id }}" {{ (old('estudante_id') ?? $monografia->estudante_id) == $est->id ? 'selected' : '' }}>{{ $est->naran }}</option>
            @endforeach
        </select><br><br>

        <label>Titulo:</label><br>
        <input type="text" name="titulun" value="{{ old('titulun') ?? $monografia->titulun }}" required maxlength="255"><br><br>

        <label>Area Estudu:</label><br>
        <select name="area_estudu" required>
            <option value="">-- Pilih Area --</option>
            <option value="TI" {{ (old('area_estudu') ?? $monografia->area_estudu) == 'TI' ? 'selected' : '' }}>Tecnologia Informasaun</option>
            <option value="Engenharia" {{ (old('area_estudu') ?? $monografia->area_estudu) == 'Engenharia' ? 'selected' : '' }}>Enghenharia</option>
            <option value="Linguas" {{ (old('area_estudu') ?? $monografia->area_estudu) == 'Linguas' ? 'selected' : '' }}>Linguas</option>
            <option value="Outros" {{ (old('area_estudu') ?? $monografia->area_estudu) == 'Outros' ? 'selected' : '' }}>Outros</option>
        </select><br><br>

        <label>Resumo:</label><br>
        <textarea name="resumu" rows="5" required>{{ old('resumu') ?? $monografia->resumu }}</textarea><br><br>

        <label>Keywords (separadu ho vírgula):</label><br>
        <input type="text" name="palavras_chave" value="{{ old('palavras_chave') ?? $monografia->palavras_chave }}" required maxlength="255"><br><br>

        <label>Orientador:</label>
        <select name="orientador_id" required>
            <option value="">-- Pilih Orientador --</option>
            @foreach($orientadores as $ori)
                <option value="{{ $ori->id }}" {{ (old('orientador_id') ?? $monografia->orientador_id) == $ori->id ? 'selected' : '' }}>{{ $ori->naran }}</option>
            @endforeach
        </select><br><br>

        <label>Upload Dokumen (PDF/DOC):</label><br>
        <input type="file" name="dokumentu_path" accept=".pdf,.doc,.docx"><br>
        @if($monografia->dokumentu_path)
            <small>File sekarang: <a href="{{ asset('storage/' . $monografia->dokumentu_path) }}" target="_blank">Download</a></small><br><br>
        @endif

        <button type="submit">Update</button>
    </form>
@endsection
@extends('layouts.app')

@section('content')
    <h1>Edit Monografia</h1>

    @if($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('monografia.update', $monografia) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label>Estudante:</label>
        <select name="estudante_id" required>
            <option value="">-- Pilih Estudante --</option>
            @foreach($estudantes as $est)
                <option value="{{ $est->id }}" {{ (old('estudante_id') ?? $monografia->estudante_id) == $est->id ? 'selected' : '' }}>{{ $est->naran }}</option>
            @endforeach
        </select><br><br>

        <label>Titulo:</label><br>
        <input type="text" name="titulun" value="{{ old('titulun') ?? $monografia->titulun }}" required maxlength="255"><br><br>

        <label>Area Estudu:</label><br>
        <select name="area_estudu" required>
            <option value="">-- Pilih Area --</option>
            <option value="TI" {{ (old('area_estudu') ?? $monografia->area_estudu) == 'TI' ? 'selected' : '' }}>Tecnologia Informasaun</option>
            <option value="Engenharia" {{ (old('area_estudu') ?? $monografia->area_estudu) == 'Engenharia' ? 'selected' : '' }}>Enghenharia</option>
            <option value="Linguas" {{ (old('area_estudu') ?? $monografia->area_estudu) == 'Linguas' ? 'selected' : '' }}>Linguas</option>
            <option value="Outros" {{ (old('area_estudu') ?? $monografia->area_estudu) == 'Outros' ? 'selected' : '' }}>Outros</option>
        </select><br><br>

        <label>Resumo:</label><br>
        <textarea name="resumu" rows="5" required>{{ old('resumu') ?? $monografia->resumu }}</textarea><br><br>

        <label>Keywords (separadu ho vírgula):</label><br>
        <input type="text" name="palavras_chave" value="{{ old('palavras_chave') ?? $monografia->palavras_chave }}" required maxlength="255"><br><br>

        <label>Orientador:</label>
        <select name="orientador_id" required>
            <option value="">-- Pilih Orientador --</option>
            @foreach($orientadores as $ori)
                <option value="{{ $ori->id }}" {{ (old('orientador_id') ?? $monografia->orientador_id) == $ori->id ? 'selected' : '' }}>{{ $ori->naran }}</option>
            @endforeach
        </select><br><br>

        <label>Upload Dokumen (PDF/DOC):</label><br>
        <input type="file" name="dokumentu_path" accept=".pdf,.doc,.docx"><br>
        @if($monografia->dokumentu_path)
            <small>File sekarang: <a href="{{ asset('storage/' . $monografia->dokumentu_path) }}" target="_blank">Download</a></small><br><br>
        @endif

        <button type="submit">Update</button>
    </form>
@endsection
