<?php 
include 'conectkarl.php';

$filas=array();
$log = mysqli_query($conection,"call buscarProductoXId(".$_POST['filtro'].");");

while($row = mysqli_fetch_array($log))
{
	$filas[]= array('prodNombre' => $row['prodNombre'],
		'catprodDescipcion' => $row['catprodDescipcion'],
		'idProducto' => $row['idProducto'],
		'lote' => $row['lote'],
		'prodFechaVencimiento' => $row['prodFechaVencimiento'],
		'prodPrecioUnitario' => $row['prodPrecio'],
		'prodStock' => $row['prodStock']
	);
	
}

echo json_encode($filas);

?>
 
