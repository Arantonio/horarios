<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DepartamentoController extends Controller
{
    public function index()
    {
        Auth::user()->can('administrador') ?: abort(403, 'Você não tem autorização para aceder esta página');
        $departamentos = Departamento::all();
        return view('departamento.departamentos', compact('departamentos'));
    }

    public function newDepartamento(): View
    {
        Auth::user()->can('administrador') ?: abort(403, 'Você não tem autorização para aceder esta página');
        return view('departamento.add-departamento');
    }

    public function createDepartamento(Request $request)
    {
        Auth::user()->can('administrador') ?: abort(403, 'Você não tem autorização para aceder esta página');

        // Formulario de validação
        $request->validate([
            'nome' => 'required|string|max:50|unique:departamentos',
        ]);

        Departamento::create([
            'nome' => $request->nome
        ]);

        return redirect()->route('departamentos');
    }

    public function editDepartamento($id)
    {

        Auth::user()->can('administrador') ?: abort(403, 'Você não tem autorização para aceder esta página');


        if ($this->isDepartamentoBlocked($id)) {
            return redirect()->route('departamentos');
        }

        $departamento = Departamento::findOrFail($id);
        return view('departamento.edit-departamento', compact('departamento'));
    }

    public function updateDepartamento(Request $request)
    {
        Auth::user()->can('administrador') ?: abort(403, 'Você não tem autorização para aceder esta página');
        $id = $request->id;

        $request->validate([
            'id' => 'required',
            'nome' => 'required|string|min:3|max:50|unique:departamentos,nome,' . $id
        ]);

        if ($this->isDepartamentoBlocked($id)) {
            return redirect()->route('departamentos');
        }

        $departamento = Departamento::findOrFail($id);

        $departamento->update([
            'nome' => $request->nome
        ]);

        return redirect()->route('departamentos');
    }

    public function deleteDepartamento($id)
    {
        Auth::user()->can('administrador') ?: abort(403, 'Você não tem autorização para aceder esta página');

        if ($this->isDepartamentoBlocked($id)) {
            return redirect()->route('departamentos');
        }

        $departamento = Departamento::findOrFail($id);

        // pagina de f+confirmação

        return view('departamento.delete-departamento-confirm', compact('departamento'));
    }

    public function deleteDepartamentoConfirm($id)
    {
        Auth::user()->can('administrador') ?: abort(403, 'Você não tem autorização para aceder esta página');

        if ($this->isDepartamentoBlocked($id)) {
            return redirect()->route('departamentos');
        }

        $departamento = Departamento::findOrFail($id);

        $departamento->delete();

        return redirect()->route('departamentos');
    }

    private function isDepartamentoBlocked($id)
    {
        return in_array(intval($id), [1, 2, 3, 4]);
    }
}
