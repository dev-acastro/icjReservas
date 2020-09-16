<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect(\route('reservas.create'));
});

Route::resource('reservas','ReservasController');
Route::post('/search',  'SearchController@index')->name('search');


Route::prefix('admin')->group(function () {
    Route::resource('times','Back\TimesController');
    //Route::resource('/', function(){ return redirect('/attendees');});
    Route::Resource('attendees', 'Back\AttendeesController');

    Route::get('/print/{date}', 'Back\AttendeesController@print')->name('print');
    Route::get('/see/{date}', 'Back\AttendeesController@see')->name('see');

});


Auth::routes();

Route::get('/ConfirmationMail', function (){
    $details = [
        'Name' => 'Arturo Castro',
        'Seats' => '4',
        'Date' => '2020-08-16 00:00:00'
    ];

    $dias = array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
    return view ('mail.confirmationMail', ['details' => $details, 'dias' => $dias]);
});



//Route::get('send-mail', function (){
//   $details = [
//       'title'=> 'Mail from ',
//       'body' => 'Body'
//   ];
//
//   \Mail::to('armicasdi@gmail.com')->send(new \App\Mail\ConfirmationMail($details));
//});


