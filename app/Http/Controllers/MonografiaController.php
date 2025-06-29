<?php

namespace App\Http\Controllers;

use App\Models\Monografia;
use App\Models\Estudante;
use App\Models\Orientador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MonografiaController extends Controller
{
    // Tampilkan daftar monografia
    public function index()
    {
        $monografias = Monografia::with(['estudante', 'orientador'])->paginate(10);
        return view('monografia.index', compact('monografias'));
    }

    // Tampilkan form tambah monografia baru
    public function create()
    {
        $estudantes = Estudante::all();
        $orientadores = Orientador::all();
        return view('monografia.create', compact('estudantes', 'orientadores'));
    }

    // Simpan monografia baru ke database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'estudante_id' => 'required|exists:estudante,id',
            'titulun' => 'required|string|max:255',
            'area_estudu' => 'required|string|max:255',
            'palavras_chave' => 'required|string|max:255',
            'resumu' => 'required|string',
            'orientador_id' => 'required|exists:orientador,id',
            'dokumentu_path' => 'required|file|mimes:pdf,doc,docx|max:10240',
        ]);

        // Upload file
        if ($request->hasFile('dokumentu_path')) {
            $file = $request->file('dokumentu_path');
            $path = $file->store('monografias', 'public');
            $validated['dokumentu_path'] = $path;
        }

        Monografia::create($validated);

        return redirect()->route('monografia.index')->with('success', 'Monografia berhasil disimpan.');
    }

    // Tampilkan detail monografia
    public function show(Monografia $monografia)
    {
        $monografia->load(['estudante', 'orientador']);
        return view('monografia.show', compact('monografia'));
    }

    // Tampilkan form edit monografia
    public function edit(Monografia $monografia)
    {
        $estudantes = Estudante::all();
        $orientadores = Orientador::all();
        return view('monografia.edit', compact('monografia', 'estudantes', 'orientadores'));
    }

    // Update data monografia di database
    public function update(Request $request, Monografia $monografia)
    {
        $validated = $request->validate([
            'estudante_id' => 'required|exists:estudante,id',
            'titulun' => 'required|string|max:255',
            'area_estudu' => 'required|string|max:255',
            'palavras_chave' => 'required|string|max:255',
            'resumu' => 'required|string',
            'orientador_id' => 'required|exists:orientador,id',
            'dokumentu_path' => 'nullable|file|mimes:pdf,doc,docx|max:10240',
        ]);

        if ($request->hasFile('dokumentu_path')) {
            // Hapus file lama jika ada
            if ($monografia->dokumentu_path && Storage::disk('public')->exists($monografia->dokumentu_path)) {
                Storage::disk('public')->delete($monografia->dokumentu_path);
            }

            $file = $request->file('dokumentu_path');
            $path = $file->store('monografias', 'public');
            $validated['dokumentu_path'] = $path;
        }

        $monografia->update($validated);

        return redirect()->route('monografia.index')->with('success', 'Monografia berhasil diupdate.');
    }

    // Hapus monografia
    public function destroy(Monografia $monografia)
    {
        if ($monografia->dokumentu_path && Storage::disk('public')->exists($monografia->dokumentu_path)) {
            Storage::disk('public')->delete($monografia->dokumentu_path);
        }

        $monografia->delete();

        return redirect()->route('monografia.index')->with('success', 'Monografia berhasil dihapus.');
    }
}
