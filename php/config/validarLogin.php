<?php
	session_start();
	include '../conectkarl.php';

	$usuario = $_POST['user'];
	$pw = $_POST['pw'];
	
	$log = mysqli_query($conection, "SELECT * FROM usuario WHERE usuUser='$usuario' AND usuPassword=md5('$pw')");
	
	
	if (mysqli_num_rows($log)>0) {
		$row = mysqli_fetch_array($log, MYSQLI_ASSOC);
		$_SESSION["usuario"] = $row['usuNombre'].', '.$row['usuApellidos']; //Me entrega el id del usuario
		$_SESSION["IdUsuario"] = $row['idUsuario'];
		$_SESSION["idNivel"] = $row['idNivel'];
	  	echo $row['idUsuario'];
	  	//echo $_SESSION["usuario"];
	  	//echo "SELECT * FROM usuario WHERE usuNick='$usuario' AND usuPass='$pw'";
	}
	else{// sino me devuelve 0
		echo '0';
		//echo "SELECT * FROM usuario WHERE usuNick='$usuario' AND usuPass='$pw'";
	}
?>