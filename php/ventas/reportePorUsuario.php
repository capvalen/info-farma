<?php
date_default_timezone_set('America/Lima');
include 'conectkarl.php';


$sql="SELECT round(sum(ventTotal),2) as total, lower(returnNombreUsuario(idUsuario)) as usuario, date_format( ventFecha, '%d/%d/%Y') as fecha  FROM `ventas`
where date_format(ventFecha, '%Y-%m-%d') BETWEEN '{$_POST['fecha1']}' and '{$_POST['fecha2']}' and ventActivo = 1
group by date_format( ventFecha, '%Y-%m-%d'), idUsuario  order by idVenta;";
$resultado=$cadena->query($sql);
$i=0;
?>
<table class="table table-hover">
	<thead>
		<tr>
			<th>N°</th>
			<th>Usuario</th>
			<th>Fecha</th>
			<th>Total</th>
		</tr>
	</thead>
	<tbody>
		<?php
		while($row=$resultado->fetch_assoc()){ ?> 
		<tr>
			<td><?= $i+1; ?></td>
			<td class="text-capitalize"><?= $row['usuario']; ?></td>
			<td><?= $row['fecha']; ?></td>
			<td><?= $row['total']; ?></td>
		</tr>
		<?php	$i++; 
		} ?>
	</tbody>
</table>