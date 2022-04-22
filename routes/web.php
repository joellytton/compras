<?php

use App\Http\Controllers\Administracao\AreaAbrangenciaController;
use App\Http\Controllers\Administracao\CentralAtendimentoController;
use App\Http\Controllers\Administracao\ModalidadeController;
use App\Http\Controllers\Administracao\ObjetoController;
use App\Http\Controllers\Administracao\SituacaoAcompanhamentoController;
use App\Http\Controllers\Administracao\TipoGastoController;
use App\Http\Controllers\Administracao\UnidadesContempladasController;
use App\Http\Controllers\Administracao\UsuarioController;
use App\Http\Controllers\ProcessoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::group(['middleware' => ['auth', 'verificar.permissao:0']], function () {
    Route::resource('/areaAbrangencia', AreaAbrangenciaController::class)
        ->parameters(['areaAbrangencia' => 'areaAbrangencia']);
    Route::resource('/centralAtendimento', CentralAtendimentoController::class);
    Route::resource('/modalidade', ModalidadeController::class);
    Route::resource('/objeto', ObjetoController::class);

    Route::resource('/situacao', SituacaoAcompanhamentoController::class);
    Route::resource('/tipoGasto', TipoGastoController::class);
    Route::resource('/usuario', UsuarioController::class);
    Route::resource('/unidadeContempladas', UnidadesContempladasController::class)
        ->parameters(['unidadeContempladas' => 'unidadeContempladas']);
});

Route::middleware('auth')->group(function () {
    Route::resource('/processo', ProcessoController::class);
});
require __DIR__ . '/auth.php';
