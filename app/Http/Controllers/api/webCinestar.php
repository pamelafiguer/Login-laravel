<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class webCinestar extends Controller
{
    public function index() {
        return ('index');
        
    }

    public function cines() {
        $cines = DB::select('call sp_getCines');

        return view('cines', ['cines' => $cines]);
    }

    public function cine(string $RazonSocial) {

        $cine = DB::select('SELECT id from Cine where RazonSocial = ?' , [$RazonSocial]);
        $cineId = $cine[0]->id;

        $cineData = DB::select('call sp_getCine(?)', [$cineId]);
        $tarifas = DB::select('call sp_getCineTarifas(?)', [$cineId]);
        $Horarios = DB::select('call sp_getCinePeliculas(?)', [$cineId]);

        return view('cine', [ 'cineData' => $cineData, 'tarifas' => $tarifas, 'horarios' => $Horarios]);
    }

    public function peliculas($id) {
        if ($id == 'cartelera') $id = 1;
        else if ($id == 'estrenos') $id = 2;
        else return redirect('/');

        $peliculas = DB::select('call sp_getPeliculas(?)', [$id]);

        return view('peliculas', [ 'peliculas' => $peliculas]);
        
    }

    public function pelicula($NombrePelicula) {
        $pelicula = DB::select('SELECT id, Titulo From Pelicula where Titulo = ? ', [$NombrePelicula]);
        $peliculaId = $pelicula[0]->id;

        $peliculaData = DB::select('call sp_getPelicula(?)', [$peliculaId]);
        return view( 'pelicula', ['pelicula' => $peliculaData]);
    }
}
