<?php

namespace App\Http\Controllers;

use App\Models\Turma;
use App\Models\AnoLetivo;
use App\Models\Curso;
use App\Models\ProgramaEstudo;
use Illuminate\Http\Request;
use App\Models\TurmaUnidadeCurricular;

class TurmaController extends Controller
{
    public function index(Request $request)
    {
        $anosLetivos = AnoLetivo::orderByDesc('designacao')->get();
        $cursos = Curso::orderBy('nome')->get();
        $programas = ProgramaEstudo::orderBy('nome')->get();

        $turmas = Turma::query()
            ->with(['curso', 'programaEstudo', 'anoLetivo'])
            ->when($request->ano_letivo_id, fn($q) => $q->where('ano_letivo_id', $request->ano_letivo_id))
            ->when($request->curso_id, fn($q) => $q->where('curso_id', $request->curso_id))
            ->when($request->programa_estudo_id, fn($q) => $q->where('programa_estudo_id', $request->programa_estudo_id))
            ->when($request->periodo, fn($q) => $q->where('periodo', $request->periodo))
            ->orderBy('nome')
            ->get();

        return view('turmas.index', compact('turmas', 'anosLetivos', 'cursos', 'programas'));
    }


    public function create()
    {
        $anos = AnoLetivo::all();
        $cursos = Curso::all();
        $programas = ProgramaEstudo::all();

        return view('turmas.create', compact('anos', 'cursos', 'programas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'codigo' => 'required|unique:turmas,codigo',
            'nome' => 'required|string|max:255',
            'ano_letivo_id' => 'required|exists:anos_letivos,id',
            'curso_id' => 'required|exists:cursos,id',
            'programa_estudo_id' => 'required|exists:programas_estudo,id',
            'periodo' => 'nullable|string|max:50',
            'turno' => 'nullable|string|max:50',
        ]);

        Turma::create($request->all());

        return redirect()->route('turmas.index')->with('success', 'Turma criada com sucesso.');
    }

    public function edit($id)
    {
        $turma = Turma::findOrFail($id);
        $anos = AnoLetivo::all();
        $cursos = Curso::all();
        $programas = ProgramaEstudo::all();

        return view('turmas.edit', compact('turma', 'anos', 'cursos', 'programas'));
    }

    public function update(Request $request, $id)
    {
        $turma = Turma::findOrFail($id);

        $request->validate([
            'codigo' => 'required|unique:turmas,codigo,' . $turma->id,
            'nome' => 'required|string|max:255',
            'ano_letivo_id' => 'required|exists:anos_letivos,id',
            'curso_id' => 'required|exists:cursos,id',
            'programa_estudo_id' => 'required|exists:programas_estudo,id',
            'periodo' => 'nullable|string|max:50',
            'turno' => 'nullable|string|max:50',
        ]);

        $turma->update($request->all());

        return redirect()->route('turmas.index')->with('success', 'Turma atualizada com sucesso.');
    }

    public function destroy($id)
    {
        $turma = Turma::findOrFail($id);
        $turma->delete();

        return redirect()->route('turmas.index')->with('success', 'Turma excluída com sucesso.');
    }



    public function show($id)
    {
        $turma = Turma::with(['curso', 'programaEstudo', 'anoLetivo'])->findOrFail($id);

        $associacoes = TurmaUnidadeCurricular::with(['unidadeCurricular', 'professorRegente'])
            ->where('turma_id', $id)
            ->get();

        return view('turmas.show', compact('turma', 'associacoes'));
    }


}
