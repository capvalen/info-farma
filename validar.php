<?php
session_start();
	require("conexion.php");
	$username=$_POST['Usuario'];
	$pass=$_POST['Password'];
	$con1=mysql_query("SELECT * FROM usuario WHERE usuNombre='$username'");
	if($c1=mysql_fetch_array($con1)){
		if($pass==$c1['usuPassword']){
			$_SESSION['idUsuario']=$c1['idUsuario'];
			$_SESSION['usuNombre']=$c1['usuNombre'];
			echo '<script>alert("BIENVENIDO ADMINISTRADOR")</script> ';
			echo "<script>location.href='index.html'</script>";
		}
	}
	$con2=mysql_query("SELECT * FROM usuario WHERE usuNombre='$username'");
	if($c2=mysql_fetch_array($con2)){
		if($pass==$c2['usuPassword']){
			$_SESSION['idUsuario']=$c2['idUsuario'];
			$_SESSION['usuNombre']=$c2['usuNombre'];
			echo "<script>location.href='index.html'</script>";
		}else{
			echo '<script>alert("CONTRASEÑA INCORRECTA")</script> ';		
			echo "<script>location.href='login.php'</script>";
		}
	}else{
		echo '<script>alert("ESTE USUARIO NO EXISTE, PORFAVOR REGISTRESE PARA PODER INGRESAR")</script> ';
		echo "<script>location.href='login.php'</script>";	
	}
?>
