<?PHP

include ''.dirname(__FILE__).'/conexioni.php';
include ''.dirname(__FILE__).'/Themes/default/languages/index.spanish_es-utf8.php';
include ''.dirname(__FILE__).'/funciones.php';

base_de_datos_utf_8($conn);
function addMessageProject($conn, $id_member, $project_name, $real_name, $email_address, $description, $id_project, $imageUrlProject){

      $query = $conn->query("INSERT INTO `loemprendemos_messages`(`id_topic`, `id_board`, `poster_time`, `id_member`, `id_msg_modified`, `subject`, `poster_name`, `poster_email`, `poster_ip`, `smileys_enabled`, `body`, `icon`, `approved`, `id_member_poster`, `member_name_poster`, `id_project`) VALUES ('0','0','".time()."','".$id_member."','0','".$project_name."','".$real_name."','".$email_address."','".$_SERVER['SERVER_ADDR']."','1','<center><img src=".$imageUrlProject." class=bbc_img /></center><br /><br />".$description."','xx','1','".$id_member."','".$real_name."','".$id_project."')") or die(mysqli_error($conn));

      if($query==1){
            $query = $conn->query("SELECT id_msg FROM loemprendemos_messages ORDER BY id_msg DESC") or die(mysqli_error($conn));
            $row=$query->fetch_assoc();

            $query = $conn->query("UPDATE loemprendemos_messages SET id_msg_modified='".$row['id_msg']."' WHERE id_msg='".$row['id_msg']."'") or die(mysqli_error($conn));
      }

      
}
function sendMailsProyectos($mails, $id_member, $real_name, $nameProject, $id_project, $mbname, $webmaster_email, $conn, $txt, $new = 1){
  //falta generar un correo para el miembro que creó el proyecto
  foreach($mails AS $key => $value){
    if($value['id_member']!=$id_member){
	      $mail_subject = ''.$txt['solicitud_conexion_subject5'].'';
	      $liga_project = 'http://'.$_SERVER['HTTP_HOST'].'/index.php?action=project;request=see;project='.$id_project.';mail=5;send=project';
	      $liga_profile = 'http://'.$_SERVER['HTTP_HOST'].'/index.php?action=profile;u='.$id_member.';mail=5;send=profile';
              if($new==1){
                //mail nuevo proyecto
	        $mail_body = ''.$txt['hello_member'].' '.$value['real_name'].'.\n\n'.$txt['solicitud_conexion17'].' '.$real_name.' '.$txt['solicitud_conexion22'].' '.$nameProject.' '.$txt['solicitud_conexion21'].' '.$value['tipo'].'. '.$txt['solicitud_conexion25'].'\n\n'.$txt['solicitud_conexion23'].' '.$liga_project.'\n\n'.$txt['solicitud_conexion12'].' '.$liga_profile.'\n\n'.$txt['solicitud_conexion5'].''.$mbname.'.';
              } else {
                //modificación proyecto
	        $mail_body = ''.$txt['hello_member'].' '.$value['real_name'].'.\n\n'.$real_name.' '.$txt['solicitud_conexion24'].' '.$nameProject.'. '.$txt['solicitud_conexion25'].' \n\n'.$txt['solicitud_conexion23'].' '.$liga_project.'\n\n'.$txt['solicitud_conexion12'].' '.$liga_profile.'\n\n'.$txt['solicitud_conexion5'].''.$mbname.'.';
              }
	      $mail_header = getMailHeader($mbname, $webmaster_email, $mail_body);

	      $query = $conn->query("INSERT INTO loemprendemos_mail_queue (time_sent, recipient, body, subject, headers, send_html, priority, private) VALUES ('".time()."','".$value['email_address']."','".$mail_body."','".$mail_subject."','".$mail_header."',1,2,1)") or die(mysqli_error($conn));
             
	      if($query==1){
	        //trigger queue_mail
	        $ch = curl_init('http://'.$_SERVER['HTTP_HOST'].'/index.php?scheduled=mailq');
                curl_setopt($ch,CURLOPT_RETURNTRANSFER, TRUE); //return the transfer to be later saved to a variable
	        $result = curl_exec($ch);
	
	        $mail_body = ''.$txt['hello_member'].' '.$value['real_name'].'.\n\n '.$txt['solicitud_conexion17'].' '.$real_name.' '.$txt['solicitud_conexion22'].' '.$nameProject.' '.$txt['solicitud_conexion21'].' '.$value['tipo'].'\n\n'.$txt['solicitud_conexion23'].' '.$liga_project.'\n\n'.$txt['solicitud_conexion12'].' '.$liga_profile.'.';
	
	        //insert the message from the user that request conection PM
	        $query = $conn->query("INSERT INTO loemprendemos_personal_messages (id_pm_head, id_member_from, deleted_by_sender, from_name, msgtime, subject, body) VALUES (0,".$id_member.",1,'".$real_name."','".time()."','".$mail_subject."','".$mail_body."')") or die(mysqli_error($conn));
	
	        //get the last id PM
	        $query = $conn->query("SELECT id_pm FROM loemprendemos_personal_messages ORDER BY id_pm DESC LIMIT 1") or die(mysqli_error($conn));
	        $id_pm = $query->fetch_assoc();
	
	        //update the last id PM
	        $query = $conn->query("UPDATE loemprendemos_personal_messages SET id_pm_head=".$id_pm['id_pm']." WHERE id_pm=".$id_pm['id_pm']."") or die(mysqli_error($conn));
	
	        //insert the message to the user that receive the request conection PM.
	        $query = $conn->query("INSERT INTO loemprendemos_pm_recipients (id_pm, id_member, labels, bcc, is_read, is_new, deleted) VALUES (".$id_pm['id_pm'].",".$value['id_member'].",-1,0,0,1,0)") or die(mysqli_error($conn));

                //Increment the new PM's number (solo se le manda al que le llega el +1)
                $query = $conn->query("UPDATE loemprendemos_members SET unread_messages=unread_messages+1 WHERE id_member=".$value['id_member']."") or die(mysqli_error($conn));

              }//fin if query==1
    }//fin if
  }//fin foreach
  
}//fin sendMailsProyectos

function sendMailsProyectosInvitation($mails, $real_name, $nameProject, $id_project, $mbname, $webmaster_email, $conn, $txt){
  foreach($mails AS $key => $value){
    if($value['id_member']!=$id_member){
	      $mail_subject = ''.$txt['solicitud_conexion_subject5'].'';
	      $liga_project = 'http://'.$_SERVER['HTTP_HOST'].'/index.php?action=project;request=see;project='.$id_project.';mail=5;send=project';
	      $liga_profile = 'http://'.$_SERVER['HTTP_HOST'].'/index.php?action=profile;u='.$id_member.';mail=5;send=profile';
	      $mail_body = ''.$txt['hello_member'].'.\n\n'.$txt['solicitud_conexion17'].''.$real_name.' '.$txt['solicitud_conexion22'].' '.$nameProject.'. '.$txt['solicitud_conexion26'].'\n\n'.$txt['solicitud_conexion23'].' '.$liga_project.'.\n\n'.$txt['solicitud_conexion12'].' '.$liga_profile.'\n\n'.$txt['solicitud_conexion5'].''.$mbname.'.';
	      $mail_header = getMailHeader($mbname, $webmaster_email, $mail_body);

	      $query = $conn->query("INSERT INTO loemprendemos_mail_queue (time_sent, recipient, body, subject, headers, send_html, priority, private) VALUES ('".time()."','".$value."','".$mail_body."','".$mail_subject."','".$mail_header."',1,2,1)") or die(mysqli_error($conn));
    }//fin $value['id_member']!=$id_member
  }//fin foreach
}// fin function sendMailsProyectosInvitation

$obj = new stdClass();

if(isset($_POST["nameProject"])){
  $nameProject= base_de_datos_scape($conn,$_POST["nameProject"]);
}
if(isset($_POST["imageUrlProject"])){
  $imageUrlProject= base_de_datos_scape($conn,$_POST["imageUrlProject"]);
}
if(isset($_POST["location"])){
  $location= base_de_datos_scape($conn,$_POST["location"]);
}
if(isset($_POST["description"])){
  $description= base_de_datos_scape($conn,$_POST["description"]);
}
if(isset($_POST["category"])){
  $category= base_de_datos_scape($conn,$_POST["category"]);
}
if(isset($_POST["foundedTime"])){
  $foundedTime= base_de_datos_scape($conn,$_POST["foundedTime"]);
}
if(isset($_POST["lookingFor"])){
  $lookingFor= base_de_datos_scape($conn,$_POST["lookingFor"]);
}
if(isset($_POST["employees"])){
  $employees= base_de_datos_scape($conn,$_POST["employees"]);
}
if(isset($_POST["founderList"])){
  $founderList= base_de_datos_scape($conn,$_POST["founderList"]);
}
if(isset($_POST["mentorList"])){
  $mentorList= base_de_datos_scape($conn,$_POST["mentorList"]);
}
if(isset($_POST["contributorList"])){
  $contributorList= base_de_datos_scape($conn,$_POST["contributorList"]);
}
if(isset($_POST["website"])){
  $website= base_de_datos_scape($conn,$_POST["website"]);
}
if(isset($_POST["facebookFanPage"])){
  $facebookFanPage= base_de_datos_scape($conn,$_POST["facebookFanPage"]);
}
if(isset($_POST["twitter"])){
  $twitter= base_de_datos_scape($conn,$_POST["twitter"]);
}
if(isset($_POST["linkedin"])){
  $linkedin= base_de_datos_scape($conn,$_POST["linkedin"]);
}
if(isset($_POST["androidApp"])){
  $androidApp= base_de_datos_scape($conn,$_POST["androidApp"]);
}
if(isset($_POST["iosApp"])){
  $iosApp= base_de_datos_scape($conn,$_POST["iosApp"]);
}
if(isset($_POST["emailList"])){
  $emailList= base_de_datos_scape($conn,$_POST["emailList"]);
}
if(isset($_POST["id_member"])){
  $id_member= base_de_datos_scape($conn,$_POST["id_member"]);
}
if(isset($_POST["action"])){
  $action= base_de_datos_scape($conn,$_POST["action"]);
}
if(isset($_POST["id_project"])){
  $id_project= base_de_datos_scape($conn,$_POST["id_project"]);
}

if($action!=""){

  $obj->nameProjectFront= $nameProject;
  $obj->imageUrlProjectFront= $imageUrlProject;
  $obj->locationFront= $location;
  $obj->descriptionFront= $description;
  $obj->categoryFront= $category;
  $obj->foundedTimeFront= $foundedTime;
  $obj->lookingForFront= $lookingFor;
  $obj->employeesFront= $employees;
  $obj->founderListFront= $founderList;
  $obj->mentorListFront= $mentorList;
  $obj->contributorListFront= $contributorList;
  $obj->websiteFront= $website;
  $obj->facebookFanPageFront= $facebookFanPage;
  $obj->twitterFront= $twitter;
  $obj->linkedinFront= $linkedin;
  $obj->androidAppFront= $androidApp;
  $obj->iosAppFront= $iosApp;
  $obj->emailListFront= $emailList;
  $obj->id_memberFront= $id_member;
  $obj->actionFront= $action;

  if($action==1){
    //insert
    if($nameProject!="" && $imageUrlProject!="" && $location!="" && $description!="" && $category!="" && $employees!="" && $founderList!="" && $id_member!=""){

      $query = $conn->query("SELECT `real_name`,`email_address`  FROM loemprendemos_members WHERE id_member='".$id_member."'") or die(mysqli_error($conn));
      $row = $query->fetch_assoc();
      $real_name = $row['real_name'];

      $query = $conn->query("INSERT INTO `loemprendemos_projects`(`description`, `project_name`, `category`, `image`, `created_time`, `modified_time`, `created_by`, `modified_by`, `founded_time`, `contributor_list`, `founder_list`, `looking_for`, `employees`, `mentor_list`, `location`, `website`, `facebook_fanpage`, `twitter`, `linkedin`, `app_android`, `app_ios`) VALUES ('".$description."','".$nameProject."','".$category."','".$imageUrlProject."','".time()."','".time()."','".$id_member."','".$id_member."','".$foundedTime."','".$contributorList."','".$founderList."','".$lookingFor."','".$employees."','".$mentorList."','".$location."','".$website."','".$facebookFanPage."','".$twitter."','".$linkedin."','".$androidApp."','".$iosApp."')") or die(mysqli_error($conn));

      
      //get the last id porject
      $query2 = $conn->query("SELECT id_project FROM loemprendemos_projects ORDER BY id_project DESC LIMIT 1") or die(mysqli_error($conn));
      $id_project = $query2->fetch_assoc();


      //agrega proyecto a base de datos de mensajes
      addMessageProject($conn, $id_member, $nameProject, $real_name, $row['email_address'], $description, $id_project['id_project'], $imageUrlProject);

      if($query==1 && $query2==1){
        $obj->response = "true";
    
        //mandar mail a todos los mentores, fundadores, contribuidores de creación e invitación al proyecto (únicamente en la inserción).
        
        $mail = array();
        $c=0;

        if($founderList!=""){
          //founder list 
          $query = $conn->query("SELECT `id_member`,`real_name`,`email_address` FROM loemprendemos_members WHERE id_member IN (".$founderList.")");
          while($row = $query->fetch_assoc()){
            $mail[$c] = array();
            $mail[$c]['real_name'] = $row['real_name'];
            $mail[$c]['email_address'] = $row['email_address'];
            $mail[$c]['id_member'] = $row['id_member'];
            $mail[$c]['tipo'] = $txt['solicitud_conexion18'];
            $c++;
          }
        }//fin if($founderList!="")
 
        if($mentorList!=""){
          //mentor list 
          $query = $conn->query("SELECT `id_member`,`real_name`,`email_address` FROM loemprendemos_members WHERE id_member IN (".$mentorList.")");
          while($row = $query->fetch_assoc()){
            $mail[$c] = array();
            $mail[$c]['real_name'] = $row['real_name'];
            $mail[$c]['email_address'] = $row['email_address'];
            $mail[$c]['id_member'] = $row['id_member'];
            $mail[$c]['tipo'] = $txt['solicitud_conexion19'];
            $c++;
          }
        }//fin mentorList
 
        if($contributorList!=""){
          //contributor list 
          $query = $conn->query("SELECT `id_member`,`real_name`,`email_address` FROM loemprendemos_members WHERE id_member IN (".$contributorList.")");
          while($row = $query->fetch_assoc()){
            $mail[$c] = array();
            $mail[$c]['real_name'] = $row['real_name'];
            $mail[$c]['email_address'] = $row['email_address'];
            $mail[$c]['id_member'] = $row['id_member'];
            $mail[$c]['tipo'] = $txt['solicitud_conexion20'];
            $c++;
          }
        }//fin contributorList

        sendMailsProyectos($mail, $id_member, $real_name, $nameProject, $id_project['id_project'], $mbname, $webmaster_email, $conn, $txt, 1);

        //mandar invitación a los correos

        $emailList = explode(",",trim($emailList));
        sendMailsProyectosInvitation($emailList, $real_name, $nameProject, $id_project['id_project'], $mbname, $webmaster_email, $conn, $txt);
   
      } else {
        $obj->response = "false";
        $obj->comment = "Hubo un Error al crear su proyecto, inténtelo nuevamente.";
      }
    } else {
      $obj->response = "false";
      $obj->comment = "No están todos los campos requeridos.";
    }
  } else if($action==2) {
    //update

    if($id_project!=""){
      if($nameProject!="" && $imageUrlProject!="" && $location!="" && $description!="" && $category!="" && $employees!="" && $founderList!="" && $id_member!=""){

        $query = $conn->query("UPDATE `loemprendemos_projects` SET `description`='".$description."',`project_name`='".$nameProject."',`category`='".$category."',`image`='".$imageUrlProject."',`modified_time`='".time()."',`modified_by`='".$id_member."',`founded_time`='".$foundedTime."',`contributor_list`='".$contributorList."',`founder_list`='".$founderList."',`looking_for`='".$lookingFor."',`employees`='".$employees."',`mentor_list`='".$mentorList."',`location`='".$location."',`website`='".$website."',`facebook_fanpage`='".$facebookFanPage."',`twitter`='".$twitter."',`linkedin`='".$linkedin."',`app_android`='".$androidApp."',`app_ios`='".$iosApp."' WHERE `id_project`='".$id_project."'") or die(mysqli_error($conn));

      $query2 = $conn->query("SELECT `real_name` FROM loemprendemos_members WHERE id_member='".$id_member."'") or die(mysqli_error($conn));
      $row = $query2->fetch_assoc();
      $real_name = $row['real_name'];

        $obj->response = "true";        

        if($query==1){

        //mandar mail a todos los mentores, fundadores, contribuidores de creación e invitación al proyecto
        
        $mail = array();
        $c=0;

        if($founderList!=""){
          //founder list 
          $query = $conn->query("SELECT `id_member`,`real_name`,`email_address` FROM loemprendemos_members WHERE id_member IN (".$founderList.")");
          while($row = $query->fetch_assoc()){
            $mail[$c] = array();
            $mail[$c]['real_name'] = $row['real_name'];
            $mail[$c]['email_address'] = $row['email_address'];
            $mail[$c]['id_member'] = $row['id_member'];
            $mail[$c]['tipo'] = $txt['solicitud_conexion18'];
            $c++;
          }
        }//fin if($founderList!="")
 
        if($mentorList!=""){
          //mentor list 
          $query = $conn->query("SELECT `id_member`,`real_name`,`email_address` FROM loemprendemos_members WHERE id_member IN (".$mentorList.")");
          while($row = $query->fetch_assoc()){
            $mail[$c] = array();
            $mail[$c]['real_name'] = $row['real_name'];
            $mail[$c]['email_address'] = $row['email_address'];
            $mail[$c]['id_member'] = $row['id_member'];
            $mail[$c]['tipo'] = $txt['solicitud_conexion19'];
            $c++;
          }
        }//fin mentorList
 
        if($contributorList!=""){
          //contributor list 
          $query = $conn->query("SELECT `id_member`,`real_name`,`email_address` FROM loemprendemos_members WHERE id_member IN (".$contributorList.")");
          while($row = $query->fetch_assoc()){
            $mail[$c] = array();
            $mail[$c]['real_name'] = $row['real_name'];
            $mail[$c]['email_address'] = $row['email_address'];
            $mail[$c]['id_member'] = $row['id_member'];
            $mail[$c]['tipo'] = $txt['solicitud_conexion20'];
            $c++;
          }
        }//fin contributorList

        sendMailsProyectos($mail, $id_member, $real_name, $nameProject, $id_project, $mbname, $webmaster_email, $conn, $txt, 2);

        //mandar invitación a los correos

        $emailList = explode(",",trim($emailList));
        sendMailsProyectosInvitation($emailList, $real_name, $nameProject, $id_project, $mbname, $webmaster_email, $conn, $txt);
   

        } else {
          $obj->response = "false";
          $obj->comment = "Hubo un Error al modificar su proyecto, inténtelo nuevamente.";
        }

      } else {
        $obj->response = "false";
        $obj->comment = "No están todos los campos requeridos.";
      }
    } else {
      $obj->response = "false";
      $obj->comment = "No se sabe a que proyecto consultar.";
    }
  } else if($action==3) {

    $obj->projectsList = array();

    //consulta sencilla
    $query = $conn->query("SELECT p.`description`, p.`project_name`, p.`category`, p.`image`, p.`created_time`, 
                                  p.`modified_time`, p.`created_by`, p.`id_project`, p.`created_by`, p.`founder_list`, m.real_name
                           FROM `loemprendemos_projects` as p
                           INNER JOIN loemprendemos_members as m
                           ON p.created_by=m.id_member
                           ORDER BY p.created_time DESC") or die(mysqli_error($conn));
    
    $c=0;
    while($row=$query->fetch_assoc()){

      $founder_list = explode(",",$row['founder_list']);
      $mod = 0;
      foreach($founder_list AS $key => $founder_value){
        if($founder_value==$id_member){
          $mod = 1;
        }
      }
      if($row['created_by']==$id_member){
        $mod = 1;
      }

      $obj->projectsList[$c]['description'] = $row['description'];
      $obj->projectsList[$c]['project_name'] = $row['project_name'];
      $obj->projectsList[$c]['category'] = $row['category'];
      $obj->projectsList[$c]['image'] = $row['image'];
      $obj->projectsList[$c]['created_time'] = date("d-m-Y H:s",$row['created_time']);
      $obj->projectsList[$c]['modified_time'] = $row['modified_time'];
      $obj->projectsList[$c]['created_by'] = $row['created_by'];
      $obj->projectsList[$c]['id_project'] = $row['id_project'];
      $obj->projectsList[$c]['real_name'] = $row['real_name'];
      $obj->projectsList[$c]['mod_project'] = $mod;
      $c++;
    }
    if($c==0){
      $obj->response = "null";
      $obj->comment = "No hay Datos.";
    } else {
      $obj->response = "true";
    }
  } else if($action==4) {
    //consulta amplia
    if($id_project!=""){
      $query = $conn->query("SELECT p.`id_project`, p.`description`, p.`project_name`, p.`category`, p.`image`, p.`created_time`, p.`modified_time`, p.`created_by`, p.`modified_by`, 
                                    p.`founded_time`, p.`contributor_list`, p.`founder_list`, p.`looking_for`, p.`employees`, p.`mentor_list`, p.`location`, p.`website`, 
                                    p.`facebook_fanpage`, p.`twitter`, p.`linkedin`, p.`app_android`, p.`app_ios`, m.real_name
                             FROM `loemprendemos_projects` as p
                             INNER JOIN loemprendemos_members as m
                             ON p.created_by=m.id_member
                             WHERE id_project='".$id_project."'") or die(mysqli_error($conn));
      $row=$query->fetch_assoc();

      $obj->response = "true";

      $founder_list = explode(",",$row['founder_list']);
      $mod = 0;
      foreach($founder_list AS $key => $founder_value){
        if($founder_value==$id_member){
          $mod = 1;
        }
      }
      if($row['created_by']==$id_member){
        $mod = 1;
      }

      $obj->id_project = $row['id_project'];
      $obj->description = $row['description'];
      $obj->project_name = $row['project_name'];
      $obj->category = $row['category'];
      $obj->image = $row['image'];
      $obj->created_time = date("d-m-Y H:s",$row['created_time']);
      $obj->modified_time = $row['modified_time'];
      $obj->created_by = $row['created_by'];
      $obj->modified_by = $row['modified_by'];
      $obj->founded_time = $row['founded_time'];
      $obj->contributor_list = $row['contributor_list'];
      $obj->founder_list = $row['founder_list'];
      $obj->looking_for = $row['looking_for'];
      $obj->employees = $row['employees'];
      $obj->mentor_list = $row['mentor_list'];
      $obj->location = $row['location'];
      $obj->website = $row['website'];
      $obj->facebook_fanpage = $row['facebook_fanpage'];
      $obj->twitter = $row['twitter'];
      $obj->linkedin = $row['linkedin'];
      $obj->app_android = $row['app_android'];
      $obj->app_ios = $row['app_ios'];
      $obj->real_name = $row['real_name'];
      $obj->mod_project = $mod;

      $founder_list_name = array();
      $mentor_list_name = array();
      $contributor_list_name = array();

      $founder_list_query = $row['founder_list'];

      //get all names
      if($founder_list_query!=""){
        $query = $conn->query("SELECT `real_name` FROM `loemprendemos_members` WHERE `id_member` IN (".$founder_list_query.")") or die(mysqli_error($conn));
        while($row2=$query->fetch_assoc()){
          $founder_list_name[] = $row2['real_name'];
        }
      }
      
      $obj->founder_list_name = implode(",",$founder_list_name);
      $obj->founder_list_name_array = $founder_list_name;
      $obj->founder_list_array = explode(",",$row['founder_list']);

      $mentor_list_query = $row['mentor_list'];

      //get all names
      if($mentor_list_query!=""){
        $query = $conn->query("SELECT `real_name` FROM `loemprendemos_members` WHERE `id_member` IN (".$mentor_list_query.")") or die(mysqli_error($conn));
        while($row2=$query->fetch_assoc()){
          $mentor_list_name[] = $row2['real_name'];
        }
      }
      
      $obj->mentor_list_name= implode(",",$mentor_list_name);
      $obj->mentor_list_name_array = $mentor_list_name;
      $obj->mentor_list_array = explode(",",$row['mentor_list']);

      $contributor_list_query = $row['contributor_list'];

      //get all names
      if($contributor_list_query !=""){
        $query = $conn->query("SELECT `real_name` FROM `loemprendemos_members` WHERE `id_member` IN (".$contributor_list_query.")") or die(mysqli_error($conn));
        while($row2=$query->fetch_assoc()){
          $contributor_list_name[] = $row2['real_name'];
        }
      }
      
      $obj->contributor_list_name = implode(",",$contributor_list_name);
      $obj->contributor_list_name_array = $contributor_list_name;
      $obj->contributor_list_array = explode(",",$row['contributor_list']);

    } else {
      $obj->response = "false";
      $obj->comment = "No se sabe a que proyecto consultar.";
    }
  } else {
    $obj->response = "false";
    $obj->comment = "No se sabe la Acción.";
  }
  
} else {
  $obj->response = "false";
  $obj->comment = "No están todos los campos requeridos.";
}
echo json_encode($obj);
?>