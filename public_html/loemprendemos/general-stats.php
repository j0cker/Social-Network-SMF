<?PHP

include ''.dirname(__FILE__).'/conexioni.php';
include ''.dirname(__FILE__).'/Themes/default/languages/index.spanish_es-utf8.php';
include ''.dirname(__FILE__).'/funciones.php';

base_de_datos_utf_8($conn);

$obj = new stdClass();

$query = $conn->query("SELECT real_name, date_registered, last_login, id_member FROM loemprendemos_members WHERE id_member<>'1' AND id_member<>'37' AND id_member<>'42' ORDER BY date_registered,last_login ASC") or die(mysqli_error($conn));
$totalMenos6Dias = 0;
$total = 0;
$total1A7DiasRetencion = 0;
$total1A7DiasRetencionArray = array();
$total8A30DiasRetencion = 0;
$total8A30DiasRetencionArray = array();
$total31A60DiasRetencion = 0;
$total31A60DiasRetencionArray = array();
$today = new DateTime(date("Y-m-d",time()));
while($row=$query->fetch_assoc()){
  $total++;
  $date_registered= new DateTime(date("Y-m-d",$row['date_registered']));
  $last_login = new DateTime(date("Y-m-d",$row['last_login']));
  $menosDe6Dias = $date_registered->diff($today);
  
  if($menosDe6Dias->days>=6){
    $totalMenos6Dias++;
    
    $dias_retencion = $date_registered->diff($last_login);
    
    if($dias_retencion->days>1 && $dias_retencion->days<=7){
      $total1A7DiasRetencion++;
      $total1A7DiasRetencionArray [] = ''.$row['id_member'].' '.$row['real_name'].': Registro: '.date("Y-m-d",$row['date_registered']).' Días de login: '.$dias_retencion->days.'';
    }
    if($dias_retencion->days>7 && $dias_retencion->days<=30){
      $total8A30DiasRetencion++;
      $total8A30DiasRetencionArray [] = ''.$row['id_member'].' '.$row['real_name'].': Registro: '.date("Y-m-d",$row['date_registered']).' Días de login: '.$dias_retencion->days.'';
    }
    if($dias_retencion->days>30 && $dias_retencion->days<=60){
      $total31A60DiasRetencion++;
      $total31A60DiasRetencionArray [] = ''.$row['id_member'].' '.$row['real_name'].': Registro: '.date("Y-m-d",$row['date_registered']).' Días de login: '.$dias_retencion->days.'';
    }
    
    //echo ''.$row['id_member'].': Registro: '.date("Y-m-d",$row['date_registered']).' Días de login: '.$dias_retencion->days.'';
    //echo "<br />";
  }
  
}
$tiempoInicioRegistros = date("d-m-Y","1497031748");
$tiempoInicioRegistrosDateTime = new DateTime($tiempoInicioRegistros);
echo "------------Inicio Reporte general-----------------<br />";
echo "Inicio de Registros: ".$tiempoInicioRegistros."<br />";
echo "Total Registrados: ".$total."<br />";
echo "Total Usuarios Ventaja 6 Días: ".$totalMenos6Dias."<br />";
echo "Retención de 1 a 7 Días: ".(($total1A7DiasRetencion*100)/$totalMenos6Dias)."% - ".$total1A7DiasRetencion."<br />";
echo "Retención de 8 a 30 Días: ".(($total8A30DiasRetencion*100)/$totalMenos6Dias)."% - ".$total8A30DiasRetencion."<br />";
echo "Retención de 31 a 60 Días: ".(($total31A60DiasRetencion*100)/$totalMenos6Dias)."% - ".$total31A60DiasRetencion."<br />";
echo "Porcentajes al día de ".date("d-m-Y H:m",time())."<br />";
echo "Tiempo Total del Proyecto: ".$tiempoInicioRegistrosDateTime->diff($today)->days." Días<br />";
echo "------------Fin Reporte general-----------------<br /><br />";

echo "------------Inicio Usuario de 1 a 7 Días-----------------<br />";
foreach($total1A7DiasRetencionArray AS $key => $usuarios){
  echo "".$usuarios."<br />";
}
echo "------------Fin Reporte general-----------------<br /><br />";

echo "------------Inicio Usuario de 8 a 30 Días-----------------<br />";
foreach($total8A30DiasRetencionArray AS $key => $usuarios){
  echo "".$usuarios."<br />";
}
echo "------------Fin Reporte general-----------------<br /><br />";

echo "------------Inicio Usuario de 31 a 60 Días-----------------<br />";
foreach($total31A60DiasRetencionArray AS $key => $usuarios){
  echo "".$usuarios."<br />";
}
echo "------------Fin Reporte general-----------------<br /><br />";
//echo json_encode($obj);
?>