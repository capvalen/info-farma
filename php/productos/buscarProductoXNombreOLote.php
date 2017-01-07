<?php 
include '../config/conexion.php';

$filas=array();
$log = mysqli_query($conection,"call buscarProductoXNombreOLote('".$_POST['filtro']."');");

while($row = mysqli_fetch_array($log))
{
	$filas[]= array('prodNombre' => $row['prodNombre'],
		'catprodDescipcion' => $row['catprodDescipcion'],
		'idProducto' => $row['idProducto'],
		'lote' => $row['lote'],
		'prodFechaVencimiento' => $row['prodFechaVencimiento'],
		'prodPrecioUnitario' => $row['prodPrecioUnitario'],
		'prodStock' => $row['prodStock']
	);
	
}

echo json_encode($filas);

?>
 
