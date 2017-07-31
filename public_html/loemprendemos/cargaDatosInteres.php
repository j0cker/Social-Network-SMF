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

  $obj->updateTipoInteres = $tipo_intereses ; // se dejo otro

  $query = $conn->query("UPDATE loemprendemos_members SET tipo_intereses='".$tipo_intereses."' WHERE id_member='".$id_member."'") or die(mysqli_error($conn));


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