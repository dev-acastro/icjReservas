<?php

namespace App\Http\Controllers;

use App\Reservas;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request){
        $email = $request->get('email');

        $reservas = Reservas::where('email', $email)->paginate(10);

                return view('search', ['reservas' => $reservas, 'email' => $email]);

    }
}
