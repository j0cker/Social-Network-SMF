<?PHP

include ''.dirname(__FILE__).'/conexioni.php';
include ''.dirname(__FILE__).'/Themes/default/languages/index.spanish_es-utf8.php';
include ''.dirname(__FILE__).'/funciones.php';

base_de_datos_utf_8($conn);

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

if($nameProject!="" && $imageUrlProject!="" && $location!="" && $description!="" && $category!="" && $employees!="" && $founderList!="" && $id_member!="" && $action!=""){

  $obj->nameProject= $nameProject;
  $obj->imageUrlProject= $imageUrlProject;
  $obj->location= $location;
  $obj->description= $description;
  $obj->category= $category;
  $obj->foundedTime= $foundedTime;
  $obj->lookingFor= $lookingFor;
  $obj->employees= $employees;
  $obj->founderList= $founderList;
  $obj->mentorList= $mentorList;
  $obj->contributorList= $contributorList;
  $obj->website= $website;
  $obj->facebookFanPage= $facebookFanPage;
  $obj->twitter= $twitter;
  $obj->linkedin= $linkedin;
  $obj->androidApp= $androidApp;
  $obj->iosApp= $iosApp;
  $obj->emailList= $emailList;
  $obj->id_member= $id_member;
  $obj->action= $action;

  if($action==1){
    //insert

    $query = $conn->query("INSERT INTO `loemprendemos_projects`(`description`, `project_name`, `category`, `image`, `created_time`, `modified_time`, `created_by`, `modified_by`, `founded_time`, `contributor_list`, `founder_list`, `looking_for`, `employees`, `mentor_list`, `location`, `website`, `facebook_fanpage`, `twitter`, `linkedin`, `app_android`, `app_ios`) VALUES ('".$description."','".$nameProject."','".$category."','".$imageUrlProject."','".time()."','".time()."','".$id_member."','".$id_member."','".$foundedTime."','".$contributorList."','".$founderList."','".$lookingFor."','".$employees."','".$mentorList."','".$location."','".$website."','".$facebookFanPage."','".$twitter."','".$linkedin."','".$androidApp."','".$iosApp."')") or die(mysqli_error($conn));

    if($query==1){
      $obj->response = "true";
    
     //mandar correos
   
    } else {
      $obj->response = "false";
      $obj->comment = "Hubo un Error, inténtelo nuevamente.";
    }
  } else if($action==2) {
    //update
  }
  
} else {
  $obj->response = "false";
  $obj->comment = "No están todos los campos requeridos.";
}
echo json_encode($obj);
?>