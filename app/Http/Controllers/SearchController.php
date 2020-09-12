<?php

namespace App\Http\Controllers;

use App\Reservas;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request){
        $email = $request->get('email');

        $reservas = Reservas::where('email', $email)->simplePaginate(10);
        $dias = array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");


                return view('search', ['reservas' => $reservas, 'email' => $email, 'dias'=>$dias]);

    }
}
