<?php 

include '../config/conexion.php';

$sql="INSERT INTO `detalleproductos`(`idDetalle`, `idProducto`, `prodPrecioUnitario`, `prodLote`, `prodFechaVencimiento`, `prodCantidadXLote`) VALUES
(null, {$_POST['idProducto']}, 0, '{$_POST['lote']}', '{$_POST['fecha']}', {$_POST['cantidad']})
limit 20;";

if($cadena->query($sql)){
	echo 'ok';
}

?>