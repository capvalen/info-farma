<?php 

include 'conexion.php';

$sql="UPDATE `usuario` SET `usuActivo` = '0' WHERE `usuario`.`idUsuario` = {$_POST['idUser']};";
if($cadena->query($sql)){
	echo 'ok';
}

 ?>