
<?php 
date_default_timezone_set('America/Lima');
include __DIR__.'./../conectkarl.php';

$sql="SELECT `idVenta`, date_format( `ventFecha`, '%Y/%m/%d %h:%i') as fechaVenta, `ventSubtotal`, `ventIGV`, `ventTotal`, ve.`idUsuario`, `ventCambioVuelto`, `idMoneda`, `ventActivo`, u.usuNombre FROM `ventas` ve
inner join usuario u on u.idUsuario = ve.idUsuario
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
		<td><?= $row['ventSubtotal']; ?></td>
		<td><?= $row['ventIGV']; ?></td>
		<td class="tdTotales"><?= $row['ventTotal']; ?></td>
		<td><?= $row['usuNombre']; ?></td>
	</tr>
<?php	
$i++; }

?>