<?php include "php/variablesGlobales.php"; ?>
<!DOCTYPE html>
<html lang="es">

<head>
	<title>Productos: Info-Farma</title>
	<?php include 'headers.php'; ?>

</head>

<body>

<div id="wrapper">

<?php $pagina = 'productos'; include 'menu-wrapper.php'; ?>
<!-- Page Content -->
<div id="page-content-wrapper">
	<div class="container-fluid">				 
			<div class="row">
				<div class="col-lg-12 contenedorDeslizable">
				<!-- Empieza a meter contenido principal dentro de estas etiquetas -->
				 <h2><i class="icofont icofont-blood"></i> Panel para productos</h2>

					<ul class="nav nav-tabs">
					<li class="active"><a href="#tabDetallarProducto" data-toggle="tab">Editar un producto</a></li>
					<li><a href="#tabProximosVencer" data-toggle="tab">Productos por vencerse</a></li>
					<li><a href="#tabCrearProducto" data-toggle="tab">Crear nuevo producto</a></li>
					
					</ul>
					
					<div class="tab-content">
					<!--Panel para buscar productos-->
						<!--Clase para las tablas-->
						<div class="tab-pane fade in active container-fluid" id="tabDetallarProducto">
						<!--Inicio de pestaña 01-->
							<div class="row"><p>Primero ubique el producto a modificar o detallar:</p>
							<div class="col-sm-6">
								<div class="input-group"> 
								<input type="text" class="form-control control-morado" id="txtBuscarProductoProd" placeholder="Nombre, Cod. interno, Cod. barras">
								<span class="input-group-btn">
									<button class="btn btn-warning btn-outline" id="btn-BuscarProductoProd" type="button"><span class="glyphicon glyphicon-search"></span></button>
								</span>
							</div><!-- /input-group -->
							</div>
							<div class="sm-6"><span class="red-text hidden" id="spanSinCoincidencias">No hay ninguna coincidencia con <strong><em><span></span></em></strong></span></div>
							</div>
							<hr>
							<div class="hidden" id="divResultadoProducto">
							<div class="row">
								<div class="col-sm-2">
									<div class="form-group">
									<label>Código interno </label>
									<input type="text" class="form-control text-center" id="txtprodCodigo" placeholder="Código de producto" disabled>
									</div>
								</div>
								<div class="col-sm-8 ">
									<div class="form-group">
									<label> Nombre de producto</label>
									<input type="text" class="form-control mayuscula" id="txtprodNombre" placeholder="Ubique el producto por Código, Nombre o Lote">
									</div>
								</div>
								<div class="col-sm-4 col-md-3">
									<div class="form-group">
									<label> Descripción</label>
									<textarea type="text" rows="5" class="form-control mayuscula"  id="txtprodDescripcion" placeholder="Ingrese alguna descripción o algún dato extra que desee recordar luego."></textarea>
									</div>
								</div>
								<div class="col-sm-2">
									<div class="form-group">
									<label>Costo unitario S/.</label>
									<input type="number" class="form-control text-center" id="txtprodCosto" placeholder="Precio unitario" >
									</div>
								</div>
								<div class="col-sm-2">
									<div class="form-group">
									<label>% Ganancia </label>
									<input type="number" class="form-control text-center" id="txtprodPorcentaje" placeholder="Precio unitario" >
									</div>
								</div>
								<div class="col-sm-2">
									<div class="form-group">
									<label>Precio unitario: S/.</label>
									<input type="number" class="form-control text-center" id="txtprodPrecio" placeholder="Precio unitario" >
									</div>
								</div>
								<div class="col-sm-2">
									<div class="form-group">
									<label>Stock en inventario: </label>
									<input type="number" class="form-control text-center" id="txtprodStock" placeholder="Stock" readonly>
									</div>
								</div>
								<div class="col-sm-2">
									<div class="form-group">
									<label>Alerta de escasez:</label>
									<input type="number" class="form-control text-center" id="txtprodMinimo" placeholder="Alerta unidades">
									</div>
								</div>
								<div class="col-sm-2">
									<div class="form-group">
									<label> Categoría</label>
									<!-- <input type="text" class="form-control" id="txtprodCategoria" placeholder="Ubique el producto por Código, Nombre o Lote"> -->
									<select class="selectpicker mayuscula" id="cmbProdCateg" data-width="auto" data-live-search="true">
										<?php require 'php/productos/listarCategorias.php'; ?>
									</select>
									</div>
								</div>
								<div class="col-sm-2">
									<div class="form-group">
									<label> Propiedad</label>
									<!-- <input type="text" class="form-control" id="txtprodPropiedad" placeholder="Ubique el producto por Código, Nombre o Lote"> -->
									<select class="selectpicker mayuscula" id="cmbProdProp" data-width="auto" data-live-search="true">
										<?php require 'php/productos/listarPropiedadProducto.php'; ?>
									</select>
									</div>
								</div>

								<div class="col-sm-2 ">
									<div class="form-group">
									<label> Laboratorio</label>
									<!-- <input type="text" class="form-control" id="txtprodLaboratorio" placeholder="Ubique el producto por Código, Nombre o Lote"> -->
									<select class="selectpicker mayuscula" id="cmbProdLaboratorio" data-width="100%" data-live-search="true" title="Seleccione un laboratorio">
										<?php require 'php/config/listarLaboratorios.php'; ?>
									</select>
									</div>
								</div>
								<div class="clearfix visible-lg"></div>
								<div class="col-sm-5">
									<label> Códigos de barra</label>
									<div class="panel panel-default">
										<div class="panel-body">
											<div class="col-sm-9">
											<div class="input-group">
												<input type="text" class="form-control" id="txtprodBarra" placeholder="Código de barra">
												<span class="input-group-btn"> <button class="btn btn-warning btn-outline" id="btn-addbarra" type="button"><span class="icofont icofont-clip"></span></button></span>
											</div>
											</div>
											<div class="col-sm-3">
											<button class="btn btn-default btn-outline" id="btnVerBarras"><i class="icofont icofont-idea"></i> Ver códigos <small>(<span id="spanCantBarr"></span>)</small></button>

											</div>
											
										</div>
									</div>
								</div>
								
								<div class="col-sm-6">
							
									<label> Lotes</label>
									<div class="panel panel-default">
											<div class="panel-body">
												<div class="col-sm-4">
													<input type="text" class="form-control text-center" id="txtCodigoLote" placeholder="Cod. Lote" autocomplete='nope'>
												</div>
												<div class="col-sm-4">
													<input type="date" class="form-control text-center" id="txtFechaLote" placeholder="Fecha" value="<?= date('Y-m-d');?>">
												</div>
												<div class="col-sm-3">
													<div class="input-group">
														<input type="number" class="form-control text-center" id="txtCantLote" placeholder="Cant" value="1">
														<div class="input-group-btn">
															<button class="btn btn-warning btn-outline" id="btnInsertarVencimiento" type="button"><span class="icofont icofont-clip"></span></button>
														</div>
													</div>
													
												</div>
												<!-- <div class="col-sm-3">
													<button class="btn btn-default btn-outline" id="btnVerLotes"><i class="icofont icofont-idea"></i> Ver lotes</button>
												</div> -->
										</div>

									</div>
									
									
								</div>
								
								<?php if(in_array( $_COOKIE['ckPower'], $admis)): ?>
								<div>
									<button class="btn btn-primary btn-outline pull-right btn-lg" id="btnActualizarDataProducto" style="margin-bottom:20px;"><i class="icofont icofont-checked"></i> Guardar cambios</button>
								</div>
								<?php endif; ?>
								</div>
								<div class="panel panel-default">
									<div class="panel-body">
										<div class="row">
										<div class="col-sm-7">
											<h4>Movimientos:</h4>
										</div>
										<?php if(in_array( $_COOKIE['ckPower'], $admis)): ?>
										<div class="col-sm-4">
											<button class="btn btn-default"  id="btnAddStock"> <i class="icofont icofont-circled-up"></i> Agregar Stock </button>
											<button class="btn btn-default"  id="btnLessStock"> <i class="icofont icofont-circled-down"></i> Restar Stock </button>
										</div>
										<?php endif; ?>
										</div>
										<table class="table table-dark table-hover" >
											<thead>
												<tr>
													<th>N°</th>
													<th>Tipo de movimiento</th>
													<th>Cantidad</th>
													<th>Fecha</th>
													<th>Usuario</th>
												</tr>
											</thead>
											<tbody id="divEntradasYSalidas">
												
											</tbody>
										</table>
										
									</div>
								</div>
								<div class="panel panel-default">
									<div class="panel-body">
										<h4>Vencimientos:</h4>
										<table class="table table-dark table-hover" >
											<thead>
												<tr>
													<th>N°</th>
													<th>Cod. Lote</th>
													<th>Fecha Vencimiento</th>
													<th>Unidades</th>
													<?php if(in_array( $_COOKIE['ckPower'], $admis)): ?>
													<th>@</th>
													<?php endif; ?>
												</tr>
											</thead>
											<tbody id="divLotesResumen">
												
											</tbody>
										</table>
									

									</div>
								</div>
							
						
							
							</div>


						<!--Fin de pestaña 01-->
						</div>

						

						<!--Panel para nueva compra-->
						<div class="tab-pane fade container-fluid" id="tabProximosVencer">
						<!--Inicio de pestaña 02-->
						<p>Productos ya vencidos y por vencer en  los próximos 3 meses:</p>
						<div >
							<div class="row container-fluid"><strong>
								<div class="col-sm-1 text-center">Código</div>
								<div class="col-sm-3">Nombre</div>
								<div class="col-sm-1 text-center">Lote</div>
								<div class="col-sm-2 text-center">Vencimiento</div>
								<div class="col-sm-2 text-center">Fecha</div>
							</strong>
							</div>
							<div class="row container-fluid" id="listasProdVencimiento"></div>
						</div>
						<!--Fin de pestaña 02-->
						</div>
						
						<div class="tab-pane fade in  container-fluid" id="tabCrearProducto">
						<!--Inicio de pestaña 03-->
							<p>Rellene los campos para crear nuevo producto:</p>
							<div id="divNuevoProducto">
							<div class="row">
								<div class="col-sm-2">
									<div class="form-group">
									<label>Código interno </label>
									<input type="text" class="form-control text-center" id="txtprodCodigo" value="Automático" placeholder="Código de producto" disabled>
									</div>
								</div>
								<div class="col-sm-8 ">
									<div class="form-group">
									<label> Nombre de producto</label>
									<input type="text" class="form-control mayuscula" id="txtprodNombre" placeholder="Ubique el producto por Código, Nombre o Lote">
									</div>
								</div>
								<div class="col-sm-4 col-md-3">
									<div class="form-group">
									<label> Descripción</label>
									<textarea type="text" rows="5" class="form-control mayuscula"  id="txtprodDescripcion" placeholder="Ingrese alguna descripción o algún dato extra que desee recordar luego."></textarea>
									</div>
								</div>
								<div class="col-sm-2">
									<div class="form-group">
									<label>Costo unitario S/.</label>
									<input type="number" class="form-control text-center" id="txtprodCostoNuevo" placeholder="Precio unitario" value=0.00 step=1 min=0 disabled>
									</div>
								</div>
								<div class="col-sm-2">
									<div class="form-group">
									<label>% Ganancia </label>
									<input type="number" class="form-control text-center" id="txtprodPorcentajeNuevo" placeholder="Precio unitario" value=30 step=1 min=0>
									</div>
								</div>
								<div class="col-sm-2">
									<div class="form-group">
									<label>Precio unitario: S/.</label>
									<input type="number" class="form-control text-center" id="txtprodPrecioNuevo" placeholder="Precio unitario" value="0.00" step=1 min=0>
									</div>
								</div>
								<div class="col-sm-2">
									<div class="form-group">
									<label>Stock en inventario: </label>
									<input type="number" class="form-control text-center" id="txtprodStock" placeholder="Stock" value=0 step=1 min=0>
									</div>
								</div>
								<div class="col-sm-2">
									<div class="form-group">
									<label>Alerta de escasez:</label>
									<input type="number" class="form-control text-center" id="txtprodMinimo" placeholder="Alerta unidades" value=10 step=1 min=0>
									</div>
								</div>
								<div class="col-sm-2">
									<div class="form-group">
									<label> Categoría</label>
									<!-- <input type="text" class="form-control" id="txtprodCategoria" placeholder="Ubique el producto por Código, Nombre o Lote"> -->
									<select class="selectpicker mayuscula" id="cmbProdCateg" data-width="auto" data-live-search="true" title="Tipo de categoría..." >
										<?php require 'php/productos/listarCategorias.php'; ?>
									</select>
									</div>
								</div>
								<div class="col-sm-2">
									<div class="form-group">
									<label> Propiedad</label>
									<!-- <input type="text" class="form-control" id="txtprodPropiedad" placeholder="Ubique el producto por Código, Nombre o Lote"> -->
									<select class="selectpicker mayuscula" id="cmbProdPropN" data-width="auto" data-live-search="true" title="Tipo de propiedad..." >
										<?php require 'php/productos/listarPropiedadProducto.php'; ?>
									</select>
									</div>
								</div>

								<div class="col-sm-2 ">
									<div class="form-group">
									<label> Laboratorio</label>
									<!-- <input type="text" class="form-control" id="txtprodLaboratorio" placeholder="Ubique el producto por Código, Nombre o Lote"> -->
									<select class="selectpicker mayuscula" id="cmbProdLaboratorio" data-width="100%" data-live-search="true" title="Laboratorio..." >
										<?php require 'php/config/listarLaboratorios.php'; ?>
									</select>
									</div>
								</div>
								
								
							</div>

								
							</div>
							<div class="row col-sm-12">
							<button class="btn btn-success btn-outline pull-right btn-lg" id="btnCrearNuevoProducto"><i class="icofont icofont-diskette"></i> Crear nuevo producto</button>
							</div>

							<!--Fin de pestaña 03-->
							</div>
						</div>
					</div>
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
			<div class="modal-footer"> <button class="btn btn-primary btn-outline" data-dismiss="modal"></i><i class="icofont icofont-alarm"></i> Aceptar</button></div>
		</div>
		</div>
	</div>

<!-- Modal para mostrar el detalle de Producto Encontrado-->
	<div class="modal fade modal-detalleProductoEncontrado " tabindex="-1" role="dialog">
		<div class="modal-dialog modal-lg ">
			<div class="modal-content">
				<div class="modal-header-indigo">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close" ><span aria-hidden="true">&times;</span></button> <!--Boton para cerrar-->
				<h4 class="modal-tittle "><i class="icofont icofont-help-robot"></i> <span id="lblCantidadProd"></span> Productos coincidentes con: <span id="terminoBusq"></span></h4></div>
				<div class="modal-body">
					<div class="container-fluid">
						<div class="row hidden-xs"> <strong>
							<div class="col-sm-4 ">N° - Producto</div>
							<div class="col-sm-1 ">Precio</div>
							<div class="col-sm-2 ">Clase</div>
							<div class="col-sm-2 ">Lote</div>
							<div class="col-sm-1 ">Vencimiento</div>
							<div class="col-sm-1 ">Stock</div>
							<!-- <div class="col-sm-1 text-center"><i class="icofont icofont-robot"></i></div> -->
						</strong></div>
						<div id="listadoDivs">
							
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-info btn-outline" data-dismiss="modal"><i class="icofont icofont-close-circled"></i> Cancelar búsqueda</button>
				</div>
			</div>
		</div>
	</div>

<!-- Modal para ver todos los codigos de barra -->
	<div class="modal fade modal-barras" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header-success">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" ><i class="icofont icofont-help-robot"></i> Listado de barras</h4>
			</div>
			<div class="modal-body">
				<div class="container-fluid" id="divsBarras">
					
					
				</div>
			</div>
			<div class="modal-footer"> <button class="btn btn-default btn-outline" data-dismiss="modal"><i class="icofont icofont-alarm"></i> Ok</button></div>
		</div>
		</div>
	</div>


<!-- Modal para indicar que falta completar campos o datos con error -->
	<div class="modal fade modal-felicitacion" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header-morado">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel"><i class="icofont icofont-help-robot"></i> Muy bien!</h4>
			</div>
			<div class="modal-body">
				<i class="icofont icofont-animal-squirrel"></i> <span id="lblMensajeBien"></span> <i class="icofont icofont-social-smugmug"></i>
			</div>
			<div class="modal-footer"> <button class="btn btn-morado btn-outline" data-dismiss="modal"><i class="icofont icofont-alarm"></i> Ok</button></div>
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

<!-- Modal para Agregar o Reducir stock -->
	<div class="modal fade modalModificarStock" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header-morado">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel"><i class="icofont icofont-help-robot"></i> Modificar stock</h4>
			</div>
			<div class="modal-body">
				<p>¿Cuántas unidades desea <span id="spModSumaStock">sumar</span> al stock?</p>
				<input type="number" class="form-control text-center" id="txtMovimientoCant" step="1">
				<p>Seleccione el tipo de movimiento:</p>
				
				<select id="sltOpcionesMovimiento" class="form-control" name="">
				</select>
				<p>¿Observación?</p>
				<input type="text" class="form-control " id="txtMovimientoObs" >

				
			</div>
			<div class="modal-footer"> <button class="btn btn-default" data-dismiss="modal" id="btnModificarSctock"><i class="icofont icofont-clip"></i> Modificar</button></div>
		</div>
		</div>
	</div>
	<!-- Modal para Anular Lote -->
	<div class="modal fade modalModificarLotes" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header-danger">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel"><i class="icofont icofont-help-robot"></i> Anular Lote</h4>
			</div>
			<div class="modal-body">
				<p>¿Desea descartar el lote?</p>
				
			</div>
			<div class="modal-footer"> <button class="btn btn-danger" data-dismiss="modal" id="btnModificarLotes"><i class="icofont icofont-clip"></i> Sí, anular</button></div>
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
	
	$('.selectpicker').selectpicker('refresh');

		$('.mitooltip').tooltip();


	habilitarDivFecha();

	$('#btnAgregarItem').click(function () {
		agregarRowInventario();
	});
	$('#txtBuscarProductoProd').focus();


});




function habilitarDivFecha(){
	$('.sandbox-container input').datepicker({language: "es", orientation: "top auto", daysOfWeekHighlighted: "0", autoclose: true, todayHighlight: true});
}
$('#listaProductosNuevoInventario').on('focusout','.txtMonedas',function () {
	var valor = parseFloat($(this).val());
	$(this).val(valor.toFixed(2));
});

function desabilitarCampos(elemento, indiceRow){//console.log(indiceRow)
	if(elemento == 1){ //1 para cuando SI Guardo
		$('#listaProductosNuevoInventario .row').eq(indiceRow).find('input').attr('disabled', 'disabled');
		$('#listaProductosNuevoInventario .row').eq(indiceRow).find('select').attr('disabled', 'disabled').selectpicker('refresh');
		$('#listaProductosNuevoInventario .row').eq(indiceRow).find('.btnGuardarItemInventario').addClass('hidden');
		$('#listaProductosNuevoInventario .row').eq(indiceRow).find('.btnActualizarItemInventario').addClass('hidden');
		$('#listaProductosNuevoInventario .row').eq(indiceRow).find('.btnModificarItemInventario').removeClass('hidden');
	}
	if(elemento == 2){ //2 para cuando NO Guardo
		$('#listaProductosNuevoInventario .row').eq(indiceRow).find('input').attr('disabled', 'disabled');
		$('#listaProductosNuevoInventario .row').eq(indiceRow).find('select').attr('disabled', 'disabled').selectpicker('refresh');
		$('#listaProductosNuevoInventario .row').eq(indiceRow).find('.btnGuardarItemInventario').removeClass('hidden');
		$('#listaProductosNuevoInventario .row').eq(indiceRow).find('.btnActualizarItemInventario').addClass('hidden');
		$('#listaProductosNuevoInventario .row').eq(indiceRow).find('.btnModificarItemInventario').addClass('hidden');}
	if(elemento == 3){ //3 para editar
		$('#listaProductosNuevoInventario .row').eq(indiceRow).find('input').removeAttr('disabled', 'disabled');
		$('#listaProductosNuevoInventario .row').eq(indiceRow).find('select').removeAttr('disabled', 'disabled').selectpicker('refresh');
		$('#listaProductosNuevoInventario .row').eq(indiceRow).find('.btnGuardarItemInventario').addClass('hidden');
		$('#listaProductosNuevoInventario .row').eq(indiceRow).find('.btnActualizarItemInventario').removeClass('hidden');
		$('#listaProductosNuevoInventario .row').eq(indiceRow).find('.btnModificarItemInventario').addClass('hidden');}

}



$('.nav-tabs-meses li').click(function () {
	var sumaValoriz =0;
	var indMes=$(this).index();
	//console.log( 'clic en el mes ' + ($(this).index()+1))
	//rellenar contenido del mes con clic:
	$(`.tabConenidoMeses #mes${indMes}`).children().remove();
	
	var anioSeleccionado=$('#divAñoInventario button').attr('title');
	$.ajax({url:'php/productos/listarTodoInventarios.php', type: 'POST', data: {anio:anioSeleccionado, mes: (indMes+1) }}).done(function(res){
		$(`.tabConenidoMeses #mes${indMes}`).append(`<div class="row"><strong><div class="col-xs-2">Cod.</div><div class="col-xs-3">Fecha</div><div class="col-xs-2">Valorizado.</div><div class="col-xs-2">Creador</div><div class="col-xs-1">Detalles</div></strong></div>`);
		//console.log(res)
		$.each(JSON.parse(res), function (i, arg) {
			moment.locale('es')
			sumaValoriz+=parseFloat(arg.total);
			var dia=moment(arg.comptFecha);
			$(`.tabConenidoMeses #mes${indMes}`).append(`
				<div class="row resulDiv noselect" style="cursor:default"><div class="col-xs-2 codDivInv" >${arg.idCompras}</div><div class="col-xs-3">${dia.format('dddd, DD h:mm a')}</div><div class="col-xs-2 argTotal">S/. ${arg.total}</div><div class="col-xs-2">${arg.Usuario}</div> <div class="col-xs-1"><button class="btn btn-danger btn-outline btnDetalleInvLista" id="${arg.idSimple}"><i class="icofont icofont-ui-calendar"></i></button></div></strong></div>
				`);
			//console.log(arg.comptFecha)
		});
		$(`.tabConenidoMeses #mes${indMes}`).prepend(`<p class="text-center"><strong>Suma valorizada: </strong> S/. ${sumaValoriz.toFixed(2)}</p>`);
	});
	
	
});
$('.tabConenidoMeses').on('click','.btnDetalleInvLista',function () {
	var idReg =$(this).attr('id');
	var index=$(this).parent().parent().index()-2 ; // se pone -2  por la etiqueta P y la etiqueta div cabecera
	//console.log(index);
	$('#spanIdInventario').text($('.tabConenidoMeses .resulDiv ').eq(index).find('.codDivInv').text());
	$('#spanvalorInvent').text($('.tabConenidoMeses .resulDiv ').eq(index).find('.argTotal').text())
	
	$.ajax({url: 'php/productos/listarDetalleInventarioPorId.php', type:'POST', data:{idInv: idReg}}).done(function (res) {
		console.log(res)
		$('#detProductoInv').children().remove();
		$.each(JSON.parse(res), function (i, elem) {
			$('#detProductoInv').append(`<div class="row container  "><div class="col-xs-4 text-capitalize">${elem.prodNombre}</div>
					<div class="col-xs-1 ">${elem.detcomprCantidad}</div>
					<div class="col-xs-2">${elem.detcomprPrecioUnitario}</div>
					<div class="col-xs-2">S/. ${elem.detcomprSubTotal}</div></div>`);
		});

		$('.modal-mostrarDetalleInventario').modal('show');


	});
});
function agregarBarraNueva(){
console.log('Agregar esto: ' + $('#txtprodBarra').val());
$.ajax({url: 'php/productos/validarBarraEnUso.php', type: 'POST', data: {barra: $('#txtprodBarra').val()}}).done(function (resp) {
	var devuelto = JSON.parse(resp);
	if(devuelto.length>0){ 
		$('#lblFalta').html('La barra que intenta agregar ya está asociada a: <span class="mayuscula">«'+ devuelto[0].prodNombre +'»</span>.');
		$('.modal-faltaCompletar').modal('show');}
	else{
		$.ajax({url: 'php/productos/insertarBarraPorId.php', type: 'POST', data: {barra: $('#txtprodBarra').val() , idProd: $('#txtprodCodigo').val() }}).done(function (resp) {
				//console.log(resp)
				if(resp==1){$('#lblMensajeBien').text('El código '+ $('#txtprodBarra').val() + ' se guardó correctamente');
					let num = parseInt($('#spanCantBarr').text())+1;
					$('#spanCantBarr').text(num);
					$('.modal-felicitacion').modal('show');
				}
				if(resp==0){$('#lblFalta').text('No se guardó el código, inténtelo de nuevo.');
					$('.modal-faltaCompletar').modal('show');}
			});
	}
	$('#txtprodBarra').val('');
	$('#txtprodBarra').focus();
	});


}
$('#txtprodBarra').keyup(function (e) {var code = e.which;
	if(code==13 ){	e.preventDefault();
		//console.log('enter')
		agregarBarraNueva();
	}
});
$('#btn-addbarra').click(function () {
	agregarBarraNueva();
});

$('#btn-BuscarProductoProd').click(function () {
	llamarBuscarProducto();
});
$('#txtBuscarProductoProd').keyup(function (e) {var code = e.which;
	if(code==13 ){	e.preventDefault();
		//console.log('enter')
		llamarBuscarProducto();
	}
});

function llamarBuscarProducto() {
	$('#divResultadoProducto').addClass('hidden');
	var filtr= $.trim($('#txtBuscarProductoProd').val());

	if(esNumero(filtr)){//es numero llamar al procedure por numero

			if($.trim($('#txtBuscarProductoProd').val())!=''){
				$('#terminoBusq').text($('#txtBuscarProductoProd').val());
				$.ajax({url: 'php/productos/buscarProductoXId.php', type: "POST", data: {filtro: filtr }
				}).success(function (resp) {//console.log(resp)

					if(JSON.parse(resp).length==0){$('#spanSinCoincidencias').removeClass('hidden').find('span').text('«'+$('#txtBuscarProductoProd').val()+'»'); }
					else{$('#spanSinCoincidencias').addClass('hidden');}
					$('#txtBuscarProductoProd').val('');
					$('#lblCantidadProd').text(JSON.parse(resp).length);
					$('.modal-detalleProductoEncontrado #listadoDivs').children().remove();
					JSON.parse(resp).map(function (dato, index) {
						
						moment.locale('es');
						var vence='Sin fecha';
						if(dato.prodFechaVencimiento!=''){moment(dato.prodFechaVencimiento, 'DD/MM/YYYY').endOf('day').fromNow()}
						
						
						$('.modal-detalleProductoEncontrado #listadoDivs').append(`
						<div class="row" onclick='mostrarProducto(${dato.idProducto})'> 
							<div class="hidden" id="mProdID">${dato.idProducto}</div>
							<div class="col-xs-12 col-sm-4 mayuscula" id="mProdNombre"><span class="visible-xs-inline"><strong>Nombre: </strong></span> <span>${index+1}. ${dato.prodNombre}</span></div>
							<div class="col-xs-6 col-sm-1 text-center" id="mProdPrecio"><span class="visible-xs-inline"><strong>S/. </strong></span>  ${parseFloat(dato.prodPrecioUnitario).toFixed(2)}</div>
							<div class="col-xs-6 col-sm-2"><span class="visible-xs-inline"><strong>Tipo: </strong></span> <small>${dato.catprodDescipcion}</small></div>
							<div class="col-xs-6 col-sm-2 text-center"><span class="visible-xs-inline"><strong>Lote: </strong></span> ${dato.lote}</div>
							<div class="col-xs-6 col-sm-1 mayuscula mitooltip text-center" title="${moment(dato.prodFechaVencimiento, 'DD/MM/YYYY').format('dddd, DD MMM YYYY')}"><span class="visible-xs-inline"><strong>Vence: </strong></span>  <small>${vence}</small></div>
							<div class="col-xs-6 col-sm-1 text-center"><span class="visible-xs-inline"><strong>Stock: </strong></span> ${dato.prodStock}</div>
							<div class="col-xs-6 col-sm-1 text-center"><button class="btn btn-negro btn-sm btn-outline btnPasarProductoCanasta" id="${dato.idProducto}"><i class="icofont icofont-simple-right"></i></button></div>

						</div>
						`);
					$('.modal-detalleProductoEncontrado').modal('show');

					});
					$('.mitooltip').tooltip();			
				});

			}
		}
	else{//es letras llamar al procedure para que haga el filtro
		if(filtr!=''){
			filtr='%'+filtr.replace(/\ /g,'%')+'%';

				if($.trim($('#txtBuscarProductoProd').val())!=''){
					$('#terminoBusq').text($('#txtBuscarProductoProd').val());
					$.ajax({url: 'php/productos/buscarProductoXNombreOLote.php', type: "POST", data: {filtro: filtr }
					}).success(function (resp) {

						if(JSON.parse(resp).length==0){$('#spanSinCoincidencias').removeClass('hidden').find('span').text('«'+$('#txtBuscarProductoProd').val()+'»'); }
						else{$('#spanSinCoincidencias').addClass('hidden');}
						$('#txtBuscarProductoProd').val('');
						$('#lblCantidadProd').text(JSON.parse(resp).length);
						$('.modal-detalleProductoEncontrado #listadoDivs').children().remove();
						JSON.parse(resp).map(function (dato, index) {
							moment.locale('es');
							var vence='Sin fecha';
							if(dato.prodFechaVencimiento!=''){moment(dato.prodFechaVencimiento, 'DD/MM/YYYY').endOf('day').fromNow()}
							
							
							$('.modal-detalleProductoEncontrado #listadoDivs').append(`
							<div class="row" onclick='mostrarProducto(${dato.idProducto})'> 
								<div class="hidden" id="mProdID">${dato.idProducto}</div>
								<div class="col-xs-12 col-sm-4 mayuscula" id="mProdNombre"><span class="visible-xs-inline"><strong>Nombre: </strong></span> <span>${index+1}. ${dato.prodNombre}</span></div>
								<div class="col-xs-6 col-sm-1 text-center" id="mProdPrecio"><span class="visible-xs-inline"><strong>S/. </strong></span>  ${parseFloat(dato.prodPrecioUnitario).toFixed(2)}</div>
								<div class="col-xs-6 col-sm-2"><span class="visible-xs-inline"><strong>Tipo: </strong></span> <small>${dato.catprodDescipcion}</small></div>
								<div class="col-xs-6 col-sm-2 text-center"><span class="visible-xs-inline"><strong>Lote: </strong></span> ${dato.lote}</div>
								<div class="col-xs-6 col-sm-1 mayuscula mitooltip text-center" title="${moment(dato.prodFechaVencimiento, 'DD/MM/YYYY').format('dddd, DD MMM YYYY')}"><span class="visible-xs-inline"><strong>Vence: </strong></span>  <small>${vence}</small></div>
								<div class="col-xs-6 col-sm-1 text-center"><span class="visible-xs-inline"><strong>Stock: </strong></span> ${dato.prodStock}</div>
								<div class="col-xs-6 col-sm-1 text-center"><button class="btn btn-negro btn-sm btn-outline btnPasarProductoCanasta" id="${dato.idProducto}"><i class="icofont icofont-simple-right"></i></button></div>

							</div>
							`);
						$('.modal-detalleProductoEncontrado').modal('show');

						});
						$('.mitooltip').tooltip();			
					});

				}
		}
	}


	
}

$('#listadoDivs').on('click','.btnPasarProductoCanasta',function () {
	mostrarProducto($(this).attr('id'));
});
function mostrarProducto(idProd){
	//var idProd= $('#listadoDivs .row').eq(indexSelec).find('#mProdID').text();
	$('#divResultadoProducto').removeClass('hidden');
	$.ajax({url: 'php/productos/listarDetalleProductoPorId.php', type: 'POST', data: {idPro: idProd}}).done(function (resp) {
		JSON.parse(resp).map(function (dato, index) {
			//console.log(dato);
			$('#txtprodCodigo').val(dato.idProducto);
			$('#txtprodNombre').val(dato.prodNombre);
			$('#txtprodDescripcion').val(dato.prodDescripcion);
			$('#txtprodStock').val(dato.prodStock);
			$('#txtprodMinimo').val(dato.prodStockMinimo);
			/*$('#txtprodCategoria').val(dato.idCategoriaProducto);
			$('#txtprodPropiedad').val(dato.idPropiedadProducto);
			$('#txtprodLaboratorio').val(dato.idLaboratorio);*/
			$('#txtprodPrecio').val(parseFloat(dato.prodPrecio).toFixed(2));
			$('#txtprodCosto').val(parseFloat(dato.prodCosto).toFixed(2));
			$('#txtprodPorcentaje').val(dato.prodPorcentaje);
			$('#spanCantBarr').text(dato.cantBarras);
			$('#cmbProdCateg').selectpicker('val', dato.idCategoriaProducto);
			$('#cmbProdProp').selectpicker('val', dato.idPropiedadProducto);
			$('#cmbProdLaboratorio').selectpicker('val', dato.idLaboratorio);
		});
	});
	verVencimientosPorId(idProd)
	$.ajax({url: 'php/productos/listarMovimientosProducto.php', type: 'POST', data: {idProducto:idProd }}).done(function(resp) {
		//console.log(resp)
		$('#divEntradasYSalidas').html(resp);
	});

	$('.modal-detalleProductoEncontrado').modal('hide');
}
function verVencimientosPorId(idProd){
	$.ajax({url: 'php/productos/listarLotesYVencimientoPorID.php', type: 'POST', data: {idPro: idProd}}).done(function (resp) {
		moment().locale('es');
		$('#spanRowLote').children().remove();
		$('#spanRowFechaVen').children().remove();
		$('#divLotesResumen').html(resp);
		$.each($('#divLotesResumen .fechaVencimiento'), function(index, elem){
			let fecha1 = moment($(elem).text() + ' 00:00:00' );
			moment.locale('es')
			$(elem).next().text(' ('+fecha1.fromNow()+')');
		});
		/* JSON.parse(resp).map(function (dato, index) {
			console.log(dato);
			$('#spanRowLote').append(`<input type="text" class="form-control text-center"  id="txtprodLote" placeholder="Lote" value="${dato.prodLote}" disabled>`)
			$('#spanRowFechaVen').append(`<div class="sandbox-container"><input type="text" class="form-control text-center" id="txtprodFecha" placeholder="Fecha" value="${dato.prodFechaVencimiento}" disabled></div>`)
			$('#emFechaProd').text(moment(dato.prodFechaRegistro).format('DD/MM/YYYY'));
			habilitarDivFecha();

		}); */
	});
}
$('#btnVerBarras').click(function () {
	$('#divsBarras').children().remove();
	$.ajax({url: 'php/productos/listarBarrasId.php', type: 'POST', data: {idPro: $('#txtprodCodigo').val()}}).done(function (resp) {
		//console.log(resp);
		JSON.parse(resp).map(function (dato, index) {
			$('#divsBarras').append(`<div class="row"><button class="btn btn-danger btn-outline btn-xs btnEliminarCode"><i class="icofont icofont-ui-delete"></i></button>${dato.barrasCode}</div>`);
		})
		
	});
	$('.modal-barras').modal('show');
});
$('.modal-barras').on('click', '.btnEliminarCode', function () {
	var index= $(this).parent().index();
	
	//console.log('eliminar idproducto '+ $('#txtprodCodigo').val()+ ' barra: '+ $(this).parent().text());
	
	$.ajax({url: 'php/productos/eliminarBarra.php' , type:"POST", data: {barra: $(this).parent().text() , idProd: $('#txtprodCodigo').val() }
	}).done(function () {
		$('#divsBarras .row').eq(index).remove();
	})
});
$('#btnActualizarDataProducto').click(function () {
	
	/*console.log('Para guardar:');
	console.log(` id: `+ $('#txtprodCodigo').val()+ ' nombre: ' + $.trim($('#txtprodNombre').val()));
	console.log(` desc: `+ $('#txtprodDescripcion').val()+ ' costo: ' + $('#txtprodCosto').val());
	console.log(` porcentaje: `+ $('#txtprodPorcentaje').val()+ ' precio: ' + $('#txtprodPrecio').val());
	console.log(` minimo: `+ $('#txtprodMinimo').val());
	console.log(' categ ' + $('#cmbProdCateg').parent().find('button').attr('title'));
	console.log(' propied ' + $('#cmbProdProp').parent().find('button').attr('title'));
	console.log(' labota ' + $('#cmbProdLaboratorio').parent().find('button').attr('title'));*/
	
	if($(this).hasClass('disabled')){}
	else{
		$(this).addClass('disabled');
		$.ajax({url: 'php/productos/actualizarProductoDetalles.php', type:'POST', data: {
			idProd: $('#txtprodCodigo').val(), nombre: $.trim($('#txtprodNombre').val()), descipt: $('#txtprodDescripcion').val(), stkmin: $('#txtprodMinimo').val(), categ: $('#cmbProdCateg').parent().find('button').attr('title'), precio: $('#txtprodPrecio').val(), labo:  $('#cmbProdLaboratorio').parent().find('button').attr('title'), costo: $('#txtprodCosto').val(), porcent: $('#txtprodPorcentaje').val(), propi: $('#cmbProdProp').parent().find('button').attr('title'), stock: $('#txtprodStock').val()
		}}).done(function (resp) { console.log(resp)
			if(resp==1){$('#lblMensajeBien').text('Los datos del producto '+ $('#txtprodBarra').val() + ' se actualizaron correctamente .');
							$('.modal-felicitacion').modal('show');
						}
						if(resp==0){$('#lblFalta').text('No se guardó ningun cambio, sugiero que presione F5 e inténtelo de nuevo.');
							$('.modal-faltaCompletar').modal('show');}
				$('#btnActualizarDataProducto').removeClass('disabled');
		});

	}



});

$('#txtprodCosto').keyup(function () {calculoCostos(1);});
$('#txtprodPorcentaje').keyup(function () {calculoCostos(2);});
$('#txtprodPrecio').keyup(function () {calculoCostos(3);});

$('#txtprodPorcentajeNuevo').keyup(function () {calculoCostos(4);});
$('#txtprodPrecioNuevo').keyup(function () {calculoCostos(4);});



function calculoCostos(tipoCaso){
	var vproCost, vproGana, vproPrec;
	if ($('#txtprodCosto').val()==0 ){vproCost=0}else{vproCost=$('#txtprodCosto').val()}
	if ($('#txtprodPorcentaje').val()==0 ){vproGana=0}else{vproGana=$('#txtprodPorcentaje').val()}
	if ($('#txtprodPrecio').val()==0  ){vproPrec=0}else{vproPrec=$('#txtprodPrecio').val()}

	if(tipoCaso==1){$('#txtprodPrecio').val(parseFloat(vproCost*(1+vproGana)/100).toFixed(2))}
	if(tipoCaso==2){$('#txtprodPrecio').val(parseFloat(vproCost*(1+vproGana)/100).toFixed(2))}
	if(tipoCaso==3){$('#txtprodCosto').val(parseFloat(vproPrec/(1+vproGana/100)).toFixed(2))}

	if(tipoCaso==4){$('#txtprodCostoNuevo').val(parseFloat($('#txtprodPrecioNuevo').val()/(1+$('#txtprodPorcentajeNuevo').val()/100)).toFixed(2))}

	
}

$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
  var target = $(e.target).attr("href") // activated tab
  if(target=='#tabProximosVencer'){//solo selecciona el tabProximosVencer
		$(`#listasProdVencimiento`).children().remove();
		var sumaValoriz;
		
		$.ajax({url:'php/productos/listarProximosAVencer.php', type:'POST'}).done(function (resp) {
			$.each(JSON.parse(resp), function (i, arg) { console.log(arg)
				moment.locale('es')
				sumaValoriz+=parseFloat(arg.prodPrecio);
				var dia=moment(arg.prodFechaVencimiento);
				$(`#listasProdVencimiento`).append(`
					<div class="row resulDiv noselect" style="cursor:default">
						<div class="col-xs-2 col-sm-1 text-center codDivInv" >${arg.idproducto}</div>
						<div class="col-xs-3 mayuscula"> ${arg.prodNombre}</div>
						<div class="col-xs-1 text-center argTotal">${arg.prodLote}</div>
						<div class="col-xs-2 text-center argTotal">${dia.endOf('day').fromNow()}</div>
						<div class="col-xs-2 text-center argTotal mitooltip" title="${dia.format('DD/MM/YYYY')}">${dia.format('MMMM [de] YYYY')}</div>
						<div class="col-xs-1 hidden"><button class="btn btn-morita btn-outline btnDetalleInvLista" id="${arg.idproducto}"><i class="icofont icofont-ui-calendar"></i></button></div></strong></div>
					`);
				$('.mitooltip').tooltip();
				
			});
		})
  }

});
function limpiarCamposNuevo() {
	activarBtnNuevo();
	$('#tabCrearProducto #txtprodNombre').val('');
	$('#tabCrearProducto #txtprodDescripcion').val('');
	$('#tabCrearProducto #txtprodMinimo').val('0.00');
	$('#tabCrearProducto #txtprodPrecioNuevo').val('0.00');
	$('#tabCrearProducto #txtprodCostoNuevo').val('0.00');
	$('#tabCrearProducto #txtprodStock').val('0.00');
	$('#tabCrearProducto #txtprodPorcentajeNuevo').val('30');
	$('#tabCrearProducto #cmbProdCateg').selectpicker('val', '');
	$('#tabCrearProducto #cmbProdLaboratorio').selectpicker('val', '');
	$('#tabCrearProducto #cmbProdPropN').selectpicker('val', '');

}
function activarBtnNuevo(){$('#btnCrearNuevoProducto').removeClass('disabled');}

$('#btnCrearNuevoProducto').click(function () {
	
	if(!$('#btnCrearNuevoProducto').hasClass('disabled')){
		$(this).addClass('disabled');

		var categProd=$('#tabCrearProducto #cmbProdCateg').parent().find('button').attr('title');
		var laborat=$('#tabCrearProducto #cmbProdLaboratorio').parent().find('button').attr('title');
		var propieda=$('#tabCrearProducto #cmbProdPropN').parent().find('button').attr('title');

		if($('#tabCrearProducto #txtprodNombre').val()==''){$('#lblFalta').text('Te olvidaste del nombre para el producto'); activarBtnNuevo(); $('.modal-faltaCompletar').modal('show');}
		else if( $('#txtprodPrecioNuevo').val()<=0 || $('#txtprodPrecioNuevo').val()=='' ){$('#lblFalta').text('Verifique la casilla de precios'); activarBtnNuevo(); $('.modal-faltaCompletar').modal('show'); }
		else if( $('#tabCrearProducto #txtprodMinimo').val()<0 ){$('#lblFalta').text('Verifique la casilla de alerta no puede ser negativo'); activarBtnNuevo(); $('.modal-faltaCompletar').modal('show'); }
		else if(categProd=='' || categProd=='Tipo de categoría...'  ){$('#lblFalta').text('Debes seleccionar una «Categoría de producto» si no encuentras en la lista selecciona «Otros»'); activarBtnNuevo(); $('.modal-faltaCompletar').modal('show'); }
		else if(propieda=='' || propieda=='Tipo de propiedad...'  ){$('#lblFalta').text('Debes seleccionar una «Propiedad de producto» si no encuentras en la lista selecciona «Otros»'); activarBtnNuevo(); $('.modal-faltaCompletar').modal('show'); }
		else if(laborat=='' || laborat=='Laboratorio...'  ){$('#lblFalta').text('Debes seleccionar un «Laboratorio» si no encuentras en la lista selecciona «Otros»'); activarBtnNuevo(); $('.modal-faltaCompletar').modal('show');}
		else{
			$.ajax({url: 'php/productos/insertarProductoNuevo.php', type:'POST', data: {
				nombre: $.trim($('#tabCrearProducto #txtprodNombre').val()), descipt: $('#tabCrearProducto #txtprodDescripcion').val(), stkmin: $('#tabCrearProducto #txtprodMinimo').val(), categ: $('#tabCrearProducto #cmbProdCateg').parent().find('button').attr('title'), precio: $('#tabCrearProducto #txtprodPrecioNuevo').val(), labo:  $('#tabCrearProducto #cmbProdLaboratorio').parent().find('button').attr('title'), costo: $('#tabCrearProducto #txtprodCostoNuevo').val(), porcent: $('#tabCrearProducto #txtprodPorcentajeNuevo').val(), propi: $('#tabCrearProducto #cmbProdPropN').parent().find('button').attr('title'), stock: $('#tabCrearProducto #txtprodStock').val()
			}}).done(function (resp) { console.log(resp)
				limpiarCamposNuevo();
				if(resp==1){$('#lblMensajeBien').text('Los datos del producto '+ $('#txtprodBarra').val() + ' se actualizaron correctamente .');
								$('.modal-felicitacion').modal('show');
							}
				if(resp==0){$('#lblFalta').text('No se guardó ningun cambio, sugiero que presione F5 e inténtelo de nuevo.');
					$('.modal-faltaCompletar').modal('show');}		
		});
		}
	}
});
$('#btnAddStock').click(function() {
	$('#txtMovimientoCant').val(1);
	$('#spModSumaStock').text('sumar');
	$.ajax({url: 'php/productos/listarMovimientos.php', type: 'POST', data: { tipo: 'suma' }}).done(function(resp) {
		$('#sltOpcionesMovimiento').html(resp);
	});
	$('.modalModificarStock').modal('show');	
});
$('#btnLessStock').click(function() {
	$('#txtMovimientoCant').val(1);
	$('#spModSumaStock').text('restar');
	$.ajax({url: 'php/productos/listarMovimientos.php', type: 'POST', data: { tipo: 'resta' }}).done(function(resp) {
		$('#sltOpcionesMovimiento').html(resp);
	});
	$('.modalModificarStock').modal('show');	
});
$('#btnModificarSctock').click(function() {
	if( $('#txtMovimientoCant').val()>0 ){
		$.ajax({url: 'php/productos/insertarMovimientoProductoStock.php', type: 'POST', data: {idProducto: $('#txtprodCodigo').val(), movimiento: $('#sltOpcionesMovimiento').val(), cantidad: $('#txtMovimientoCant').val(), observacion: $('#txtMovimientoObs').val(), usuario:'<?= $_COOKIE['ckidUsuario']?>' }}).done(function(resp) {
			//console.log(resp)
			let suma=[2,4];
			let resta=[1, 3, 5, 6, 7];
			let movi= $('#sltOpcionesMovimiento option[value="'+$('#sltOpcionesMovimiento').val()+'"]').text();
			let stock = parseInt($('#txtprodStock').val()) + parseInt($('#txtMovimientoCant').val()) ;

			if(resp='ok'){
				$('#txtprodStock').val(stock);
				if( suma.indexOf($('#sltOpcionesMovimiento').val())){
					$('#divEntradasYSalidas').prepend(`
						<tr>
							<td>-</td>
							<td>${movi}</td>
							<td>${$('#txtMovimientoCant').val()}</td>
							<td>${moment().format('DD/MM/YYYY')}</td>
							<td><?= $_COOKIE['ckAtiende']; ?></td>
						</tr>
					`);
				}
				if( suma.indexOf($('#sltOpcionesMovimiento').val())){

				}
			}
		});
	}
});
$('#btnInsertarVencimiento').click(function() {

	$.ajax({url: 'php/productos/insertarFechaVencimiento.php', type: 'POST', data: {idProducto: $('#txtprodCodigo').val(), lote: $('#txtCodigoLote').val(), cantidad: $('#txtCantLote').val(), fecha: $('#txtFechaLote').val() }}).done(function(resp) {
		//console.log(resp)
		$('#lblMensajeBien').text('Se agregó el vencimiento correctamente.');
		$('.modal-felicitacion').modal('show');
		verVencimientosPorId($('#txtprodCodigo').val())
	});
});
function borrarLote(lote){
	$.lote= lote;
	$('.modalModificarLotes').modal('show');
}
$('#btnModificarLotes').click(function() {
	$.ajax({url: 'php/productos/borrarLote.php', type: 'POST', data: { lote: $.lote }}).done(function(resp) {
		console.log(resp)
		if(resp=='ok'){
			$('#lblMensajeBien').text('Se retiró el lote correctamente.');
			$('.modal-felicitacion').modal('show');
			verVencimientosPorId($('#txtprodCodigo').val())
		}
	});
});
</script>

</body>

</html>
