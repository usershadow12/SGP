<?php

namespace App\Http\Controllers;
session_start();
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
        return view('app.Medico.index');
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
        //
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
