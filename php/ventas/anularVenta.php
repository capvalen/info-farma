<?php 
include __DIR__.'./../conectkarl.php';

$sql="UPDATE `ventas` SET `ventActivo` = b'0' WHERE `idVenta` = {$_POST['idVenta']};";

if( $_POST['borrar']=='true'){
	$sqlDetalle = "SELECT * FROM `detalleventas`
	where idVenta = {$_POST['idVenta']}";
	$logDetalle = $cadena->query($sqlDetalle);
	while( $rowDetalle = $logDetalle->fetch_assoc()){
		
		$sql.="INSERT INTO `stock`(`idProducto`, `stoCant`, `idMovimiento`, `stoFecha`, `stoObservacion`, `stoActivo`, `idUsuario`) VALUES (
			{$rowDetalle['idProducto']}, {$rowDetalle['detventCantidad']}, 15, now(), 'Venta cancelada', 1, {$_POST['idUsuario']} );
			UPDATE `producto` SET `prodStock`=`prodStock`+ {$rowDetalle['detventCantidad']} where `idProducto` = {$rowDetalle['idProducto']};	";
	}
	
}
//echo $sql; die();
if($cadena->multi_query($sql)){
	echo 'ok';
}

?>