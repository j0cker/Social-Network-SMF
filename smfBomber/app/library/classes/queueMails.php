<?php

namespace App\library\classes;

use Illuminate\Support\Facades\Log;
use Mail;
use App;
use Config;
use Lang;
use Auth;

class queueMails
{   private $data;
    
    public function __construct($data = []){
        Log::info("[Mail][constructor]");
        $this->data = $data;
    }

    public function welcome(){

        Log::info("[Mail][welcome][queue]");

        $data = $this->data;

        $bmsmail = App\Bmsmail::addMailQueue($data['user_id'], 'emails.welcome', $data['email'], (int)Lang::get('messages.prioridadWelcome'), $data['name'], $data['password'], $data['verification_code']);
    }

    public function reset(){

        Log::info("[Mail][reset][queue]");

        $data = $this->data;

        $bmsmail = App\Bmsmail::addMailQueue($data['user_id'], 'emails.reset', $data['email'], (int)Lang::get('messages.prioridadReset'), '', $data['password'], '');
    }

    public function verificationCompare(){

        Log::info("[Mail][verificationCompare]");

        $data = $this->data;
    
        $bmsmail = App\Bmsmail::addMailQueue($data['user_id'], 'emails.verification', $data['email'], (int)Lang::get('messages.prioridadVerificationCompare'), $data['name'], $data['mail_previous'], '');

    }

    public function newPassword(){

        Log::info("[Mail][newPassword]");

        $data = $this->data;
    
        $bmsmail = App\Bmsmail::addMailQueue($data['user_id'], 'emails.password', $data['email'], (int)Lang::get('messages.prioridadPswd'), '', $data['pswd'], '');

    }

    //single custom unique emails
    public function singleMailUnique(){

       Log::info("[Mail][singleMailUnique]");

       $params = $this->data;

       $to = $params['to'];
       $subject = $params['subject'];
       $body = $params['body'];
       $priority = $params['priority'];
       $name = $params['name'];

       $bmsmail = App\Bmsmail::addMailQueue(0, 'emails.single', $to, $priority, $body, $subject, $name);
           
    }

    //custom unique emails function from wherever
    public function customMailUnique(){

       Log::info("[Mail][customMailUnique]");

       $params = $this->data;

       $to = $params['to'];
       $subject = $params['subject'];
       $body = $params['body'];
       $priority = $params['priority'];
       $name = $params['name'];

       $bmsmail = App\Bmsmail::addMailQueue(0, 'emails.custom', $to, $priority, $body, $subject, $name);
           
    }

    //custom emails from admin panel
    public function customMail(){

       Log::info("[Mail][customMail]");

       $params = $this->data;

       $target = $params['target'];
       $subject = $params['subject'];
       $body = $params['body'];
       $priority = $params['priority'];

       if($target=="all"){
         Log::info("[Mail][customMail] all");
         $mailsToSend = App\Bmsusr::all();
       } else if($target=="subs"){
         Log::info("[Mail][customMail] subs");
         $mailsToSend = App\Bmsust::all();
       } else {
         Log::info("[Mail][customMail] tipo de paquetes");
         $mailsToSend = App\Bmsusr::getAllUsersTipo($target)->get();
       }

       $mailsToSend = json_decode($mailsToSend);

       if($mailsToSend){
           Log::info("[Mail][customMail] hay mails de éste tipo");
           foreach($mailsToSend as $item){
                if($target=="subs"){
                        $bmsmail = App\Bmsmail::addMailQueue(Auth::user()->id, 'emails.custom', $item->email, $priority, $body, $subject, 'Subscriber');
                } else { 
                        $bmsmail = App\Bmsmail::addMailQueue(Auth::user()->id, 'emails.custom', $item->email, $priority, $body, $subject, $item->name);
                }
           }
       } else {
           Log::info("[Mail][customMail] no hay mails de éste tipo");
       }
    }
  
}