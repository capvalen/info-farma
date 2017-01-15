<?php 
include '../config/conexion.php';

$filas=array();
$log = mysqli_query($conection,"call listarLotesYVencimientoPorID(".$_POST['idPro'].");");
while($row = mysqli_fetch_array($log))
{
	$filas[]= array('prodLote' => $row['prodLote'],
		'prodFechaVencimiento' => $row['prodFechaVencimiento'],
		'prodFechaRegistro' => $row['prodFechaRegistro']
	); 
}
 echo json_encode($filas);
?>
 
