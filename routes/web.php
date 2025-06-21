<?php

use App\Http\Controllers\AnoLetivoController;
use App\Http\Controllers\ConfirmAccoutController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\DisponibilidadeController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\ProgramaEstudoController;
use App\Http\Controllers\UtilizadorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UnidadeCurricularController;
use App\Http\Controllers\TurmaController;
use App\Http\Controllers\TurmaUnidadeCurricularController;
use App\Http\Middleware\VerificaAnoLetivoAtivo;

Route::get('/teste-ano-letivo', function () {
    return 'Middleware executado com sucesso!';
})->middleware('ano_letivo_ativo');


Route::middleware('auth')->group(function () {

    Route::redirect('/', 'home');
    Route::view('/home', 'home')->name('home');

    // pefil das paginas do utilizadores
    Route::get('/user/perfil', [PerfilController::class, 'index'])->name('user.perfil');
    Route::post('/user/perfil/update-password', [PerfilController::class, 'updatePassword'])->name('user.perfil.update-password');
    Route::post('/user/perfil/update-user-data', [PerfilController::class, 'updateUserData'])->name('user.perfil.update-user-data');

    // Rotas depatamentos
    Route::get('/departamento', [DepartamentoController::class, 'index'])->name('departamentos');
    Route::get('/departamento/new-departamento', [DepartamentoController::class, 'newDepartamento'])->name('departamentos.new-departamento');
    Route::post('/departamento/create-departamento', [DepartamentoController::class, 'createDepartamento'])->name('departamentos.create-departamento');
    Route::get('/departamento/edit-departamento/{id}', [DepartamentoController::class, 'editDepartamento'])->name('departamentos.edit-departamento');
    Route::post('/departamento/update-departamento', [DepartamentoController::class, 'updateDepartamento'])->name('departamentos.update-departamento');
    Route::get('/departments/delete-departamento/{id}', [DepartamentoController::class, 'deleteDepartamento'])->name('departamentos.delete-departamento');
    Route::get('/departments/delete-departamento-confirm/{id}', [DepartamentoController::class, 'deleteDepartamentoConfirm'])->name('departamentos.delete-departamento-confirm');

    // Utilizadores
    Route::get('/utilizador', [UtilizadorController::class, 'index'])->name('utilizadores.user');
    Route::get('/utilizador/new-utilizador', [UtilizadorController::class, 'newUtilizador'])->name('utilizadores.new-user');
    Route::post('/utilizador/create-utilizador', [UtilizadorController::class, 'createUtilizador'])->name('utilizadores.create-user');
    Route::get('/utilizador/edit-utilizador/{id}', [UtilizadorController::class, 'editUtilizador'])->name('utilizadores.edit-user');
    Route::post('/utilizador/update-utilizador', [UtilizadorController::class, 'updateUtilizador'])->name('utilizadores.update-user');
    Route::get('/utilizador/delete/{id}', [UtilizadorController::class, 'deleteUtilizador'])->name('utilizadores.delete-user');
    Route::get('/utilizador/delete-confirm/{id}', [UtilizadorController::class, 'deleteUtilizadorConfirm'])->name('utilizadores.delete-confirm');
    Route::get('/utilizador/restore/{id}', [UtilizadorController::class, 'restoreUtilizador'])->name('utilizadores.restore');

    // email de confirmação da definição da password
    Route::get('/confirm-account/{token}', [ConfirmAccoutController::class, 'confirmAccount'])->name('confirm-account');
    Route::post('/confirm-account', [ConfirmAccoutController::class, 'confirmAccountSubmit'])->name('confirm-account-submit');

    // Ano letivo (precisa estar fora do middleware para poder ativar/criar)
    Route::get('/anos-letivos', [AnoLetivoController::class, 'index'])->name('anos-letivos.index');
    Route::get('/anos-letivos/create', [AnoLetivoController::class, 'create'])->name('anos-letivos.create');
    Route::post('/anos-letivos', [AnoLetivoController::class, 'store'])->name('anos-letivos.store');
    Route::get('/anos-letivos/{id}/edit', [AnoLetivoController::class, 'edit'])->name('anos-letivos.edit');
    Route::post('/anos-letivos/{id}/update', [AnoLetivoController::class, 'update'])->name('anos-letivos.update');
    Route::post('/anos-letivos/{id}/activar', [AnoLetivoController::class, 'activar'])->name('anos-letivos.activar');


    // Estas rotas só funcionam com ano letivo ativo
    Route::middleware([VerificaAnoLetivoAtivo::class])->group(function () {

        // Programa de estudo
        Route::get('/programas-estudo', [ProgramaEstudoController::class, 'index'])->name('programas-estudo.index');
        Route::get('/programas-estudo/create', [ProgramaEstudoController::class, 'create'])->name('programas-estudo.create');
        Route::post('/programas-estudo', [ProgramaEstudoController::class, 'store'])->name('programas-estudo.store');
        Route::get('/programas-estudo/{id}/edit', [ProgramaEstudoController::class, 'edit'])->name('programas-estudo.edit');
        Route::put('/programas-estudo/{id}', [ProgramaEstudoController::class, 'update'])->name('programas-estudo.update');
        Route::delete('/programas-estudo/{id}', [ProgramaEstudoController::class, 'destroy'])->name('programas-estudo.destroy');

        // Cursos
        Route::get('/cursos', [CursoController::class, 'index'])->name('cursos.index');
        Route::get('/cursos/create', [CursoController::class, 'create'])->name('cursos.create');
        Route::post('/cursos', [CursoController::class, 'store'])->name('cursos.store');
        Route::get('/cursos/{id}/edit', [CursoController::class, 'edit'])->name('cursos.edit');
        Route::post('/cursos/{id}/update', [CursoController::class, 'update'])->name('cursos.update');
        Route::delete('/cursos/{id}', [CursoController::class, 'destroy'])->name('cursos.destroy');

        // Unidades curriculares
        Route::get('/unidades-curriculares', [UnidadeCurricularController::class, 'index'])->name('unidades-curriculares.index');
        Route::get('/unidades-curriculares/create', [UnidadeCurricularController::class, 'create'])->name('unidades-curriculares.create');
        Route::post('/unidades-curriculares', [UnidadeCurricularController::class, 'store'])->name('unidades-curriculares.store');
        Route::get('/unidades-curriculares/{id}/edit', [UnidadeCurricularController::class, 'edit'])->name('unidades-curriculares.edit');
        Route::post('/unidades-curriculares/{id}/update', [UnidadeCurricularController::class, 'update'])->name('unidades-curriculares.update');
        Route::post('/unidades-curriculares/{id}/delete', [UnidadeCurricularController::class, 'destroy'])->name('unidades-curriculares.destroy');

        // Gestão de Turmas
        Route::get('/turmas', [TurmaController::class, 'index'])->name('turmas.index');
        Route::get('/turmas/create', [TurmaController::class, 'create'])->name('turmas.create');
        Route::post('/turmas', [TurmaController::class, 'store'])->name('turmas.store');
        Route::get('/turmas/{id}/edit', [TurmaController::class, 'edit'])->name('turmas.edit');
        Route::post('/turmas/{id}/update', [TurmaController::class, 'update'])->name('turmas.update');
        Route::get('/turmas/{turma}', [TurmaController::class, 'show'])->name('turmas.show');
        Route::delete('/turmas/{id}', [TurmaController::class, 'destroy'])->name('turmas.destroy');

        // Associação entre Turmas e Unidades Curriculares
        Route::get('/turma-unidade-curricular', [TurmaUnidadeCurricularController::class, 'index'])->name('turma-unidade-curricular.index');
        Route::get('/turma-unidade-curricular/create', [TurmaUnidadeCurricularController::class, 'create'])->name('turma-unidade-curricular.create');
        Route::post('/turma-unidade-curricular', [TurmaUnidadeCurricularController::class, 'store'])->name('turma-unidade-curricular.store');
        Route::get('/turma-unidade-curricular/{id}/edit', [TurmaUnidadeCurricularController::class, 'edit'])->name('turma-unidade-curricular.edit');
        Route::post('/turma-unidade-curricular/{id}/update', [TurmaUnidadeCurricularController::class, 'update'])->name('turma-unidade-curricular.update');
        Route::delete('/turma-unidade-curricular/{id}', [TurmaUnidadeCurricularController::class, 'destroy'])->name('turma-unidade-curricular.destroy');

        //Disponiblidades

        Route::get('/disponibilidade', [DisponibilidadeController::class, 'index'])->name('disponibilidade.index');
        Route::get('/disponibilidade/create', [DisponibilidadeController::class, 'create'])->name('disponibilidade.create');
        Route::post('/disponibilidade', [DisponibilidadeController::class, 'store'])->name('disponibilidade.store');
        Route::delete('/disponibilidade/{id}', [DisponibilidadeController::class, 'destroy'])->name('disponibilidade.destroy');

    });
});
