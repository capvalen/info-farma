<?php
session_start();
if ($_SESSION['usuNombre']) {
	session_destroy();
	header("location:login.html");
}else{
	header("location:login.html");
}
?>