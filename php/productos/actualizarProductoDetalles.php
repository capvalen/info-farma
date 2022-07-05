<?php 
header('Content-Type: text/html; charset=utf8');
include '../conectkarl.php';


$sql= "call actualizarProductoDetalles (".$_POST['idProd'].", '".$_POST['nombre']."', ".$_POST['stkmin'].",'".$_POST['categ']."',".$_POST['precio'].", {$_COOKIE['ckidUsuario']}, '".$_POST['labo']."', '".$_POST['propi']."', ".$_POST['costo'].", ".$_POST['porcent'].", ".$_POST['stock'].", '{$_POST['principio']}', '{$_POST['obs']}', {$_POST['alertaStock']}, {$_POST['controlado']})";


if ($llamadoSQL = $conection->query($sql)) { //Ejecución mas compleja con retorno de dato de sql del procedure.
	/* obtener el array de objetos */
	echo 'ok';
	
}else{echo mysql_error( $conection);}


?>