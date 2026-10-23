
<?php 
date_default_timezone_set('America/Lima');
include __DIR__.'./../conectkarl.php';

$sql="SELECT dv.*, p.prodNombre, date_format( `ventFecha`, '%Y/%m/%d %h:%i') as fechaVenta, `ventSubtotal`, `ventIGV`, `ventTotal`, `ventCambioVuelto`, `idMoneda`, `ventActivo`, returnNombreUsuario(v.`idUsuario`) as usuNombre, round(detentPrecioparcial - returnCostoProducto(p.idProducto) * detventCantidad,2) as ganancia, tipo, c.razon, c.ruc, dv.presentacion
FROM `detalleventas` dv
inner join ventas v on v.idVenta = dv.idVenta
inner join producto p on p.idProducto = dv.idProducto
inner join clientes c on c.id = v.idCliente
where ventActivo=1 and ventFecha between concat( '{$_POST['fecha1']}' , ' 00:00:00') and concat( '{$_POST['fecha2']}', ' 23:59:59')
and tipo = -1
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
		<td><?= $row['presentacion']; ?></td>
		<td><?= $row['detventCantidad']; ?></td>
		<td><?= $row['detventPrecio']; ?></td>
		<td class="mayuscula"><?= $row['prodNombre']; ?></td>
		<td class="tdTotales"><?= number_format($row['detventCantidad'] * $row['detventPrecio'],2); ?></td>
		<td><?= $row['ruc']; ?></td>
		<td><?= $row['razon']; ?></td>
		<td><?= $row['usuNombre']; ?></td>
	</tr>
<?php	
$i++; }

?>