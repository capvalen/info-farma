<?php 
include 'conectkarl.php';

$filas=array();
$log = mysqli_query($conection,"call listarTodoVentas(".$_POST['anio'].", ".$_POST['mes'].");");
while($row = mysqli_fetch_array($log))
{
	$filas[]= array('idVenta' => $row['idVenta'],
		'ventFecha' => $row['ventFecha'],
		'Usuario' => $row['Usuario'],
		'total' => $row['total'],
		'idSimple' => $row['idSimple']
	); 
}
 echo json_encode($filas);
?>
 
