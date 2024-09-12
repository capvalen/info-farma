<?php
date_default_timezone_set('America/Lima');
include __DIR__.'./../conectkarl.php';


$sql="SELECT round(sum(ventTotal),2) as total, lower(returnNombreUsuario(idUsuario)) as usuario FROM `ventas`
where date_format(ventFecha, '%Y-%m-%d') BETWEEN '{$_POST['fecha1']}' and '{$_POST['fecha2']}' and ventActivo = 1
group by idUsuario order by idVenta;";
$resultado=$cadena->query($sql);
$suma = 0;
$i=0;
?>
<table class="table table-hover">
	<thead>
		<tr>
			<th>N°</th>
			<th>Usuario</th>
			<th>Total</th>
		</tr>
	</thead>
	<tbody>
		<?php
		while($row=$resultado->fetch_assoc()){
			$suma += $row['total']; ?> 
		<tr>
			<td><?= $i+1; ?></td>
			<td class="text-capitalize"><?= $row['usuario']; ?></td>
			<td><?= $row['total']; ?></td>
		</tr>
		<?php	$i++; 
		} ?>
	</tbody>
	<tfoot>
		<tr>
			<td></td>
			<td>Total</td>
			<td>S/ <?= number_format($suma);?></td>
		</tr>
	</tfoot>
</table>