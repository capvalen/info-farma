
<?php 
include '../conectkarl.php';

$sql="SELECT `idProducto`, `prodNombre`, `prodStock`, `prodStockMinimo` FROM `producto` 
where prodStock<prodStockMinimo and prodActivo=1 and prodAlertaStock=1";
$resultado=$cadena->query($sql); $i=1;
$row=$resultado->fetch_assoc();
$agotara = $resultado->num_rows;
