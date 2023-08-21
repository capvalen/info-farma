<?php 

include __DIR__.'./../conectkarl.php';


$sql="UPDATE `detalleproductos` SET `prodDisponible` = b'0' WHERE `detalleproductos`.`idDetalle` = {$_POST['idDetalle']}; ";
//echo $sql;
if($cadena->query($sql)){
	echo 'ok';
}else{
	echo 'error';
}
?>