<?php
namespace App\Http\Controllers;

session_start();
use App\Models\User;
use App\Models\Medico;
use App\Models\Novouser;
use App\Models\Paciente;
use App\Models\Tipoconsulta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login() {
        return view('app.login');
    }

    public function auth(Request $request){
        //dd($request->only(['name', 'password']));

        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ],[
            'email.required' => 'Email é obrigatório',
            'password.required' => 'Password é obrigatório'
        ]);

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
                    $tipos = Tipoconsulta::all();
                    return view('app.medico.create', compact('tipos'));
                  }
                return redirect()->route('consulta.index');
            }
        }else{
            return redirect()->route('login')->with('danger', 'email ou Senha Inválida');
            //dd('login falhou');
        }
    }

    public function create(){
        return view('app.cadastro');
    }

    public function store(Request $request){
        if(!User::where('email', $request['email'])->First()){
            if($request['tipo'] === 'paciente'){
                $request['paciente'] = 1;
                $request['medico'] = 0;
            }else{
                $request['paciente'] = 0;
                $request['medico'] = 1;
            }
            User::create($request->all());
            return redirect()->route('login');
        /* if($user = User::where('email', $request->email)->First()){
                if($user->paciente === 1){
                    return view('app.paciente.create');
                }else{
                    $especialidades = Especialidade::all();
                    return view('app.medico.create', compact('especialidades'));
                }
            }*/
        }
        return redirect()->route('cadastro.create')->with('warning', 'Este Email Já foi usado');
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return view('app.login');
    }

}
