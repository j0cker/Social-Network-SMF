<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bmsuper extends Model
{   protected $table = 'bmsuper';
    //public $attributes; -> no la utilices hecha a perder los timestamps

    public $timestamps = true;
    const CREATED_AT = 'created_at'; 
    const UPDATED_AT = null;

    public function scopeNewUser($query, $user, $privilege, $user_add){
        $bmsuper = new Bmsuper;
        $bmsuper->I_UID = $user;
        $bmsuper->I_PUDID = $privilege;
        $bmsuper->I_UID_ADD = $user_add;
        return $bmsuper->save();
    }

    public function scopeLookFor($query, $user){
        return $query->where('I_UID', $user);
    }

}
