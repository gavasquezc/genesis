<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Validator,Redirect,Response;
Use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;
use App\publications;
use App\comments;
use DB;
 
class AuthController extends Controller
{
 
    public function index() {

        return view('login');
    }  
 
    public function registro(){

        return view('registrar');
    }
     
    public function postLogin(Request $request){

        request()->validate([
        'email' => 'required',
        'password' => 'required',
        ]);
 
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('publicaciones');
        }

        Session::flash('flash_message2', 'Verifique usuario y/o contraseña ');
        return Redirect::to("login");
    }
 
    public function RegistraUsuario(Request $request){  

        request()->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6',
        ]);
         
        $data = $request->all();
 
        $check = $this->create($data);

        Session::flash('flash_message', 'Se ha registrado correctamente ');
       
        return Redirect::to("registrar");
    }
     
    
 
    public function create(array $data){

      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }
     
    public function logout() {
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }



    public function dashboard()
    {
 
      if(Auth::check()){
        $public = publications::where('pu_status', 1)->get();

    	return view('publicaciones' , compact('public'));
      }
       return Redirect::to("login")->withSuccess('No tienes acceso');
    }


}