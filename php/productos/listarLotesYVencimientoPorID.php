<?php 
include '../config/conexion.php';

/* $filas=array();
$log = mysqli_query($conection,"call listarLotesYVencimientoPorID(".$_POST['idPro'].");");
while($row = mysqli_fetch_array($log))
{
	$filas[]= array('prodLote' => $row['prodLote'],
		'prodFechaVencimiento' => $row['prodFechaVencimiento'],
		'prodFechaRegistro' => $row['prodFechaRegistro']
	);
}
echo json_encode($filas); */

$sql="call listarLotesYVencimientoPorID(".$_POST['idPro'].");";
$resultado=$cadena->query($sql);
$i=1;
$num=$resultado->num_rows;
if($num==0){
	?> 
	<tr>
		<td>1</td>
		<td>No tiene lotes registrados</td>
		<td>-</td>
		<td>0</td>
		<td></td>
	</tr>
	<?php
}
while($row=$resultado->fetch_assoc()){ 
	?> 
	<tr>
		<td><?= $i; ?></td>
		<td><?= $row['prodLote']; ?></td>
		<td><span class="fechaVencimiento"><?= $row['prodFechaVencimiento']; ?></span> <span class="fechaHumana"></span></td>
		<td><?= $row['prodCantidadXLote']; ?></td>
		<td><button class="btn btn-danger btn-sm btn-outline" onclick='borrarLote(<?= $row['idDetalle']?>)'><i class="icofont icofont-trash"></i></button></td>
	</tr>
	<?php $i++;
}
?>
 
