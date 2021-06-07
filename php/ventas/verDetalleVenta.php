<?php 
include 'conectkarl.php';

//echo $_POST['detalle'];
$filas = array();

$sql="SELECT dv.*, p.prodNombre FROM `detalleventas` dv
inner join producto p on p.idProducto = dv.idProducto
where idVenta = {$_POST['detalle']}; ";
$resultado=$cadena->query($sql);
while($row=$resultado->fetch_assoc()){ 
	$filas[] = $row;
}
echo json_encode($filas)
?>