<?PHP

include ''.dirname(__FILE__).'/conexioni.php';
include ''.dirname(__FILE__).'/Themes/default/languages/index.spanish_es-utf8.php';
include ''.dirname(__FILE__).'/funciones.php';

base_de_datos_utf_8($conn);

$obj = new stdClass();

if(isset($_POST["interes"])){
  $tipo_intereses = strtoupper(base_de_datos_scape($conn,$_POST["interes"]));
}
if(isset($_POST["id_member"])){
  $id_member= base_de_datos_scape($conn,$_POST["id_member"]);
}

if($id_member!="" && $tipo_intereses !=""){

  $obj->updateTipoProfesion = $tipo_intereses ; // se dejo otro

  $query = $conn->query("UPDATE loemprendemos_members SET tipo_intereses='".$tipo_intereses."' WHERE id_member='".$id_member."'") or die(mysqli_error($conn));
  
  $query = $conn->query("SELECT id_board FROM loemprendemos_boards WHERE name='".base_de_datos_scape($conn,$_POST['interes'])."'") or die(mysqli_error($conn));
  $row=$query->fetch_assoc();
  $obj->id_board = $row['id_board'];
  //manda notificaciones automáticas cuando hay un nuevo tema en el foro interesado
  $buscar_notify = $conn->query("SELECT id_member FROM loemprendemos_log_notify WHERE id_member='".$id_member."' AND id_topic='0'");
  $row20=$buscar_notify ->fetch_assoc();
  if($row20['id_member']!=$id_member){
    $query2 = $conn->query("INSERT INTO loemprendemos_log_notify (id_member,id_board) VALUES ('".$id_member."','".$row['id_board']."')") or die(mysqli_error($conn));
    $obj->comment= "No existe";
  } else {
    $obj->comment= "Existe";
    $conn->query("UPDATE loemprendemos_log_notify SET id_board='".$row['id_board']."' WHERE id_member='".$id_member."'");
  }

  if($query==1){
      $obj->response = "true";

  } else {
      $obj->response = "false";
  }
} else {
  $obj->response = "false";
}
echo json_encode($obj);
?>