<?php 
header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=MovimientosCompletos.xls");
header("Pragma: no-cache");
header("Expires: 0");

date_default_timezone_set('America/Lima');
include '../conectkarl.php';

$sumaIngesos =0; $sumaSalidas=0;

?>

<table class="table table-hover">
	<thead>
		<tr>
			<th>#</th>
			<th>Cod.</th>
			<th>Nombre</th>
			<th>Stock Min</th>
			<th>Stock Act.</th>
			<th>Precio</th>
			<th>Costo</th>
			<th>Porcentaje</th>
			<th>Categoría</th>
		</tr>
	</thead>
	<tbody>
<?php 
$i=1;
$sql="call reporteEgresoDiaxCuadreFechas('".$_POST['fecha1']."', '{$_POST['fecha2']}');"; //echo $sql;
$resultado=$cadena->query($sql);
while($row=$resultado->fetch_assoc()){
	$sumaSalidas+=floatval($row['pagoMonto']);
	?>
	<tr data-id="<?= $row['idCaja']; ?>" data-activo="<?= $row['cajaActivo']; ?>">
		<th><?= $i; ?></th>
		<td><?= $row['cajaFecha']; ?></td>
		<td class='mayuscula tpIdDescripcion'><?= $row['movDescripcion'];?></td>
		<td><i class="icofont icofont-bubble-right"></i> <em class="mayuscula"><?= $row['usuNick'];?></em></td>
		<td>S/ <span class='spanCantv3'><?= $row['pagoMonto'];?></span></td>
		<td class='mayuscula tdMoneda' data-id="<?= $row['cajaMoneda'];?>" ><?= $row['moneDescripcion'];?></td>
		<td class='mayuscula tdObservacion'><?= $row['cajaObservacion'];?></td>
	</tr>
<?php $i++; }

$sqlVentas="SELECT `idVenta`, ifnull(`ventRuc`, 'Cliente sin DNI') as cliente, `ventFecha`, `ventSubtotal`, `ventIGV`, format(`ventTotal`, 2) as ventTotal, returnNombreUsuario(v.idUsuario) as usuNombre, ventActivo, v.idMoneda, m.moneDescripcion, ventObservacion
FROM `ventas` v inner join moneda m on m.idMoneda = v.idMoneda
WHERE ventFecha between concat(cu.fechaInicio, ' 00:00:00') and concat(cu.fechaFin , ' 23:59:59')
and ventActivo=1; ";
$resultadoVentas=$esclavo->query($sqlVentas);
while($rowVentas=$resultadoVentas->fetch_assoc()){ 
	$sumaIngesos+=floatval($rowVentas['ventTotal']);
		?>

		<tr data-id="<?= $rowVentas['idVenta']; ?>" data-activo="<?= $rowVentas['ventActivo']; ?>" esVenta='si'>
			<th><?= $i; ?></th>
			<td scope='row'> <?= $rowVentas['ventFecha'] ?> </td>
			<td class='mayuscula tpIdDescripcion'>Venta</td>
			<td><i class="icofont icofont-bubble-right"></i> <em class="mayuscula"><?= $rowVentas['usuNombre'];?></em></td>
			<td>S/ <span class='spanCantv3'><?= $rowVentas['ventTotal'];?></span></td>
			<td class='mayuscula tdMoneda' data-id="<?= $rowVentas['idMoneda'];?>" ><?= $rowVentas['moneDescripcion'];?></td>
			<td class='mayuscula tdObservacion'><?= $rowVentas['ventObservacion'];?></td>
			<td><span class="sr-only fechaPagov3"><?= $rowVentas['ventFecha']; ?></span> 
		</tr>
	<?php
$i++; }


$sqlIngresos="call reporteIngresoDiaxCuadreFechas('".$_POST['fecha1']."', '{$_POST['fecha2']}');";// echo $sqlIngresos;
$resultadoIngresos=$cautivo->query($sqlIngresos);
while($rowIngresos=$resultadoIngresos->fetch_assoc()){ 
	$sumaIngesos+=floatval($rowIngresos['pagoMonto']);
	?> 
	<tr data-id="<?= $rowIngresos['idCaja']; ?>" data-activo="<?= $rowIngresos['cajaActivo']; ?>">
		<th><?= $i; ?></th>
		<td><?= $rowIngresos['cajaFecha']; ?></td>
		<td class='mayuscula tpIdDescripcion'><?= $rowIngresos['movDescripcion'];?></td>
		<td><i class="icofont icofont-bubble-right"></i> <em class="mayuscula"><?= $rowIngresos['usuNick'];?></em></td>
		<td>S/ <span class='spanCantv3'><?= $rowIngresos['pagoMonto'];?></span></td>
		<td class='mayuscula tdMoneda' data-id="<?= $rowIngresos['cajaMoneda'];?>" ><?= $rowIngresos['moneDescripcion'];?></td>
		<td class='mayuscula tdObservacion'><?= $rowIngresos['cajaObservacion'];?></td>
	</tr>
	<?php
$i++;}
?>
	</tbody>
	<tfoot>
		<tr>
			<td colspan=3></td>
			<th>Suma Ingresos</th>
			<th><?= number_format($sumaIngesos,2); ?></th>
		</tr>
		<tr>
			<td colspan=3></td>
			<th>Suma Salidas</th>
			<th><?= number_format($sumaSalidas,2); ?></th>
		</tr>
		<tr>
			<td colspan=3></td>
			<th>Total</th>
			<th><?= number_format($sumaIngesos- $sumaSalidas,2); ?></th>
		</tr>
		
	</tfoot>
</table>