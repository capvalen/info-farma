<?php 
header('Content-Type: text/html; charset=utf8');
include __DIR__.'./../conectkarl.php';


$sql= "UPDATE `laboratorio` SET `labNombre` = '{$_POST['nombre']}' WHERE `laboratorio`.`idLaboratorio` = {$_POST['id']};";


if ($llamadoSQL = $conection->query($sql)) { //Ejecución mas compleja con retorno de dato de sql del procedure.
	/* obtener el array de objetos */
	echo 'ok';
	
}else{echo 'error';}


?>