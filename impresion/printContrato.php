<?php
include "../php/conkarl.php";
include "../php/numeroALetras.php";
require_once('../vendor/autoload.php');
$base58 = new StephenHill\Base58();

$idCredito = $base58->decode($_GET['credito']);
$monto = $base58->decode($_GET['monto']);
$fecha1 = new DateTime($_GET['fecha1']);
$fecha2 = new DateTime($_GET['fecha2']);
$interes =$base58->decode($_GET['interes']);
$fechaPri = new DateTime($_GET['fechaPri']);

$nombresFiadores ='';

$dias = array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
$diasLetras = array(
	"AL PRIMER DÍA",
	"A LOS DOS DÍAS",
	"A LOS TRES DÍAS",
	"A LOS CUATRO DÍAS",
	"A LOS CINCO DÍAS",
	"A LOS SEIS DÍAS",
	"A LOS SIETE DÍAS",
	"A LOS OCHO DÍAS",
	"A LOS NUEVE DÍAS",
	"A LOS DIEZ DÍAS",
	"A LOS ONCE DÍAS",
	"A LOS DOCE DÍAS",
	"A LOS TRECE DÍAS",
	"A LOS CATORCE DÍAS",
	"A LOS QUINCE DÍAS",
	"A LOS DIEZ Y SEIS DÍAS",
	"A LOS DIEZ Y SIETE DÍAS",
	"A LOS DIEZ Y OCHO DÍAS",
	"A LOS DIEZ Y NUEVE DÍAS",
	"A LOS VEINTE DÍAS",
	"A LOS VEINTE Y UN DÍAS",
	"A LOS VEINTE Y DOS DÍAS",
	"A LOS VEINTE Y TRES DÍAS",
	"A LOS VEINTE Y CUATRO DÍAS",
	"A LOS VEINTE Y CINCO DÍAS",
	"A LOS VEINTE Y SEIS DÍAS",
	"A LOS VEINTE Y SIETE DÍAS",
	"A LOS VEINTE Y OCHO DÍAS",
	"A LOS VEINTE Y NUEVE DÍAS",
	"A LOS TREINTA DÍAS",
	"A LOS TREINTA Y UN DÍAS"
);

 

$sqlInvolucrados="SELECT i.*, upper(concat( c.cliApellidoPaterno, ' ', c.cliApellidoMaterno, ' ', c.cliNombres)) as cliNombres, c.cliDni, upper(tpc.tipcDescripcion) as tipcDescripcion,
upper( concat( ca.calDescripcion,' ', a.addrDireccion, ' #', a.addrNumero, ' DISTRITO DE ',di.distrito, ' PROVINCIA DE ',pro.provincia, ' DEPARTAMENTO DE ',de.departamento ) ) as cliDireccion

FROM `involucrados` i
inner join cliente c on i.idCliente = c.idCliente
inner join tipocliente tpc on tpc.idTipoCliente = i.idTipoCliente
inner join address a on a.idAddress= c.`cliDireccionCasa`
inner join distrito di on di.idDistrito = a.idDistrito
inner join provincia pro on pro.idProvincia = a.idProvincia
inner join departamento de on de.idDepartamento = a.idDepartamento
inner join calles ca on ca.idCalle = a.idCalle

where idPrestamo = {$idCredito}; ";
$resultadoInvolucrados=$cadena->query($sqlInvolucrados);
$totalInvolucrados = $resultadoInvolucrados->num_rows;
$rowInvolucrados=$resultadoInvolucrados->fetch_array();



$parteEntera = intval($monto);
$parteDecimal = ($monto-$parteEntera)*100;
if($parteDecimal == '0'){
	$parteDecimal='00';
}

//Pedir las letras del monto facturado

$montoLetras = trim(NumeroALetras::convertir($parteEntera)).' CON '.$parteDecimal.'/100 ';

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>CONTRATO DE DEUDA Y COMPROMISO DE PAGO </title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<style>
p{ text-indent: 5em }
.pPropietario{ background-color: #000; 
	
	content: '';
	display: block;
	height: 1px;
	left: 10%;
	position: absolute;
	
	width: 250px;}
	#contFirmas p{margin-bottom: 0;}
@media print{
	.pPropietario{
	width: 250px!important;
	border-top: 1px solid black!important;
	}
	#contFirmas p{margin-bottom: 0;}
}
</style>
	<div class="row">
		<div class="col-sm-3 ml-5 pl-5"><img src="../images/logoCorto.jpg" class="img-fluid"></div>
		<div class="col"></div>
	</div>
	<h4 class="text-center pt-3">CONTRATO DE DEUDA Y COMPROMISO DE PAGO</h4>
	<div class="container-fluid">
		<p class="text-justify">CONSTE POR EL PRESENTE DOCUMENTO QUE SUSCRIBE EL CONTRATO DE DEUDA Y COMPROMISO DE PAGO QUE CELEBRAN DE UNA PARTE EL SEÑOR RAMOS GALVAN JHON CON DNI N° 41699159 Y DOMICILIADO EN LA CALLE REAL 969 A QUIEN EN ADELANTE SE LE DENOMINARA EL ACREEDOR Y DE LA OTRA PARTE SR(A) <?= $rowInvolucrados['cliNombres'];?> CON DNI N° <?= $rowInvolucrados['cliDni'];?> CON DOMICILIO EN EL <?= $rowInvolucrados['cliDireccion'];?>, A QUIEN EN ADELANTE SE LE DENOMINARA EL DEUDOR
		<?php while($dato = $resultadoInvolucrados->fetch_assoc()){
			if( $dato['idTipoCliente']=='2'){
				echo " Y SU CONYUGUE: ".$dato['cliNombres']." CON DNI N° ".$dato['cliDni']." CON DOMICILIO EN EL ". $dato['cliDireccion'];
			}
		} 
		if($totalInvolucrados >1 ){
			$nombresFiadores ='';
			
			$resultadoInvolucrados->data_seek(1);
			
			while ($rowInvolucrados = $resultadoInvolucrados->fetch_assoc()) {
				if( $rowInvolucrados['idTipoCliente']!='1' && $rowInvolucrados['idTipoCliente']!='2' ){
				$nombresFiadores = $nombresFiadores. ". SR(A) ". $rowInvolucrados['cliNombres'] . " COMO ". $rowInvolucrados['tipcDescripcion']. ' CON D.N.I. '. $rowInvolucrados['cliDni'] . " CON DOMICILIO EN EL ". $rowInvolucrados['cliDireccion']. ' A QUIEN EN ADELANTE SE LE CONSIDERARÁ COMO FIADOR. ' ;}
			
			}
			if( $nombresFiadores!='' ){
				echo $nombresFiadores;
			}
		}
		?>
		, ASI MISMO EN LOS TÉRMINOS Y CONDICIONES SIGUIENTES:</p>
		<p class="text-justify">PRIMERO: <strong>EL DEUDOR</strong> DECLARA ADEUDAR LA SUMA DE <strong><span id="dineroLetras"><?= $montoLetras; ?></span> SOLES (S/ <span id="dineroMoneda"><?= number_format($monto,2);?></span>)</strong> POR UN PRESTAMO RECIBIDO CON FECHA <strong id="fechaLetras"><?= $fecha1->format('d');?> DE <?= strtoupper($meses[$fecha1->format('n')-1]);?> DEL AÑO <?= $fecha1->format('Y')?>.</strong></p>
		<p class="text-justify">SEGUNDO: POR MÚTUO ACUERDO DE DEUDA SE CANCELARÁ EN <span id="cuotasLetras"><?= $_GET['cantCuota']; ?> CUOTAS DE PAGOS <?= $_GET['tPago']; ?></span>, EN EL CUAL LA PRIMERA LETRA DE PAGO SERA EL <strong id="primerPagoLetra"><?= $fechaPri->format('d');?> DE <?= strtoupper($meses[$fechaPri->format('n')-1]);?> DEL AÑO <?= $fechaPri->format('Y')?></strong> Y LA ULTIMA LETRA DE PAGO SERA CANCELADA EL <strong id="ultimoPagoLetra"><?= $fecha2->format('d');?> DE <?= strtoupper($meses[$fecha2->format('n')-1]);?> DEL AÑO <?= $fecha2->format('Y')?>.</strong></p>
		<p class="text-justify">TERCERO: LA DEUDA GENERA UN INTERES MENSUAL DEL <strong id="porcentaje"><?= $interes;?></strong> QUE SERA CANCELADO EN EL TERMINO PACTADO POR AMBOS Y DE UN INTERES MORATORIO DIARIO DE UN SOL.</p>
	
		<?php 
		if( $nombresFiadores!='' ){
			echo '<p class="text-justify"> CUARTO: '.$nombresFiadores. '</p>';
		}
		?>
		<p class="text-justify"> <?php if($totalInvolucrados >1){ echo 'QUINTO'; }else{echo 'CUARTO'; }?>: EN CASO DE INCUMPLIMIENTO CON UN MINIMO DE UNA LETRA IMPAGA POR EL DEUDOR; EL ACREEDOR SE RESERVA EL DERECHO DE PROCEDER CONFORME A LEY, DEBIENDO RECONOCER EL DEUDOR O EL GARANTE LOS GASTOS JUDICIALES, EXTRAJUDICIALES, COSTAS Y COSTOS QUE PUEDAN ORIGINARSE POR INCUMPLIMIENTO EN LA CANCELACION DE LA DEUDA, DEJANDO EN GARANTIA UNA LETRA DE CAMBIO FIRMADA, SE SUSCRIBE LA PRESENTE  EN LA CIUDAD DE HUANCAYO <?= $diasLetras[intval($fecha1->format('d'))-1]; ?> DEL MES DE <?= strtoupper($meses[$fecha1->format('m')-1]); ?> DEL <?= $fecha1->format('Y'); ?> Y EN SEÑAL DE CONFORMIDAD FIRMAN AL PIE DEL DOCUMENTO DENOMINADO CONTRATO DE DEUDA Y COMPROMISO DE PAGO E IMPRIME SU HUELLA DEL INDICE DERECHO.</p>
	</div>
	<div class="container-fluid" id="contFirmas">
		<div class="row">
			<div class="col"> <br>
			<br>
			<br><br>
				<span class="pPropietario"></span>
				<p>Cliente</p>
				<p>Apellidos y Nombres:</p>
				<p>D.N.I.:</p>
				<p>Domicilio:</p>
			</div>
			<div class="col"> <br>
			<br>
			<br><br>
				<span class="pPropietario"></span>
				<p>Cliente</p>
				<p>Apellidos y Nombres:</p>
				<p>D.N.I.:</p>
				<p>Domicilio:</p>
			</div>
		</div>
		<div class="row">
			<div class="col"> <br>
			<br>
			<br><br>
				<span class="pPropietario"></span>
				<p>Fiador</p>
				<p>Apellidos y Nombres:</p>
				<p>D.N.I.:</p>
				<p>Domicilio:</p>
			</div>
			<div class="col"> <br>
			<br>
			<br><br>
				<span class="pPropietario"></span>
				<p>Fiador</p>
				<p>Apellidos y Nombres:</p>
				<p>D.N.I.:</p>
				<p>Domicilio:</p>
			</div>
		</div>
	</div>

	
</body>
</html>