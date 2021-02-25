<?php 

include 'conexion.php';

$sql="INSERT INTO `usuario`(`idUsuario`, `usuNombre`, `usuApellidos`, `usuUser`, `usuPassword`, `idNivel`) VALUES (null,  '{$_POST['nombre']}', '{$_POST['apellidos']}', '{$_POST['usuario']}', md5('{$_POST['passw']}'), {$_POST['nivel']} ); ";
//echo $sql;
if($cadena->query($sql)){
	echo 'ok';
}

?>