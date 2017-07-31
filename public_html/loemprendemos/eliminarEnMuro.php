<?PHP

include ''.dirname(__FILE__).'/conexioni.php';
include ''.dirname(__FILE__).'/Themes/default/languages/index.spanish_es-utf8.php';
include ''.dirname(__FILE__).'/funciones.php';


base_de_datos_utf_8($conn);

$obj = new stdClass();

if(isset($_POST["idPost"])){
  $idPost= base_de_datos_scape($conn,$_POST["idPost"]);
}

if($idPost!=""){

  $obj->idPost= $idPost;

  $query = $conn->query("DELETE FROM loemprendemos_messages WHERE id_msg='".$idPost."'") or die(mysqli_error($conn));

  if($query==1){
    $obj->response = "true";
  } else {
    $obj->response = "false";
  }

} else {
  $obj->response = "false";
  $obj->comment = "general if post validation";
}
echo json_encode($obj);
?>