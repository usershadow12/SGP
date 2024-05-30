<?php


namespace App\Http\Controllers;

session_start();

use App\Models\paciente;
use Illuminate\Http\Request;
class PacienteController extends Controller
{
    public function index()
    {
        $pacientes = paciente::all();

        return view('app.paciente.index', compact('pacientes'));
    }

    public function create()
    {
        return view('app.paciente.create');
    }

    public function store(Request $request)
    {
        $request['user_id'] = $_SESSION['user']['id'];
        paciente::create($request->all());

        return redirect()->route('paciente.index');
    }

    public function edit($id)
    {
        $paciente = paciente::findOrFail($id);
        return view('app.paciente.edit', compact('paciente'));
    }

    public function update(Request $request, $id)
    {
        $paciente = paciente::findOrFail($id);
        $paciente->update($request->all());

        return redirect()->route('paciente.index');
    }

    public function destroy($id)
    {
        dd($id);
    }

}
