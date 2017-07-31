<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Bmsidi extends Model
{   protected $table = 'bmsidi';

    public function scopeLookUp($query){
        return $query->where('I_IDIDI', Auth::user()->I_IDIDI);
    }

}
