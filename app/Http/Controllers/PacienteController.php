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
        $pacientes = Paciente::all();
        return view('app.paciente.index', compact('pacientes'));
    }

    public function create()
    {
        return view('app.paciente.create');
    }

    public function store(Request $request)
    {
        $request['user_id'] = $_SESSION['user']['id'];
        Paciente::create($request->all());

        return redirect()->route('paciente.index');
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

        return redirect()->route('paciente.index');
    }

    public function destroy($id)
    {
        dd($id);
    }

}
