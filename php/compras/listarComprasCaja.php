<?php 
$sumaSalidas=0;
?>

<table class="table table-hover">
	<thead>
		<tr>
			<th>#</th>
			<th>Fecha</th>
			<th>Monto</th>
			<th>Detalle</th>
		</tr>
	</thead>
	<tbody>
<?php 
$i=1;


date_default_timezone_set('America/Lima');
include "../conectkarl.php";

$filas = array();

$sql="SELECT *, date_format(cajaFecha, '%d/%m/%Y') as fechaLat FROM `caja`
where idTipoProceso = 2 and cajaActivo=1
and cajaFecha between '{$_POST['fechaInicio']} 00:00:00' and '{$_POST['fechaFinal']} 23:59:59'; ";
//echo $sql;
$resultado=$cadena->query($sql);
while($row=$resultado->fetch_assoc()){
	$sumaSalidas+=floatval($row['cajaValor']);
	?>
	<tr data-id="<?= $row['idCaja']; ?>" data-activo="<?= $row['cajaActivo']; ?>">
		<th><?= $i; ?></th>
		<td><?= $row['fechaLat']; ?></td>
		<td><?= number_format($row['cajaValor'],2); ?></td>
		<td class="text-capitalize"><?= $row['cajaObservacion']; ?></td>
	</tr>
<?php } ?>
	</tbody>
	<tfoot>
		<tr>
			<td colspan=2></td>
			<th>Suma</th>
			<th><?= number_format($sumaSalidas,2); ?></th>
		</tr>
		
		
	</tfoot>
</table>
