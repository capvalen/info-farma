<?php 
include __DIR__.'./../conectkarl.php';

$sql="UPDATE `detalleproductos` SET `prodFechaVencimiento` = '{$_POST['fecha']}' WHERE `detalleproductos`.`idDetalle` = {$_POST['id']};";
if($cadena->query($sql)){
	echo 'ok';
}

?>