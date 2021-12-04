<?php 
include '../config/conexion.php';

$filas=array();
echo "call listarTodoInventarios(".$_POST['anio'].", ".$_POST['mes'].");";
$log = mysqli_query($conection,"call listarTodoInventarios(".$_POST['anio'].", ".$_POST['mes'].");");
while($row = mysqli_fetch_array($log))
{
	$filas[]= array('idCompras' => $row['idCompras'],
		'comptFecha' => $row['comptFecha'],
		'Usuario' => $row['Usuario'],
		'total' => $row['total'],
		'idSimple' => $row['idSimple']
	); 
}
 echo json_encode($filas);
?>
 
