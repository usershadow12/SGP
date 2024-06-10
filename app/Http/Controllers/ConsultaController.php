<?php

namespace App\Http\Controllers;

use App\Models\Medico;
use App\Models\Consulta;
use App\Models\Paciente;
use Illuminate\Support\Str;
use App\Models\Tipoconsulta;
use Illuminate\Http\Request;
use Illuminate\Support\Date;
use Illuminate\Support\Facades\DB;

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
            $filter['paciente'] = $paciente->id;
            $consultas = Consulta::where(function($query) use($filter){
                $query->where('paciente_id', $filter['paciente']);
            })->get();
            return view('app.paciente.index', compact('consultas', 'paciente'));
        }
        else{
            $medico = $this->medico();
            $filter['medico'] = $medico->id;
            $consultas = Consulta::where(function($query) use($filter){
                $query->where('medico_id', $filter['medico']);
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

    public function buscar(Request $filter)
    {
        $medico = $this->medico();
        $filter['medico'] = $medico->id;
        $consultas = DB::table('consultas')
        ->join('pacientes', 'consultas.paciente_id', '=', 'pacientes.id')
        ->select('*')->where(function($query) use($filter) {

            $query->where('medico_id', $filter['medico']);

            if($filter['status']) {
                $query->where('status', $filter['status']);
            }

            if($filter['inicio'] and $filter['fim']) {
                $query->whereBetween('data_consulta', [$filter['inicio'], $filter['fim']]);
            }

            if($filter['nome']){
                $query->where(function($query) use ($filter) {
                    $query->where('pacientes.nome', 'like', '%'.$filter['nome'].'%')
                          ->orWhere('pacientes.sobrenome', 'like', '%'.$filter['nome'].'%');
                });
            }

        })->get();
        return view('app.medico.index', compact('consultas', 'medico'));
    }


    public function buscar1(Request $filter)
    {
        $paciente = $this->paciente();
        $filter['paciente'] = $paciente->id;
        $consultas = DB::table('consultas')
        ->join('medicos', 'consultas.medico_id', '=', 'medicos.id')
        ->select('*')->where(function($query) use($filter) {

            $query->where('paciente_id', $filter['paciente']);

            if($filter['status']) {
                $query->where('status', $filter['status']);
            }

            if($filter['inicio'] and $filter['fim']) {
                $query->whereBetween('data_consulta', [$filter['inicio'], $filter['fim']]);
            }

            if($filter['nome']){
                $query->where(function($query) use ($filter) {
                    $query->where('medicos.nome', 'like', '%'.$filter['nome'].'%')
                          ->orWhere('medicos.sobrenome', 'like', '%'.$filter['nome'].'%');
                });
            }

        })->get();
        return view('app.paciente.index', compact('consultas', 'paciente'));
    }
}
