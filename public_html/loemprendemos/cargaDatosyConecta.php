<?PHP

include ''.dirname(__FILE__).'/conexioni.php';
include ''.dirname(__FILE__).'/Themes/default/languages/index.spanish_es-utf8.php';
include ''.dirname(__FILE__).'/funciones.php';

base_de_datos_utf_8($conn);

$obj = new stdClass();

if(isset($_POST["tipo_profesion"])){
  $tipo_profesion = str_replace(strtoupper($txt['select_default_value']), '', strtoupper(base_de_datos_scape($conn,$_POST["tipo_profesion"])));
}
if(isset($_POST["tipo_busca"])){
  $tipo_busca = strtoupper(base_de_datos_scape($conn,$_POST["tipo_busca"]));
}
if(isset($_POST["id_member"])){
  $id_member= base_de_datos_scape($conn,$_POST["id_member"]);
}

if($id_member!="" && $tipo_busca!="" && $tipo_profesion!=""){

  $obj->updateTipoProfesion = $tipo_profesion; // se dejo otro
  $obj->updateTipoBusca = $tipo_busca; // se deja otros

  $query = $conn->query("UPDATE loemprendemos_members SET tipo_profesion='".strtoupper($tipo_profesion)."', tipo_busca='".strtoupper($tipo_busca)."' WHERE id_member='".$id_member."'") or die(mysqli_error($conn));

  $tipo_profesion = str_replace(strtoupper(end($txt['tipo_profesion'])), '', $tipo_profesion);
  $tipo_busca = str_replace(strtoupper(end($txt['busca_profesion'])), '', $tipo_busca);
  $tipo_busca = str_replace(' ', '', $tipo_busca);
  $cont_obj = 0;
  $key_buscar = 0;

  if($query==1){
      $obj->response = "false";
      $obj->selectTipoBusca = utf8_encode($tipo_busca);
      foreach($txt['busca_profesion'] AS $key => $value){
        if(strpos(strtoupper($value),$tipo_busca)!==false){
          $key_buscar = $key;
        } 
      }//fin foreach

      $obj->selectTipoProfesion = utf8_encode($tipo_profesion);
      $obj->selectTipoKeyBusca = utf8_encode($key_buscar);
      $obj->selectTipoBuscaTxt = strtoupper($txt['tipo_profesion'][$key_buscar]);

      //falta quitar acentos al buscar cuando se busca otros

      $query = $conn->query("SELECT id_member,real_name, location, tipo_profesion FROM loemprendemos_members WHERE tipo_profesion LIKE '%".strtoupper($txt['tipo_profesion'][$key_buscar])."%' AND id_member<>'".$id_member."' ORDER BY RAND()") or die(mysqli_error($conn));

      $vueltaswhile = 0;

      while($row=$query->fetch_assoc()){
        if(strpos($row['tipo_profesion'],strtoupper($txt['tipo_profesion'][$key_buscar]))!==false && $cont_obj<50){
          $obj->users[$cont_obj]['id'] = utf8_encode($row['id_member']);
          $obj->users[$cont_obj]['name'] = utf8_encode($row['real_name']);
          $obj->users[$cont_obj]['location'] = utf8_encode($row['location']);
          $obj->users[$cont_obj]['tipo_profesion'] = utf8_encode($row['tipo_profesion']);
          $cont_obj++;
          $obj->response = "true";
          if($cont_obj>=40){
            //permitir solo hasta
            break;
          }
        }
        $vueltaswhile++;
      }//fin while
      $obj->vueltasWhile = $vueltaswhile;
      $obj->sizeUser = $cont_obj;
  } else {
      $obj->response = "false";
  }
} else {
  $obj->response = "false";
}
echo json_encode($obj);
?>