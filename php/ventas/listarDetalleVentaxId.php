<?php 
include '../conectkarl.php';

$filas=array();
$log = mysqli_query($conection,"call listarVentasPorId(".$_POST['idVent'].");");
while($row = mysqli_fetch_array($log))
{
	$filas[]= array('idproducto' => $row['idproducto'],
		'detventCantidad' => $row['detventCantidad'],
		'detventPrecio' => $row['detventPrecio'],
		'detentPrecioparcial' => $row['detentPrecioparcial'],
		'prodNombre' => $row['prodNombre']
	); 
}
 echo json_encode($filas);
?>
 
