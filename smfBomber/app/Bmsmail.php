<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bmsmail extends Model
{   
    protected $table = 'loemprendemos_queue_mails';

    public $timestamps = true;
    //protected $dateFormat = 'U';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = null; 
    
    public function scopeAddMailQueue($query, $user_id, $plantilla, $toMail, $prioridad, $N_VAR1, $N_VAR2, $N_VAR3)
    {   $bmsmail = new Bmsmail;
        $bmsmail->I_UID = $user_id;
        $bmsmail->N_PLANTILLA = $plantilla;
        $bmsmail->N_SEND_TO = $toMail;
        $bmsmail->I_PRIORIDAD = $prioridad;
        $bmsmail->N_VAR1 = $N_VAR1;
        $bmsmail->N_VAR2 = $N_VAR2;
        $bmsmail->N_VAR3 = $N_VAR3;
        return $bmsmail->save();
    }

}

?>
