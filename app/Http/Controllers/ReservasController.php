<?php

namespace App\Http\Controllers;

use App\Mail\ConfirmationMail;
use App\Reservas;
use App\Times;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ReservasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        //
        $times = Times::all();
        $dias = array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
        return view('reservas/create', ['times' => $times, 'dias' =>$dias]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $validatedData = $request->validate([
           'name0' => 'required',
           'email0' => 'required|email'
        ]);


//

        $i = 0;

        for($i=0; $i<= ($request->get('seats'))-1; $i++){



            $asientos = $i == 0 ? $request->get('seats') : 1;

            $reserva = new Reservas([
                'name' => $request->get('name'.$i),
                'email' => $request->get('email'.$i),
                'seats' => $asientos,
                'date' => $request->get('date'),
            ]);

            $reserva->save();


        }
        $email = $request->get('mail0');

        Mail::to("armicasdi@gmail.com")->send(new confirmationMail());

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
