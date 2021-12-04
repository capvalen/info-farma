<?php 
include '../config/conexion.php';

$sql="UPDATE `detalleproductos` SET `prodDisponible`=0 WHERE `idDetalle`={$_POST['lote']};";
if($cadena->query($sql)){
	echo 'ok';
}

?>