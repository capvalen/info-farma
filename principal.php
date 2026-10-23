<?php
require_once ( 'php/conectkarl.php');
require_once ( 'php/variablesGlobales.php');
require_once ( 'php/comprobarCajaHoy.php');
$sqlVentas="SELECT format(`sumaVentasCuadre`({$idCaja}),2) as sumaVentasCuadre, format(`sumaGastosCuadre`({$idCaja}),2) as sumaGastosCuadre, format(`sumaIngresosCuadre`({$idCaja}),2) as sumaIngresosCuadre; ";
$resultadoVentas=$cadena->query($sqlVentas);
$respuVentas = $resultadoVentas->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="es">

<head>
		<title>Inicio: Info-Farma</title>
		<?php include 'headers.php'; ?>
</head>

<body>
	<style>
		.thumbnail {
			background-color: rgb(255 255 255 / 65%);
			border-color: #ffbc00;
		}
		.thumbnail h2, .thumbnail h5, .thumbnail small { color: #ffa500; }
		#tu_alerta{ border-color: #eb0505; }
		#tu_alerta h2, #tu_alerta h5 { color: #eb0505; }
		#tu_alerta h2 i{
			font-size: 2rem;
		}
		.text-darken-2{color: #5e5e5e;}
	</style>

<div id="wrapper">

<?php $pagina = 'principal'; include 'menu-wrapper.php'; ?>	

<div id="page-content-wrapper">
	<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12 contenedorDeslizable fondoGeo">
				<!-- Empieza a meter contenido principal dentro de estas etiquetas -->
				<h1 class=""><i class="icofont icofont-hospital"></i> Software InfoFarma</h1>
				<h2 class="text-muted"> Te damos la bienvenida</h2>
				
				<h4 class="text-muted">Datos generales del sistema:</h4>
				<div class="row has-clear">
					<?php include 'php/productos/alertaProdVencer_numero.php';
					if( $vencera >0 ){
					?>
					<div class="col-sm-6 col-md-3">
						<div class="thumbnail " id="tu_alerta">
						<!-- <img src="images/cara.jpg" alt="...">-->
							<div class="caption">
								<h2 class="text-center"><span><i class="icofont icofont-exclamation-circle"></i></span> <?= $vencera; ?> </h2>
								<h5 class="text-center">Productos a vencer</h5>
							</div>
						</div>
					</div>
					<?php } ?>
					<?php include 'php/productos/listarProductosAgotados_numero.php';
					if( $agotara >0 ){
					?>
					<div class="col-sm-6 col-md-3">
						<div class="thumbnail " id="tu_alerta">
						<!-- <img src="images/cara.jpg" alt="...">-->
							<div class="caption">
								<h2 class="text-center"><span><i class="icofont icofont-box"></i></span> <?= $agotara; ?> </h2>
								<h5 class="text-center">Productos por agotar</h5>
							</div>
						</div>
					</div>
					<?php } ?>
					<div class="col-sm-6 col-md-3">
						<div class="thumbnail">
						<!-- <img src="images/cara.jpg" alt="...">-->
							<div class="caption">
								<h2 class="text-center"><small>S/</small> <?= $respuVentas['sumaVentasCuadre']?></h2>
								<h5 class="text-center">Suma de Ventas</h5>
							</div>
						</div>
					</div>
					<div class="col-sm-6 col-md-3">
						<div class="thumbnail">
						<!-- <img src="images/cara.jpg" alt="...">-->
							<div class="caption">
								<h2 class="text-center"><small>S/</small> <?= $respuVentas['sumaGastosCuadre']?></h2>
								<h5 class="text-center">Suma Gastos</h5>
							</div>
						</div>
					</div>
					<div class="col-sm-6 col-md-3">
						<div class="thumbnail">
						<!-- <img src="images/cara.jpg" alt="...">-->
							<div class="caption">
								<h2 class="text-center"><small>S/</small> <?= $respuVentas['sumaIngresosCuadre']  ?></h2>
								<h5 class="text-center">Otros ingresos</h5>
							</div>
						</div>
					</div>
				</div>
				
				<div style="height: 200px;"></div>
	
				<h5 class="has-clear"><span class="text-darken-2">Un producto de:</span></h5>
				<h5 class="text-darken-2"><strong><a href="https://infocatsoluciones.com" target="_blank">Infocat Soluciones S.A.C.</a></strong></h5>
				<h5 class="text-darken-2">RUC: 20602337147</h5>
				<h5 class="text-darken-2">Soporte inmediato: <a href="https://wa.me/51977692108?text=Necesito soporte sobre el sistema Infofarma" target="_blank"><i class="icofont-whatsapp"></i> Click aquí</a></h5>
				<h5 class="text-darken-2"><span class="text-darken-2">Actualmente estás usando la <?php include 'php/version.php' ?></span></h5>
	
				
					<!-- Fin de meter contenido principal -->
					</div>
					
				</div>
		</div>
</div>
<!-- /#page-content-wrapper -->
</div><!-- /#wrapper -->

<!-- Modal para indicar que falta completar campos o datos con error -->
	<div class="modal fade modal-mostrarDetalleInventario" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header-info">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel"><i class="icofont icofont-help-robot"></i> Detalles del inventario: <span id="spanIdInventario"></span></h4>
			</div>
			<div class="modal-body">
				<div class="row container"> <strong>
					<div class="col-xs-4">Producto</div>
					<div class="col-xs-1">Cantidad</div>
					<div class="col-xs-2">Precio</div>
					<div class="col-xs-2">Sub-Total</div></strong>
				</div>
				<div class="row container" id="detProductoInv">
					
				</div>
				<div class="row container-fluid text-right" style="padding-right: 100px"><strong>Total valorizado:</strong> <span id="spanvalorInvent">S/. 3.00</span></div>
			</div>
			<div class="modal-footer"> <button class="btn btn-primary btn-outline btn-outline" data-dismiss="modal"></i><i class="icofont icofont-alarm"></i> Aceptar</button></div>
		</div>
		</div>
	</div>

		
<!-- Modal para indicar que falta completar campos o datos con error -->
	<div class="modal fade modal-faltaCompletar" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header-danger">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel"><i class="icofont icofont-help-robot"></i> Campos incorrectos o faltantes</h4>
			</div>
			<div class="modal-body">
				Ups, un error: <i class="icofont icofont-animal-squirrel"></i> <strong id="lblFalta"></strong>
			</div>
			<div class="modal-footer"> <button class="btn btn-danger btn-outline" data-dismiss="modal"><i class="icofont icofont-alarm"></i> Ok, revisaré</button></div>
		</div>
		</div>
	</div>

	
<!-- jQuery -->
<script src="js/jquery-2.2.4.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
<script src="js/moment.js"></script>
<script src="js/inicializacion.js"></script>
<script src="js/bootstrap-select.js"></script>
<script src="js/bootstrap-datepicker.min.js"></script>
<script src="js/bootstrap-datepicker.es.min.js"></script>

<!-- Menu Toggle Script -->
<script>
$(document).ready(function(){

$('.caption').click(function () {
	//$(this).find('a').click();
})
});
</script>

</body>

</html>
