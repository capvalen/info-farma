
<?php 
date_default_timezone_set('America/Lima');
include '../conectkarl.php';

$sql="SELECT dv.*, p.prodNombre, date_format( `ventFecha`, '%Y/%m/%d %h:%i') as fechaVenta, `ventSubtotal`, `ventIGV`, `ventTotal`, `ventCambioVuelto`, `idMoneda`, `ventActivo`, returnNombreUsuario(v.`idUsuario`) as usuNombre, round(detentPrecioparcial - returnCostoProducto(p.idProducto) * detventCantidad,2) as ganancia
FROM `detalleventas` dv
inner join ventas v on v.idVenta = dv.idVenta
inner join producto p on p.idProducto = dv.idProducto
where ventActivo=1 and ventFecha between concat( '{$_POST['fecha1']}' , ' 00:00:00') and concat( '{$_POST['fecha2']}', ' 23:59:59')
order by ventFecha asc";
//echo $sql;
$resultado=$cadena->query($sql);
$i=0;
while($row=$resultado->fetch_assoc()){ 
?> 
	<tr>
		<td><?= $i+1; ?></td>
		<td>V-<?= $row['idVenta']; ?></td>
		<td><?= $row['fechaVenta']; ?></td>
		<td><?= $row['ventCambioVuelto']; ?></td>
		<td><?= $row['detventCantidad']; ?></td>
		<td><?= $row['detventPrecio']; ?></td>
		<td class="mayuscula"><?= $row['prodNombre']; ?></td>
		<td class="tdTotales"><?= $row['detentPrecioparcial']; ?></td>
		<td class="tdGanancia"><?= $row['ganancia'] ; ?></td>
		<td><?= $row['usuNombre']; ?></td>
	</tr>
<?php	
$i++; }

?>