<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Lang;
use App;
use Config;
use Auth;
use Log;

class MailsLauncher extends Controller
{  

  public function mailsLauncher(){

    Log::info('[MailsLauncher][mailsLauncher]');

    $bmsmails = App\Bmsmail::orderBy('I_prioridad', 'asc')->limit(100)->get();

    $bmsmails = json_decode($bmsmails);

    if($bmsmails){
      Log::info('[MailsLauncher][mailsLauncher] Hay Mails para enviar');
      echo "Hay Mails para enviar";

      $c_mails = 0;

      foreach($bmsmails as $mail){

        if($mail->N_PLANTILLA=="emails.welcome"){

          Log::info('[MailsLauncher][mailsLauncher] Sending Welcome');

          $data['name'] = $mail->N_VAR1;
          $data['email'] = $mail->N_SEND_TO;
          $data['password'] = $mail->N_VAR2;
          $data['verification_code'] = $mail->N_VAR3;

          $mail_send = new \App\library\classes\sendMails($data);
          $mail_send->welcome();
          App\Bmsmail::where('I_MAIL', $mail->I_MAIL)->delete();
          $c_mails++;
        } else if($mail->N_PLANTILLA=="emails.reset"){

          Log::info('[MailsLauncher][mailsLauncher] Sending Reset');

          $data['email'] = $mail->N_SEND_TO;
          $data['password'] = $mail->N_VAR2;

          $mail_send = new \App\library\classes\sendMails($data);
          $mail_send->reset();
          App\Bmsmail::where('I_MAIL', $mail->I_MAIL)->delete();
          $c_mails++;
        } else if($mail->N_PLANTILLA=="emails.verification"){

          Log::info('[MailsLauncher][mailsLauncher] Sending Verification');

          $data['email'] = $mail->N_SEND_TO;
          $data['name'] = $mail->N_VAR1;
          $data['mail_previous'] = $mail->N_VAR2;

          $mail_send = new \App\library\classes\sendMails($data);
          $mail_send->verificationCompare();
          App\Bmsmail::where('I_MAIL', $mail->I_MAIL)->delete();
          $c_mails++;
        } else if($mail->N_PLANTILLA=="emails.password"){

          Log::info('[MailsLauncher][mailsLauncher] Sending Password');

          $data['email'] = $mail->N_SEND_TO;
          $data['pswd'] = $mail->N_VAR2;

          $mail_send = new \App\library\classes\sendMails($data);
          $mail_send->newPassword();
          App\Bmsmail::where('I_MAIL', $mail->I_MAIL)->delete();
          $c_mails++;
        } else if($mail->N_PLANTILLA=="emails.custom"){

          Log::info('[MailsLauncher][mailsLauncher] Sending Custom');

          $data['email'] = $mail->N_SEND_TO;
          $data['subject'] = $mail->N_VAR1;
          $data['body'] = $mail->N_VAR2;
          $data['name'] = $mail->N_VAR3;
          try {
            $mail_send = new \App\library\classes\sendMails($data);
            $mail_send->customMail();
          } catch(\Exception $e){
            Log::info('[MailsLauncher][mailsLauncher] ERROR: '.$e.' '.$data['email'].'');
          }
          App\Bmsmail::where('I_MAIL', $mail->I_MAIL)->delete();
          $c_mails++;
        } else if($mail->N_PLANTILLA=="emails.single"){

          Log::info('[MailsLauncher][mailsLauncher] Sending Single');

          $data['email'] = $mail->N_SEND_TO;
          $data['body'] = $mail->N_VAR1;
          $data['subject'] = $mail->N_VAR2;
          $data['name'] = $mail->N_VAR3;

          $mail_send = new \App\library\classes\sendMails($data);
          try {
            $mail_send->singleMailUnique();
          } catch(\Exception $e){
            Log::error("[MailsLauncher][mailsLauncher] Error: ".$data['email']."");
          }
          App\Bmsmail::where('I_MAIL', $mail->I_MAIL)->delete();
          $c_mails++;
        }
      }//fin foreach
      Log::info("[MailsLauncher][mailsLauncher] Total enviados: ".$c_mails."");
      echo "<br />";
      echo "Total enviados: ".$c_mails."";

    } else {
      Log::info('[MailsLauncher][mailsLauncher] No hay Mails para enviar');
      echo "No hay Mails para enviar";
    }
    
  }

}
