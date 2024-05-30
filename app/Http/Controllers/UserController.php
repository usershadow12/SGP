<?php

namespace App\Http\Controllers;

use App\Models\Novouser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login() {
        return view('app.login');
    }

    public function auth(Request $request){
        //dd($request->only(['name', 'password']));

        /*$this->validate($request, [
            'name' => 'required',
            'password' => 'required'
        ],[
            'name.required' => 'Username é obrigatório',
            'password.required' => 'Password é obrigatório'
        ]);*/

        if(Auth::attempt(['name' => $request->name, 'password' => $request->password])){
            dd('Login feito');
        }else{
            return redirect()->back()->with('danger', 'Username ou Senha Inválida');
            //dd('login falhou');
        }
    }

    public function create(){
        return view('app.cadastro');
    }
    public function store(Request $request){
        if($request['tipo'] === 'paciente'){
            $request['paciente'] = 1;
            $request['medico'] = 0;
        }else{
            $request['paciente'] = 0;
            $request['medico'] = 1;
        }
        Novouser::create($request->all());
        return redirect()->route('login')->with('danger', 'Aguarde 1h pela aprovação da sua conta');
    }

}
