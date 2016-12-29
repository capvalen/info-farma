<?php
session_start();
if ($_SESSION['usuNombre']) {
	session_destroy();
	header("location:login.php");
}else{
	header("location:login.php");
}
?>