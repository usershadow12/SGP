<?php

namespace App\Http\Controllers;
session_start();
use App\Models\Medico;
use App\Models\Horario;
use Illuminate\Http\Request;

class HorarioController extends Controller
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
        return view('app.horario.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = $_SESSION['user']['id'];
        $medico = Medico::where('user_id', $user)->First();
        $dia1['dia'] = $request->dia1;
        if(empty($dia1['inicio'] = $request->inicio1)){
            $dia1['inicio'] = '08:00';
        }
        $dia1['medico_id'] = $medico->id;
        Horario::create($dia1);
        $dia2['dia'] = $request->dia2;
        if(empty($dia2['inicio'] = $request->inicio2)){
            $dia2['inicio'] = '08:00';
        }
        $dia2['medico_id'] = $medico->id;
        Horario::create($dia2);
        $dia3['dia'] = $request->dia3;
        if(empty($dia3['inicio'] = $request->inicio3)){
            $dia3['inicio'] = '08:00';
        }
        $dia3['medico_id'] = $medico->id;
        Horario::create($dia3);
        return redirect()->route('consulta.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $horario = Horario::where('medico_id', $id)->get();
        return view('app.horario.show',compact('horario'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Horario $horario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Horario $horario)
    {
        //
    }
}
