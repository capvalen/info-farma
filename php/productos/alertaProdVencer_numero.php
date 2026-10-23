<?php 
include __DIR__.'./../conectkarl.php';

$sql="SELECT count(p.idProducto) as contador FROM `producto` p inner join detalleproductos dp on dp.idProducto = p.idProducto where prodAlertaStock =1 and prodActivo=1 and idPropiedadProducto<>4
and datediff(prodFechaVencimiento, now() )<91 and dp.prodDisponible<>0
order by prodNombre asc";
$resultado=$cadena->query($sql);
$row=$resultado->fetch_assoc();

$vencera = $row['contador'];
?>