<?php 

include '../config/conexion.php';

$filas = array();

$sql="SELECT * FROM `variantes` where activo =1; ";
$resultado=$cadena->query($sql);
while($row=$resultado->fetch_assoc()){ 
	$filas[] = $row;
}
echo json_encode($filas);
?>