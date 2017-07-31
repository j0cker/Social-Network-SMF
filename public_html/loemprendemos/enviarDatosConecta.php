<?PHP

include ''.dirname(__FILE__).'/conexioni.php';
include ''.dirname(__FILE__).'/Themes/default/languages/index.spanish_es-utf8.php';
include ''.dirname(__FILE__).'/funciones.php';


base_de_datos_utf_8($conn);

$obj = new stdClass();

if(isset($_POST["id_send"])){
  $id_send = strtoupper(base_de_datos_scape($conn,$_POST["id_send"]));
}
if(isset($_POST["id_member"])){
  $id_member= base_de_datos_scape($conn,$_POST["id_member"]);
}

if($id_member!="" && $id_send!=""){

  $obj->idSend = $id_send;

  $query_id_send = $conn->query("SELECT * FROM loemprendemos_members WHERE id_member='".$id_send."'") or die(mysqli_error($conn));
  $row_id_send=$query_id_send->fetch_assoc();
  $query_id_member = $conn->query("SELECT * FROM loemprendemos_members WHERE id_member='".$id_member."'") or die(mysqli_error($conn));
  $row_id_member=$query_id_member->fetch_assoc();

$entra = 0;
$entra2 = 0;
$entra3 = 0;
$buddy_list_array_2 = explode(",",$row_id_member['buddy_pending']);
foreach($buddy_list_array_2 AS $key => $buddy_2){
  if($buddy_2==$id_send){
    $entra=1;
  }
}

$buddy_list_array_2 = explode(",",$row_id_member['buddy_list']);
foreach($buddy_list_array_2 AS $key => $buddy_2){
  if($buddy_2==$id_send){
    $entra2=1;
  }
}

$buddy_list_array_2 = explode(",",$row_id_send['buddy_pending']);
foreach($buddy_list_array_2 AS $key => $buddy_2){
  if($buddy_2==$id_member){
    $entra3=1;
  }
}

  //si no está la solicitud en pendiente y no es conexión u amigo del solicitante
  if($entra==0 && $entra2==0){

    //si al que se quiere mandar la solicitud a mandado una solicitud anterior
    if($entra2==1){
      //hacer amigos
    } else {
     	    //mandar solicitud del solicitante

	    //limpia basura y explota el string en arreglo
	    $buddiesArray = explode(',', $row_id_member['buddy_pending']);
		foreach ($buddiesArray as $k => $dummy)
			if ($dummy == '')
				unset($buddiesArray[$k]);
	    
	    //agregamos al arreglo el usuario
	    array_push($buddiesArray,$id_send);
	
	    //pasamalos el arreglo a string
	    $buddiesString = implode(',', $buddiesArray); 
	
	    $query = $conn->query("UPDATE loemprendemos_members SET buddy_pending='".$buddiesString."' WHERE id_member='".$id_member."'") or die(mysqli_error($conn));
	
	    if($query==1){
	      $obj->response = "true";
	      $mail_subject = ''.$txt['solicitud_conexion_subject'].'';
	      $liga_add_buddy = 'http://'.$_SERVER['HTTP_HOST'].'/profile/?area=lists;sa=buddies;u='.$id_send.';add='.$id_member.';mail=1;send=addBuddy';
	      $liga_profile = 'http://'.$_SERVER['HTTP_HOST'].'/index.php?action=profile;u='.$id_member.';mail=1;send=profile';
	      $mail_body = ''.$txt['hello_member'].' '.$row_id_send["real_name"].'.\n\n'.$txt['solicitud_conexion1'].' '.$row_id_member['real_name'].' '.$txt['solicitud_conexion2'].' '.$liga_add_buddy.' '.$txt['solicitud_conexion3'].' '.$liga_profile.'\n\n'.$txt['solicitud_conexion4'].'\n\n'.$txt['solicitud_conexion5'].''.$mbname.'.';
	      $mail_header = getMailHeader($mbname, $webmaster_email, $mail_body);

	      $query = $conn->query("INSERT INTO loemprendemos_mail_queue (time_sent, recipient, body, subject, headers, send_html, priority, private) VALUES ('".time()."','".$row_id_send['email_address']."','".$mail_body."','".$mail_subject."','".$mail_header."',1,2,1)") or die(mysqli_error($conn));
              
              
	
	      if($query==1){
	        //trigger queue_mail
	        $ch = curl_init('http://'.$_SERVER['HTTP_HOST'].'/index.php?scheduled=mailq');
                curl_setopt($ch,CURLOPT_RETURNTRANSFER, TRUE); //return the transfer to be later saved to a variable
	        $result = curl_exec($ch);
	
	        $mail_body = ''.$txt['hello_member'].' '.$row_id_send["real_name"].'.\n\n'.$txt['solicitud_conexion1'].' '.$row_id_member['real_name'].' '.$txt['solicitud_conexion2'].' '.$liga_add_buddy.' '.$txt['solicitud_conexion3'].' '.$liga_profile.'';
	
	        //insert the message from the user that request conection PM
	        $query = $conn->query("INSERT INTO loemprendemos_personal_messages (id_pm_head, id_member_from, deleted_by_sender, from_name, msgtime, subject, body) VALUES (0,".$id_member.",1,'".$row_id_member['real_name']."','".time()."','".$mail_subject."','".$mail_body."')") or die(mysqli_error($conn));
	
	        //get the last id PM
	        $query = $conn->query("SELECT id_pm FROM loemprendemos_personal_messages ORDER BY id_pm DESC LIMIT 1") or die(mysqli_error($conn));
	        $id_pm = $query->fetch_assoc();
	
	        //update the last id PM
	        $query = $conn->query("UPDATE loemprendemos_personal_messages SET id_pm_head=".$id_pm['id_pm']." WHERE id_pm=".$id_pm['id_pm']."") or die(mysqli_error($conn));
	
	        //insert the message to the user that receive the request conection PM.
	        $query = $conn->query("INSERT INTO loemprendemos_pm_recipients (id_pm, id_member, labels, bcc, is_read, is_new, deleted) VALUES (".$id_pm['id_pm'].",".$id_send.",-1,0,0,1,0)") or die(mysqli_error($conn));

                //Increment the new PM's number (solo se le manda al que le llega el +1)
                $query = $conn->query("UPDATE loemprendemos_members SET unread_messages=unread_messages+1 WHERE id_member=".$id_send."") or die(mysqli_error($conn));
	
	        $obj->response = "true";
	        $obj->comment= "Se envió el mensaje invitación por correo";
	
	      } else {
	        $obj->response = "true";
	        $obj->comment= "else query no se inserto en la cola la invitación";
	      }
	
	    } else {
	      $obj->response = "false";
	      $obj->comment = "else query add buddy";
	    }
    }//fin else mandar solicitud  
  } else {
    $obj->response = "false";
    $obj->comment = "Ya son amigos o ya está la conexión en pendiente";
  }
} else {
  $obj->response = "false";
  $obj->comment = "general if post validation";
}
echo json_encode($obj);
?>