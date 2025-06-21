<?php

namespace App\Http\Controllers;

use App\Models\UnidadeCurricular;
use App\Models\AnoCurricular;
use App\Models\ProgramaEstudo;
use Illuminate\Http\Request;

class UnidadeCurricularController extends Controller
{
    public function index()
    {
        $ucs = UnidadeCurricular::with(['anoCurricular', 'programaEstudo'])->withTrashed()->get();
        return view('unidades-curriculares.index', compact('ucs'));
    }

    public function create()
    {
        $anos = AnoCurricular::all();
        $programas = ProgramaEstudo::all();

        return view('unidades-curriculares.create', compact('anos', 'programas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'codigo' => 'required|unique:unidades_curriculares,codigo',
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'tipo' => 'nullable|string|max:50',
            'carga_horaria' => 'nullable|integer',
            'ects' => 'nullable|integer',
            'ano_curricular_id' => 'nullable|exists:anos_curriculares,id',
            'programa_estudo_id' => 'nullable|exists:programas_estudo,id',
        ]);

        UnidadeCurricular::create($request->all());

        return redirect()->route('unidades-curriculares.index')->with('success', 'Unidade Curricular criada com sucesso.');
    }

    public function edit($id)
    {
        $uc = UnidadeCurricular::findOrFail($id);
        $anos = AnoCurricular::all();
        $programas = ProgramaEstudo::all();

        return view('unidades-curriculares.edit', compact('uc', 'anos', 'programas'));
    }


    public function update(Request $request, $id)
    {
        $uc = UnidadeCurricular::findOrFail($id);

        $request->validate([
            'codigo' => 'required|unique:unidades_curriculares,codigo,' . $uc->id,
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'tipo' => 'nullable|string|max:50',
            'carga_horaria' => 'nullable|integer',
            'ects' => 'nullable|integer',
            'ano_curricular_id' => 'nullable|exists:anos_curriculares,id',
            'programa_estudo_id' => 'nullable|exists:programas_estudo,id',
        ]);

        $uc->update($request->all());

        return redirect()->route('unidades-curriculares.index')->with('success', 'Unidade Curricular atualizada com sucesso.');
    }


    public function destroy(UnidadeCurricular $unidades_curriculare)
    {
        $unidades_curriculare->delete();
        return redirect()->route('unidades-curriculares.index')->with('success', 'Unidade Curricular excluída com sucesso.');
    }
}
