<?php
namespace App\Http\Controllers;

session_start();
use App\Models\User;
use App\Models\Medico;
use App\Models\Novouser;
use App\Models\Paciente;
use Illuminate\Http\Request;
use App\Models\Especialidade;
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

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){

            $dados = User::where('email', $request['email'])->First();
            $_SESSION['user'] = $dados;
            if($dados['paciente'] === 1){
                if(!Paciente::where('user_id', $dados['id'])->First()){
                  return view('app.paciente.create');
                }
                return redirect()->route('consulta.index');
            }else{
                if(!Medico::where('user_id', $dados['id'])->First()){
                    $especialidades = Especialidade::all();
                    return view('app.medico.create', compact('especialidades'));
                  }
                return redirect()->route('consulta.index');
            }
        }else{
            return redirect()->back()->with('danger', 'email ou Senha Inválida');
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
