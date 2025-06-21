<?php

namespace App\Http\Controllers;

use App\Models\AnoLetivo;
use Illuminate\Http\Request;

class AnoLetivoController extends Controller
{
    public function index()
    {
        $anos = AnoLetivo::orderByDesc('data_inicio')->get();
        return view('anos-letivos.index', compact('anos'));
    }

    public function create()
    {
        return view('anos-letivos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'designacao' => 'required|unique:anos_letivos,designacao',
            'data_inicio' => 'required|date',
            'data_fim' => 'required|date|after:data_inicio',
        ]);

        AnoLetivo::create($request->all());

        return redirect()->route('anos-letivos.index')->with('success', 'Ano letivo criado com sucesso.');
    }

    public function edit($id)
    {
        $ano = AnoLetivo::findOrFail($id);
        return view('anos-letivos.edit', compact('ano'));
    }


    public function update(Request $request, AnoLetivo $ano)
    {
        $request->validate([
            'designacao' => 'required|unique:anos_letivos,designacao,' . $ano->id,
            'data_inicio' => 'required|date',
            'data_fim' => 'required|date|after:data_inicio',
        ]);

        $ano->update($request->all());

        return redirect()->route('anos-letivos.index')->with('success', 'Ano letivo atualizado com sucesso.');
    }

    public function activar($id)
    {
        // Desativa todos
        AnoLetivo::query()->update(['activo' => false]);

        // Ativa o selecionado
        $ano = AnoLetivo::findOrFail($id);
        $ano->activo = true;
        $ano->save();

        // Atualiza a sessão
        session(['ano_letivo_ativo_id' => $ano->id]);

        return redirect()->route('anos-letivos.index')
            ->with('success', 'Ano letivo ativado com sucesso.');
    }
}
