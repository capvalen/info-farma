<?php 
require("conectkarl.php");

$filas=array();
$log = mysqli_query($conection,"call listarProdimosAVencer();");
while($row = mysqli_fetch_array($log))
{
	$filas[]= array('idproducto' => $row['idproducto'],
		'prodFechaVencimiento' => $row['prodFechaVencimiento'],
		'prodNombre' => $row['prodNombre'],
		'prodPrecio' => $row['prodPrecio'],
		'prodLote' => $row['prodLote']
	); 
}
 echo json_encode($filas);
?>