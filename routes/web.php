<?php

use App\Http\Controllers\Administracao\AreaAbrangenciaController;
use App\Http\Controllers\Administracao\ModalidadeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('/areaAbrangencia', AreaAbrangenciaController::class)
        ->parameters(['areaAbrangencia' => 'areaAbrangencia']);;
    Route::resource('/modalidade', ModalidadeController::class);
});
require __DIR__ . '/auth.php';
