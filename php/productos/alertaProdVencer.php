<?php 
include "conectkarl.php";

$sql="SELECT count(p.idProducto) as contador FROM `producto` p inner join detalleproductos dp on dp.idProducto = p.idProducto where prodAlertaStock =1 and prodActivo=1 and idPropiedadProducto<>4 and datediff(prodFechaVencimiento, now() )<91
";
$resultado=$cadena->query($sql);
$row=$resultado->fetch_assoc();

if($row['contador']>=1):
?>
<div class="alert alert-danger" style="color: #ab2320; background-color: #ffd1d15c;" role="alert"><strong>Alerta!</strong> Hay, <?= $row['contador']; ?> productos que están próximos a vencer. </div>
<?php endif; ?>