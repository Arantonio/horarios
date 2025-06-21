<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class PerfilController extends Controller
{
    public function index(): View
    {
        return view('user.perfil');
    }

    public function updatePassword(Request $request)
    {
        //Vaidação do formulario
        $request->validate([
            'current_password' => 'required|min:8|max:16',
            'new_password' => 'required|min:8|max:16|different:current_password',
            'new_password_confirmation' => 'required|same:new_password',
        ]);

        $user = auth()->user();

        // checar se a password corrente esta correta

        if (!password_verify($request->current_password, $user->password)) {
            return redirect()->back()->with('error', 'A palavra-passe atual está incorreta');
        }

        // atualizar a password na base de dados

        $user->password = bcrypt($request->new_password);
        $user->save();

        return redirect()->back()->with('success', 'Palavra-Passe atualizada com sucesso');
    }

    public function updateUserData(Request $request)
    {
        // formulario de validação
        $request->validate([
            'nome' => 'required|min:3|max:255',
            'email' => 'required|email|max:255|unique:utilizadores,email,' . auth()->id()
        ]);

        // atualizar os dados do utilizador
        $user = auth()->user();
        $user->nome = $request->nome;
        $user->email = $request->email;
        $user->save();

        return redirect()->back()->with('success_change_data', 'Perfil atualizado com sucesso');
    }
}
