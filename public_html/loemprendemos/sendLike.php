<?PHP

include ''.dirname(__FILE__).'/conexioni.php';
include ''.dirname(__FILE__).'/Themes/default/languages/index.spanish_es-utf8.php';
include ''.dirname(__FILE__).'/funciones.php';

base_de_datos_utf_8($conn);
$obj = new stdClass();

if(isset($_POST["id_member"])){
  $id_member= base_de_datos_scape($conn,$_POST["id_member"]);
}
if(isset($_POST["id_member_name"])){
  $id_member_name= base_de_datos_scape($conn,$_POST["id_member_name"]);
}
if(isset($_POST["id_post"])){
  $id_post= base_de_datos_scape($conn,$_POST["id_post"]);
}
if(isset($_POST["id_member_profile"])){
  $id_member_profile= base_de_datos_scape($conn,$_POST["id_member_profile"]);
}
if(isset($_POST["id_member_profile_name"])){
  $id_member_profile_name= base_de_datos_scape($conn,$_POST["id_member_profile_name"]);
  if(empty($id_member_profile_name)){
    $query = $conn->query("SELECT real_name FROM loemprendemos_members WHERE id_member='".$id_member_profile."'") or die(mysqli_error($conn));
    $row=$query->fetch_assoc();
    $id_member_profile_name = $row['real_name'];
  }
}
if($id_member!="" && $id_post!="" && $id_member_name!="" && $id_member_profile!="" && $id_member_profile_name!=""){

  $obj->id_member= $id_member;

  $query = $conn->query("SELECT likes_users, id_topic, body, subject, poster_name, poster_email, body, id_member_poster, member_name_poster FROM loemprendemos_messages WHERE id_msg='".$id_post."'") or die(mysqli_error($conn));
  $row=$query->fetch_assoc();

  $likes_users = explode(",",$row['likes_users']);

  $existe = 0;
  foreach($likes_users AS $key => $user_id){
    if($user_id==$id_member){ 
      $existe = 1;
      unset($likes_users[$key]);
    }
  }

  foreach ($likes_users AS $k => $dummy)
    if ($dummy == '')
      unset($likes_users [$k]);

  if($existe==0){
    array_push($likes_users, $id_member);   
    $likes_users = implode(",",$likes_users); 
    $query = $conn->query("UPDATE loemprendemos_messages SET likes_users='".$likes_users."', likes=likes+1 WHERE id_msg='".$id_post."'") or die(mysqli_error($conn));
    if($query==1){
      $obj->response = "true";
      $obj->comment = "Like Enviado";
      
      if($id_member_profile!=$id_member){

              $mail_subject = ''.$txt['solicitud_conexion_subject3'].'';
              $liga_topic = 'http://'.$_SERVER['HTTP_HOST'].'/index.php?topic='.$row['id_topic'].';mail=4;send=topic';
	      $liga_profile = 'http://'.$_SERVER['HTTP_HOST'].'/index.php?action=profile;u='.$id_member_profile.';mail=4;send=profile';

              if($row['id_topic']==0){
	        $mail_body = ''.$txt['hello_member'].' '.$id_member_profile_name.'.\n\n'.$txt['solicitud_conexion1'].' '.$id_member_name.' '.$txt['solicitud_conexion11'].''.$row['body'].' \n\n'.$txt['solicitud_conexion12'].' '.$liga_profile.'\n\n'.$txt['solicitud_conexion5'].''.$mbname.'.';
              } else {
                $mail_body = ''.$txt['hello_member'].' '.$id_member_profile_name.'.\n\n'.$txt['solicitud_conexion1'].' '.$id_member_name.' '.$txt['solicitud_conexion11'].''.$row['subject'].' '.$liga_topic.'\n\n'.$txt['solicitud_conexion12'].' '.$liga_profile.'\n\n'.$txt['solicitud_conexion5'].''.$mbname.'.';
              }

	      $mail_header = getMailHeader($mbname, $webmaster_email, $mail_body);

	      $query = $conn->query("INSERT INTO loemprendemos_mail_queue (time_sent, recipient, body, subject, headers, send_html, priority, private) VALUES ('".time()."','".$row['poster_email']."','".$mail_body."','".$mail_subject."','".$mail_header."',1,2,1)") or die(mysqli_error($conn));
              
              
	
	      if($query==1){
	        //trigger queue_mail
	        $ch = curl_init('http://'.$_SERVER['HTTP_HOST'].'/index.php?scheduled=mailq');
                curl_setopt($ch,CURLOPT_RETURNTRANSFER, TRUE); //return the transfer to be later saved to a variable
	        $result = curl_exec($ch);
	
	         if($row['id_topic']==0){
	           $mail_body = ''.$txt['hello_member'].' '.$id_member_profile_name.'.\n\n'.$txt['solicitud_conexion1'].' '.$id_member_name.' '.$txt['solicitud_conexion11'].''.$row['body'].' \n\n'.$txt['solicitud_conexion12'].' '.$liga_profile.'\n\n';
                 } else {
                   $mail_body = ''.$txt['hello_member'].' '.$id_member_profile_name.'.\n\n'.$txt['solicitud_conexion1'].' '.$id_member_name.' '.$txt['solicitud_conexion11'].''.$row['subject'].' '.$liga_topic.'\n\n'.$txt['solicitud_conexion12'].' '.$liga_profile.'\n\n';
                 }
	
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
	
	      } else {
	        $obj->response = "true";
	      }
      }//fin if correo
    } else {
      $obj->response = "false";
      $obj->comment = "Error Intente Nuevamente";
    }
  } else {
    $likes_users = implode(",",$likes_users);
    $query = $conn->query("UPDATE loemprendemos_messages SET likes_users='".$likes_users."', likes=likes-1 WHERE id_msg='".$id_post."'") or die(mysqli_error($conn));
    if($query==1){
      $obj->response = "true";
      $obj->comment = "Quitar Like Enviado";
    } else {
      $obj->response = "false";
      $obj->comment = "Error Intente Nuevamente";
    }
  }

} else {
  $obj->response = "false";
  $obj->comment = "general if post validation";
}
echo json_encode($obj);
?>