<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Lang;
use App;
use Config;
use Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use Cache;

class Index extends Controller
{  

  /*Index Landing Page*/

  public function index(){

    Log::info('[Index][index]');

    if (Auth::check()) {
      // The user is logged in...
      return redirect('home');
    }
     $title = Config::get('app.name');

     $lang = $this->getLanguage();
     
     //$lang = Config::get('app.locale');
     //$lang = App::getLocale();
     //$lang = Lang::getLocale();

     $ABTesting = $this->getABTesting(3);

     return view('index',["title" => $title, "lang" => $lang, "ABTesting" => $ABTesting]);
   }

   public function getABTesting($value){

    Log::info('[Index][getABTesting]');

     $ABTesting = rand(1,$value);
     if($ABTesting=="1"){
       $ABTesting = "A";
     }
     if($ABTesting=="2"){
        $ABTesting = "B";
     }
     if($ABTesting=="3"){
        $ABTesting = "C";
     }
     return $ABTesting;
   }

   public function getLanguage(){

     $functions = new App\library\util\functions();
     $lang = $functions->getUserLanguage();

     return $lang;

   }

   /*Subscribe*/

   public function subscribe(Request $request){

     Log::info('[Index][Subscribe]');

     if($request->isMethod('post')) {
       Log::info('[Index][Subscribe][Post]');
       $params = $request->input('params');
       $email = $params['email'];
       $referral = $params['referral'];
       $bmsust = App\Bmsust::lookFor($email)->get();
       if(count($bmsust)>0){
         $responseJSON = new App\library\VO\responseJSON(Lang::get('messages.successFalse'),Lang::get('messages.errorsBDRepeat'));
         return json_encode($responseJSON);
       } else {
         $bmsust = App\Bmsust::addSubscribe($email,'problemStatement, '.$referral.'');

         //Send to queue email list of administrator mail
         $data['to'] = Config::get('mail.from.address');
         $data['body'] = "".Lang::get('messages.emailSubscribeBody')."".$email."";
         $data['subject'] = Lang::get('messages.emailSubscribeSubject');
         $data['name'] = Config::get('mail.from.name');
         $data['priority'] = 5;

         $mail = new \App\library\classes\queueMails($data);
         $mail->customMailUnique();

         if($bmsust==1){
           $responseJSON = new App\library\VO\responseJSON(Lang::get('messages.successTrue'),Lang::get('messages.BDsuccess'));
         } else {
           $responseJSON = new App\library\VO\responseJSON(Lang::get('messages.successFalse'),Lang::get('messages.errorsBD'));
           return json_encode($responseJSON);
         }
         return json_encode($responseJSON);
       }
     } else {
       abort(403, 'Unauthorized action.');
     }

   }


   /*Reset Password*/
   public function reset($token){
     
     Log::info('[Index][Reset]');

     if (Auth::check()) {
        // The user is logged in...
        Auth::logout();
      }

      $title = Config::get('app.name');
      $lang = Config::get('app.locale');

      return view('layouts.index.reset',["title" => $title, "lang" => $lang, "token" => $token]);
   }

   /*Email Verification*/

   public function verify($verification_code){

      Log::info('[Index][Verify]');

      if (Auth::check()) {
        // The user is logged in...
        Auth::logout();
      }

      $bmsusr = App\Bmsusr::verify($verification_code)->get();

      $title = Config::get('app.name');
      $lang = Config::get('app.locale');

      if($bmsusr->first()){
        if($bmsusr->first()->verified==1){
          return view('layouts.index.verification',["title" => $title, "lang" => $lang, "verify" => Lang::get('messages.wasVerified')]);
        } else {
          $addVerify = App\Bmsusr::addVerify($verification_code);
          if($addVerify==1){
            return view('layouts.index.verification',["title" => $title, "lang" => $lang, "verify" => Lang::get('messages.verified')]);
          } else {
            return view('layouts.index.verification',["title" => $title, "lang" => $lang, "verify" => Lang::get('messages.errorsBD')]);
          }
        }
      } else {
        return view('layouts.index.verification',["title" => $title, "lang" => $lang, "verify" => Lang::get('messages.notVerified')]);
      }

   }
    
   public function date(){

     $date = Carbon::createFromFormat('Y-m-d H:i:s', '2016-12-30 23:37:00', 'America/Detroit');
     $date->setTimezone(Config::get('app.timezone'));//America/Mexico_City
     
     return $date;
   }
}
