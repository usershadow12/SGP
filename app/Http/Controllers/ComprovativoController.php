<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use App\Models\Comprovativo;
use Illuminate\Http\Request;

class ComprovativoController extends Controller
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
        return view('app.comprovativo.create',compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $filename = rand(0, 999999) . '-' . $request->file('comprovativo')->getClientOriginalName();
        $path = $request->file('comprovativo')->storeAs('uploads', $filename);
        $data = $request->all();
        $data['comprovativo'] = $path;
        Comprovativo::create($data);
        return redirect()->route('consulta.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $comprovativo = Comprovativo::where('consulta_id', $id)->First();
        return view('app.comprovativo.show', compact('comprovativo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comprovativo $comprovativo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comprovativo $comprovativo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comprovativo $comprovativo)
    {
        //
    }
}
