<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\ConsultaController;
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

Route::get('/consulta', [ConsultaController::class, 'index'])->name('consulta.index');
Route::get('/consulta/create', [ConsultaController::class, 'create'])->name('consulta.create');
Route::post('/consulta', [ConsultaController::class, 'store'])->name('consulta.store');
Route::get('/consulta/{id}/edit', [ConsultaController::class, 'edit'])->name('consulta.edit');
Route::put('/consulta/{id}', [ConsultaController::class, 'update'])->name('consulta.update');
Route::delete('/consulta/{id}', [ConsultaController::class, 'destroy'])->name('consulta.destroy');
Route::get('/consulta/{id}', [ConsultaController::class, 'show'])->name('consulta.show');



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
    Route::get('/medico', [MedicoController::class, 'index'])->name('medico.index');
Route::get('/medico/create', [MedicoController::class, 'create'])->name('medico.create');
Route::post('/medico', [MedicoController::class, 'store'])->name('medico.store');
Route::get('/medico/{id}/edit', [MedicoController::class, 'edit'])->name('medico.edit');
Route::put('/medico/{id}', [MedicoController::class, 'update'])->name('medico.update');
Route::delete('/medico/{id}', [MedicoController::class, 'destroy'])->name('medico.destroy');
Route::get('/medico/{id}', [MedicoController::class, 'show'])->name('medico.show');

});
