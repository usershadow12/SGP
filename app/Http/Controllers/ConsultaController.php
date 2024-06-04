<?php

namespace App\Http\Controllers;

use App\Models\Medico;
use App\Models\Consulta;
use App\Models\Paciente;
use App\Models\Tipoconsulta;
use Illuminate\Http\Request;
session_start();
class ConsultaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function paciente(){
        $user_id = $_SESSION['user']['id'];
        return Paciente::where('user_id', $user_id)->First();
    }
    public function medico(){
        $user_id = $_SESSION['user']['id'];
        return Medico::where('user_id', $user_id)->First();
    }
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
            $paciente = $this->paciente();
            $consultas = Consulta::where(function($query) use($paciente){
                $query->where('paciente_id', $paciente->id);
            })->get();
            return view('app.paciente.index', compact('consultas', 'paciente'));
        }
        else{
            $medico = $this->medico();
            $consultas = Consulta::where(function($query) use($medico){
                $query->where('medico_id', $medico->id);
            })->get();
            return view('app.medico.index', compact('consultas', 'medico'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tipos = Tipoconsulta::all();
        $medicos = Medico::all();
        return view('app.consulta.create', compact('tipos', 'medicos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $paciente =  $this->paciente();
        $request['paciente_id'] = $paciente->id;
        Consulta::create($request->all());
        return redirect()->route('consulta.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {   $consulta = Consulta::findOrFail($id);
        $medico = Medico::find($consulta->medico_id);
        $tipo = Tipoconsulta::find($consulta->tipoconsulta_id);
        $consulta->medico = $medico->nome;
        $consulta->tipo = $tipo->nome;
        return view('app.consulta.show', compact('consulta'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tipos= Tipoconsulta::all();
        $medicos = Medico::all();
        $consulta = Consulta::findOrFail($id);
        return view('app.consulta.edit', compact('consulta', 'tipos', 'medicos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $consulta = Consulta::findOrFail($id);
        $request['status'] = 'Marcada';
        $consulta->update($request->all());
        return redirect()->route('consulta.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function cancelar(Request $request, $id)
    {
        $consulta = Consulta::findOrFail($id);
        $consulta->update($request->only(['status']));
        return redirect()->route('consulta.index');
    }
    public function destroy(string $id)
    {
    }
}
