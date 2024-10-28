<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class LoginController extends Controller
{
    public function showLoginForm() {
        return view('login');
    }
    public function bienvenido() {
        return view('ingreso');
    }

    public function login(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $correo = $request->input('email');
        $password = $request->input('password');

        $usuario = DB::select('call sp_Usuario_Login(?, ?)', [$correo, $password]) ;

        if ($usuario && $correo === $usuario[0]->Correo && $password === $usuario[0]->Passwordd) {
            
            session(['usuario' => $usuario[0]->id]);
            return redirect('/bienvenido')->with('success', 'Ingreso exitoso');
            
        }

    }



    public function logout() {
        return view('login');
        
    }

    public function showRegisterForm() {
        return view('login');
    }

    public function register (Request $request) {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
            'nombres' => 'required'

        ]);

        $correo = $request->input('email');
        $password = $request->input('password');
        $Nombres = $request->input('nombres');

        DB::statement('call sp_Usuario_Guardar(?,?,?)', [$Nombres, $correo, $password]);
        return redirect('/')->with('success', 'Registro exitoso');
    }

    public function showRecoverForm() {
        return view('login');
        
    }
    public function recover(Request $request) {
        $request->validate(['email' => 'required|email']);

        $correo = $request->input('email');
        $usuario = DB::select('call sp_Usuario_RecuperarPassword(?)', [$correo]);

        return redirect('/verificar')->with('success', 'correo enviado');
        
    }

    public function showChangePasswordForm()  {
        return view('ingreso');
    }

    public function changePassword(Request $request) {

        $request->validate([
            'email' => 'required|email',
            'password_viejo' => 'required',
            'nueva_password' => 'required|min:6'
        ]);
    
    
        $correo = $request->input('email');
        $passwordPasado = $request->input('password_viejo');
        $nuevaPassword = $request->input('nueva_password'); 

        $usuario = DB::table('Usuario')->where('Correo', $correo)->first();

        if ($usuario && $passwordPasado === $usuario->Passwordd) {
            DB::statement('CALL sp_Usuario_Update(?, ?)', [$correo, $nuevaPassword]);
    
            return redirect()->route('ingreso')->with('success', 'Contraseña actualizada con éxito');
        } else {
            
            return back()->with('error', 'La contraseña actual es incorrecta');
        }
    }
    
    

    public function showMesaggeVerificar()  {
        return view('login');
    }
}