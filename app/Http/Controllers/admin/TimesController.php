<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Times;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TimesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $times = Times::paginate(15);
        $dias = array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
        return view('times/index', ['times' => $times, 'dias'=>$dias]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        //
        return view('times/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        //

        $validatedData = $request->validate([
            'date' => 'required',
            'seats' =>'required'
        ]);

        $servicios = new Times([
            'date' => $request->get('date'),
            'seats' => $request->get('seats'),
        ]);

        $servicios->save();


        return redirect(route('times.index'));
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $times = Times::find($id);

        return view('times.edit', ['time' => $times]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        //
        $validatedData = $request->validate([
            'day' => 'required',
            'time' => 'required',
            'seats' =>'required'
        ]);

        $time = Times::find($id);
        $time->day = $request->get('day');
        $time->time = $request->get('time');
        $time->seats = $request->get('seats');

        $time->save();

        return redirect('admin/times')->with('success', 'Culto Actualizado!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $times = Times::all();
        $time = $times->find($id);
        $time->delete();
        return redirect('/admin/times')->with('success', 'Culto Eliminado!');
    }
}
