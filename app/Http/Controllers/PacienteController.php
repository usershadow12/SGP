<?php

namespace App\Http\Controllers;

use App\Models\paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    public function index()
    {
        $pacientes = paciente::all();

        return view('app.pacientes.index', compact('pacientes'));
    }

    public function create()
    {
        return view('app.pacientes.create');
    }

    public function store(Request $request)
    {
        paciente::create($request->all());

        return redirect()->route('pacientes.index');
    }

    public function edit($id)
    {
        $paciente = paciente::findOrFail($id);
        return view('app.pacientes.edit', compact('paciente'));
    }

    public function update(Request $request, $id)
    {
        $paciente = paciente::findOrFail($id);
        $paciente->update($request->all());

        return redirect()->route('pacientes.index');
    }

    public function destroy($id)
    {
        dd($id);
    }

}
