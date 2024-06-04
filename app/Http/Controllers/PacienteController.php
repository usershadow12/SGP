<?php

namespace App\Http\Controllers;

session_start();

use App\Models\Paciente;
use Illuminate\Http\Request;
class PacienteController extends Controller
{
    public function verific(){
        if($_SESSION['user']['paciente'] === 1){
            return 0;
        }else{
            return 1;
        }
    }
    public function index()
    {
        return redirect()->route('consulta.index');
    }

    public function create()
    {
        return view('app.paciente.create');
    }

    public function store(Request $request)
    {
        if(!Paciente::where('bi', $request['bi'])->First() AND
        !Paciente::where('contacto1', $request['contacto1'])->First() AND
        !Paciente::where('contacto2', $request['contacto2'])->First()){
            $request['user_id'] = $_SESSION['user']['id'];
            Paciente::create($request->all());
            return redirect()->route('hpaciente.create');
        }
        return redirect()->route('paciente.create')->with('warning', 'O BI, e os contactos não podem ser repetidos');
    }

    public function show($id){
        $paciente = Paciente::findOrFail($id);
        return view('app.paciente.show', compact('paciente'));
    }

    public function edit($id)
    {
        $paciente = Paciente::findOrFail($id);
        return view('app.paciente.edit', compact('paciente'));
    }

    public function update(Request $request, $id)
    {
        $paciente = Paciente::findOrFail($id);
        $paciente->update($request->all());

        return redirect()->route('consulta.index');
    }

    public function destroy($id)
    {
        dd($id);
    }

}
