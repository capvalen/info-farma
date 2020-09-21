desconectar<?php
//session_start();


setcookie("ckAtiende", "", time() - 3600, '/');
setcookie("cknomCompleto", "", time() - 3600, '/');
setcookie("ckPower", "", time() - 3600, '/');
setcookie("ckidUsuario", "", time() - 3600, '/');

unset($_COOKIE['ckAtiende']);
unset($_COOKIE['cknomCompleto']);
unset($_COOKIE['ckPower']);
unset($_COOKIE['ckidUsuario']);


if ($_SESSION['Sucursal']) {
	session_destroy();
}
header("location:..\index.php");
?>