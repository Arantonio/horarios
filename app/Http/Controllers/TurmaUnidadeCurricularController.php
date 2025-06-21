<?php

namespace App\Http\Controllers;

use App\Models\Turma;
use App\Models\Utilizador;
use App\Models\UnidadeCurricular;
use App\Models\TurmaUnidadeCurricular;
use Illuminate\Http\Request;

class TurmaUnidadeCurricularController extends Controller
{
    public function index()
    {
        $associacoes = TurmaUnidadeCurricular::with(['turma', 'unidadeCurricular', 'professorRegente'])->get();
        return view('turma-unidade-curricular.index', compact('associacoes'));
    }

    public function create()
{
    $turmas = Turma::all();
    $unidades = UnidadeCurricular::select('id', 'nome', 'carga_horaria', 'programa_estudo_id')->get();
    $professores = Utilizador::where('perfil', 'professor')->get();

    return view('turma-unidade-curricular.create', compact('turmas', 'unidades', 'professores'));
}



    public function store(Request $request)
    {


        $request->validate([
            'turma_id' => 'required|exists:turmas,id',
            'unidade_curricular_id' => 'required|exists:unidades_curriculares,id',
            'semestre' => 'required|in:I,II',
            'blocos_semanais' => 'required|integer|min:1',
            'professor_regente_id' => 'nullable|exists:utilizadores,id',
            'outros_professores' => 'nullable|array',
            'outros_professores.*' => 'exists:utilizadores,id',
        ]);

        // Verifica duplicidade de associação
        $existe = TurmaUnidadeCurricular::where('turma_id', $request->turma_id)
            ->where('unidade_curricular_id', $request->unidade_curricular_id)
            ->exists();

        if ($existe) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors([
                    'unidade_curricular_id' => 'Esta unidade curricular já está associada a esta turma.',
                ]);
        }

        TurmaUnidadeCurricular::create([
            'turma_id' => $request->turma_id,
            'unidade_curricular_id' => $request->unidade_curricular_id,
            'semestre' => $request->semestre,
            'blocos_semanais' => $request->blocos_semanais,
            'professor_regente_id' => $request->professor_regente_id,
            'outros_professores' => $request->outros_professores ?? [],
        ]);

        return redirect()
            ->route('turma-unidade-curricular.index')
            ->with('success', 'Associação criada com sucesso.');
    }

    public function edit($id)
    {
        $associacao = TurmaUnidadeCurricular::findOrFail($id);
        $turmas = Turma::all();
        $unidades = UnidadeCurricular::all();
        $professores = Utilizador::where('perfil', 'professor')->get();

        return view('turma-unidade-curricular.edit', compact(
            'associacao',
            'turmas',
            'unidades',
            'professores'
        ));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'turma_id' => 'required|exists:turmas,id',
            'unidade_curricular_id' => 'required|exists:unidades_curriculares,id',
            'semestre' => 'required|in:I,II',
            'blocos_semanais' => 'required|integer|min:1',
            'professor_regente_id' => 'nullable|exists:utilizadores,id',
            'outros_professores' => 'nullable|array',
            'outros_professores.*' => 'exists:utilizadores,id',
        ]);

        $associacao = TurmaUnidadeCurricular::findOrFail($id);
        $associacao->update([
            'turma_id' => $request->turma_id,
            'unidade_curricular_id' => $request->unidade_curricular_id,
            'semestre' => $request->semestre,
            'blocos_semanais' => $request->blocos_semanais,
            'professor_regente_id' => $request->professor_regente_id,
            'outros_professores' => $request->outros_professores ?? [],
        ]);

        return redirect()
            ->route('turma-unidade-curricular.index')
            ->with('success', 'Associação atualizada com sucesso.');
    }

    public function destroy($id)
    {
        $associacao = TurmaUnidadeCurricular::findOrFail($id);
        $associacao->delete();

        return redirect()
            ->route('turma-unidade-curricular.index')
            ->with('success', 'Associação removida com sucesso.');
    }
}
