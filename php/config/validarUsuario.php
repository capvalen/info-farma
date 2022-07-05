<?php
session_start();
include '../conectkarl.php';

	$username=$_POST['usu'];
	$pass=$_POST['pass'];



	$con1=mysql_query("SELECT * FROM usuario WHERE email='$username'");
	if($c1=mysql_fetch_array($con1)){
		if($pass==$c1['usuPassword']){
			$_SESSION['idUsuario']=$c1['idUsuario'];
			$_SESSION['usu']=$c1['usu'];
			//echo '<script>alert("BIENVENIDO ADMINISTRADOR")</script> ';
			echo "<script>location.href='index.php'</script>";
		}
	}



	$con2=mysql_query("SELECT * FROM usuario WHERE email='$username'");
	if($c2=mysql_fetch_array($con2)){
		if($pass==$c2['pass']){
			$_SESSION['idInquilino']=$c2['idInquilino'];
			$_SESSION['nombre']=$c2['nombre'];
			echo "<script>location.href='adminUsu.php'</script>";
		}else{
			echo '<script>alert("CONTRASEÑA INCORRECTA")</script> ';
		
			echo "<script>location.href='index.php'</script>";
		}
	}else{
		
		echo '<script>alert("ESTE USUARIO NO EXISTE, PORFAVOR REGISTRESE PARA PODER INGRESAR")</script> ';
		
		echo "<script>location.href='index.php'</script>";	

	}

?>
