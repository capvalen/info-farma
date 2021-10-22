<?php 
header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=Movimientos.xls");
header("Pragma: no-cache");
header("Expires: 0");
?> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<table>
	<tbody>
		<tr>
			<td>Cajero</td>
			<td><?= $_POST['abre']; ?></td>
		</tr>
		<tr>
			<td>Monto apertura</td>
			<td>S/ <?= $_POST['montoAbre']; ?></td>
		</tr>
		<tr>
			<td>Fecha apertura</td>
			<td>S/ <?= $_POST['fechaAbre']; ?></td>
		</tr>
		<tr>
			<td>Obs. apertura</td>
			<td>S/ <?= $_POST['obsAbre']; ?></td>
		</tr>
		
		<tr>
			<td>Monto cierre</td>
			<td>S/ <?= $_POST['montoCierre']; ?></td>
		</tr>
		<tr>
			<td>Fecha cierre</td>
			<td>S/ <?= $_POST['fechaCierre']; ?></td>
		</tr>
		<tr>
			<td>Obs. cierre</td>
			<td>S/ <?= $_POST['obsCierre']; ?></td>
		</tr>
		<tr></tr>
		<tr><th>Ingresos</th></tr>
	</tbody>
</table>
<?php

echo $_POST['tablaEntradas'];
?> 
<table>
	<tbody>
		<tr></tr>
		<tr><th>Salidas</th></tr>
	</tbody>
</table>
<?php
echo $_POST['tablaSalidas'];

?>
<table>
	<tbody>
		<tr></tr>
		<tr></tr>
		<tr>
			<td>Cierre sistema</td>
			<td><?= $_POST['totalSistema']; ?></td>
		</tr>
		<tr>
			<td>Conteo manual</td>
			<td><?= $_POST['conteoManual']; ?></td>
		</tr>
	</tbody>
</table>