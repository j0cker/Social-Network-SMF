<?PHP
include ''.dirname(__FILE__).'/conexioni.php';

$obj = new stdClass();

if(isset($_POST["image"]) && isset($_POST["id"]) && isset($_POST["url"])){
  $image = $_POST["image"];
  $id = $_POST["id"];
  $url = $_POST["url"];
  $ext = end(explode(".", $image)); 
  $query = $conn->query("INSERT INTO loemprendemos_attachments SET id_member='".$id."', filename='avatar_".$id."_".rand(0,10)."".rand(0,10)."".rand(0,10)."".rand(0,10)."".rand(0,10)."".rand(0,10)."".rand(0,10)."".rand(0,10)."".rand(0,10)."".rand(0,10)."', file_hash='".$image."', mime_type='image/".$ext."', fileext='".$ext."'") or die(mysqli_error($conn));
  if($query==1){
    $obj->response = "true";
    //movemos de biblioteca a attachments
    $query= $conn->query("select id_attach from loemprendemos_attachments order by id_attach desc limit 1");
    $row=$query->fetch_assoc();     
    copy(''.getcwd().'/bibliotecaImages/'.$image.'', ''.getcwd().'/attachments/'.$row["id_attach"].'_'.$image.'');
  } else {
    $obj->response = "false";
  }
} else {
  $obj->response = "false";
}

echo json_encode($obj);

?>