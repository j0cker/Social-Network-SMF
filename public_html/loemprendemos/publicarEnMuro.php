<?PHP

include ''.dirname(__FILE__).'/conexioni.php';
include ''.dirname(__FILE__).'/Themes/default/languages/index.spanish_es-utf8.php';
include ''.dirname(__FILE__).'/funciones.php';

base_de_datos_utf_8($conn);

$obj = new stdClass();

if(isset($_POST["message"])){
  $message = base_de_datos_scape($conn,$_POST["message"]);
}
if(isset($_POST["name"])){
  $name= base_de_datos_scape($conn,$_POST["name"]);
}
if(isset($_POST["id_member"])){
  $id_member= base_de_datos_scape($conn,$_POST["id_member"]);
}
if(isset($_POST["id_member_profile"])){
  $id_member_profile= base_de_datos_scape($conn,$_POST["id_member_profile"]);
}
if(isset($_POST["name_profile"])){
  $name_profile= base_de_datos_scape($conn,$_POST["name_profile"]);
}

if($id_member!="" && $name!="" && $message!="" && $id_member_profile!="" && $name_profile!=""){

  $obj->id_member= $id_member;
  $obj->name= $name;
  $obj->message = $message;
  $obj->id_member_profile= $id_member_profile;
  $obj->name_profile= $name_profile;

  $query = $conn->query("SELECT email_address FROM loemprendemos_members WHERE id_member='".$id_member_profile."'") or die(mysqli_error($conn));
  $row3=$query->fetch_assoc();

  $query = $conn->query("SELECT email_address FROM loemprendemos_members WHERE id_member='".$id_member."'") or die(mysqli_error($conn));
  $row2=$query->fetch_assoc();

  $query = $conn->query("INSERT INTO loemprendemos_messages (id_topic, id_board, poster_time, id_member, id_msg_modified, subject, poster_name, poster_email, poster_ip, smileys_enabled, body, icon, approved, id_member_poster, member_name_poster) VALUES (0,0,'".time()."','".$id_member_profile."', '".$row['id_msg']."', '".$name."', '".$name."', '".$row2['email_address']."', '".$_SERVER['SERVER_ADDR']."',1,'".$message."', 'xx', 1, '".$id_member."','".$name."')") or die(mysqli_error($conn));

  if($query==1){

    $query = $conn->query("SELECT id_msg FROM loemprendemos_messages ORDER BY id_msg DESC") or die(mysqli_error($conn));
    $row=$query->fetch_assoc();
  
    $obj->last_id_msg = $row['id_msg'];

    $query = $conn->query("UPDATE loemprendemos_messages SET id_msg_modified='".$row['id_msg']."' WHERE id_msg='".$row['id_msg']."'") or die(mysqli_error($conn));
    if($query==1){
      $obj->response = "true";

      //send correo
      if($id_member_profile!=$id_member){

              $mail_subject = ''.$txt['solicitud_conexion_subject4'].'';
	      $liga_profile = 'http://'.$_SERVER['HTTP_HOST'].'/index.php?action=profile;u='.$id_member_profile.';mail=2;send=profile';

              $mail_body = ''.$txt['hello_member'].' '.$name_profile.'.\n\n'.$txt['solicitud_conexion1'].' '.$name.' '.$txt['solicitud_conexion13'].' \n\n'.$txt['solicitud_conexion14'].' '.$liga_profile.'\n\n'.$txt['solicitud_conexion5'].''.$mbname.'.';
	      $mail_header = getMailHeader($mbname, $webmaster_email, $mail_body);

	      $query = $conn->query("INSERT INTO loemprendemos_mail_queue (time_sent, recipient, body, subject, headers, send_html, priority, private) VALUES ('".time()."','".$row3['email_address']."','".$mail_body."','".$mail_subject."','".$mail_header."',1,2,1)") or die(mysqli_error($conn));
              
              
	
	      if($query==1){
	        //trigger queue_mail
	        $ch = curl_init('http://'.$_SERVER['HTTP_HOST'].'/index.php?scheduled=mailq');
                curl_setopt($ch,CURLOPT_RETURNTRANSFER, TRUE); //return the transfer to be later saved to a variable
	        //$result = curl_exec($ch);

	        $mail_body = ''.$txt['hello_member'].' '.$name_profile.'.\n\n'.$txt['solicitud_conexion1'].' '.$name.' '.$txt['solicitud_conexion13'].' \n\n'.$txt['solicitud_conexion14'].' '.$liga_profile.'\n\n';
	
	        //insert the message from the user that sends the like PM
	        $query = $conn->query("INSERT INTO loemprendemos_personal_messages (id_pm_head, id_member_from, deleted_by_sender, from_name, msgtime, subject, body) VALUES (0,".$id_member.",1,'".$id_member_name."','".time()."','".$mail_subject."','".$mail_body."')") or die(mysqli_error($conn));
	
	        //get the last id PM
	        $query = $conn->query("SELECT id_pm FROM loemprendemos_personal_messages ORDER BY id_pm DESC LIMIT 1") or die(mysqli_error($conn));
	        $id_pm = $query->fetch_assoc();
	
	        //update the last id PM
	        $query = $conn->query("UPDATE loemprendemos_personal_messages SET id_pm_head=".$id_pm['id_pm']." WHERE id_pm=".$id_pm['id_pm']."") or die(mysqli_error($conn));
	
	        //insert the message to the user that receive the like PM.
	        $query = $conn->query("INSERT INTO loemprendemos_pm_recipients (id_pm, id_member, labels, bcc, is_read, is_new, deleted) VALUES (".$id_pm['id_pm'].",".$id_member_profile.",-1,0,0,1,0)") or die(mysqli_error($conn));

                //Increment the new PM's number (solo se le manda al que le llega el +1)
                $query = $conn->query("UPDATE loemprendemos_members SET unread_messages=unread_messages+1 WHERE id_member=".$id_member_profile."") or die(mysqli_error($conn));
	
	        $obj->response = "true";
	        $obj->comment= "Se envió el mensaje invitación por correo";
	
	      } else {
	        $obj->response = "true";
	        $obj->comment= "else query no se inserto en la cola la invitación";
	      }
      }//fin if correo
    }
  } else {
    $obj->response = "false";
  }

} else {
  $obj->response = "false";
  $obj->comment = "general if post validation";
}
echo json_encode($obj);
?>