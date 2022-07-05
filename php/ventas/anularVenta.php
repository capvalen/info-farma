<?php 
include __DIR__.'./../conectkarl.php';

$sql="UPDATE `ventas` SET `ventActivo` = b'0' WHERE `idVenta` = {$_POST['idVenta']};";
if($cadena->query($sql)){
	echo 'ok';
}

?>