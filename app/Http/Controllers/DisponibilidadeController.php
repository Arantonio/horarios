<?php

namespace App\Http\Controllers;

use App\Models\AnoLetivo;
use App\Models\Disponibilidade;
use Illuminate\Http\Request;

class DisponibilidadeController extends Controller
{
    public function index()
{
    $professorId = auth()->id();

    $disponibilidades = Disponibilidade::with('anoLetivo')
        ->where('professor_id', $professorId)
        ->orderBy('semestre')
        ->orderBy('dia_semana')
        ->orderBy('faixa_horaria')
        ->get();

    return view('disponibilidade.index', compact('disponibilidades'));
}

    public function create()
    {
        $professorId = auth()->id();
        $anoLetivoAtivo = AnoLetivo::where('activo', true)->first();

        if (!$anoLetivoAtivo) {
            return redirect()->back()->with('error', 'Não há ano letivo activo definido.');
        }

        $disponibilidades = Disponibilidade::where('professor_id', $professorId)
            ->where('ano_letivo_id', $anoLetivoAtivo->id)
            ->get(['semestre', 'dia_semana', 'faixa_horaria']);

        return view('disponibilidade.create', compact('disponibilidades'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'semestre' => 'required|in:I,II',
            'disponibilidades_json' => 'required|string',
        ]);

        $dados = json_decode($request->disponibilidades_json, true);
        $professorId = auth()->id();
        $anoLetivoAtivo = AnoLetivo::where('activo', true)->first();

        if (!$anoLetivoAtivo) {
            return redirect()->back()->with('error', 'Não há ano letivo activo definido.');
        }

        foreach ($dados as $disp) {
            Disponibilidade::updateOrCreate(
                [
                    'professor_id' => $professorId,
                    'ano_letivo_id' => $anoLetivoAtivo->id,
                    'semestre' => $disp['semestre'],
                    'dia_semana' => $disp['dia'],
                    'faixa_horaria' => $disp['hora'],
                ],
                [] // Não atualiza nada, só garante que não duplica
            );
        }

        return redirect()->back()->with('success', 'Disponibilidades registadas com sucesso!');
    }

    public function destroy($id)
{
    $disponibilidade = Disponibilidade::findOrFail($id);

    // Verifica se pertence ao professor autenticado
    if ($disponibilidade->professor_id != auth()->id()) {
        abort(403, 'Acesso não autorizado');
    }

    $disponibilidade->delete();

    return redirect()->back()->with('success', 'Disponibilidade eliminada com sucesso!');
}

}
