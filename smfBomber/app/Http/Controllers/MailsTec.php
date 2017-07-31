<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Lang;
use App;
use Config;
use Auth;
use Log;

class MailsTec extends Controller
{  

    public function __construct(){
    }

    public function completarCadena($generador){
      $generador_string = "".$generador."";
      Log::info('[MailsLauncher][completarCadena] Antes While '.strlen($generador_string).' '.$generador_string.'');
      
      while(strlen($generador_string)<5){
        $generador_string = "0".$generador_string."";
      }
      
      Log::info('[MailsLauncher][completarCadena] Despues While'.strlen($generador_string).' '.$generador_string.'');
      
      return $generador_string;
    }

    public function massiveInsertTecMails(){
        Log::info('[MailsLauncher][massiveInsertTecMails]');
       

        $subject = "Invitación a la nueva comunidad emprendedora.";
        $body = 'Nos complace invitarte a la nueva comunidad emprendedora, donde podrás conectar y compartir con diferentes emprendedores.<br /><br />Puedes entrar a la nueva comunidad desde la siguiente liga <a href="http://loemprendemos.com">http://loemprendemos.com</a> para poder ayudar con nuevo conocimiento a ésta nueva comunidad emprendedora.<br /><br />¡Muchas Felicidades!<br /><br />Esperamos tu retroalimentación para poder ir mejorando nuestros servicios a los emprendedores.';
        $prioridad = 7;
        
        //del 33182 al 00000
        
        $generador = 33182;
        
        while($this->completarCadena($generador)!="00000"){
         
          $mail = "a013".$this->completarCadena($generador)."@itesm.mx";

          $bmsmail = App\Bmsmail::addMailQueue(0, 'emails.custom', $mail, $prioridad, $subject, $body, "");
          $generador--;
        }
    }
    

}
?>