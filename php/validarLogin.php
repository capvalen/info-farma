<?php
session_start();
$expira = time()+(3600*24);

/* header("Set-Cookie: cookiename=cookievalue; expires=Tue, 06-Jan-2049 23:39:49 GMT; path=/; domain=cardiofarma.infocatsoluciones.com");
setcookie('coca','cola',time()+(3600*24),'/'); */


header('Content-Type: text/html; charset=utf8');
include 'conectkarl.php';
//echo "SELECT * FROM usuario WHERE usuUser='{$_POST['user']}' AND usuPassword=md5('{$_POST["pws"]}');";
$sql = "SELECT * FROM usuario WHERE usuUser='{$_POST['user']}' AND usuPassword=md5('{$_POST["pws"]}');";
$log = mysqli_query($conection, $sql);


$row = mysqli_fetch_array($log, MYSQLI_ASSOC);

if ( intval($row['idUsuario']) >=1){
	/* $_SESSION['Atiende']=$row['usuNombre'];
	$_SESSION['nomCompleto']=$row['usuNombre'].', '.$row['usuApellidos'];
	$_SESSION['Power']=$row['idNivel'];
	$_SESSION['idUsuario']=$row['idUsuario']; */
		
	setcookie('ckAtiende',ucwords($row['usuNombre']),time()+(3600*24),'/');
	setcookie('cknomCompleto', ucwords( "{$row['usuNombre']} {$row['usuApellidos']}" ), time()+(3600*24), "/");
	setcookie('ckPower', $row['idNivel'], time()+(3600*24), "/");
	setcookie('ckidUsuario', $row['idUsuario'], time()+(3600*24), "/");


	echo $row['idUsuario'];
}

//var_dump($row);

/* liberar la serie de resultados */
mysqli_free_result($log);

/* cerrar la conexión */
mysqli_close($conection);

?>