<?PHP

include ''.dirname(__FILE__).'/conexioni.php';
include ''.dirname(__FILE__).'/Themes/default/languages/index.spanish_es-utf8.php';
include ''.dirname(__FILE__).'/funciones.php';

base_de_datos_utf_8($conn);

$obj = new stdClass();

if(isset($_POST["id_member_profile"])){
  $id_member_profile= base_de_datos_scape($conn,$_POST["id_member_profile"]);
}
if(isset($_POST["id_member"])){
  $id_member= base_de_datos_scape($conn,$_POST["id_member"]);
}

if($id_member_profile!="" && $id_member!=""){

  $obj = new stdclass();

  //get profesión y buddy list del usuario perfil
  $query = $conn->query("SELECT tipo_profesion, buddy_pending FROM loemprendemos_members WHERE id_member='".$id_member_profile."'") or die(mysqli_error($conn));
  $row=$query->fetch_assoc();

  //get buddy list del visitante del perfil
  $query = $conn->query("SELECT buddy_pending FROM loemprendemos_members WHERE id_member='".$id_member."'") or die(mysqli_error($conn));
  $row2=$query->fetch_assoc();

  $obj->buddyButton= "false";

  //el usuario visitante del perfil ya ha mandado un request
  $buddy_pending = explode(",",$row2['buddy_pending']);
  foreach($buddy_pending AS $key => $buddy){
    if($buddy==$id_member_profile){
      $obj->buddyButton= "pendiente";
    }  
  }

  //el usuario del perfil tiene un solicitud pendiente del usuario visitante del perfil
  $buddy_pending = explode(",",$row['buddy_pending']);
  foreach($buddy_pending AS $key => $buddy){
    if($buddy==$id_member){
      $obj->buddyButton= "confirmar";
    }  
  }

  $obj->tipoProfesion = $row["tipo_profesion"];
  $obj->response = "true";

  
} else {
  $obj->response = "false";
  $obj->comment = "general if post validation";
}
echo json_encode($obj);
?>