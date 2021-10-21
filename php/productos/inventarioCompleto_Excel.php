<?php
	header("Content-type: application/vnd.ms-excel; charset=utf-8");
	header('Content-Disposition: attachment; filename="Reporte_Todos_Productos_Farmacia.xls"');
	header("Expires: 0");
	header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
	header("Cache-Control: private",false);
	
	?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<table >
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
include 'conectkarl.php';
$i=1;
$sql="SELECT `idProducto`, `prodNombre`, `prodStock`, `prodStockMinimo`, `prodPrecio`, `prodCosto`, `prodPorcentaje` , ca.catprodDescipcion
FROM `producto` pro
inner join categoriaproducto ca on ca.idCategoriaProducto = pro.idCategoriaProducto
WHERE pro.prodActivo=1";
$resultado=$cadena->query($sql);
while($row=$resultado->fetch_assoc()){ ?>
		<tr>
			<td><?= $i; ?></td>
			<td><?= $row['idProducto']; ?></td>
			<td class="mayuscula"><?= $row['prodNombre']; ?></td>
			<td><?= $row['prodStockMinimo']; ?></td>
			<td><?= $row['prodStock']; ?></td>
			<td><?= $row['prodPrecio']; ?></td>
			<td><?= $row['prodCosto']; ?></td>
			<td><?= $row['prodPorcentaje']; ?></td>
			<td><?= $row['catprodDescipcion']; ?></td>
			
		</tr>
<?php $i++; } ?>
	</tbody>
</table>