<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use App\Models\hconsulta;
use Illuminate\Http\Request;

class HconsultaController extends Controller
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
    public function create($id)
    {
        $consulta = Consulta::find($id);
        return view('app.hconsulta.create', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        hconsulta::create($request->all());
        return redirect()->route('consulta.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $hconsulta = Hconsulta::where('consulta_id', $id)->First();
        return view('app.hconsulta.show', compact('hconsulta'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $hconsulta = Hconsulta::find($id);
        return view('app.hconsulta.edit', compact('hconsulta'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $hconsulta = Hconsulta::findOrFail($id);
        $hconsulta->update($request->only('diagnostico', 'exame', 'observacoes'));
        return view('app.hconsulta.show', compact('hconsulta'));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
