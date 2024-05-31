<?php

namespace App\Http\Controllers;

use App\Models\Medico;
use App\Models\Consulta;
use App\Models\Paciente;
use Illuminate\Http\Request;
session_start();
class ConsultaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function verific(){
        if($_SESSION['user']['paciente'] === 1){
            return 0;
        }else{
            return 1;
        }
    }
    public function index()
    {
        if($this->verific() === 0){
            $user_id = $_SESSION['user']['id'];
            $paciente = Paciente::where('user_id', $user_id)->First();
            $consultas = Consulta::where(function($query) use($paciente){
                $query->where('paciente_id', $paciente->id);
            })->get();
            return view('app.paciente.index', compact('consultas'));
        }
        else{
            $user_id = $_SESSION['user']['id'];
            $medico = Medico::where('user_id', $user_id)->First();

            $consultas = Consulta::where(function($query) use($medico){
                $query->where('medico_id', $medico->id);
            })->get();
            return view('app.medico.index', compact('consultas'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        dd('feito');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        dd($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        dd('feito');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        dd('feito');
    }
}
