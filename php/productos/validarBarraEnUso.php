<?php 
include '../config/conexion.php';

$filas=array();
$sql="call validarBarraEnUso('".$_POST['barra']."');";
$log = mysqli_query($conection, $sql);
while($row = mysqli_fetch_array($log))
{
	$filas[]= array('prodNombre' => $row['prodNombre']); 
}
 echo json_encode($filas);
?>
 
