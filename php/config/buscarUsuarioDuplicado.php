<?php 

include '../conectkarl.php';

$sql="SELECT * FROM `usuario` where usuUser = '{$_POST['nick']}' ; ";
//echo $sql;
$resultado=$cadena->query($sql);

echo $resultado->num_rows;
?>