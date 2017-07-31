<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bmsust extends Model
{   protected $table = 'invent_subscribers';

    public $timestamps = true;
    //protected $dateFormat = 'U';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = null;
    
    public function scopeLookFor($query, $email)
    {   return $query->where('email', $email);
    }

    public function scopeAddSubscribe($query, $email, $description)
    {   $bmsust = new Bmsust;
        $bmsust->email = $email;
        $bmsust->description = $description;
        return $bmsust->save();
    }

}
