<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use App\Models\Resultado;
use Illuminate\Http\Request;

class ResultadoController extends Controller
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
        if($consulta->status != 'Aberta'){
            return redirect()->route('consulta.index');
        }
        return view('app.resultado.create',compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $filename = rand(0, 999999) . '-' . $request->file('resultado')->getClientOriginalName();
        $path = $request->file('resultado')->storeAs('uploads', $filename);
        $data = $request->all();
        $data['resultado'] = $path;
        Resultado::create($data);
        return redirect()->route('consulta.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $resultado = Resultado::where('consulta_id', $id)->First();
        return view('app.resultado.show', compact('resultado'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
