<?php

namespace App\library\VO;

use Illuminate\Support\Facades\Log;

class responseJSON
{   
    public $success;
    public $description;
    
    public function __construct($success, $description){
        Log::info("[responseJSON][constructor]");
        $this->success = $success;
        $this->description = $description; 
    }

    public function getSuccess(){
        Log::info("[responseJSON][getSuccess]");
        return $this->success;
    }    
}