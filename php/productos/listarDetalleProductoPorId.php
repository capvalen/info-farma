<?php 
include __DIR__.'./../conectkarl.php';

$filas=array();
$log = mysqli_query($conection,"call listarDetalleProductoPorId(".$_POST['idPro'].");");
while($row = mysqli_fetch_array($log))
{
	$filas[]= array('idProducto' => $row['idProducto'],
		'prodNombre' => $row['prodNombre'],
		'prodPrincipioActivo' => $row['prodPrincipioActivo'],
		'prodStock' => $row['prodStock'],
		'prodStockMinimo' => $row['prodStockMinimo'],
		'idCategoriaProducto' => $row['idCategoriaProducto'],
		'idPropiedadProducto' => $row['idPropiedadProducto'],
		'idLaboratorio' => $row['idLaboratorio'],
		'prodPrecio' => $row['prodPrecio'],
		'prodCosto' => $row['prodCosto'],
		'prodPorcentaje' => $row['prodPorcentaje'],
		'cantBarras' => $row['cantBarras'],
		'supervisado' => $row['supervisado'],
		'prodAlertaStock' => $row['prodAlertaStock']
		
	); 
}
 echo json_encode($filas);
?>
 
