<?php 

include '../config/conexion.php';

$variante = '';
if (isset($_POST['lista'])){ $variante = json_encode($_POST['lista']); };

$sql="UPDATE `producto` SET 
`variante`= '{$variante}' WHERE `idProducto`= {$_POST['idProd']}; ";
if($resultado=$cadena->query($sql)){
	echo 'ok';
}else{
	echo 'error';
}
?>