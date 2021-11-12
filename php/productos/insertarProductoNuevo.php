<?php 
header('Content-Type: text/html; charset=utf8');
require("conectkarl.php");




$sql= "call insertarProductoNuevo ('".$_POST['nombre']."','".$_POST['descipt']."',".$_POST['stkmin'].",'".$_POST['categ']."',".$_POST['precio'].",1, '".$_POST['labo']."', '".$_POST['propi']."', ".$_POST['costo'].", ".$_POST['porcent'].", ".$_POST['stock'].", ".$_POST['controlado'].", '{$_POST['principio']}' )";
//echo $sql;

if ($llamadoSQL = $conection->query($sql)) { //Ejecución mas compleja con retorno de dato de sql del procedure.
	
	while ($resultado = $llamadoSQL->fetch_row()) {
		$producto = $resultado[0];
		echo $resultado[0]; //Retorna los resultados via post del procedure
	}

		$_POST['movimiento'] = 16;
		$_POST['idProducto'] = $producto;
		$_POST['cantidad'] = $_POST['stock'];
		$_POST['observacion']='';
		$_POST['usuario']=$_COOKIE['ckidUsuario'];
		$sqlStock="INSERT INTO `stock`(`idStock`, `idProducto`, `stoCant`, `idMovimiento`, `stoObservacion`, `idUsuario`) VALUES (null, {$_POST['idProducto']}, {$_POST['cantidad']}, {$_POST['movimiento']}, '{$_POST['observacion']}', {$_POST['usuario']});";
		$resultadoStock=$dependencia->query($sqlStock);
	
	$llamadoSQL->close();
}else{
	$producto=-1;
	echo mysql_error( $conection);
}


if( $producto>0){
	$sqlBarras=""; $sqlLotes='';

	if (isset($_POST['barritas'])){
		foreach ($_POST['barritas'] as $barra) {
			/* echo $barra." \n"; */
			$sqlBarras=$sqlBarras."call insertarBarraPorId('".$barra."', ".$producto."); ";
		}
		$resultadoBarras=$dependencia->multi_query($sqlBarras);
	}
	
	if (isset($_POST['lotesN'])){
		foreach ($_POST['lotesN'] as $lotes) {
			$sqlLotes=$sqlLotes."INSERT INTO `detalleproductos`(`idDetalle`, `idProducto`, `prodPrecioUnitario`, `prodLote`, `prodFechaVencimiento`, `prodFechaRegistro`, `prodCantidadXLote`, `prodDisponible`) VALUES 
			(null, {$producto}, 0, '{$lotes['lote']}', '{$lotes['vence']}', now(), {$lotes['cantidad']}, 1); ";
		}
		//echo $sqlLotes;
		$resultadoBarras=$esclavo->multi_query($sqlLotes);
		/* if($resultadoBarras){
			echo 'lotes ok';
		}else{
			echo 'error lotes';
		} */

	}

}

?>