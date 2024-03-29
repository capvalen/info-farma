<?php 
require("conectkarl.php");

$sql = mysqli_query($conection,"call reporteIngresoDiaxCuadre('".$_GET['cuadre']."');");
$totalRow= mysqli_num_rows($sql);
$sumaIngr=0;
$boton='';

$i=1;
$efectivo=0; $banco=0; $tarjeta=0;
if( in_array($_COOKIE['ckPower'], $soloDios) ): $boton = "<span class='btnEditarCajaMaestra'><i class='icofont icofont-edit'></i></span>";
else: $boton=''; endif;

if($totalRow>=1){
	while($row = mysqli_fetch_array($sql, MYSQLI_ASSOC)){
		$sumaIngr+=floatval($row['pagoMonto']);
		switch($row['cajaMoneda']){
			case '1': 
				$efectivo = $efectivo + $row['pagoMonto'];
			break;
			case '2': 
				$banco = $banco + $row['pagoMonto'];
			break;
			case '3':
			case '4':
				$tarjeta = $tarjeta + $row['pagoMonto'];
			break;
			default:
			break;
		}
		?>

		<tr data-id="<?= $row['idCaja']; ?>" data-activo="<?= $row['cajaActivo']; ?>">
			<th scope='row'> <?= $i; ?> </th>
			
			<td class='mayuscula tpIdDescripcion'><span><?= $row['movDescripcion'];?></span>
				<?php if($row['cajaObservacion']!=''){ ?>
					<br><em class="mayuscula">Obs: <?= $row['cajaObservacion']; ?></em>
				<?php } ?>
			</td>
			<td><?= strtolower($row['hora']);?></td>
			<td><i class="icofont icofont-bubble-right"></i> <em class="mayuscula"><?= $row['usuNick'];?></em></td>
			<td>S/ <span class='spanCantv3'><?= $row['pagoMonto'];?></span></td>
			<td class='mayuscula tdMoneda' data-id="<?= $row['cajaMoneda'];?>" ><?= $row['moneDescripcion'];?></td>
			
			<td><span class="sr-only fechaPagov3 prueba"><?= $row['cajaFecha']; ?></span> <?= $boton; ?></td>
		</tr>
		<?php 

		$i++;

	}
}
$sumaVentas =0;

if( in_array($_COOKIE['ckPower'], $soloCaja) && $rowUltCaja['idCuadre'] === $_GET['cuadre'] && $rowUltCaja['cuaVigente'] === '1' ){
	$ultimaFecha = 'now()';
}else{
	$ultimaFecha = 'cu.fechaFin';
}

$sqlVentas="SELECT `idVenta`, lower(returnNombreCliente(idCliente)) as cliente, `ventFecha`, `ventSubtotal`, `ventIGV`, format(`ventTotal`, 2) as ventTotal, returnNombreUsuario(v.idUsuario) as usuNombre, ventActivo, v.idMoneda, m.moneDescripcion, v.ventObservacion, date_format(ventFecha, '%h:%i %p') as hora
FROM `ventas` v inner join moneda m on m.idMoneda = v.idMoneda
inner join cuadre cu
WHERE ventFecha between cu.fechaInicio and {$ultimaFecha} and cu.idCuadre= {$_GET['cuadre']}  and ventActivo=1 order by ventFecha asc;";
//echo $sqlVentas;
$resultadoVentas=$cadena->query($sqlVentas);
$totalVentas=$resultadoVentas->num_rows;
if($totalVentas>=1){
	while($rowVentas=$resultadoVentas->fetch_assoc()){
	
		$sumaIngr += floatval($rowVentas['ventTotal']);
		switch($rowVentas['idMoneda']){
			case '1': 
				$efectivo = $efectivo + $rowVentas['ventTotal'];
			break;
			case '2': 
				$banco = $banco + $rowVentas['ventTotal'];
			break;
			case '3':
			case '4':
				$tarjeta = $tarjeta + $rowVentas['ventTotal'];
			break;
			default:
			break;
		} ?>

		<tr data-id="<?= $rowVentas['idVenta']; ?>" data-activo="<?= $rowVentas['ventActivo']; ?>" esVenta='si'>
			<th scope='row' style="cursor:pointer;"  onclick="verDetalleVenta('<?= $rowVentas['idVenta']; ?>')"> <?= $i; ?> </th>
			
			<td class='mayuscula tpIdDescripcion' data-tipo="Venta">
				<span style="cursor:pointer; text-font-weight: bold; color: #7030a0;" onclick="verDetalleVenta('<?= $rowVentas['idVenta']; ?>')">
					<i class="icofont icofont-ui-folder"></i> Venta #<?= $rowVentas['idVenta']?>: </span>
					<span class=""><?= $rowVentas['cliente'] ?> </span>
				<?php if($rowVentas['ventObservacion']<>''){ ?>
					<br><em class="mayuscula">Obs: <?= $rowVentas['ventObservacion']; ?></em>
				<?php } ?>
			</td>
			<td><?= strtolower($rowVentas['hora']);?></td>
			<td><i class="icofont icofont-bubble-right"></i> <em class="mayuscula"><?= $rowVentas['usuNombre'];?></em></td>
			<td>S/ <span class='spanCantv3'><?= $rowVentas['ventTotal'];?></span></td>
			<td class='mayuscula tdMoneda' data-id="<?= $rowVentas['idMoneda'];?>" ><?= $rowVentas['moneDescripcion'];?></td>
			
			<td>
				<span class="sr-only fechaPagov3"><?= $rowVentas['ventFecha']; ?></span>
				<?php if( in_array($_COOKIE['ckPower'], $soloCaja) ): ?>
					<span class='btnEditarVentaMaestra' onclick='editarVentaMaestra( <?= $rowVentas['idVenta'] ?>, "<?= $rowVentas['moneDescripcion'] ?>", "<?= $rowVentas['ventObservacion'] ?>")'> <i class='icofont icofont-edit'></i></span>
				<?php endif; ?>
			</td>
		</tr>
		<?php
		$i++;
	}
}

if($totalRow==0 && $totalVentas==0){
	?>
	<tr> <th scope='row'></th> <td >No se encontraron resultados en ésta fecha.</td> <td class='mayuscula'></td> <td></td> <td>S/ <span id='strSumaEntrada' data-efectivo ='<?= $efectivo;?>' data-banco ='<?= $banco?>' data-tarjeta ='<?= $tarjeta ?>'>0.00</span></td></tr>
	<?
}else{
	echo '<tr> <th scope="row"  style="border-top: transparent;"></th> <td style="border-top: transparent;"></td> <td style="border-top: transparent;"></td> <td class="text-center" style="border-top: 1px solid #989898; color: #636363"><strong >Total</strong></td> <td style="border-top: 1px solid #989898; color: #636363"><strong >S/ <span id="strSumaEntrada" data-efectivo ="'.$efectivo.'" data-banco ="'.$banco.'" 
	data-tarjeta ="'.$tarjeta.'">'.number_format(round($sumaIngr,1,PHP_ROUND_HALF_UP),2, ',', '').'</span></strong></td><tr>';
}

mysqli_close($conection); //desconectamos la base de datos

?>
