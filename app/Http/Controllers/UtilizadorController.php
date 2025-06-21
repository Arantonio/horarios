<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use App\Models\Utilizador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

use App\Mail\ConfirmAccountEmail;
use Illuminate\Support\Facades\Mail;



class UtilizadorController extends Controller
{
    public function index()
    {
        // Verifica se o usuário tem permissão de administrador
        if (!Auth::user()->can('administrador')) {
            abort(403, 'Você não tem autorização para acessar esta página');
        }

        // Busca todos os utilizadores, incluindo os excluídos logicamente
        $utilizadores = Utilizador::withTrashed()
            ->with('detalhes', 'departamento') // Garante que traz os relacionamentos
            ->get();

        return view('utilizadores.users', compact('utilizadores'));
    }

    public function newUtilizador()
    {
        if (!Auth::user()->can('administrador')) {
            abort(403, 'Você não tem autorização para acessar esta página');
        }

        // Obtém todos os departamentos
        $departamentos = Departamento::all();

        return view('utilizadores.add-user', compact('departamentos'));
    }

    public function createUtilizador(Request $request)
    {
        if (!Auth::user()->can('administrador')) {
            abort(403, 'Você não tem autorização para acessar esta página');
        }

        // Validação do formulário
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:utilizadores,email',
            'select_departamento' => 'required|exists:departamentos,id',
            'sexo' => 'required|string|max:50',
            'grau_academico' => 'required|string|max:255',
            'data_nascimento' => 'required|date_format:Y-m-d',
            'telemovel' => 'required|string|max:50',
        ]);

        // Criar token de confirmação
        $token = Str::random(60);

        // Criar novo utilizador
        $utilizador = Utilizador::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'confirmation_token' => $token,
            'perfil' => 'funcionario',
            'departamento_id' => $request->select_departamento,
            'permissions' => json_encode(['funcionario']),
        ]);

        // Criar detalhes do utilizador
        $utilizador->detalhes()->create([
            'sexo' => $request->sexo,
            'grau_academico' => $request->grau_academico,
            'data_nascimento' => $request->data_nascimento,
            'telemovel' => $request->telemovel,
        ]);

        // Enviar email de confirmação
        try {
            $confirmationUrl = route('confirm-account', ['token' => $token]);

            Mail::to($utilizador->email)->send(new ConfirmAccountEmail($confirmationUrl));
        } catch (\Exception $e) {
            \Log::error("Erro ao enviar e-mail: " . $e->getMessage()); // Registra erro no log
            return redirect()->route('utilizadores.user')->withErrors('Utilizador criado, mas o email de confirmação não foi enviado.');
        }

        return redirect()->route('utilizadores.user')->with('success', 'Utilizador criado com sucesso e email de confirmação enviado.');
    }



    public function editUtilizador($id)
    {
        if (!Auth::user()->can('administrador')) {
            abort(403, 'Você não tem autorização para aceder esta página');
        }

        // Buscar utilizador com detalhes
        $utilizador = Utilizador::with('detalhes')->where('perfil', 'funcionario')->findOrFail($id);

        return view('utilizadores.edit-user', compact('utilizador'));
    }

    public function updateUtilizador(Request $request)
    {
        if (!Auth::user()->can('administrador')) {
            abort(403, 'Você não tem autorização para aceder esta página');
        }

        // Validação do formulário
        $request->validate([
            'utilizador_id' => 'required|exists:utilizadores,id',
            'grau_academico' => 'required|string|max:255',
        ]);

        // Buscar utilizador
        $utilizador = Utilizador::findOrFail($request->utilizador_id);

        // Verificar se o utilizador tem detalhes antes de atualizar
        if ($utilizador->detalhes) {
            $utilizador->detalhes->update([
                'grau_academico' => $request->grau_academico,
            ]);
        } else {
            // Se não existir, cria os detalhes
            $utilizador->detalhes()->create([
                'grau_academico' => $request->grau_academico,
            ]);
        }

        return redirect()->route('utilizadores.user')->with('success', 'Utilizador atualizado com sucesso');
    }


    public function deleteUtilizador($id)
    {
        Auth::user()->can('administrador') ?: abort(403, 'Você não tem autorização para aceder esta página');

        $utilizador = Utilizador::findOrFail($id);

        return view('utilizadores.delete-user', compact('utilizador'));
    }

    public function deleteUtilizadorConfirm($id)
    {
        Auth::user()->can('administrador') ?: abort(403, 'Você não tem autorização para aceder esta página');

        $utilizador = Utilizador::findOrFail($id);
        $utilizador->delete();

        return redirect()->route('utilizadores.user')->with('success', 'utilizador excluido com sucesso');
    }

    public function restoreUtilizador($id)
    {
        Auth::user()->can('administrador') ?: abort(403, 'Você não tem autorização para aceder esta página');


        $utilizador = Utilizador::withTrashed()->where('perfil', 'funcionario')->findOrFail($id);

        $utilizador->restore();

        return redirect()->route('utilizadores.user')->with('success', 'utilizador restaurado com sucesso');
    }
}
