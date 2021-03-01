<table class="table table-hover">
<thead>
	<tr>
		<th>#</th>
		<th>Cod.</th>
		<th>Nombre</th>
		<th>Stock mínimo</th>
		<th>Stock Actual</th>
		<th>Resetear</th>
	</tr>
</thead>
<tbody>
<?php 
include 'conectkarl.php';

$sql="SELECT `idProducto`, `prodNombre`, `prodStock`, `prodStockMinimo` FROM `producto` 
where prodStock<prodStockMinimo and prodActivo=1 and prodAlertaStock=1";
$resultado=$cadena->query($sql); $i=1;
while($row=$resultado->fetch_assoc()){ 
	?> 
		<tr>
			<td><?= $i; ?></td>
			<td><?= $row['idProducto']; ?></td>
			<td class="mayuscula"><?= $row['prodNombre']; ?></td>
			<td><?= $row['prodStockMinimo']; ?></td>
			<td><?= $row['prodStock']; ?></td>
			<td><button class="btn btn-negro btn-outline" onclick="resetearStock(<?= $row['idProducto'];?>)"><i class="icofont icofont-exclamation"></i></button></td>
		</tr>
	<?php
$i++; } ?>


	
</tbody>
</table>