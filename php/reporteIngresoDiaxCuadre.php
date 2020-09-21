<?php 
require("conectkarl.php");

$sql = mysqli_query($conection,"call reporteIngresoDiaxCuadre('".$_GET['cuadre']."');");
$totalRow= mysqli_num_rows($sql);
$sumaIngr=0;
$boton='';

$i=0;
$efectivo=0; $banco=0; $tarjeta=0;
if($_COOKIE['ckPower']==1 || $_COOKIE['ckPower']==8): $boton = "<button class='btn btn-sm btn-negro btn-outline btnEditarCajaMaestra'><i class='icofont icofont-edit'></i></button>"; else: $boton=''; endif;

if($totalRow>=1){
	while($row = mysqli_fetch_array($sql, MYSQLI_ASSOC)){
		$i++;
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
			<th scope='row'> <?php if($row['idProducto']>0){ ?> <a href='productos.php?idProducto=<?= $row['idProducto'];?>#tabMovEstados'>#<?= $row['idProducto'];?></a> <?php } ?> </th>
			<td class='mayuscula'><?= $row['catprodDescipcion'].' '. $row['prodNombre'];?></td>
			<td class='mayuscula tpIdDescripcion'><?= $row['movDescripcion'];?></td>
			<td><i class="icofont icofont-bubble-right"></i> <em class="mayuscula"><?= $row['usuNick'];?></em></td>
			<td>S/ <span class='spanCantv3'><?= $row['pagoMonto'];?></span></td>
			<td class='mayuscula tdMoneda' data-id="<?= $row['cajaMoneda'];?>" ><?= $row['moneDescripcion'];?></td>
			<td class='mayuscula tdObservacion'><?= $row['cajaObservacion'];?></td>
			<td><span class="sr-only fechaPagov3"><?= $row['cajaFecha']; ?></span> <?= $boton; ?></td> </tr>
		<?php 
	/* 	if($totalRow==$i){
			
		} */
	}
}
$btnVentas = "<button class='btn btn-success btn-outline'><i class='icofont icofont-basket'></i></button>";
$sumaVentas =0;
$sqlVentas="SELECT `idVenta`, ifnull(`ventRuc`, 'Cliente sin DNI') as cliente, `ventFecha`, `ventSubtotal`, `ventIGV`, format(`ventTotal`, 2) as ventTotal, returnNombreUsuario(`idUsuario`) as usuNombre, ventActivo, v.idMoneda, m.moneDescripcion, ventObservacion
FROM `ventas` v inner join moneda m on m.idMoneda = v.idMoneda
WHERE ventFecha between '" . $_POST['fechaInicio']. "' and '" . $_POST['fechaFin']."' and ventActivo=1;";
//echo $sqlVentas;
$resultadoVentas=$cadena->query($sqlVentas);
$totalVentas=$resultadoVentas->num_rows;
if($totalVentas>=1){
	while($rowVentas=$resultadoVentas->fetch_assoc()){ 
		$sumaVentas+=floatval($rowVentas['ventTotal']); ?>

		<tr data-id="<?= $rowVentas['idVenta']; ?>" data-activo="<?= $rowVentas['ventActivo']; ?>" esVenta='si'>
			<th scope='row'> V-<?= $rowVentas['idVenta'] ?> </th>
			<td class='mayuscula'><?= $rowVentas['cliente'] ?></td>
			<td class='mayuscula tpIdDescripcion'>Venta</td>
			<td><i class="icofont icofont-bubble-right"></i> <em class="mayuscula"><?= $rowVentas['usuNombre'];?></em></td>
			<td>S/ <span class='spanCantv3'><?= $rowVentas['ventTotal'];?></span></td>
			<td class='mayuscula tdMoneda' data-id="<?= $rowVentas['idMoneda'];?>" ><?= $rowVentas['moneDescripcion'];?></td>
			<td class='mayuscula tdObservacion'><?= $rowVentas['ventObservacion'];?></td>
			<td><span class="sr-only fechaPagov3"><?= $rowVentas['ventFecha']; ?></span> <?php /* $boton; */ ?></td> </tr>
		<?php 
	}
}
$sumaIngr+=floatval($sumaVentas);
if($totalRow==0 && $totalVentas==0){
	echo "<tr> <th scope='row'></th> <td >No se encontraron resultados en ésta fecha.</td> <td class='mayuscula'></td> <td></td> <td>S/ <span id='strSumaEntrada' data-efectivo ='{$efectivo}' data-banco ='{$banco}' data-tarjeta ='{$tarjeta}'>0.00</span></td></tr>";
}else{
	echo '<tr> <th scope="row"  style="border-top: transparent;"></th> <td style="border-top: transparent;"></td> <td style="border-top: transparent;"></td> <td class="text-center" style="border-top: 1px solid #989898; color: #636363"><strong >Total</strong></td> <td style="border-top: 1px solid #989898; color: #636363"><strong >S/ <span id="strSumaEntrada" data-efectivo ="'.$efectivo.'" data-banco ="'.$banco.'" data-tarjeta ="'.$tarjeta.'">'.number_format(round($sumaIngr,1,PHP_ROUND_HALF_UP),2, ',', '').'</span></strong></td><tr>';
}

mysqli_close($conection); //desconectamos la base de datos

?>
