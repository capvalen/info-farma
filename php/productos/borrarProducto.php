<?php 

require("conectkarl.php");

$sql="UPDATE `producto` SET `prodActivo` = '0' WHERE `idProducto` = {$_POST['idProd']};";
//echo $sql;
if($cadena->query($sql)){
	echo 'ok';
}
?>