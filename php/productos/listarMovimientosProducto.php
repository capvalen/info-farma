<?php 
include '../config/conexion.php';

$suma=[2,4];
$resta=[1, 3, 5, 6, 7];

$sql="SELECT `idStock`, `idProducto`, `stoCant`, m.movDescripcion , date_format(`stoFecha`, '%d/%m/%Y') aS stoFecha, `stoObservacion`, `stoActivo`, concat( u.usuNombre,' ', u.usuApellidos) as usuNombre, s.idMovimiento FROM `stock` s 
inner join usuario u on u.idUsuario=s.idUsuario
inner join movimiento m on m.idMovimiento=s.idMovimiento
where idProducto = {$_POST['idProducto']}
order by stoFecha desc
limit 20";
$resultado=$cadena->query($sql);
$cant=$resultado->num_rows; $i=1;
while($row=$resultado->fetch_assoc()){

	if( in_array( $row['idMovimiento'], $suma )){ $signo='+'; }else{ $signo='-'; }
	if($row['stoObservacion']<>''){$obs =" <strong>Obs.:</strong> ".$row['stoObservacion']; }else{ $obs='';}
	?> 
	<tr>
		<td><?= $i; ?></td>
		<td><?= $row['movDescripcion'].$obs; ?></td>
		<td><?= $signo.$row['stoCant']; ?></td>
		<td><?= $row['stoFecha']; ?></td>
		<td><?= $row['usuNombre']; ?></td>
	</tr>
	<?php $i++;
}

?>
<tr>
	<td><?= $i?></td>
	<td>Producto registrado</td>
	<td></td>
	<td id="emFechaProd"></td>
	<td>Sistema</td>
</tr>