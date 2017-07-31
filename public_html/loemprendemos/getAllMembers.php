<?PHP

include ''.dirname(__FILE__).'/conexioni.php';
include ''.dirname(__FILE__).'/Themes/default/languages/index.spanish_es-utf8.php';
include ''.dirname(__FILE__).'/funciones.php';

base_de_datos_utf_8($conn);

$obj = array();

  //get all members
  $query = $conn->query("SELECT id_member, real_name FROM loemprendemos_members") or die(mysqli_error($conn));

  $c=0;
  
  while($row=$query->fetch_assoc()){
    $obj[$c] = new stdclass();
    $obj[$c]->value= $row['id_member'];
    $obj[$c]->text = $row['real_name'];
    $c++;
  }
 
echo json_encode($obj);
?>