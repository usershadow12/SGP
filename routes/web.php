<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PacienteController;

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

Route::get('/', [UserController::class, 'login'])->name('login');
Route::post('/', [UserController::class, 'auth'])->name('auth');

Route::get('/cadastro', [UserController::class, 'create'])->name('cadastro.create');
Route::post('/cadastro', [UserController::class, 'store'])->name('cadastro.store');

Route::middleware(['paciente'])->group(function(){
    Route::get('paciente', function(){
        dd('Paciente');
        })->name('paciente');
    Route::get('/paciente', [PacienteController::class, 'index'])->name('paciente.index');
    Route::get('/paciente/create', [PacienteController::class, 'create'])->name('paciente.create');
    Route::post('/paciente', [PacienteController::class, 'store'])->name('paciente.store');
    Route::get('/paciente/{id}/edit', [PacienteController::class, 'edit'])->name('paciente.edit');
    Route::put('/paciente/{id}', [PacienteController::class, 'update'])->name('paciente.update');
    Route::delete('/paciente/{id}', [PacienteController::class, 'destroy'])->name('paciente.destroy');
});

Route::middleware(['medico'])->group(function(){
    Route::get('medico', function(){
        dd('medico');
    })->name('medico');
});
