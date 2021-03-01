<?php 

include '../config/conexion.php';

$suma=[2,4];
$resta=[1, 3, 5, 6, 7];


if( in_array($_POST['movimiento'], $suma) ){
	$sql="UPDATE `producto` SET `prodStock`= `prodStock`+{$_POST['cantidad']}, prodAlertaStock=1 where `idProducto`={$_POST['idProducto']}; ";
}else{
	$sql="UPDATE `producto` SET `prodStock`=`prodStock`-{$_POST['cantidad']}, prodAlertaStock=1 where `idProducto`={$_POST['idProducto']}; ";
}


$sql.="INSERT INTO `stock`(`idStock`, `idProducto`, `stoCant`, `idMovimiento`, `stoObservacion`, `idUsuario`) VALUES (null, {$_POST['idProducto']}, {$_POST['cantidad']}, {$_POST['movimiento']}, '{$_POST['observacion']}', {$_POST['usuario']});";

if($cadena->multi_query($sql)){
	echo 'ok';
}
?>