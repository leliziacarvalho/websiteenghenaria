<?php

namespace App\Http\Controllers;

use App\Models\Estudante;
use Illuminate\Http\Request;

class EstudanteDashboardController extends Controller
{
    public function index(Request $request)
    {
        $nim = $request->query('nim');

        if (!$nim) {
            return redirect()->route('home')->with('error', 'NIM estudante la hatama!');
        }

        $estudante = Estudante::where('nim', $nim)->first();

        if (!$estudante) {
            return redirect()->route('home')->with('error', 'Estudante la hetan iha sistema.');
        }

        $monografias = $estudante->monografias()->latest()->get();

        return view('estudante.dashboard', compact('estudante', 'monografias'));
    }
}
