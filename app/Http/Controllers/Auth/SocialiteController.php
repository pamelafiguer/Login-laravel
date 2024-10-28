<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;

use Laravel\Socialite\Facades\Socialite;

use Illuminate\Support\Facades\Session;

class SocialiteController extends Controller
{
    public function redirectToProvider($provider) {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        
        $socialUser = Socialite::driver($provider)->user();

        // Guardar datos del usuario en sesión
        Session::put('user', [
            'name' => $socialUser->getName(),
            'email' => $socialUser->getEmail(),
            'avatar' => $socialUser->getAvatar(),
        ]);

        return redirect('/bienvenido')->with('success', 'Ingreso exitoso con ' . ucfirst($provider));
    }

    public function logout()
{
    Session::forget('user');
    return redirect('/')->with('success', 'Has cerrado sesión.');
}
}