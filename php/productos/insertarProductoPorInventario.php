<?php 
header('Content-Type: text/html; charset=utf8');
require("../config/conexion.php");


$sql= "call insertarProductoPorInventario ('".$_POST['nombre']."',".$_POST['cantidad'].",".$_POST['stockMin'].",'".$_POST['categoria']."',".$_POST['precio'].",'".$_POST['lote']."','".$_POST['fecha']."',1, ".$_POST['idCompr'].", '".$_POST['labo']."', '".$_POST['propi']."')";
 
//echo $sql;
//mysqli_query($conection,$sql) or die(mysqli_error($db); //Ejecución simple para la sentencia sql
mysqli_query($conection, $sql) or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error(), E_USER_ERROR);


echo 1;

?>