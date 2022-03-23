<?php

use App\Http\Controllers\Administracao\AreaAbrangenciaController;
use App\Http\Controllers\Administracao\ModalidadeController;
use App\Http\Controllers\Administracao\ObjetoController;
use App\Http\Controllers\Administracao\TipoGastoController;
use App\Http\Controllers\Administracao\UnidadesContempladasController;
use App\Http\Controllers\ProcessoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('/processo', ProcessoController::class);
    Route::resource('/areaAbrangencia', AreaAbrangenciaController::class)
        ->parameters(['areaAbrangencia' => 'areaAbrangencia']);;
    Route::resource('/modalidade', ModalidadeController::class);
    Route::resource('/objeto', ObjetoController::class);
    Route::resource('/tipoGasto', TipoGastoController::class);
    Route::resource('/unidadeContempladas', UnidadesContempladasController::class)
        ->parameters(['unidadeContempladas' => 'unidadeContempladas']);
});
require __DIR__ . '/auth.php';
