<?php 
include '../config/conexion.php';

$filas=array();
$log = mysqli_query($conection,"call listarBarrasId(".$_POST['idPro'].");");
while($row = mysqli_fetch_array($log))
{
	$filas[]= array('barrasCode' => $row['barrasCode']); 
}
 echo json_encode($filas);
?>
 
