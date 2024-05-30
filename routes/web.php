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

Route::get('/pacientes', [PacienteController::class, 'index'])->name('pacientes.index');
Route::get('/pacientes/create', [PacienteController::class, 'create'])->name('pacientes.create');
Route::post('/pacientes', [PacienteController::class, 'store'])->name('pacientes.store');
Route::get('/pacientes/{id}/edit', [PacienteController::class, 'edit'])->name('pacientes.edit');
Route::put('/pacientes/{id}', [PacienteController::class, 'update'])->name('pacientes.update');
Route::delete('/pacientes/{id}', [PacienteController::class, 'destroy'])->name('pacientes.destroy');

Route::get('/', [UserController::class, 'login'])->name('login');
Route::post('/', [UserController::class, 'auth'])->name('auth');

Route::get('/cadastro', [UserController::class, 'create'])->name('cadastro.create');
Route::post('/cadastro', [UserController::class, 'store'])->name('cadastro.store');
