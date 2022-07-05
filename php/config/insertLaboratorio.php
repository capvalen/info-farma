<?php 
header('Content-Type: text/html; charset=utf8');
include '../conectkarl.php';


$sql= "INSERT INTO `laboratorio`(`labNombre`) VALUES ('{$_POST['nombre']}');";


if ($llamadoSQL = $cadena->query($sql)) { //Ejecución mas compleja con retorno de dato de sql del procedure.
	/* obtener el array de objetos */
	echo $cadena->insert_id;
	
}else{echo 'error';}


?>