<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Times extends Model
{

    protected $table = 'times';

    protected $fillable = [
        'date', 'time', 'seats', 'availableseats'
    ];


}
