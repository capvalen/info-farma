<?php
session_start();
header('Content-Type: text/html; charset=utf8');
include 'conectkarl.php';
//echo "SELECT * FROM usuario WHERE usuUser='{$_POST['user']}' AND usuPassword=md5('{$_POST["pws"]}');";
$log = mysqli_query($conection,"SELECT * FROM usuario WHERE usuUser='{$_POST['user']}' AND usuPassword=md5('{$_POST["pws"]}');");

$row = mysqli_fetch_array($log, MYSQLI_ASSOC);
if ($row['idUsuario']>=1){
	$_SESSION['Atiende']=$row['usuNombre'];
	$_SESSION['nomCompleto']=$row['usuNombre'].', '.$row['usuApellidos'];
	$_SESSION['Power']=$row['idNivel'];
	$_SESSION['idUsuario']=$row['idUsuario'];
	

	$expira=time()+60*60*24;
	setcookie('ckAtiende', ucwords($row['usuNombre']), $expira, '/');
	setcookie('cknomCompleto', ucwords($row['usuNombre'].', '.$row['usuApellidos']), $expira, '/');
	setcookie('ckPower', $row['idNivel'], $expira, '/');
	setcookie('ckidUsuario', $row['idUsuario'], $expira, '/');
	

	echo $row['idUsuario'];
}

/* liberar la serie de resultados */
mysqli_free_result($log);

/* cerrar la conexión */
mysqli_close($conection);

?>