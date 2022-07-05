<?php 

include __DIR__.'./../conectkarl.php';

$sql="INSERT INTO `usuario`(`idUsuario`, `usuNombre`, `usuApellidos`, `usuUser`, `usuPassword`, `idNivel`, `usuActivo`) 
VALUES (null,  '{$_POST['nombre']}', '{$_POST['apellidos']}', '{$_POST['usuario']}', md5('{$_POST['passw']}'), {$_POST['nivel']}, 1 ); ";
//echo $sql;
if($cadena->query($sql)){
	echo 'ok';
}

?>