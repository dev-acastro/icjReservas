<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Reservas;
use App\Times;
//use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;


class AttendeesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {


        $times = Times::all();
        $date = new \DateTime();
        $date->modify('-6 hours');
        $dateFormatted= $date->format('Y-m-d H:i:s');
        $dias = array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
        return view('admin.index', ['times'=>$times, 'dias'=>$dias, 'dateFormatted' => $dateFormatted]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function show($request)
    {
        //
        $date = explode('%', $request);

        $time = $date[0];

        $reservas = Reservas::where('date', $time)->paginate(10);
        $dias = array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");

        //return $reservas;
        return view('admin.show', ['reservas'=>$reservas, 'dias'=>$dias]);


    }

    public function print($date)
    {
        $reservas = Reservas::where('date', $date)->paginate(10);
        $dias = array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");

        $pdf = PDF::loadView('print.attendees', ['reservas'=>$reservas, 'dias' =>$dias]);
        return $pdf->download('attendees'. ' '.  $dias[date('w', strtotime($date))]. ' '.  date('d', strtotime($date)) . ' '.   date('h:i', strtotime($date)) . ' '.  date('A', strtotime($date))  . '.pdf');

    }


    public function see($date)
    {

        $reservas = Reservas::where('date', $date)->paginate(10);
        $dias = array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");

        $pdf = PDF::loadView('print.attendees', ['reservas'=>$reservas, 'dias' =>$dias]);
        return $pdf->stream();


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
