<?php 
include __DIR__.'./../conectkarl.php';

$sql="UPDATE `ventas` SET idMoneda = {$_POST['moneda']}, `ventObservacion` = '{$_POST['obs']}' WHERE `idVenta` = {$_POST['idVenta']};";
//echo $sql;
if($cadena->query($sql)){
	echo 'ok';
}

?>