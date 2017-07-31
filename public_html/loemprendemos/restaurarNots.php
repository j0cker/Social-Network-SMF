<?PHP

include ''.dirname(__FILE__).'/conexioni.php';
include ''.dirname(__FILE__).'/Themes/default/languages/index.spanish_es-utf8.php';
include ''.dirname(__FILE__).'/funciones.php';

base_de_datos_utf_8($conn);

$query = $conn->query("SELECT id_member,id_topic FROM loemprendemos_messages ORDER by id_msg ASC") or die(mysqli_error($conn));

while($row=$query->fetch_assoc()){
	$conn->query("INSERT INTO loemprendemos_log_notify (id_member,id_topic) VALUES ('".$row['id_member']."','".$row['id_topic']."')") or die(mysqli_error($conn));
}
?>