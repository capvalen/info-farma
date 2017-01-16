<?php 
header('Content-Type: text/html; charset=utf8');
require("conectkarl.php");


$sql= "call actualizarProductoDetalles (".$_POST['idProd'].", '".$_POST['nombre']."','".$_POST['descipt']."',".$_POST['stkmin'].",'".$_POST['categ']."',".$_POST['precio'].",1, '".$_POST['labo']."', '".$_POST['propi']."', ".$_POST['costo'].", ".$_POST['porcent'].", ".$_POST['stock'].")";


if ($llamadoSQL = $conection->query($sql)) { //Ejecución mas compleja con retorno de dato de sql del procedure.
	/* obtener el array de objetos */
	while ($resultado = $llamadoSQL->fetch_row()) {
		echo $resultado[0]; //Retorna los resultados via post del procedure
	}
	/* liberar el conjunto de resultados */
	$llamadoSQL->close();
}else{echo mysql_error( $conection);}


?>