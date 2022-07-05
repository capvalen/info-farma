<?php 
header('Content-Type: text/html; charset=utf8');
require("../conectkarl.php");


$sql= "UPDATE `laboratorio` SET `activo` = 0 WHERE `laboratorio`.`idLaboratorio` = {$_POST['id']};";


if ($llamadoSQL = $conection->query($sql)) { //Ejecución mas compleja con retorno de dato de sql del procedure.
	/* obtener el array de objetos */
	echo 'ok';
	
}else{echo 'error';}


?>