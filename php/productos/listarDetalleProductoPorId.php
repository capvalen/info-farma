<?php 
include '../config/conexion.php';

$filas=array();
$log = mysqli_query($conection,"call listarDetalleProductoPorId(".$_POST['idPro'].");");
while($row = mysqli_fetch_array($log))
{
	$filas[]= array('idProducto' => $row['idProducto'],
		'prodNombre' => $row['prodNombre'],
		'prodDescripcion' => $row['prodDescripcion'],
		'prodStock' => $row['prodStock'],
		'prodStockMinimo' => $row['prodStockMinimo'],
		'idCategoriaProducto' => $row['idCategoriaProducto'],
		'idPropiedadProducto' => $row['idPropiedadProducto'],
		'idLaboratorio' => $row['idLaboratorio'],
		'prodPrecio' => $row['prodPrecio'],
		'prodCosto' => $row['prodCosto'],
		'prodPorcentaje' => $row['prodPorcentaje'],
		'cantBarras' => $row['cantBarras']
	); 
}
 echo json_encode($filas);
?>
 
