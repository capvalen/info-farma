<?php 
include __DIR__.'./../conectkarl.php';
include __DIR__.'./../variablesGlobales.php';

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
		<td>
			<button class="btn btn-success btn-sm btn-outline btnSinBorde" onclick="cambiarFechaLote(<?= $row['idDetalle']?>, '<?= $row['prodFechaVencimiento']?>')"><i class="icofont icofont-calendar"></i></button>
			<button class="btn btn-danger btn-sm btn-outline btnSinBorde" onclick='borrarLote(<?= $row['idDetalle']?>)'><i class="icofont icofont-close"></i></button>
			<?php if(in_array( $_COOKIE['ckPower'], $admis)): ?>
			<?php endif; ?>
		</td>
	</tr>
	<?php $i++;
}
?>
 
