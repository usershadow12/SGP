<?php

namespace App\Http\Controllers;
session_start();

use App\Models\especialidade;
use App\Models\Medico;
use App\Models\medico as ModelsMedico;
use Illuminate\Http\Request;

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
        $request['user_id'] = $_SESSION['user']['id'];
        Medico::create($request->all());

        return redirect()->route('consulta.index');
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
}
