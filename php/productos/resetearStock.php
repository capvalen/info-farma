<?php 
include '../conectkarl.php';

$sql="UPDATE `producto` SET `prodAlertaStock` = '0' WHERE `idProducto` = {$_POST['idProd']};";
if($cadena->query($sql)){
	echo 'ok';
}

?>