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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function index()
    {
        //
        return redirect(\route('reservas.create'));



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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function store(Request $request)
    {


        $validatedData = $request->validate([
           'name0' => 'required',
           'email0' => 'required|email'
        ]);


//

        $i = 0;
        $emails = [];
        $date = Times::find($request->get('date'));



        for($i=0; $i<= ($request->get('seats'))-1; $i++){
            $asientos = $i == 0 ? $request->get('seats') : 1;
            $reserva = new Reservas([
                'name' => $request->get('name'.$i),
                'email' => $request->get('email'.$i),
                'seats' => $asientos,
                'date' => $date->date,
            ]);
            $reserva->save();

            $emails[$i] = [
                'name' => $request->get('name'.$i),
                'email' => $request->get('email'.$i),
            ];
        }

        $seats = $request->get('seats');

        $date->seats = $date->seats - $seats;
        $date->save();

        $details = [
            "Name" => $request->get('name0'),
            "Seats" => $request->get('seats'),
            "Date" => $request->get('date'),
        ];






        $dias = array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
//        \Mail::to($emails)->send(new \App\Mail\ConfirmationMail($details, $dias));
        return view('ThankYouPage', ['details' => $details, 'dias' => $dias]);

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
