<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\ProgramaEstudo;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    /**
     * Lista todos os cursos
     */
    public function index()
    {
        $cursos = Curso::with('programa')->orderBy('nome')->get();
        return view('cursos.index', compact('cursos'));
    }

    /**
     * Exibe o formulário para criar novo curso
     */
    public function create()
    {
        $programas = ProgramaEstudo::orderBy('nome')->get();
        return view('cursos.create', compact('programas'));
    }

    /**
     * Armazena novo curso no banco de dados
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'programa_estudo_id' => 'required|exists:programas_estudo,id',
        ]);

        Curso::create($validated);

        return redirect()->route('cursos.index')->with('success', 'Curso criado com sucesso.');
    }

    /**
     * Exibe o formulário para editar curso existente
     */
    public function edit(string $id)
    {
        $curso = Curso::findOrFail($id);
        $programas = ProgramaEstudo::orderBy('nome')->get();

        return view('cursos.edit', compact('curso', 'programas'));
    }

    /**
     * Atualiza o curso no banco de dados
     */
    public function update(Request $request, string $id)
    {
        $curso = Curso::findOrFail($id);

        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'programa_estudo_id' => 'required|exists:programas_estudo,id',
        ]);

        $curso->update($validated);

        return redirect()->route('cursos.index')->with('success', 'Curso atualizado com sucesso.');
    }

    /**
     * Elimina (soft delete) o curso
     */
    public function destroy(string $id)
    {
        $curso = Curso::findOrFail($id);
        $curso->delete();

        return redirect()->route('cursos.index')->with('success', 'Curso eliminado com sucesso.');
    }
}
