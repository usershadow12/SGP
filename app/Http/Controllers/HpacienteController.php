<?php

namespace App\Http\Controllers;
session_start();
use App\Models\Paciente;
use App\Models\Hpaciente;
use Illuminate\Http\Request;

class HpacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('app.hpaciente.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $paciente = Paciente::where('user_id', $_SESSION['user']['id'])->First();
        $request['paciente_id'] = $paciente->id;
        Hpaciente::create($request->all());
        return redirect()->route('consulta.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $hpaciente = Hpaciente::find($id);
        return view('app.hpaciente.show', compact('hpaciente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $hpaciente = Hpaciente::find($id);
        return view('app.hpaciente.edit', compact('hpaciente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $hpaciente = Hpaciente::find($id);
        $hpaciente->update($request->only(['antecedente', 'historico_familiar', 'alergia']));
        return redirect()->route('consulta.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
