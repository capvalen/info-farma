<?php 
require("conectkarl.php");
//echo "call reporteEgresoDiaxCuadre('".$_GET['cuadre']."');";
$sql = mysqli_query($conection,"call reporteEgresoDiaxCuadre('".$_GET['cuadre']."');");
$totalRow= mysqli_num_rows($sql);
$sumaIngr=0;
$boton='';
 
$i=1;
$efectivo=0; $banco=0; $tarjeta=0;

if($totalRow==0){
	echo "<tr> <th scope='row'></th> <td >No se encontraron resultados en ésta fecha.</td> <td class='mayuscula'></td> <td></td> <td>S/ <span id='strSumaSalida' data-efectivo ='{$efectivo}' data-banco ='$banco' data-tarjeta ='{$tarjeta}'>0.00</span></td></tr>";
}else{
	while($row = mysqli_fetch_array($sql, MYSQLI_ASSOC))
	{
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

		if($_COOKIE['ckPower']==1 ): $boton = "<span class='btnEditarCajaMaestra'><i class='icofont icofont-edit'></i></span>"; 
		else: $boton=''; endif;?>

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
			<td class='mayuscula tdMoneda' data-id="<?= $row['cajaMoneda'];?>"><?= $row['moneDescripcion'];?></td>
			<td><span class="sr-only fechaPagov3"><?= $row['cajaFecha'];  ?></span> <?= $boton;?></td> </tr>
		<?php 
		if($totalRow==$i){
			echo '<tr> <th scope="row"  style="border-top: transparent;"></th>  <td style="border-top: transparent;"></td> <td style="border-top: transparent;"></td> <td class="text-center" style="border-top: 1px solid #989898; color: #636363"><strong >Total</strong></td> <td style="border-top: 1px solid #989898; color: #636363"><strong >S/ <span id="strSumaSalida" data-efectivo ="'.$efectivo.'" data-banco ="'.$banco.'" data-tarjeta ="'.$tarjeta.'">'.number_format(round($sumaIngr,1,PHP_ROUND_HALF_UP),2, ',', '').'</span></strong></td><tr>';
		}
			$i++;
	}
}
mysqli_close($conection); //desconectamos la base de datos

?>
