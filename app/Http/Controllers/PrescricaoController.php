<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use App\Models\prescricao;
use Illuminate\Http\Request;

class PrescricaoController extends Controller
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
        if($consulta->status != 'Exame'){
            return redirect()->route('consulta.index');
        }
        return view('app.prescricao.create', compact('id'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Prescricao::create($request->all());
        return redirect()->route('consulta.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $prescricao = Prescricao::where('consulta_id', $id)->First();
        return view('app.prescricao.show', compact('prescricao'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $prescricao = Prescricao::find($id);
        return view('app.prescricao.edit', compact('prescricao'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $prescricao = Prescricao::findOrFail($id);
        $prescricao->update($request->only('duracao', 'descricao', 'indicacao_especial'));
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
