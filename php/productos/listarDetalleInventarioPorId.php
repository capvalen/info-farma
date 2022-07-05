<?php 
include '../conectkarl.php';

$filas=array();
$log = mysqli_query($conection,"call listarDetalleInventarioPorId(".$_POST['idInv'].");");
while($row = mysqli_fetch_array($log))
{
	$filas[]= array('prodNombre' => $row['prodNombre'],
		'detcomprCantidad' => $row['detcomprCantidad'],
		'detcomprPrecioUnitario' => $row['detcomprPrecioUnitario'],
		'detcomprSubTotal' => $row['detcomprSubTotal']
	); 
}
 echo json_encode($filas);
?>
 
