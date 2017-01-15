<?php 
include '../config/conexion.php';

$filas=array();
$log = mysqli_query($conection,"call validarBarraEnUso(".$_POST['barra'].");");
while($row = mysqli_fetch_array($log))
{
	$filas[]= array('prodNombre' => $row['prodNombre']); 
}
 echo json_encode($filas);
?>
 
