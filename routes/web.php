<?php

use App\Http\Controllers\ObjetoController;
use App\Http\Controllers\AgendaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/agendamento/agenda', function () {
    return view('agendamento.agenda');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('/objetos', ObjetoController::class);
    Route::post('agendamentos/{objeto}', [AgendaController::class, 'store'])->name('agendamentos.store');

    Route::resource('agenda', AgendaController::class);
    Route::put('agenda/{agenda}/status', [AgendaController::class, 'updateStatus'])->name('agenda.updateStatus');

});
