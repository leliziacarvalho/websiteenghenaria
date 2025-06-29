<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudante;
use App\Models\Monografia;
use App\Models\Orientador;
use Illuminate\Support\Facades\Storage;

class PublicMonografiaController extends Controller
{
    // Tampilkan form submit monografia
    public function create()
    {
        $orientadores = Orientador::orderBy('naran')->get();
        return view('monografia.create', compact('orientadores'));
    }

    // Proses simpan data monografia
    public function store(Request $request)
    {
        $request->validate([
            'numeru_estudante' => 'required|exists:estudante,numeru_estudante',
            'titulun' => 'required|max:255',
            'area_estudu' => 'required',
            'resumu' => 'required',
            'palavras_chave' => 'required',
            'orientador_id' => 'required|exists:orientador,id',
            'dokumentu' => 'required|file|mimes:pdf,doc,docx|max:10240',
        ]);

        $estudante = Estudante::where('numeru_estudante', $request->numeru_estudante)->first();

        $path = $request->file('dokumentu')->store('monografias', 'public');

        Monografia::create([
            'estudante_id' => $estudante->id,
            'titulun' => $request->titulun,
            'area_estudu' => $request->area_estudu,
            'resumu' => $request->resumu,
            'palavras_chave' => $request->palavras_chave,
            'orientador_id' => $request->orientador_id,
            'estadu' => 'submete',
            'dokumentu_path' => $path,
        ]);

        return redirect()->route('monografia.history', ['numeru_estudante' => $request->numeru_estudante])
            ->with('success', 'Monografia submete ho susesu!');
    }

    // Tampilkan history monografia mahasiswa
    public function history(Request $request)
    {
        $request->validate([
            'numeru_estudante' => 'required|exists:estudante,numeru_estudante',
        ]);

        $estudante = Estudante::where('numeru_estudante', $request->numeru_estudante)->firstOrFail();
        $monografias = $estudante->monografias()->with('orientador')->latest()->get();

        return view('monografia.history', compact('estudante', 'monografias'));
    }
}
