<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservas extends Model
{

    protected $table = 'reservations';

    protected $fillable = [
        'name', 'email', 'seats', 'date'
    ];
}
