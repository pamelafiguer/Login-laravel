<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Unique;

use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
    public function registrarse(Request $verificar) {

        $verificar -> validate([
            'nombres' => 'required |string| max:225',
            'correo' => 'required |string| email | max:225 | unique:users',
            'contraseña' => 'requires |string| min:8',
        ]);

        $password = Hash::make($verificar->password);


        DB::statement('call sp_Usuario_Guardar(?,?,?)', [
            $verificar->nombres,
            $verificar->email,
            $password
        ]);

        return view('')

        

    }

    public function login(Request $verificacion)
}
