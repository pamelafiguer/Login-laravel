<?php



use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\LoginController;

Route::controller(Controller::class) ->group(function() {
    Route::get('/', "index")->name('index');
    Route::get('/cines', "cines")->name('cines');
    Route::get('/cine/{RazonSocial}', "cine")->name('cine');
    Route::get('/peliculas/{id}', "peliculas")->name('peliculas');
    Route::get('/pelicula/{NombrePelicula}', "pelicula")-> name('pelicula');

});

Route::controller(LoginController::class) ->group(function() {
    Route::get('/login', "login")->name('login');
    Route::get('/Registrarse', "Registrarse")->name('Registrarse');
    Route::get('/RecuperarPassword}', "RecuperarPassword")->name('Recuperar');
    Route::get('/ingreso', "ingreso")->name('ingreso');
    Route::get('/CambiarPassword', "cambiar")-> name('pelicula');

});
