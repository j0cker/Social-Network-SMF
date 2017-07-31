<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bmspud extends Model
{   protected $table = 'bmspud';


    public function scopeLookFor($query, $privilege){
        return $query->where('I_PUDID', $privilege);
    }

    public function scopeCountDistinct($query){
        return $query->distinct()->select('N_PERNAME');
    }

}
