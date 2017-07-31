<?php

namespace App;

use Auth;
use Log;

use Illuminate\Database\Eloquent\Model;

class Bmsusr extends Model
{   protected $table = 'bmsusr';
    public $attributes;

    

    public function scopeGetUser($query)
    {   return $query->where('id', Auth::user()->id);
    }

    public function scopeVerify($query, $verification_code)
    {   return $query->where('verification_code', $verification_code);
    }

    public function scopeUpdateVerify($query, $verification_code){
        return $query->where('id', Auth::user()->id)
                     ->update(['verified' => 0, 'verification_code' => $verification_code]);
    }

    public function scopeAddVerify($query, $verification_code){
        return $query->where('verification_code', $verification_code)
                     ->update(['verified' => 1]);
    }

    public function scopeUpdateUsrConf($query, $timezone, $language){
        Log::info('[scopeUpdateUsrConf] UserId: '.Auth::user()->id);
        return $query->where('id', Auth::user()->id)
                     ->update(['I_UHID' => $timezone, 'I_IDIDI' => $language]);
    }

    public function scopeActualizarImageProfile($query, $imageUrl){
        return $query->where('id', Auth::user()->id)
                     ->update(['X_UFOTO' => 'storage'.$imageUrl.'']);
    }

    public function scopeAllUpdateUsrConfWithoutPass($query, $name, $email, $timezone, $language){
        Log::info('[scopeUpdateUsrConf] UserId: '.Auth::user()->id);
        return $query->where('id', Auth::user()->id)
                     ->update(['I_UHID' => $timezone, 'I_IDIDI' => $language, 'name' => $name, 'email' => $email]);
    }

    public function scopeAllUpdateUsrConf($query, $name, $email, $timezone, $language, $pass){
        Log::info('[scopeUpdateUsrConf] UserId: '.Auth::user()->id);
        return $query->where('id', Auth::user()->id)
                     ->update(['I_UHID' => $timezone, 'I_IDIDI' => $language, 'name' => $name, 'email' => $email, 'password' => bcrypt($pass)]);
    }

    public function scopeGetVerifiedUsers($query)
    {   return $query->where('verified', '1');
    }

    public function scopeActualizarPaquete($query, $user, $tipo){
        return $query->where('id', $user)
                     ->update(['I_TIPOID' => $tipo]);
    }

    public function scopeGetPaidUsers($query){
        return $query->where('I_TIPOID', '!=' , '1');
    }

    public function scopeGetAllUsersTipo($query, $tipo){
        return $query->join('bmstipo', 'bmsusr.I_TIPOID', '=', 'bmstipo.I_TIPOID')
                     ->select('bmsusr.name','bmsusr.email','bmstipo.N_TIPONAME')
                     ->where('bmsusr.I_TIPOID', '=' , $tipo);
    }

}
