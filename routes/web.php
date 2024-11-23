<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\webCinestar;
use App\Http\Controllers\api\LoginController;
use App\Http\Controllers\Auth\SocialiteController;



/*
Route::controller(webCinestar::class) ->group(function() {
    Route::get('/', "index")->name('index');
    Route::get('/cines', "cines")->name('cines');
    Route::get('/cine/{RazonSocial}', "cine")->name('cine');
    Route::get('/peliculas/{id}', "peliculas")->name('peliculas');
    Route::get('/pelicula/{NombrePelicula}', "pelicula")-> name('pelicula');

});
*/

Route::controller(LoginController::class) ->group(function() {
    Route::get('/', 'showLoginForm')->name('login');
    Route::post('/', 'login')->name('procesar_login');
    Route::get('/registrarse', 'showRegisterForm')->name('registrarse');
    Route::post('/registrarse', 'register')->name('registrarse');
    Route::get('/recuperarPassword', 'showRecoverForm')->name('recuperarPassword');
    Route::post('/recuperarPassword', 'recover')->name('procesar_recuperacion');
    Route::get('/cambiarPassword', 'showChangePasswordForm')->name('cambiar_password');
    Route::post('/cambiarPassword', 'changePassword')->name('actualizar_password');
    Route::get('/bienvenido', 'bienvenido')-> name('ingreso');
    Route::post('/logout', 'logout')-> name('logout');
    Route::get('/verificar', 'showMesaggeVerificar')-> name('verificar');

});


Route::get('auth/{provider}', [SocialiteController::class, 'redirectToProvider'])->name('auth.social');
Route::get('auth/{provider}/callback', [SocialiteController::class, 'handleProviderCallback'])->name('auth.social.callback');
Route::get('logout', [SocialiteController::class, 'logout']);