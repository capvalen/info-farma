<table class="table table-hover">
	<thead>
		<tr>
			<th>N°</th>
			<th>Mes - Año</th>
			<th>Cantidad (Und.)</th>
		</tr>
	</thead>
	<tbody>
		
	

<?php
include __DIR__.'./../conectkarl.php';

$sql = "SELECT sum(detventCantidad) as suma, date_format(v.ventFecha, '%m-%Y') as fechas FROM `detalleventas` dv
inner join ventas v on v.idVenta = dv.idVenta
where dv.idProducto = {$_POST['idProducto']}
GROUP by date_format(v.ventFecha, '%Y-%m')
order by v.ventFecha desc;";
//echo $sql;


$resultado = $cadena->query($sql);
$i=0; $suma = 0;
if( $resultado->num_rows==0){
	?>
	<tr>
		<td></td>
		<td >No se tienen registro de ventas</td>
		<td></td>
	</tr>
	<tr class="hidden d-none">
		<td></td><td></td>
		<td class="suma">0</td>
	</tr>
	<?php
}
$cantidad =0;
while($row = $resultado->fetch_assoc()){
	$i++;
	if($cantidad<3){
		$suma+=$row['suma']; $cantidad++;
	}
	?>
	<tr>
		<td><?= $i;?></td>
		<td class="mayuscula"><?= mesNombre($row['fechas'])?></td>
		<td ><?= $row['suma']?></td>
	</tr>
	<?php

}
	
?>
<tr class="hidden d-none">
	<td></td><td></td>
	<td class="suma"><?= $suma?></td>
</tr>
</tbody>
</table>
<?php
function mesNombre($texto){
	$mes = substr($texto, 0,2);
	switch ($mes) {
		case 1: case '1': case '01': return 'enero '. substr($texto,-4) ; break;
		case 2: case '2': case '02':return 'febrero '. substr($texto,-4) ; break;
		case 3: case '3': case '03':return 'marzo '. substr($texto,-4) ; break;
		case 4: case '4': case '04':return 'abril '. substr($texto,-4) ; break;
		case 5: case '5': case '05':return 'mayo '. substr($texto,-4) ; break;
		case 6: case '6': case '06':return 'junio '. substr($texto,-4) ; break;
		case 7: case '7': case '07':return 'julio '. substr($texto,-4) ; break;
		case 8: case '8': case '08':return 'agosto '. substr($texto,-4) ; break;
		case 9: case '9': case '09':return 'septiembre '. substr($texto,-4) ; break;
		case 10: case '10': case '10':return 'octubre '. substr($texto,-4) ; break;
		case 11: case '11': case '11':return 'noviembre '. substr($texto,-4) ; break;
		case 12: case '12': case '12':return 'diciembre '. substr($texto,-4) ; break;
		default: # code...
		break;
	}

}
?>