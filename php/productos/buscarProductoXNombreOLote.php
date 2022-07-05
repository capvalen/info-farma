<?php 
include __DIR__.'./../conectkarl.php';

$filas=array();
$sql="call buscarProductoXNombreOLote('".$_POST['filtro']."');";
//echo $sql;
$log = mysqli_query($conection, $sql);

while($row = mysqli_fetch_array($log))
{
	$filas[]= array('prodNombre' => $row['prodNombre'],
		'catprodDescipcion' => $row['catprodDescipcion'],
		'idProducto' => $row['idProducto'],
		'lote' => $row['lote'],
		'prodFechaVencimiento' => $row['nFecha'],
		'prodPrecioUnitario' => $row['prodPrecio'],
		'prodStock' => $row['prodStock'],
		'supervisado' => $row['supervisado'],
		'variante' => $row['variante'],
		'principioActivo' => $row['prodPrincipioActivo'],
		'observaciones' => $row['obs']
	);
	
}

echo json_encode($filas);

?>
 
