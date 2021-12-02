<?php date_default_timezone_set('America/Lima');
require_once ( 'php/variablesGlobales.php');
?>
<!DOCTYPE html>
<html lang="es">

<head>

	<title>Reportes: Info-Farma</title>

	<?php include 'headers.php'; ?>

</head>

<body>

<style>
	#tableReporteVentas_filter{display:none;}
</style>

	<div id="wrapper">

		<?php $pagina = 'reportes'; include 'menu-wrapper.php'; ?>
		<!-- Page Content -->
		<div id="page-content-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12 contenedorDeslizable">
						<!-- Empieza a meter contenido principal dentro de estas etiquetas -->
						<h2><i class="icofont icofont-options"></i> Panel de configuraciones generales</h2>

						<ul class="nav nav-tabs">
							<li class="active"><a href="#tabReporteVentas" data-toggle="tab">Reporte Ventas</a></li>
							<li><a href="#tabAgregarLabo" data-toggle="tab">Listado de productos</a></li>
							<li><a href="#tabProductosTodos" data-toggle="tab">Inventario Completo</a></li>
							<li><a href="#tabMovimientosTodos" data-toggle="tab">Todos los movimientos</a></li>
							<li><a href="#tabCompras" data-toggle="tab">Compras</a></li>

						</ul>

						<div class="tab-content">
							<!--Panel para buscar productos-->
							<!--Clase para las tablas-->
							<div class="tab-pane fade container-fluid" id="tabAgregarLabo">
								<!--Inicio de pestaña 01-->
								<a class="btn btn-negro btn-outline btn-lg" href="php/productos/reporte_productos_excel.php"><i class="icofont icofont-file-excel"></i> Listado de productos en MS Excel</a>

								<!--Fin de pestaña 01-->
							</div>



							<!--Panel para nueva compra-->
							<div class="tab-pane fade in active container-fluid" id="tabReporteVentas">
								<!--Inicio de pestaña 02-->
								<p>Seleccione entre 2 fechas para generar el reporte:</p>
								<div class="row">
									<div class="col-md-6">
										<div class="input-daterange input-group " id="dtpReporteVentas">
											<input type="text" class="input-sm form-control" name="start" autocomplete="off" id="dtpFechaVentaInicial" />
											<span class="input-group-addon">-</span>
											<input type="text" class="input-sm form-control" name="end" autocomplete="off" id="dtpFechaVentaFinal" />
										</div>
									</div>
									<div class="col-md-3">
									<select class="form-control" id="sltOpcionesVenta">
										<option value="1">General</option>
										<option value="2">Detallado</option>
									</select>
									</div>
									<div class="col-md-3">
										<button class="btn btn-primary" id="btnGenerarReporteVentas"><i class="icofont icofont-paper-clip"></i> Generar reporte</button>
									</div>
								</div>
								<div class="row">
									<table class="table table-hover" id="tableReporteVentas">
										<thead>
											
										</thead>
										<tbody>
											
										</tbody>
										<tfoot>
											
										
										</tfoot>
									</table>
								</div>


								<!--Fin de pestaña 02-->
							</div>
							<div class="tab-pane fade container-fluid" id="tabProductosTodos">
								<h3>Inventario rápido de todos los productos</h3>
								<p>Haga click en generar reporte. Éste proceso puede demorar dependiendo de la cantidad de productos y la velocidad de su máquina.</p>
								<button class="btn btn-default btn-outline" onclick="generarInventarioCompleto()">Generar inventario completo</button>
								<a class="btn btn-default btn-outline " href="php/productos/inventarioCompleto_Excel.php" >Inventario completo en MS Excel</a>

								<div id="tableInventarioCompleto"></div>
							</div>
							<div class="tab-pane fade container-fluid" id="tabMovimientosTodos">
								<p>Haga click en generar reporte. Éste proceso puede demorar dependiendo de la cantidad de productos y la velocidad de su máquina.</p>
								<div class="row">
									<div class="col-md-6">
										<div class="input-daterange input-group " id="dtpReporteMovimientos">
											<input type="text" class="input-sm form-control" name="start" autocomplete="off" id="dtpFechaMovimientosInicial" />
											<span class="input-group-addon">-</span>
											<input type="text" class="input-sm form-control" name="end" autocomplete="off" id="dtpFechaMovimientosFinal" />
										</div>
									</div>

								</div>
								<button class="btn btn-default btn-outline" onclick="generarMovimientoCompleto()">Solicitar movimientos completos</button>
								<a class="btn btn-default btn-outline hidden" id="exportarExcelMovimientos" href="php/ventas/movimientosCompleto_excel.php"">Exportar a MS Excel</a>


								<div id="tableMovimientosCompleto"></div>
							</div>
							<div class="tab-pane fade container-fluid" id="tabCompras">
								<p>Seleccione entre 2 fechas para generar el reporte:</p>
								<div class="row">
									<div class="col-md-6">
										<div class="input-daterange input-group " id="dtpReporteCompras">
											<input type="text" class="input-sm form-control" name="start" autocomplete="off" id="dtpFechaCompraInicial" />
											<span class="input-group-addon">-</span>
											<input type="text" class="input-sm form-control" name="end" autocomplete="off" id="dtpFechaCompraFinal" />
										</div>
									</div>
									<div class="col-md-3">
										<button class="btn btn-primary" id="btnGenerarReporteCompras"><i class="icofont icofont-paper-clip"></i> Generar reporte</button>
									</div>
								</div>
								
								<div id="tableCompras"></div>

						</div>
						<!-- Fin de meter contenido principal -->
					</div>

				</div>
			</div>
		</div>
		<!-- /#page-content-wrapper -->
	</div><!-- /#wrapper -->

	<!-- Modal para indicar que falta completar campos o datos con error -->
	<div class="modal fade modal-mostrarDetalleInventario" tabindex="-1" role="dialog"
		aria-labelledby="mySmallModalLabel">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header-info">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
							aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel"><i class="icofont icofont-help-robot"></i> Detalles del inventario:
						<span id="spanIdInventario"></span></h4>
				</div>
				<div class="modal-body">
					<div class="row container"> <strong>
							<div class="col-xs-4">Producto</div>
							<div class="col-xs-1">Cantidad</div>
							<div class="col-xs-2">Precio</div>
							<div class="col-xs-2">Sub-Total</div>
						</strong>
					</div>
					<div class="row container" id="detProductoInv">

					</div>
					<div class="row container-fluid text-right" style="padding-right: 100px"><strong>Total valorizado:</strong>
						<span id="spanvalorInvent">S/. 3.00</span></div>
				</div>
				<div class="modal-footer"> <button class="btn btn-primary btn-outline" data-dismiss="modal"></i><i
							class="icofont icofont-alarm"></i> Aceptar</button></div>
			</div>
		</div>
	</div>


	<!-- Modal para indicar que falta completar campos o datos con error -->
	<div class="modal fade modal-faltaCompletar" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-header-danger">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
							aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel"><i class="icofont icofont-help-robot"></i> Campos incorrectos o
						faltantes</h4>
				</div>
				<div class="modal-body">
					Ups, un error: <i class="icofont icofont-animal-squirrel"></i> <strong id="lblFalta"></strong>
				</div>
				<div class="modal-footer"> <button class="btn btn-danger btn-outline" data-dismiss="modal"><i
							class="icofont icofont-alarm"></i> Ok, revisaré</button></div>
			</div>
		</div>
	</div>


	<!-- jQuery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.min.js"></script>
	<script src="js/moment.js"></script>
	<script src="js/inicializacion.js"></script>
	<script src="js/bootstrap-select.js"></script>
	<script src="js/bootstrap-datepicker.min.js"></script>
	<script src="js/bootstrap-datepicker.es.min.js"></script>

	<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.11.3/b-2.0.1/b-html5-2.0.1/datatables.min.js"></script>

	<!-- Menu Toggle Script -->
	<script>
		
	$(document).ready(function() {
		agregarRowInventario();
		$('.selectpicker').selectpicker('refresh');

		$('.mitooltip').tooltip();
		$('input').keypress(function(e) {
			if (e.keyCode == 13) {
				$(this).parent().next().children().focus();
				//$(this).parent().next().children().removeAttr('disabled'); //agregar atributo desabilitado
			}
		});

		habilitarDivFecha();

		$('#btnAgregarItem').click(function() {
			agregarRowInventario();
		});
		
	});

	function agregarRowInventario() {
		$('#itemsInventarioNuevo').text($('#listaProductosNuevoInventario .row').length + 1);
		$.ajax({
			url: 'php/productos/listarCategorias.php',
			type: 'POST'
		}).done(function(resCategoria) {
			$.ajax({
				url: 'php/config/listarLaboratorios.php',
				type: 'POST'
			}).done(function(resLaboratorio) {
				$.ajax({
					url: 'php/productos/listarPropiedadProducto.php',
					type: 'POST'
				}).done(function(resPropiedad) {
					$('#listaProductosNuevoInventario').append(`<div class="row animated fadeIn filaDeProductoInventario">
				<div class="col-xs-6 col-sm-3 aprovecharAncho"><input type="text" class="form-control text-capitalize txtNomProducto" placeholder="Nombre"></div>
				<div class="col-xs-6 col-sm-2 aprovecharAncho"><input type="text" class="form-control text-capitalize txtComposicion" placeholder="Composición (und, gr, ml)"></div>
				<div class="col-xs-6 col-sm-1 aprovecharAncho"><input type="number" class="text-center form-control txtCantidad" placeholder="Cantidad" min=0></div>
				<div class="col-xs-6 col-sm-1 aprovecharAncho"><input type="number" class="text-center form-control txtMonedas" placeholder="Precio S/." min=1></div>
				<div class="col-xs-6 col-sm-1 aprovecharAncho"><input class="text-center form-control txtStockMinimo mitooltip" type="number" value="10" placeholder="Min." min=0 title="Cant. mínima para una alerta"></div>
				<div class="col-xs-6 col-sm-1 aprovecharAncho"><input type="text" class="form-control text-uppercase txtLote" placeholder="Lote"></div>
				
				<div class="col-xs-6 col-sm-2 aprovecharAncho" id="sandbox-container"><div class="input-group date txtFechaVencimiento mitooltip" title="Fecha de vencimiento">
					<input type="text" class="form-control text-center"><span class="input-group-addon" style="background-color: #CDDC39; color: white; border: 1px solid rgba(204, 204, 204, 0.01);"><i class="glyphicon glyphicon-equalizer" style="font-size: 16px;"></i></span></div>
				</div>
				<div class="col-xs-6 col-sm-2 aprovecharAncho"><select class="selectpicker cmbCategorias" title="Categorías..." data-container="body" data-live-search="true" data-width="100%">
						${resCategoria}
					</select></div>
				<div class="col-xs-6 col-sm-2 aprovecharAncho"><select class="selectpicker cmbLaboratorios" title="Laboratorios..." data-container="body" data-live-search="true" data-width="100%" >
						${resLaboratorio}
					</select></div>
					<div class="col-xs-6 col-sm-2 aprovecharAncho"><select class="selectpicker cmbPropiedades" title="Tipo de propiedad..." data-container="body" data-live-search="true" data-width="100%" >
						${resPropiedad}
					</select></div>

				<div class="col-xs-6 col-sm-1 pull-right aprovecharAncho text-center">
					<button class="btn btn-success btn-outline btn-sm btnGuardarItemInventario"><i class="icofont icofont-check"></i></button>
					<button class="btn btn-negro btn-outline btn-sm btnActualizarItemInventario hidden"><i class="icofont icofont-save"></i></button>
					<button class="btn btn-primary btn-outline btn-sm btnModificarItemInventario hidden"><i class="icofont icofont-marker"></i></button>
				</div>
				
			</div>
			`);
					$('.selectpicker').selectpicker('refresh');
					habilitarDivFecha();
					$('.mitooltip').tooltip();

				});
			});

		});

	}

	function habilitarDivFecha() {
		$('#sandbox-container .input-group.date').datepicker({
			language: "es",
			orientation: "top auto",
			daysOfWeekHighlighted: "0",
			autoclose: true,
			todayHighlight: true
		});
		$('#dtpReporteVentas').datepicker({
				format: "dd/mm/yyyy",
				todayBtn: "linked",
				daysOfWeekHighlighted: "0",
				language: "es",
				autoclose: true,
				todayHighlight: true
		});
		$('#dtpReporteCompras').datepicker({
				format: "dd/mm/yyyy",
				todayBtn: "linked",
				daysOfWeekHighlighted: "0",
				language: "es",
				autoclose: true,
				todayHighlight: true
		});
		$('#dtpReporteMovimientos').datepicker({
				format: "dd/mm/yyyy",
				todayBtn: "linked",
				daysOfWeekHighlighted: "0",
				language: "es",
				autoclose: true,
				todayHighlight: true
		});
	}
	$('#listaProductosNuevoInventario').on('focusout', '.txtMonedas', function() {
		var valor = parseFloat($(this).val());
		$(this).val(valor.toFixed(2));
	});

	function desabilitarCampos(elemento, indiceRow) { //console.log(indiceRow)
		if (elemento == 1) { //1 para cuando SI Guardo
			$('#listaProductosNuevoInventario .row').eq(indiceRow).find('input').attr('disabled', 'disabled');
			$('#listaProductosNuevoInventario .row').eq(indiceRow).find('select').attr('disabled', 'disabled').selectpicker(
				'refresh');
			$('#listaProductosNuevoInventario .row').eq(indiceRow).find('.btnGuardarItemInventario').addClass('hidden');
			$('#listaProductosNuevoInventario .row').eq(indiceRow).find('.btnActualizarItemInventario').addClass('hidden');
			$('#listaProductosNuevoInventario .row').eq(indiceRow).find('.btnModificarItemInventario').removeClass('hidden');
		}
		if (elemento == 2) { //2 para cuando NO Guardo
			$('#listaProductosNuevoInventario .row').eq(indiceRow).find('input').attr('disabled', 'disabled');
			$('#listaProductosNuevoInventario .row').eq(indiceRow).find('select').attr('disabled', 'disabled').selectpicker(
				'refresh');
			$('#listaProductosNuevoInventario .row').eq(indiceRow).find('.btnGuardarItemInventario').removeClass('hidden');
			$('#listaProductosNuevoInventario .row').eq(indiceRow).find('.btnActualizarItemInventario').addClass('hidden');
			$('#listaProductosNuevoInventario .row').eq(indiceRow).find('.btnModificarItemInventario').addClass('hidden');
		}
		if (elemento == 3) { //3 para editar
			$('#listaProductosNuevoInventario .row').eq(indiceRow).find('input').removeAttr('disabled', 'disabled');
			$('#listaProductosNuevoInventario .row').eq(indiceRow).find('select').removeAttr('disabled', 'disabled')
				.selectpicker('refresh');
			$('#listaProductosNuevoInventario .row').eq(indiceRow).find('.btnGuardarItemInventario').addClass('hidden');
			$('#listaProductosNuevoInventario .row').eq(indiceRow).find('.btnActualizarItemInventario').removeClass('hidden');
			$('#listaProductosNuevoInventario .row').eq(indiceRow).find('.btnModificarItemInventario').addClass('hidden');
		}

	}
	$('#listaProductosNuevoInventario').on('click', '.btnModificarItemInventario', function() {
		var indiceRow = $(this).parents().parents().index(); //contar el elemento (this) entre el grupo a listar
		desabilitarCampos(3, indiceRow)
	});
	$('#listaProductosNuevoInventario').on('click', '.btnActualizarItemInventario', function() {
		var indiceRow = $(this).parents().parents().index(); //contar el elemento (this) entre el grupo a listar
		desabilitarCampos(1, indiceRow);
		var idCambio = $(this).attr('id');
		var nombreProd = $('#listaProductosNuevoInventario .row').eq(indiceRow).find('.txtNomProducto').val();
		var composi = $('#listaProductosNuevoInventario .row').eq(indiceRow).find('.txtComposicion').val();
		var cantProd = $('#listaProductosNuevoInventario .row').eq(indiceRow).find('.txtCantidad').val();
		var precProd = $('#listaProductosNuevoInventario .row').eq(indiceRow).find('.txtMonedas').val();
		var stockProd = $('#listaProductosNuevoInventario .row').eq(indiceRow).find('.txtStockMinimo').val();
		var loteProd = $('#listaProductosNuevoInventario .row').eq(indiceRow).find('.txtLote').val();
		var categProd = $('#listaProductosNuevoInventario .row').eq(indiceRow).find('.cmbCategorias button').attr(
			'title');
		var fechaProd = $('#listaProductosNuevoInventario .row').eq(indiceRow).find('.txtFechaVencimiento input').val();
		var fechaMoment = moment(fechaProd, 'DD/MM/YYYY').format('YYYY-MM-DD');
		var idcompra = $('.activarNuevoInventario').attr('id');
		var laborat = $('#listaProductosNuevoInventario .row').eq(indiceRow).find('.cmbLaboratorios button').attr(
			'title');
		var propieda = $('#listaProductosNuevoInventario .row').eq(indiceRow).find('.cmbPropiedades button').attr(
			'title');

		//******** Se empieza a validad y a actualizar la BD *************

		if (nombreProd == '') {
			$('.modal-faltaCompletar').modal('show');
			$('#lblFalta').text('No puedo guardar un «Nombre de producto» vacío');
		} else if (composi == '') {
			$('.modal-faltaCompletar').modal('show');
			$('#lblFalta').text('No puedo guardar el campo «Composición» vacío');
		} else if (cantProd == '' || cantProd <= 0) {
			$('.modal-faltaCompletar').modal('show');
			$('#lblFalta').text('No puedo guardar una «Cantidad» negativa o igual a cero');
		} else if (precProd == '' || precProd <= 0) {
			$('.modal-faltaCompletar').modal('show');
			$('#lblFalta').text('No puedo guardar un «Precio» negativo o igual a cero');
		} else if (stockProd == '' || stockProd <= 0) {
			$('.modal-faltaCompletar').modal('show');
			$('#lblFalta').text('No puedes ingresar un «Stock» negativo o igual a cero');
		} else if (categProd == '' || categProd == 'Categorías...') {
			$('.modal-faltaCompletar').modal('show');
			$('#lblFalta').text(
				'Debes seleccionar una «Categoría de producto» si no encuentras en la lista selecciona «Otros»');
		} else if (laborat == '' || laborat == 'Laboratorios...') {
			$('.modal-faltaCompletar').modal('show');
			$('#lblFalta').text(
				'Debes seleccionar un «Laboratorio», si no está en la lista selecciona la opción «Ninguno»');
		} else if (propieda == '' || propieda == 'Tipo de propiedad...') {
			$('.modal-faltaCompletar').modal('show');
			$('#lblFalta').text('Debes seleccionar un «Tipo de propiedad del producto»');
		} else if (moment(fechaMoment).isBefore(moment().format('YYYY-MM-DD'))) {
			$('.modal-faltaCompletar').modal('show');
			$('#lblFalta').text('No se puede agregar «Fechas ya vencidas»');
		} else if ($(this).hasClass('disabled')) {} //Si esta desabilitado no puede ingresar de nuevo
		else {
			$(this).addClass('disabled');

			$.ajax({
				url: 'php/productos/actualizarProductoPorInventario.php',
				data: {
					idProd: idCambio,
					nombre: nombreProd + ' ' + composi,
					cantidad: cantProd,
					stockMin: stockProd,
					categoria: categProd,
					precio: precProd,
					lote: loteProd,
					fecha: fechaProd,
					idCompr: idcompra,
					labo: laborat,
					propi: propieda
				},
				type: 'POST'
			}).done(function(resp) { //console.log(resp); //Muestra el error real que se tiene
				$('#listaProductosNuevoInventario .row').eq(indiceRow).find('.btnActualizarItemInventario').removeClass(
					'disabled'); //Desabilita el boton para que no haya muchos ingresos a la BD
				if ($.isNumeric(resp)) {
					desabilitarCampos(3, indiceRow);

				}

			});
		} // Fin de ultimo else grande validador
	});


	$('#listaProductosNuevoInventario').on('click', '.btnGuardarItemInventario', function() {
		var indiceRow = $(this).parents().parents().index(); //contar el elemento (this) entre el grupo a listar
		desabilitarCampos(1, indiceRow);
		//$('#listaProductosNuevoInventario .row').index(this); No funciona este codigo

		//console.log($('#listaProductosNuevoInventario .row').eq(indiceRow).find('.cmbCategorias').selectpicker( 'val'));
		var nombreProd = $('#listaProductosNuevoInventario .row').eq(indiceRow).find('.txtNomProducto').val();
		var composi = $('#listaProductosNuevoInventario .row').eq(indiceRow).find('.txtComposicion').val();
		var cantProd = $('#listaProductosNuevoInventario .row').eq(indiceRow).find('.txtCantidad').val();
		var precProd = $('#listaProductosNuevoInventario .row').eq(indiceRow).find('.txtMonedas').val();
		var stockProd = $('#listaProductosNuevoInventario .row').eq(indiceRow).find('.txtStockMinimo').val();
		var loteProd = $('#listaProductosNuevoInventario .row').eq(indiceRow).find('.txtLote').val();
		var categProd = $('#listaProductosNuevoInventario .row').eq(indiceRow).find('.cmbCategorias button').attr(
			'title');
		var fechaProd = $('#listaProductosNuevoInventario .row').eq(indiceRow).find('.txtFechaVencimiento input').val();
		var fechaMoment = moment(fechaProd, 'DD/MM/YYYY').format('YYYY-MM-DD');
		var idcompra = $('.activarNuevoInventario').attr('id');
		var laborat = $('#listaProductosNuevoInventario .row').eq(indiceRow).find('.cmbLaboratorios button').attr(
			'title');
		var propieda = $('#listaProductosNuevoInventario .row').eq(indiceRow).find('.cmbPropiedades button').attr(
			'title');

		//******** Se empieza a validad y a rellenar la BD *************

		if (nombreProd == '') {
			$('.modal-faltaCompletar').modal('show');
			$('#lblFalta').text('No puedo guardar un «Nombre de producto» vacío');
		} else if (composi == '') {
			$('.modal-faltaCompletar').modal('show');
			$('#lblFalta').text('No puedo guardar el campo «Composición» vacío');
		} else if (cantProd == '' || cantProd <= 0) {
			$('.modal-faltaCompletar').modal('show');
			$('#lblFalta').text('No puedo guardar una «Cantidad» negativa o igual a cero');
		} else if (precProd == '' || precProd <= 0) {
			$('.modal-faltaCompletar').modal('show');
			$('#lblFalta').text('No puedo guardar un «Precio» negativo o igual a cero');
		} else if (stockProd == '' || stockProd <= 0) {
			$('.modal-faltaCompletar').modal('show');
			$('#lblFalta').text('No puedes ingresar un «Stock» negativo o igual a cero');
		} else if (categProd == '' || categProd == 'Categorías...') {
			$('.modal-faltaCompletar').modal('show');
			$('#lblFalta').text(
				'Debes seleccionar una «Categoría de producto» si no encuentras en la lista selecciona «Otros»');
		} else if (laborat == '' || laborat == 'Laboratorios...') {
			$('.modal-faltaCompletar').modal('show');
			$('#lblFalta').text(
				'Debes seleccionar un «Laboratorio», si no está en la lista selecciona la opción «Ninguno»');
		} else if (propieda == '' || propieda == 'Tipo de propiedad...') {
			$('.modal-faltaCompletar').modal('show');
			$('#lblFalta').text('Debes seleccionar un «Tipo de propiedad del producto»');
		} else if (moment(fechaMoment).isBefore(moment().format('YYYY-MM-DD'))) {
			$('.modal-faltaCompletar').modal('show');
			$('#lblFalta').text('No se puede agregar «Fechas ya vencidas»');
		} else if ($(this).hasClass('disabled')) {} //Si esta desabilitado no puede ingresar de nuevo
		else {
			$(this).addClass('disabled');

			$.ajax({
				url: 'php/productos/insertarProductoPorInventario.php',
				data: {
					nombre: nombreProd + ' ' + composi,
					cantidad: cantProd,
					stockMin: stockProd,
					categoria: categProd,
					precio: precProd,
					lote: loteProd,
					fecha: fechaProd,
					idCompr: idcompra,
					labo: laborat,
					propi: propieda
				},
				type: 'POST'
			}).done(function(resp) { //console.log(resp); //Muestra el error real que se tiene
				$('#listaProductosNuevoInventario .row').eq(indiceRow).find('.btnGuardarItemInventario').removeClass(
					'disabled'); //Desabilita el boton para que no haya muchos ingresos a la BD
				if ($.isNumeric(resp)) {
					desabilitarCampos(1, indiceRow);
					//id a actualizariteminventario
					$('#listaProductosNuevoInventario .row').eq(indiceRow).find('.btnActualizarItemInventario').attr('id',
						resp)
					$('#btnAgregarItem').click();
				} else {
					desabilitarCampos(2, indiceRow);
					$('.modal-faltaCompletar').modal('show');
					$('#lblFalta').text(
						'Ocurrió un problema interno o con la conexión, no se guardó su registro. Contáctese con su proveedor de Software.'
						);
				}
			});
		} // Fin de ultimo else grande validador
	});



	$('.activarNuevoInventario').click(function() {
		$.ajax('php/compras/insertarNuevoInventario.php').done(function(respuesta) {
			if (respuesta != 0) {
				$('.activarNuevoInventario').attr('id', respuesta);
				//console.log($('.activarNuevoInventario').attr('id'))//El boton contiene el id del inventario
				$('.activarNuevoInventario').addClass('hidden');
				$('#rellenoNuevoInventario').removeClass('hidden');
			}

		});
	});
	$('#listaProductosNuevoInventario').on('lostfocus', '.txtNomProducto', function() {

	})

	function filtrarAñosSelect() {
		$('.nav-tabs-meses li').addClass('hidden');
		$('.tabConenidoMeses .tab-pane').children().remove();
		var anioSeleccionado = $('#divAñoInventario button').attr('title');
		$.ajax({
			url: 'php/config/retornarMesesAnoCompras.php',
			type: 'POST',
			data: {
				anio: anioSeleccionado
			}
		}).done(function(res) {
			$.each(JSON.parse(res), function(i, arg) {
				//console.log(arg.mes)
				$('.nav-tabs-meses li').eq(arg.mes - 1).removeClass('hidden');
			});
			$('.nav-tabs-meses li').removeClass('active')
		});
	}
	$('#btnBuscarPorAñoInventario').click(function() {
		filtrarAñosSelect()
	});
	$('body').on('click', '.bootstrap-select .open', function() {
		filtrarAñosSelect()
	});
	$('.nav-tabs-meses li').click(function() {
		var sumaValoriz = 0;
		var indMes = $(this).index();
		//console.log( 'clic en el mes ' + ($(this).index()+1))
		//rellenar contenido del mes con clic:
		$(`.tabConenidoMeses #mes${indMes}`).children().remove();

		var anioSeleccionado = $('#divAñoInventario button').attr('title');
		$.ajax({
			url: 'php/productos/listarTodoInventarios.php',
			type: 'POST',
			data: {
				anio: anioSeleccionado,
				mes: (indMes + 1)
			}
		}).done(function(res) {
			$(`.tabConenidoMeses #mes${indMes}`).append(
				`<div class="row"><strong><div class="col-xs-2">Cod.</div><div class="col-xs-3">Fecha</div><div class="col-xs-2">Valorizado.</div><div class="col-xs-2">Creador</div><div class="col-xs-1">Detalles</div></strong></div>`
				);
			//console.log(res)
			$.each(JSON.parse(res), function(i, arg) {
				moment.locale('es')
				sumaValoriz += parseFloat(arg.total);
				var dia = moment(arg.comptFecha);
				$(`.tabConenidoMeses #mes${indMes}`).append(`
				<div class="row resulDiv noselect" style="cursor:default"><div class="col-xs-2 codDivInv" >${arg.idCompras}</div><div class="col-xs-3">${dia.format('dddd, DD h:mm a')}</div><div class="col-xs-2 argTotal">S/. ${arg.total}</div><div class="col-xs-2">${arg.Usuario}</div> <div class="col-xs-1"><button class="btn btn-danger btn-outline btnDetalleInvLista" id="${arg.idSimple}"><i class="icofont icofont-ui-calendar"></i></button></div></strong></div>
				`);
				//console.log(arg.comptFecha)
			});
			$(`.tabConenidoMeses #mes${indMes}`).prepend(
				`<p class="text-center"><strong>Suma valorizada: </strong> S/. ${sumaValoriz.toFixed(2)}</p>`);
		});


	});
	$('.tabConenidoMeses').on('click', '.btnDetalleInvLista', function() {
		var idReg = $(this).attr('id');
		var index = $(this).parent().parent().index() - 2; // se pone -2  por la etiqueta P y la etiqueta div cabecera
		//console.log(index);
		$('#spanIdInventario').text($('.tabConenidoMeses .resulDiv ').eq(index).find('.codDivInv').text());
		$('#spanvalorInvent').text($('.tabConenidoMeses .resulDiv ').eq(index).find('.argTotal').text())

		$.ajax({
			url: 'php/productos/listarDetalleInventarioPorId.php',
			type: 'POST',
			data: {
				idInv: idReg
			}
		}).done(function(res) {
			console.log(res)
			$('#detProductoInv').children().remove();
			$.each(JSON.parse(res), function(i, elem) {
				$('#detProductoInv').append(`<div class="row container  "><div class="col-xs-4 text-capitalize">${elem.prodNombre}</div>
					<div class="col-xs-1 ">${elem.detcomprCantidad}</div>
					<div class="col-xs-2">${elem.detcomprPrecioUnitario}</div>
					<div class="col-xs-2">S/. ${elem.detcomprSubTotal}</div></div>`);
			});

			$('.modal-mostrarDetalleInventario').modal('show');


		});
	})
	$('#btnGenerarReporteVentas').click(function() {
		

		if($('dtpFechaVentaInicial').val()!='' && $('dtpFechaVentaFinal').val()!=''){
			if($('#sltOpcionesVenta').val()==1){
				$('#tableReporteVentas thead').html(`<tr>
					<th>#</th><th>Cod.</th><th>Fecha</th><th>Vuelto</th><th>Sub-Total</th><th>IGV</th><th>Total</th><th>Usuario</th>
				</tr>`);
				$('#tableReporteVentas tfoot').html(`<tr><td colspan=6></td><td><strong id="tdSumatoria"></strong></td></tr>`);

				$.ajax({url: 'php/ventas/reporteVentasGeneral.php', type: 'POST', data: { fecha1: moment($('#dtpFechaVentaInicial').val(), 'DD/MM/YYYY').format('YYYY-MM-DD'), fecha2: moment($('#dtpFechaVentaFinal').val(), 'DD/MM/YYYY').format('YYYY-MM-DD')}}).done(function(resp) {
					//console.log(resp)
					$('#tableReporteVentas tbody').html(resp);
					sumarTotalesReporte();
					$('#tableReporteVentas').DataTable( {
						dom: 'Bfrtip',
						paging:false,searching:false,"bInfo" : false,
						buttons: [
							{ extend: 'excel', text: '<i class="icofont icofont-file-excel"></i> Exportar Excel', className: 'btn btn-outline btn-success' }
						]
					}); 
				});
			}
			if($('#sltOpcionesVenta').val()==2){
				$('#tableReporteVentas thead').html(`<tr>
					<th>#</th><th>Cod.</th><th>Fecha</th><th>Vuelto</th><th>Cantidad</th><th>Precio U.</th><th>Producto</th><th>Total</th><th>Ganancia</th><th>Usuario</th>
				</tr>`);
				$('#tableReporteVentas tfoot').html(`<tr><td colspan=7></td><td><strong id="tdSumatoria"></strong></td><td><strong id="tdSumaGanancias"></strong></td></tr>`);

				$.ajax({url: 'php/ventas/reporteVentasDetallado.php', type: 'POST', data: { fecha1: moment($('#dtpFechaVentaInicial').val(), 'DD/MM/YYYY').format('YYYY-MM-DD'), fecha2: moment($('#dtpFechaVentaFinal').val(), 'DD/MM/YYYY').format('YYYY-MM-DD')}}).done(function(resp) {
					//console.log(resp)
					$('#tableReporteVentas tbody').html(resp);
					sumarTotalesReporte();
					$('#tableReporteVentas').DataTable( {
						dom: 'Bfrtip',
						paging:false,searching:false,"bInfo" : false,
						buttons: [
							{ extend: 'excel', text: '<i class="icofont icofont-file-excel"></i> Exportar Excel', className: 'btn btn-outline btn-success' }
						]
					}); 
				});
			}
		}
	});
	function sumarTotalesReporte() {
		let sumasa =0, ganancias =0;
		$.each($('.tdTotales'), function(i, dato){
			sumasa+= parseFloat($(dato).text());
		});
		$.each($('.tdGanancia'), function(i, gana){
			ganancias+= parseFloat($(gana).text());
		});
		$('#tdSumatoria').text(sumasa.toFixed(2));
		$('#tdSumaGanancias').text(((ganancias)).toFixed(2));
	}
	$.repInvent=true;
	function generarInventarioCompleto(){
		
		if($.repInvent){
			$.repInvent=false;
			$.ajax({url: 'php/productos/inventarioCompleto.php', type: 'POST', data: { }}).done(function(resp) {
				console.log(resp)
				$('#tableInventarioCompleto').html(resp);
				$.repInvent=true;
			});
		}
	}
	function generarMovimientoCompleto() {
		if($.repInvent){
			$.repInvent=false;
			$('#exportarExcelMovimientos').addClass('hidden');
			$.ajax({url: 'php/ventas/movimientosCompleto.php', type: 'POST', data: { fecha1:  moment($('#dtpFechaMovimientosInicial').val(), 'DD/MM/YYYY').format('YYYY-MM-DD'), fecha2: moment($('#dtpFechaMovimientosFinal').val(), 'DD/MM/YYYY').format('YYYY-MM-DD') }}).done(function(resp) {
				console.log(resp)
				$('#tableMovimientosCompleto').html(resp);
				$.repInvent=true;
				$('#exportarExcelMovimientos').removeClass('hidden');
			});
		}
	}
	$('#btnGenerarReporteCompras').click(function() {
		if($('#dtpFechaCompraInicial').val()!='' && $('#dtpFechaCompraFinal').val()!=''){
			$.ajax({url: 'php/compras/listarComprasCaja.php', type: 'POST', data: { fechaInicio: moment($('#dtpFechaCompraInicial').val(), 'DD/MM/YYYY').format('YYYY-MM-DD'), fechaFinal: moment($('#dtpFechaCompraFinal').val(), 'DD/MM/YYYY').format('YYYY-MM-DD') }}).done(function(resp) {
				console.log(resp)
				$('#tableCompras').html(resp);
			});
		}
	});
	</script>

</body>

</html>