<?php

namespace App\Http\Controllers;

use App\Models\ProgramaEstudo;
use App\Models\GrauAcademico;
use Illuminate\Http\Request;

class ProgramaEstudoController extends Controller
{
    /**
     * Lista todos os programas de estudo.
     */
    public function index()
    {
        $programas = ProgramaEstudo::with('grau')->orderBy('nome')->get();
        return view('programas-estudo.index', compact('programas'));
    }

    /**
     * Mostra o formulário para criar um novo programa.
     */
    public function create()
    {
        $graus = GrauAcademico::orderBy('nome')->get();
        return view('programas-estudo.create', compact('graus'));
    }

    /**
     * Armazena o novo programa no banco de dados.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'codigo' => 'required|string|max:10|unique:programas_estudo,codigo',
            'nome' => 'required|string|max:255',
            'grau_academico_id' => 'required|exists:graus_academicos,id',
        ]);

        ProgramaEstudo::create($validated);

        return redirect()->route('programas-estudo.index')->with('success', 'Programa de estudo criado com sucesso.');
    }

    /**
     * Mostra o formulário de edição do programa.
     */
    public function edit(string $id)
    {
        $programa = ProgramaEstudo::findOrFail($id);
        $graus = GrauAcademico::orderBy('nome')->get();

        return view('programas-estudo.edit', compact('programa', 'graus'));
    }

    /**
     * Atualiza o programa no banco de dados.
     */
    public function update(Request $request, string $id)
    {
        $programa = ProgramaEstudo::findOrFail($id);

        $validated = $request->validate([
            'codigo' => 'required|string|max:10|unique:programas_estudo,codigo,' . $programa->id,
            'nome' => 'required|string|max:255',
            'grau_academico_id' => 'required|exists:graus_academicos,id',
        ]);

        $programa->update($validated);

        return redirect()->route('programas-estudo.index')->with('success', 'Programa de estudo atualizado com sucesso.');
    }

    /**
     * Remove o programa do banco de dados (soft delete).
     */
    public function destroy(string $id)
    {
        $programa = ProgramaEstudo::findOrFail($id);
        $programa->delete();

        return redirect()->route('programas-estudo.index')->with('success', 'Programa de estudo eliminado com sucesso.');
    }
}
