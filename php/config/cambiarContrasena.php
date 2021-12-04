<?php 
require("conexion.php");

$sql="SELECT * FROM usuario WHERE idUsuario='{$_COOKIE['ckidUsuario']}' AND usuPassword=md5('{$_POST['txtPassAct']}')";
$resultado=$cadena->query($sql);
$numRows = $resultado->num_rows;
if( $numRows ==1){
	
	//Procedo a cambiar las claves
}else{
	echo "Contraseña incorrecta";
}


?>