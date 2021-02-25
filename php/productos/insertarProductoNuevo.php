<?php 
header('Content-Type: text/html; charset=utf8');
require("conectkarl.php");




$sql= "call insertarProductoNuevo ('".$_POST['nombre']."','".$_POST['descipt']."',".$_POST['stkmin'].",'".$_POST['categ']."',".$_POST['precio'].",1, '".$_POST['labo']."', '".$_POST['propi']."', ".$_POST['costo'].", ".$_POST['porcent'].", ".$_POST['stock'].")";
//echo $sql;

if ($llamadoSQL = $conection->query($sql)) { //Ejecución mas compleja con retorno de dato de sql del procedure.
	
	while ($resultado = $llamadoSQL->fetch_row()) {
		$producto = $resultado[0];
		echo $resultado[0]; //Retorna los resultados via post del procedure
	}
	
	$llamadoSQL->close();
}else{
	$producto=-1;
	echo mysql_error( $conection);}


if( $producto>0){
	$sqlBarras="";
	
	foreach ($_POST['barritas'] as $barra) {
		/* echo $barra." \n"; */
		$sqlBarras=$sqlBarras."call insertarBarraPorId('".$barra."', ".$producto."); ";
	}
	
	$resultadoBarras=$dependencia->multi_query($sqlBarras);

}

?>