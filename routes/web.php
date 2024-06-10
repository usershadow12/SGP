<?php

use App\Models\Factura;
use App\Models\Comprovativo;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\HconsultaController;
use App\Http\Controllers\HpacienteController;
use App\Http\Controllers\ResultadoController;
use App\Http\Controllers\PrescricaoController;
use App\Http\Controllers\ComprovativoController;
use App\Http\Middleware\PacienteAccess;

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

Route::get('/back', function(){
    return redirect()->route('consulta.index');
})->name('back');

Route::get('/login', [UserController::class, 'login'])->name('login');
Route::get('/', [UserController::class, 'logout'])->name('login.logout');
Route::post('/', [UserController::class, 'auth'])->name('auth');

Route::get('/cadastro', [UserController::class, 'create'])->name('cadastro.create');
Route::post('/cadastro', [UserController::class, 'store'])->name('cadastro.store');
//Rotas Gerais
Route::middleware(['pacientemedico'])->group(function(){

Route::get('/consulta', [ConsultaController::class, 'index'])->name('consulta.index');
Route::get('/consulta/{id}/edit', [ConsultaController::class, 'edit'])->name('consulta.edit');
Route::put('/consulta/{id}/update', [ConsultaController::class, 'update'])->name('consulta.update');
Route::delete('/consulta/{id}', [ConsultaController::class, 'destroy'])->name('consulta.destroy');
Route::get('/consulta/{id}/show', [ConsultaController::class, 'show'])->name('consulta.show');
Route::put('/consulta/{id}/', [ConsultaController::class, 'cancelar'])->name('consulta.cancelar');
//Rotas Resultado5

Route::post('/resultado', [ResultadoController::class, 'store'])->name('resultado.store');
Route::get('/resultado', [ResultadoController::class, 'index'])->name('resultado.index');
Route::get('/resultado/{id}/edit', [ResultadoController::class, 'edit'])->name('resultado.edit');
Route::put('/resultado/{id}/update', [ResultadoController::class, 'update'])->name('resultado.update');
Route::delete('/resultado/{id}', [ResultadoController::class, 'destroy'])->name('resultado.destroy');
Route::get('/resultado/{id}/show', [ResultadoController::class, 'show'])->name('resultado.show');
Route::put('/resultado/{id}/', [ResultadoController::class, 'cancelar'])->name('resultado.cancelar');

//Rotas facturas

Route::post('/factura', [FacturaController::class, 'store'])->name('factura.store');
Route::get('/factura/create', [FacturaController::class, 'create'])->name('factura.create');
Route::get('/factura/{id}/edit', [FacturaController::class, 'edit'])->name('factura.edit');
Route::put('/factura/{id}/update', [FacturaController::class, 'update'])->name('factura.update');
Route::delete('/factura/{id}', [FacturaController::class, 'destroy'])->name('factura.destroy');
Route::get('/factura/{id}/show', [FacturaController::class, 'show'])->name('factura.show');
Route::put('/factura/{id}/', [FacturaController::class, 'cancelar'])->name('factura.cancelar');
//Rotas Comprovativo
Route::post('/comprovativo', [ComprovativoController::class, 'store'])->name('comprovativo.store');
Route::get('/comprovativo', [ComprovativoController::class, 'index'])->name('comprovativo.index');
Route::get('/comprovativo/{id}/edit', [ComprovativoController::class, 'edit'])->name('comprovativo.edit');
Route::put('/comprovativo/{id}/update', [ComprovativoController::class, 'update'])->name('comprovativo.update');
Route::delete('/comprovativo/{id}', [ComprovativoController::class, 'destroy'])->name('comprovativo.destroy');
Route::get('/comprovativo/{id}/show', [ComprovativoController::class, 'show'])->name('comprovativo.show');
Route::get('/comprovativo/{id}/', [ComprovativoController::class, 'create'])->name('comprovativo.create');
//Rotas Paciente
Route::get('/paciente/{id}', [PacienteController::class, 'show'])->name('paciente.show');
//Rotas Hconsulta
Route::get('/hconsulta/{id}', [HconsultaController::class, 'show'])->name('hconsulta.show');
//Rotas Prescrições
Route::get('/prescricao/{id}', [PrescricaoController::class, 'show'])->name('prescricao.show');
});
//Rotas Paciente
Route::middleware(['paciente'])->group(function(){

    Route::post('/consulta/buscar1', [ConsultaController::class, 'buscar1'])->name('consulta.buscar1');
    Route::get('/consulta/create', [ConsultaController::class, 'create'])->name('consulta.create');
    Route::post('/consulta', [ConsultaController::class, 'store'])->name('consulta.store');
    Route::get('/resultado/{id}', [ResultadoController::class, 'create'])->name('resultado.create');

    Route::get('/paciente', [PacienteController::class, 'index'])->name('paciente.index');
    Route::get('/paciente/create/id', [PacienteController::class, 'create'])->name('paciente.create');
    Route::post('/paciente', [PacienteController::class, 'store'])->name('paciente.store');
    Route::get('/paciente/{id}/edit', [PacienteController::class, 'edit'])->name('paciente.edit');
    Route::put('/paciente/{id}', [PacienteController::class, 'update'])->name('paciente.update');
    Route::delete('/paciente/{id}', [PacienteController::class, 'destroy'])->name('paciente.destroy');
    Route::get('/paciente/gerarpdf/novo', [PacienteController::class, 'gerarpdf'])->name('gerarpdf');
    //Rotas histórico Paciente

    Route::get('/hpaciente', [HpacienteController::class, 'index'])->name('hpaciente.index');
    Route::get('/hpaciente/create', [HpacienteController::class, 'create'])->name('hpaciente.create');
    Route::post('/hpaciente', [HpacienteController::class, 'store'])->name('hpaciente.store');
    Route::get('/hpaciente/{id}/edit', [HpacienteController::class, 'edit'])->name('hpaciente.edit');
    Route::put('/hpaciente/{id}', [HpacienteController::class, 'update'])->name('hpaciente.update');
    Route::get('/hpaciente/{id}', [HpacienteController::class, 'show'])->name('hpaciente.show');
    Route::delete('/hpaciente/{id}', [HpacienteController::class, 'destroy'])->name('hpaciente.destroy');
});
//Rotas Médico
Route::middleware(['medico'])->group(function(){

    Route::post('/consulta/buscar', [ConsultaController::class, 'buscar'])->name('consulta.buscar');
    Route::get('/medico', [MedicoController::class, 'index'])->name('medico.index');
    Route::get('/medico/create', [MedicoController::class, 'create'])->name('medico.create');
    Route::post('/medico', [MedicoController::class, 'store'])->name('medico.store');
    Route::get('/medico/{id}/edit', [MedicoController::class, 'edit'])->name('medico.edit');
    Route::put('/medico/{id}', [MedicoController::class, 'update'])->name('medico.update');
    Route::delete('/medico/{id}', [MedicoController::class, 'destroy'])->name('medico.destroy');
    Route::get('/medico/{id}', [MedicoController::class, 'show'])->name('medico.show');
    Route::get('/gerarpdf', [MedicoController::class, 'gerarpdf'])->name('medico.gerarpdf');

    //Rotas Hconsulta
    Route::get('/hconsulta/{id}/create', [HconsultaController::class, 'create'])->name('hconsulta.create');
    Route::post('/hconsulta', [HconsultaController::class, 'store'])->name('hconsulta.store');
    Route::get('/hconsulta/{id}/edit', [HconsultaController::class, 'edit'])->name('hconsulta.edit');
    Route::put('/hconsulta/{id}', [HconsultaController::class, 'update'])->name('hconsulta.update');

    //Rotas Prescricao
    Route::get('/prescricao/{id}/create', [PrescricaoController::class, 'create'])->name('prescricao.create');
    Route::post('/prescricao', [PrescricaoController::class, 'store'])->name('prescricao.store');
    Route::get('/prescricao/{id}/edit', [PrescricaoController::class, 'edit'])->name('prescricao.edit');
    Route::put('/prescricao/{id}', [PrescricaoController::class, 'update'])->name('prescricao.update');

    //Rotas horario
    Route::get('/horario/create', [HorarioController::class, 'create'])->name('horario.create');
    Route::post('/horario', [HorarioController::class, 'store'])->name('horario.store');
    Route::get('/horario/{id}/edit', [HorarioController::class, 'edit'])->name('horario.edit');
    Route::put('/horario/{id}', [HorarioController::class, 'update'])->name('horario.update');
    Route::get('/horario/{id}', [HorarioController::class, 'show'])->name('horario.show');
});
