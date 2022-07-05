<?php 
include __DIR__.'./../conectkarl.php';

$sql="SELECT * FROM `clientes` where ruc = '{$_POST['ruc']}' limit 1; ";
$resultado=$cadena->query($sql);
$row=$resultado->fetch_assoc();

echo json_encode($row);
?>