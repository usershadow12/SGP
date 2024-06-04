<?php

namespace App\Http\Controllers;
session_start();

use App\Models\User;
use App\Models\Ordem;
use App\Models\Medico;
use App\Models\Consulta;
use Termwind\Components\Dd;
use Illuminate\Http\Request;
use App\Models\especialidade;
use App\Models\medico as ModelsMedico;

class MedicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return redirect()->route('consulta.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('app.medico.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(!Medico::where('bi', $request['bi'])->First() AND
        !Medico::where('contacto1', $request['contacto1'])->First() AND
        !Medico::where('contacto2', $request['contacto2'])->First() AND
        !Medico::where('ordem', $request['ordem'])->First()){
        $request['user_id'] = $_SESSION['user']['id'];
        $id = $_SESSION['user']['id'];
        if(Ordem::where('ordem', $request->ordem)->First()){
            Medico::create($request->all());
            return redirect()->route('horario.create');
        }
        User::findOrFail($id)->delete($id);
        return redirect()->route('login')->with('danger', 'A Sua Conta Foi Removida, Porque o número de ordem não é válido');
        }
        return redirect()->route('medico.create')->with('warning', 'O BI, o número de ordem e os contactos não podem ser repetidos');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $medico = Medico::findOrFail($id);
        $especialidades = Especialidade::all();
        return view('app.medico.show', compact('medico', 'especialidades'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $medico = Medico::findOrFail($id);
        $especialidades = Especialidade::all();
        return view('app.medico.edit', compact('medico', 'especialidades'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $medico = Medico::findOrFail($id);
        $medico->update($request->all());

        return redirect()->route('consulta.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function gerarpdf(){
        $id = $_SESSION['user']['id'];
        $medico = Medico::where('user_id', $id)->First();
        $consultas = Consulta::where('medico_id', $medico->id);
        dd($consultas);
    }
}
