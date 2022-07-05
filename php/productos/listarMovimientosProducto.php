<?php 
include __DIR__.'./../conectkarl.php';

$suma=[2,4, 15, 16];
$resta=[1, 3, 5, 6, 7];

$sql="SELECT `idStock`, `idProducto`, `stoCant`, m.movDescripcion , date_format(`stoFecha`, '%d/%m/%Y %h:%m %p') aS stoFecha, `stoObservacion`, `stoActivo`, concat( u.usuNombre,' ', u.usuApellidos) as usuNombre, s.idMovimiento FROM `stock` s 
inner join usuario u on u.idUsuario=s.idUsuario
inner join movimiento m on m.idMovimiento=s.idMovimiento
where idProducto = {$_POST['idProducto']} and stoActivo =1
order by idStock desc 
limit 20";
$resultado=$cadena->query($sql);
$cant=$resultado->num_rows; $i=1; $obs='';
while($row=$resultado->fetch_assoc()){

	if( in_array( $row['idMovimiento'], $suma )){ $signo='+'; }else{ $signo='-'; }
	if($row['stoObservacion']<>''){$obs =" <strong>Obs.:</strong> ".$row['stoObservacion']; }else{ $obs='';}
	?> 
	<tr>
		<td><?= $i; ?></td>
		<td><?= $row['movDescripcion']. $obs; ?></td>
		<td><?= $signo.$row['stoCant']; ?></td>
		<td><?= $row['stoFecha']; ?></td>
		<td><?= $row['usuNombre']; ?></td>
		<td><?php if( in_array($_COOKIE['ckPower'], [1])):?>
			<button class='btn btn-danger btn-outline btnSinBorde mitooltip btn-sm' title="Revertir movimiento" onclick="borrarMovimiento(<?= $row['idStock']?>);"><i class="icofont icofont-undo"></i></button>
		<?php endif;?></td>
	</tr>
	<?php $i++;
}

?>
