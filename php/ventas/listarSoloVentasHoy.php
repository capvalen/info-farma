<?php 
include '../conectkarl.php';

$filas=array();
$log = mysqli_query($conection,"call listarSoloVentasHoy();");
while($row = mysqli_fetch_array($log))
{
	$filas[]= array('idVenta' => $row['idVenta'],
		'ventFecha' => $row['ventFecha'],
		'Usuario' => $row['Usuario'],
		'total' => $row['total'],
		'idSimple' => $row['idSimple'],
		'ventMonedaEnDuro' => $row['ventMonedaEnDuro'],
		'ventCambioVuelto' => $row['ventCambioVuelto'],
	); 
}
 echo json_encode($filas);
?>
 
