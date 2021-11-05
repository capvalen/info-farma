<?php include "php/variablesGlobales.php"; ?>
<!DOCTYPE html>
<html lang="es">

<head>
	<title>Productos: Info-Farma</title>
	<?php include 'headers.php'; ?>

</head>

<body>

<style>
	#tabCrearProducto .bootstrap-select{
		width: 100% !important;
	}

	.dropdown-menu {
		z-index: 1031;
	}

	#panelVariantes{
		position: absolute;
		top: 0px;
		bottom: 0;
		left:0;
		right:0;
		background:#000000e3;
		z-index: 1030;
		display:none;
	}
	#panelEnSi {
		position: absolute;
		top: 0px;
		bottom: 0;
		width: 450px;
		max-width: 100vw;
		background: #f7f7f7;
		right: 0;
		z-index: 1031;
		display: block;
		position: fixed;
		overflow: hidden;
	}
	#panelContenido{
		overflow:auto;
		height: 100%;
	}
	.cerrar{
		font-size:2em; color: #fb1a1ab8; cursor:pointer;
	}
	.cerrar:hover{
		color: #fb1a1a;
	}
	.eliminarVariante{
		cursor:pointer;
	}
	#listadoDivs .row{
		border-bottom: 1px solid #dfdfdf;
	}
	.close {
    opacity: 0.8;
    color: #cb0000;
		font-size: 32px;
	}
</style>

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
							<li id="liYaAgotados"><a href="#tabYaAgotados" data-toggle="tab">Productos agotados</a></li>
							<?php /* if(in_array($_COOKIE['ckPower'], $admis)){ */ ?>
							<li><a href="#tabCrearProducto" data-toggle="tab">Crear nuevo producto</a></li>
							<?php /* } */ ?>

						</ul>

						<div class="tab-content">
							<!--Panel para buscar productos-->
							<!--Clase para las tablas-->
							<div class="tab-pane fade in active container-fluid" id="tabDetallarProducto">
								<!--Inicio de pestaña 01-->
								<div class="row">
									<p>Primero ubique el producto a modificar o detallar:</p>
									<div class="row">
										<div class="col-lg-6">
											<div class="input-group">
												<div class="input-group-btn">
													<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" id="combTipoBusqueda">Busq. Normal <span class="caret"></span></button>
													<ul class="dropdown-menu">
														<li onclick="$(this).parent().prev().html(`Busq. Normal <span class='caret'></span>`); $(this).parent().parent().next().attr('placeholder', 'Nombre, Cod. interno, Cod. barras')"><a href="#">Búsqueda normal</a></li>
														<li role="separator" class="divider"></li>
														<li onclick="$(this).parent().prev().html(`Busq. por Lote <span class='caret'></span>`); $(this).parent().parent().next().attr('placeholder', 'Nombre del Lote')"><a href="#">Búsqueda por lote</a></li>
													</ul>
												</div><!-- /btn-group -->
												<input type="text" class="form-control" id="txtBuscarProductoProd" placeholder="Nombre, Cod. interno, Cod. barras" autocomplete="off">
												<span class="input-group-btn">
													<button class="btn btn-default" type="button" id="btn-BuscarProductoProd"><span class="glyphicon glyphicon-search"></span></button>
												</span>
											</div><!-- /input-group -->
										</div><!-- /.col-lg-6 -->
									</div><!-- /.row -->
								
									<div class="sm-6"><span class="red-text hidden" id="spanSinCoincidencias">No hay ninguna coincidencia
											con <strong><em><span></span></em></strong></span></div>
								</div>
								<hr>
								<div class="hidden" id="divResultadoProducto">
									<div class="row">
										<div class="col-sm-3">
											<div class="form-group">
												<label>Código interno </label>
												<input type="text" class="form-control text-center" id="txtprodCodigo" placeholder="Código de producto" disabled>
											</div>
										</div>
										<div class="col-sm-8 ">
											<div class="form-group">
												<label> Nombre de producto</label>
												<input type="text" class="form-control mayuscula" id="txtprodNombre" placeholder="Ubique el producto por Código, Nombre o Lote" autocomplete="off">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label> Principio activo</label>
												<textarea class="form-control mayuscula" id="txtaPrincipio" cols="30" rows="2"></textarea>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label>Costo unitario (S/)</label>
												<input type="number" class="form-control text-center" id="txtprodCosto" placeholder="Precio unitario">
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label>Precio unitario: (S/) <a href="#!" onclick="panelVariantes()">Gestionar variantes</a></label>
												<input type="number" class="form-control text-center" id="txtprodPrecio" placeholder="Precio unitario">
											</div>
										</div>
										<div class=" col-md-4">
											<div class="form-group">
												<label>Ganancia (%) </label>
												<input type="number" class="form-control text-center" id="txtprodPorcentaje" placeholder="Precio unitario">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label>Stock en inventario: </label>
												<input type="number" class="form-control text-center" id="txtprodStock" placeholder="Stock" readonly>
											</div>
										</div>
										
										<div class="col-md-4">
											<div class="form-group">
												<label>Alerta de escasez: </label> <label><input type="checkbox" id="chAlerta"> <span>No</span></label>
												<input type="number" class="form-control text-center" id="txtprodMinimo" placeholder="Alerta unidades">
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label>Controlado:</label>
												<select class="selectpicker mayuscula" id="cmbProdControlado" data-width="100%" data-live-search="true">
													<option value="0">No</option>
													<option value="1">Sí, cuidado</option>
												</select>
											</div>
										</div>

									</div>
									<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label> Categoría</label><br>
											<!-- <input type="text" class="form-control" id="txtprodCategoria" placeholder="Ubique el producto por Código, Nombre o Lote"> -->
											<select class="selectpicker mayuscula" id="cmbProdCateg" data-width="100%" data-live-search="true">
												<?php require 'php/productos/listarCategorias.php'; ?>
											</select>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label> Propiedad</label><br>
											<!-- <input type="text" class="form-control" id="txtprodPropiedad" placeholder="Ubique el producto por Código, Nombre o Lote"> -->
											<select class="selectpicker mayuscula" id="cmbProdProp" data-width="100%" data-live-search="true">
												<?php require 'php/productos/listarPropiedadProducto.php'; ?>
											</select>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label> Laboratorio</label><br>
											<!-- <input type="text" class="form-control" id="txtprodLaboratorio" placeholder="Ubique el producto por Código, Nombre o Lote"> -->
											<select class="selectpicker mayuscula" id="cmbProdLaboratorio" data-width="100%" data-live-search="true" title="Seleccione un laboratorio">
												<?php require 'php/config/listarLaboratorios.php'; ?>
											</select>
										</div>
									</div>
									</div>
									<div class="row">
										<div class="col-sm-12">
											<label> Códigos de barra</label>
											<div class="panel panel-default">
												<div class="panel-body">
													<div class="col-md-9">
														<div class="input-group">
															<input type="text" class="form-control" id="txtprodBarra" placeholder="Código de barra">
															<span class="input-group-btn"> <button class="btn btn-warning btn-outline" id="btn-addbarra" type="button"><span class="icofont icofont-clip"></span></button></span>
														</div>
													</div>
													<div class="col-md-3">
														<button class="btn btn-default btn-outline" id="btnVerBarras"><i class="icofont icofont-idea"></i> Ver códigos <small>(<span id="spanCantBarr"></span>)</small></button>

													</div>

												</div>
											</div>
										</div>
										<div class="col-sm-12">
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
												</div>
											</div>
										</div>

									</div>
									<div class="row">
										<div class="col-sm-12">
											<div class="form-group">
												<label> Información extra</label>
												<textarea type="text" rows="2" class="form-control mayuscula" id="txtprodDescripcion" placeholder="Datos complementarios"></textarea>
											</div>
										</div>
									</div>
									<div class="row">
										<?php if(in_array( $_COOKIE['ckPower'], $admis)): ?>
										<div class="col-sm-12">
											<button class="btn btn-danger btn-outline pull-left btn-lg" id="btnBorrarDataProducto"
												style="margin-bottom:20px;"><i class="icofont icofont-trash"></i> Borrar producto</button>
											<button class="btn btn-morado btn-outline pull-right btn-lg" id="btnActualizarDataProducto"
												style="margin-bottom:20px;"><i class="icofont icofont-checked"></i> Guardar cambios</button>
										</div>
										<?php endif; ?>
									</div>

									<div class="panel panel-default">
										<div class="panel-body">
											<div class="row">
												<div class="col-sm-6">
													<h4>Movimientos <small>Los 20 últimos</small></h4>
												</div>
												<?php if(in_array( $_COOKIE['ckPower'], $admis)): ?>
												<div class="col-sm-6 text-center">
													<button class="btn btn-default" id="btnAddStock"> <i class="icofont icofont-circled-up"></i>
														Agregar Stock </button>
													<button class="btn btn-default" id="btnLessStock"> <i
															class="icofont icofont-circled-down"></i> Restar Stock </button>
												</div>
												<?php endif; ?>
											</div>
											<table class="table table-dark table-hover">
												<thead>
													<tr>
														<th>N°</th>
														<th>Tipo de movimiento</th>
														<th>Cantidad</th>
														<th>Fecha</th>
														<th>Usuario</th>
														<th>@</th>
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
											<table class="table table-dark table-hover">
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
								<p>Productos vencidos y por vencer dentro de 3 meses:</p>
								<div>
									<table class="table table-hover">
										<thead>
											<tr>
												<th>N°</th>
												<th>Cod.</th>
												<th>Producto</th>
												<th>Lote</th>
												<th>Vence en</th>
												<th>Fecha</th>
												<th>Alerta</th>
											</tr>
										</thead>
										<tbody id="listasProdVencimiento"></tbody>
									</table>
									
									
								</div>
								<!--Fin de pestaña 02-->
							</div>

							<div class="tab-pane fade container-fluid" id="tabYaAgotados">
								<p>Listado Productos ya agotados o por agotar</p>
								<div id="tableProdAgotados"></div>
							</div>


							<?php /* if(in_array($_COOKIE['ckPower'], $admis)){ */ ?>
							<div class="tab-pane fade in  container-fluid" id="tabCrearProducto">
								<!--Inicio de pestaña 03-->
								<p>Rellene los campos para crear nuevo producto:</p>
								<div id="divNuevoProducto">
									<div class="row">
										<div class="col-sm-3">
											<div class="form-group">
												<label>Código interno </label>
												<input type="text" class="form-control text-center" id="txtprodCodigo" value="Automático"
													placeholder="Código de producto" disabled>
											</div>
										</div>
										<div class="col-sm-8 col-md-8 ">
											<div class="form-group">
												<label> Nombre de producto</label>
												<input type="text" class="form-control mayuscula" id="txtprodNombre" placeholder="Ubique el producto por Código, Nombre o Lote" autocomplete="off">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
										<div class="form-group">
												<label> Principio activo</label>
												<textarea class="form-control mayuscula" id="txtPrincipio" cols="30" rows="2" placeholder='Sustancias del medicamento'></textarea>
												
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label>Costo (S/)</label>
												<input type="number" class="form-control text-center" id="txtprodCostoNuevo" placeholder="Costo unitario" value=0.00 step=1 min=0>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label>Precio Venta Und.: (S/)</label>
												<input type="number" class="form-control text-center" id="txtprodPrecioNuevo" placeholder="Precio unitario" value="0.00" step=1 min=0>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label>Ganancia (%)</label>
												<input type="number" class="form-control text-center" id="txtprodPorcentajeNuevo" placeholder="% Ganancia" value=30 step=1 min=0>
											</div>
										</div>
										
									</div>

									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label>Stock inicial: </label>
												<input type="number" class="form-control text-center" id="txtprodStock" placeholder="Stock" value=0 step=1 min=0>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label>Alerta de escasez:</label>
												<input type="number" class="form-control text-center" id="txtprodMinimo" placeholder="Alerta unidades" value=10 step=1 min=0>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label>Controlado:</label>
												<select class="selectpicker mayuscula" id="cmbProductoControlado" data-width="100%" data-live-search="true">
													<option value="1">Sí, cuidado</option>
													<option value="0" selected>No</option>
												</select>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label> Categoría</label>
												<!-- <input type="text" class="form-control" id="txtprodCategoria" placeholder="Ubique el producto por Código, Nombre o Lote"> -->
												<select class="selectpicker mayuscula" id="cmbProdCateg" data-width="auto"
													data-live-search="true" title="Tipo de categoría...">
													<?php require 'php/productos/listarCategorias.php'; ?>
												</select>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label> Propiedad</label>
												<!-- <input type="text" class="form-control" id="txtprodPropiedad" placeholder="Ubique el producto por Código, Nombre o Lote"> -->
												<select class="selectpicker mayuscula" id="cmbProdPropN" data-width="auto"
													data-live-search="true" title="Tipo de propiedad...">
													<?php require 'php/productos/listarPropiedadProducto.php'; ?>
												</select>
											</div>
										</div>

										<div class="col-md-4 ">
											<div class="form-group">
												<label> Laboratorio</label>
												<!-- <input type="text" class="form-control" id="txtprodLaboratorio" placeholder="Ubique el producto por Código, Nombre o Lote"> -->
												<select class="selectpicker mayuscula" id="cmbProdLaboratorio" data-width="100%" data-live-search="true" title="Laboratorio..."> <?php require 'php/config/listarLaboratorios.php'; ?> </select>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label> Código de Barras <small onclick="verBarrasPreGuardar()"><a class="text-decoration-none" href="#!">(Ver códigos) <span class="badge" id="badCantBarras">0</span> </a></small> </label>
												<div class="input-group">
													<input type="text" class="form-control mayuscula" id="txtBarrasN">
													<span class="input-group-btn">
														<button class="btn btn-default" type="button" id="btnAddBarraN"><i class="icofont icofont-ui-add"></i></button>
													</span>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
											<label> Lotes y vencimientos <small onclick="verLotesPreGuardar()"><a class="text-decoration-none" href="#!">(Ver Lotes) <span class="badge" id="banAddLote">0</span> </a></small></label>
														<input type="number" class="form-control mayuscula" id="txtCantLoteN" min=0 step=1 value="1" >
														<input type="text" class="form-control mayuscula" id="txtCodeLoteN" placeholder="Cód. de lote" autocomplete="nope">
												<div class="input-group">
													<span class="input-group-btn">
														<input type="date" class="form-control " id="txtLoteN" style="width:90%">
														<button class="btn btn-default" type="button" id="btnAddLoteN"><i class="icofont icofont-ui-add"></i></button>
													</span>
												</div>
											</div>
										</div>

									</div>

									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label>Información adicional</label>
												<input type="text" class="form-control mayuscula" id="txtprodDescripcion" placeholder="Datos complementarios">
											</div>
										</div>
									</div>

								</div>
								<div class="row">
									<div class="col-md-12"><button class="btn btn-success btn-outline pull-right btn-lg" id="btnCrearNuevoProducto"><i class="icofont icofont-diskette"></i> Crear nuevo producto</button></div>
								</div>

								<!--Fin de pestaña 03-->
							</div>
						</div>
					<?php /* } */ ?>
					<!-- Fin de meter contenido principal -->
				

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
						<span id="spanvalorInvent">S/ 3.00</span></div>
				</div>
				<div class="modal-footer"> <button class="btn btn-primary btn-outline" data-dismiss="modal"></i><i
							class="icofont icofont-alarm"></i> Aceptar</button></div>
			</div>
		</div>
	</div>

	<!-- Modal para mostrar el detalle de Producto Encontrado-->
	<div class="modal fade modal-detalleProductoEncontrado " tabindex="-1" role="dialog">
		<div class="modal-dialog modal-lg ">
			<div class="modal-content">
				<div class="modal-header-blanco">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
							aria-hidden="true">&times;</span></button>
					<!--Boton para cerrar-->
					<h4 class="modal-tittle "><i class="icofont icofont-help-robot"></i> <span id="lblCantidadProd"></span>
						Productos coincidentes con: <span id="terminoBusq"></span></h4>
				</div>
				<div class="modal-body">
					<div class="container-fluid">
						<div class="row hidden-xs"> <strong>
								<div class="col-sm-4 ">N° - Producto</div>
								<div class="col-sm-1 ">Precio</div>
								<div class="col-sm-2 ">Clase</div>
								<div class="col-sm-2 ">Lote</div>
								<div class="col-sm-1 ">Vence</div>
								<div class="col-sm-1 ">Stock</div>
								<!-- <div class="col-sm-1 text-center"><i class="icofont icofont-robot"></i></div> -->
							</strong></div>
						<div id="listadoDivs">

						</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>

	<!-- Modal para ver todos los codigos de barra -->
	<div class="modal fade modal-barras" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-header-blanco">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title"><i class="icofont icofont-help-robot"></i> Listado de barras</h4>
				</div>
				<div class="modal-body">
					<div class="container-fluid" id="divsBarras">
					</div>
				</div>
				<div class="modal-footer"> <button class="btn btn-default btn-outline" data-dismiss="modal"><i class="icofont icofont-alarm"></i> Ok</button></div>
			</div>
		</div>
	</div>

<!-- Modal para: nuevos lotes -->
<div class='modal fade modal-LotesN' tabindex='-1' role='dialog' aria-hidden='true'>
	<div class='modal-dialog modal-sm' >
	<div class='modal-content '>
		<div class='modal-header-success'>
			<button type='button' class='close' data-dismiss='modal' aria-label='Close' ><span aria-hidden='true'>&times;</span></button>
			<h4 class="modal-title"><i class="icofont icofont-help-robot"></i> Listado de Lotes y vencimientos</h4>
		</div>
		<div class='modal-body'>
			<div class="container-fluid" id="divsLotesN"></div>
		</div>
		<div class='modal-footer'>
			<button type='button' class='btn btn-success' data-dismiss="modal">Ok</button>
		</div>
		</div>
	</div>
</div>

	<!-- Modal para indicar que falta completar campos o datos con error -->
	<div class="modal fade modal-felicitacion" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-header-blanco">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
							aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel"><i class="icofont icofont-help-robot"></i> Muy bien!</h4>
				</div>
				<div class="modal-body">
					<img src="images/ok.png" class="img-responsive">
					 <h4 class="text-center"><span id="lblMensajeBien"></span> <i class="icofont icofont-social-smugmug"></i></h4>
					 <div class="text-right">
						 <button class="btn btn-morado btn-outline" data-dismiss="modal"><i class="icofont icofont-alarm"></i> Ok</button>

					 </div>
				</div>
				
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

	<!-- Modal para Agregar o Reducir stock -->
	<div class="modal fade modalModificarStock" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-header-blanco">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
							aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel"><i class="icofont icofont-help-robot"></i> Modificar stock</h4>
				</div>
				<div class="modal-body">
					<img src="images/almacen.png" class="img-responsive">
					<p>¿Cuántas unidades desea <strong id="spModSumaStock">sumar</strong> al stock?</p>
					<input type="number" class="form-control text-center" id="txtMovimientoCant" step="1">
					<p>Seleccione el tipo de movimiento:</p>

					<select id="sltOpcionesMovimiento" class="form-control" name="">
					</select>
					<p>¿Observación?</p>
					<input type="text" class="form-control " id="txtMovimientoObs">


				</div>
				<div class="modal-footer"> <button class="btn btn-default" data-dismiss="modal" id="btnModificarSctock"><i
							class="icofont icofont-clip"></i> Modificar</button></div>
			</div>
		</div>
	</div>
	<!-- Modal para Anular Lote -->
	<div class="modal fade modalModificarLotes" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-header-danger">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
							aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel"><i class="icofont icofont-help-robot"></i> Anular Lote</h4>
				</div>
				<div class="modal-body">
					<p>¿Desea descartar el lote?</p>
				</div>
				<div class="modal-footer"> <button class="btn btn-danger" data-dismiss="modal" id="btnModificarLotes"><i
							class="icofont icofont-clip"></i> Sí, anular</button></div>
			</div>
		</div>
	</div>

	<!-- Modal para: -->
	<div class='modal fade' id="modalBorrarProducto" tabindex='-1' role='dialog' aria-hidden='true'>
		<div class='modal-dialog modal-sm'>
			<div class='modal-content '>
				<div class='modal-header-blanco'>
					<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span
							aria-hidden='true'>&times;</span></button>
					<h4 class='modal-tittle'> Borrar producto</h4>
				</div>
				<div class='modal-body'>
					<p>¿Realmente desea eliminar éste producto?</p>
				</div>
				<div class='modal-footer'>
					<button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
					<button type='button' class='btn btn-danger btn-outline' id="btnEliminarProductOk"><i
							class="icofont icofont-trash"></i>Borrar producto</button>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal para: -->
	<div class='modal fade ' id="modalResetStock" tabindex='-1' role='dialog' aria-hidden='true'>
		<div class='modal-dialog modal-sm' >
		<div class='modal-content '>
			<div class='modal-header-blanco'>
				<button type='button' class='close' data-dismiss='modal' aria-label='Close' ><span aria-hidden='true'>&times;</span></button>
				<h4 class='modal-tittle'> Borrar de la lista</h4>
			</div>
			<div class='modal-body'>
			<p>¿Desea resetear el stock?</p>
			</div>
			<div class='modal-footer'>
				<button type='button' class='btn btn-outline btn-warning' id="btnResetStockSi">Si, borrar alerta</button>
			</div>
			</div>
		</div>
	</div>
	<div id="panelVariantes">
		<div id="panelEnSi">
			<div id="panelContenido" class="container-fluid">
				<div class="row">
					<div class="col" style="padding:1rem">
						<span class="cerrar" onclick="cerrarPanel()"><i class="icofont icofont-close"></i></span>
						<h4><strong>Variantes de precio en presentaciones:</strong></h4>
						<p>Seleccione el item en cual desea agregar para variar</p>
						<p><strong>Precio por:</strong></p>
						<div class="form-inline">
							<div class="form-group">
									<select id="sltVariantes" class="form-control" name="">
										<option value="1">Blister</option>
										<option value="2">Caja</option>
										<option value="6">Ciento</option>
										<option value="7">Docena</option>
										<option value="4">Descuento especial</option>
										<option value="3">Por mayor</option>
									</select>
							</div>
							<button class="btn btn-outline btn-primary" onclick="addVariant()"><i class="icofont icofont-plus"></i></button>
						</div>
						<div class="panel panel-default" style="margin-top:1em">
							<div class="panel-body" id="bodyVariantes">
								<!-- No hay precios variables -->
								<table class="table table-hover">
									<thead>
										<tr>
											<th>Tipo</th>
											<th>Precio</th>
										</tr>
									</thead>
									<tbody>
										<!-- <tr>
											<td><span class="eliminarVariante" onclick="eliminarVariante()"><i class="icofont icofont-close"></i></span> Descuento especial</td>
											<td><input type="number" class="form-control esMoneda"></td>
										</tr> -->
									</tbody>
								</table>
							</div>
						</div>
						<div class="text-right">
							<button class="btn btn-outline btn-success" onclick="saveVariant()"><i class="icofont icofont-save"></i> Guardar</button>

						</div>
					</div>
				</div>
			</div>
		</div>

	</div>


	<?php include 'footers.php'; ?>


	<!-- Menu Toggle Script -->
	<script>
	$(document).ready(function() {

		$('.selectpicker').selectpicker('refresh');
		$('.mitooltip').tooltip();
		$.listadoBarras = [];
		$.listadoLotes = [];
		$.listaVariantes=[];

		habilitarDivFecha();

		$('#btnAgregarItem').click(function() {
			agregarRowInventario();
		});
		$('#txtBuscarProductoProd').focus();


	});




	function habilitarDivFecha() {
		$('.sandbox-container input').datepicker({
			language: "es",
			orientation: "top auto",
			daysOfWeekHighlighted: "0",
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
				<div class="row resulDiv noselect" style="cursor:default"><div class="col-xs-2 codDivInv" >${arg.idCompras}</div><div class="col-xs-3">${dia.format('dddd, DD h:mm a')}</div><div class="col-xs-2 argTotal">S/ ${arg.total}</div><div class="col-xs-2">${arg.Usuario}</div> <div class="col-xs-1"><button class="btn btn-danger btn-outline btnDetalleInvLista" id="${arg.idSimple}"><i class="icofont icofont-ui-calendar"></i></button></div></strong></div>
				`);
				//console.log(arg.comptFecha)
			});
			$(`.tabConenidoMeses #mes${indMes}`).prepend(
				`<p class="text-center"><strong>Suma valorizada: </strong> S/ ${sumaValoriz.toFixed(2)}</p>`);
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
					<div class="col-xs-2">S/ ${elem.detcomprSubTotal}</div></div>`);
			});

			$('.modal-mostrarDetalleInventario').modal('show');


		});
	});

	function agregarBarraNueva() {

		if ($.trim($('#txtprodBarra').val()).length > 0) {
			console.log('Agregar esto: ' + $('#txtprodBarra').val());
			$.ajax({
				url: 'php/productos/validarBarraEnUso.php',
				type: 'POST',
				data: {
					barra: $('#txtprodBarra').val()
				}
			}).done(function(resp) { //console.log( resp );
				var devuelto = JSON.parse(resp);
				if (devuelto.length > 0) {
					$('#lblFalta').html('La barra que intenta agregar ya está asociada a: <span class="mayuscula">«' +
						devuelto[0].prodNombre + '»</span>.');
					$('.modal-faltaCompletar').modal('show');
				} else {
					$.ajax({
						url: 'php/productos/insertarBarraPorId.php',
						type: 'POST',
						data: {
							barra: $('#txtprodBarra').val(),
							idProd: $('#txtprodCodigo').val()
						}
					}).done(function(resp) {
						console.log(resp)
						if (resp == 1) {
							$('#lblMensajeBien').text('El código ' + $('#txtprodBarra').val() + ' se guardó correctamente');
							let num = parseInt($('#spanCantBarr').text()) + 1;
							$('#spanCantBarr').text(num);
							$('.modal-felicitacion').modal('show');
						}
						if (resp == 0) {
							$('#lblFalta').text('No se guardó el código, inténtelo de nuevo.');
							$('.modal-faltaCompletar').modal('show');
						}
					});
				}
				$('#txtprodBarra').val('');
				$('#txtprodBarra').focus();
			});
		}

	}
	$('#txtprodBarra').keyup(function(e) {
		var code = e.which;
		if (code == 13) {
			e.preventDefault();
			//console.log('enter')
			agregarBarraNueva();
		}
	});
	$('#btn-addbarra').click(function() {
		agregarBarraNueva();
	});

	$('#btn-BuscarProductoProd').click(function() {
		llamarBuscarProducto();
	});
	$('#txtBuscarProductoProd').keyup(function(e) {
		var code = e.which;
		if (code == 13) {
			e.preventDefault();
			//console.log('enter')
			llamarBuscarProducto();
		}
	});

	function llamarBuscarProducto() {
		$('#divResultadoProducto').addClass('hidden');
		var filtr = $.trim($('#txtBuscarProductoProd').val());
		if( filtr != '' ){ /* inicio de Filtr vacio */

			if( $('#combTipoBusqueda').text()=="Busq. Normal "){
				if (esNumero(filtr)) { //es numero llamar al procedure por numero

					$('#terminoBusq').text($('#txtBuscarProductoProd').val());
					$.ajax({
						url: 'php/productos/buscarProductoXId.php',
						type: "POST",
						data: {
							filtro: filtr
						}
					}).success(function(resp) { //console.log(resp)

						if (JSON.parse(resp).length == 0) {
							$('#spanSinCoincidencias').removeClass('hidden').find('span').text('«' + $('#txtBuscarProductoProd')
							.val() + '»');
						} else {
							$('#spanSinCoincidencias').addClass('hidden');
						}
						$('#txtBuscarProductoProd').val('');
						$('#lblCantidadProd').text(JSON.parse(resp).length);
						$('.modal-detalleProductoEncontrado #listadoDivs').children().remove();
						let vence ='';
						JSON.parse(resp).map(function(dato, index) {

							moment.locale('es');
						
							if ( dato.prodFechaVencimiento !=null && dato.prodFechaVencimiento!='0000-00-00' ) {
								vence = moment(dato.prodFechaVencimiento ).endOf('day').fromNow()
							}else{
								vence ='-';
							}

							let alerProd ='';
							if(dato.supervisado=='1'){ alerProd = 'text-danger' }
							$('.modal-detalleProductoEncontrado #listadoDivs').append(`
							<div class="row ${alerProd}" onclick='mostrarProducto(${dato.idProducto})'>
								<div class="hidden" id="mProdID">${dato.idProducto}</div>
								<div class="col-xs-12 col-sm-4 mayuscula" id="mProdNombre"><span class="visible-xs-inline"><strong>Nombre: </strong></span> <span>${index+1}. ${dato.prodNombre}</span></div>
								<div class="col-xs-6 col-sm-1 text-center" id="mProdPrecio"><span class="visible-xs-inline"><strong>S/ </strong></span>  ${parseFloat(dato.prodPrecioUnitario).toFixed(2)}</div>
								<div class="col-xs-6 col-sm-2"><span class="visible-xs-inline"><strong>Tipo: </strong></span> <small>${dato.catprodDescipcion}</small></div>
								<div class="col-xs-6 col-sm-2 "><span class="visible-xs-inline"><strong>Lote: </strong></span> <span class="mayuscula">${dato.lote}</span></div>
								<div class="col-xs-6 col-sm-1 mayuscula mitooltip text-center" title="${moment(dato.prodFechaVencimiento, 'DD/MM/YYYY').format('dddd, DD MMM YYYY')}"><span class="visible-xs-inline"><strong>Vence: </strong></span>  <small>${vence}</small></div>
								<div class="col-xs-6 col-sm-1 text-center ${dato.prodStock>0? 'text-primary' : 'text-danger'}"><span class="visible-xs-inline"><strong>Stock: </strong></span> <strong>${dato.prodStock}</strong></div>
								<div class="col-xs-6 col-sm-1 text-center"><button class="btn btn-negro btn-sm btn-outline btnPasarProductoCanasta" id="${dato.idProducto}"><i class="icofont icofont-simple-right"></i></button></div>

							</div>
							`);
							$('#btnBorrarDataProducto').attr('data-id', dato.idProducto);
							$('.modal-detalleProductoEncontrado').modal('show');

						});
						$('.mitooltip').tooltip();
					});

					} else { //es letras llamar al procedure para que haga el filtro
						filtr = filtr.replace(/\ /g, '%'); /* '%'++'%'; */
						$('#terminoBusq').text($('#txtBuscarProductoProd').val());
						$.ajax({
							url: 'php/productos/buscarProductoXNombreOLote.php',
							type: "POST",
							data: {
								filtro: filtr
							}
						}).success(function(resp) {
							//console.log( JSON.parse(resp) );

							if (JSON.parse(resp).length == 0) {
								$('#spanSinCoincidencias').removeClass('hidden').find('span').text('«' + $('#txtBuscarProductoProd')
									.val() + '»');
							} else {
								$('#spanSinCoincidencias').addClass('hidden');
							}
							$('#txtBuscarProductoProd').val('');
							$('#lblCantidadProd').text(JSON.parse(resp).length);
							$('.modal-detalleProductoEncontrado #listadoDivs').children().remove();
							let vence ='';
							JSON.parse(resp).map(function(dato, index) {
								moment.locale('es');
								
								//console.log( dato.prodFechaVencimiento !=null + " es " +dato.prodFechaVencimiento   );
								if ( dato.prodFechaVencimiento !=null && dato.prodFechaVencimiento!='0000-00-00' ) {
									vence = moment(dato.prodFechaVencimiento ).endOf('day').fromNow()
								}else{
									vence ='-';
								}

								let alerProd ='';
								if(dato.supervisado=='1'){ alerProd = 'text-danger' }
								$('.modal-detalleProductoEncontrado #listadoDivs').append(`
								<div class="row ${alerProd}" onclick='mostrarProducto(${dato.idProducto})'>
									<div class="hidden" id="mProdID">${dato.idProducto}</div>
									<div class="col-xs-12 col-sm-4 mayuscula" id="mProdNombre"><span class="visible-xs-inline"><strong>Nombre: </strong></span> <span>${index+1}. ${dato.prodNombre} <em>${dato.principioActivo}</em></span></div>
									<div class="col-xs-6 col-sm-1 text-center" id="mProdPrecio"><span class="visible-xs-inline"><strong>S/ </strong></span>  ${parseFloat(dato.prodPrecioUnitario).toFixed(2)}</div>
									<div class="col-xs-6 col-sm-2"><span class="visible-xs-inline"><strong>Tipo: </strong></span> <small>${dato.catprodDescipcion}</small></div>
									<div class="col-xs-6 col-sm-2"><span class="visible-xs-inline"><strong>Lote: </strong></span> <span class="mayuscula">${dato.lote}</span></div>
									<div class="col-xs-6 col-sm-1 mayuscula mitooltip text-center" title="${moment(dato.prodFechaVencimiento).format('dddd, DD MMM YYYY')}"><span class="visible-xs-inline"><strong>Vence: </strong></span>  <small>${vence}</small></div>
									<div class="col-xs-6 col-sm-1 text-center ${dato.prodStock>0? 'text-primary' : 'text-danger'}"><span class="visible-xs-inline"><strong>Stock: </strong></span> <strong>${dato.prodStock}</strong></div>
									<div class="col-xs-6 col-sm-1 text-center"><button class="btn btn-negro btn-sm btn-outline btnPasarProductoCanasta" id="${dato.idProducto}"><i class="icofont icofont-simple-right"></i></button></div>

								</div>
								`);
								$('#btnBorrarDataProducto').attr('data-id', dato.idProducto);
								$('.modal-detalleProductoEncontrado').modal('show');

							});
							$('.mitooltip').tooltip();
						});
					}
			}
			else{
				$.ajax({
						url: 'php/productos/buscarProductoXLote.php',
						type: "POST",
						data: {
							filtro: filtr
						}
					}).success(function(resp) { //console.log(resp)

						if (JSON.parse(resp).length == 0) {
							$('#spanSinCoincidencias').removeClass('hidden').find('span').text('«' + $('#txtBuscarProductoProd')
							.val() + '»');
						} else {
							$('#spanSinCoincidencias').addClass('hidden');
						}
						$('#txtBuscarProductoProd').val('');
						$('#lblCantidadProd').text(JSON.parse(resp).length);
						$('.modal-detalleProductoEncontrado #listadoDivs').children().remove();
						JSON.parse(resp).map(function(dato, index) { console.log( dato );

							moment.locale('es');
							var vence = 'Sin fecha';
							if (dato.prodFechaVencimiento != '') {
								moment(dato.prodFechaVencimiento, 'DD/MM/YYYY').endOf('day').fromNow()
							}


							$('.modal-detalleProductoEncontrado #listadoDivs').append(`
							<div class="row" onclick='mostrarProducto(${dato.idProducto})'> 
								<div class="hidden" id="mProdID">${dato.idProducto}</div>
								<div class="col-xs-12 col-sm-4 mayuscula" id="mProdNombre"><span class="visible-xs-inline"><strong>Nombre: </strong></span> <span>${index+1}. ${dato.prodNombre}</span></div>
								<div class="col-xs-6 col-sm-1 text-center" id="mProdPrecio"><span class="visible-xs-inline"><strong>S/ </strong></span>  ${parseFloat(dato.prodPrecioUnitario).toFixed(2)}</div>
								<div class="col-xs-6 col-sm-2"><span class="visible-xs-inline"><strong>Tipo: </strong></span> <small>${dato.catprodDescipcion}</small></div>
								<div class="col-xs-6 col-sm-2 "><span class="visible-xs-inline"><strong>Lote: </strong></span> ${dato.lote}</div>
								<div class="col-xs-6 col-sm-1 mayuscula mitooltip text-center" title="${moment(dato.prodFechaVencimiento, 'DD/MM/YYYY').format('dddd, DD MMM YYYY')}"><span class="visible-xs-inline"><strong>Vence: </strong></span>  <small>${vence}</small></div>
								<div class="col-xs-6 col-sm-1 text-center"><span class="visible-xs-inline"><strong>Stock: </strong></span> <strong>${dato.prodStock}</strong></div>
								<div class="col-xs-6 col-sm-1 text-center"><button class="btn btn-negro btn-sm btn-outline btnPasarProductoCanasta" id="${dato.idProducto}"><i class="icofont icofont-simple-right"></i></button></div>

							</div>
							`);
							$('#btnBorrarDataProducto').attr('data-id', dato.idProducto);
							$('.modal-detalleProductoEncontrado').modal('show');

						});
						$('.mitooltip').tooltip();
					});
			}

		} /* Fin de Filtr vacio */



	}

	$('#listadoDivs').on('click', '.btnPasarProductoCanasta', function() {
		mostrarProducto($(this).attr('id'));
	});

	function mostrarProducto(idProd) {
		//var idProd= $('#listadoDivs .row').eq(indexSelec).find('#mProdID').text();
		$('#divResultadoProducto').removeClass('hidden');
		$.ajax({
			url: 'php/productos/listarDetalleProductoPorId.php',
			type: 'POST',
			data: {
				idPro: idProd
			}
		}).done(function(resp) { //console.log( resp );
			JSON.parse(resp).map(function(dato, index) {
				//console.log(dato);
				$('#txtprodCodigo').val(dato.idProducto);
				$('#txtprodNombre').val(dato.prodNombre);
				$('#txtaPrincipio').val(dato.prodPrincipioActivo);
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
				$('#cmbProdControlado').selectpicker('val', dato.supervisado);
				$('#cmbProdProp').selectpicker('val', dato.idPropiedadProducto);
				$('#cmbProdLaboratorio').selectpicker('val', dato.idLaboratorio);
				if(dato.prodAlertaStock=='1'){
					$('#chAlerta').prop('checked');
				}else{
					$('#chAlerta').prop('checked', false)
				}
				$('#chAlerta').change();
			});
		});
		verVencimientosPorId(idProd)
		listarMovimientosPhp(idProd);

		$('.modal-detalleProductoEncontrado').modal('hide');
	}
	function listarMovimientosPhp(idProd){
		$.ajax({
			url: 'php/productos/listarMovimientosProducto.php',
			type: 'POST',
			data: {
				idProducto: idProd
			}
		}).done(function(resp) {
			//console.log(resp)
			$('#divEntradasYSalidas').html(resp);
			$('.mitooltip').tooltip();			
		});
	}
	$('#chAlerta').change(function() {
		if($('#chAlerta').prop('checked')){
			$('#chAlerta').next().text('Sí');
			$('#txtprodMinimo').attr('readonly', false);
		}else{
			$('#chAlerta').next().text('No');
			$('#txtprodMinimo').attr('readonly', true);
		}
	});
	function borrarMovimiento(idMovimiento){
		if(confirm("¿Desea borrar éste movimiento?")){
			$.ajax({url: 'php/productos/revertirMovimiento.php', type: 'POST', data: { idMovimiento }}).done(function(resp) {
				let data = JSON.parse(resp);
				let anterior =0;
				if( data.operacion =='suma' ){
					anterior = parseFloat($('#txtprodStock').val());
					$('#txtprodStock').val( anterior + parseFloat(data.cantidad) );
				}
				if( data.operacion =='resta' ){
					anterior = parseFloat($('#txtprodStock').val());
					$('#txtprodStock').val( anterior - parseFloat(data.cantidad) );
				}
				listarMovimientosPhp($('#txtprodCodigo').val());
				$('#lblMensajeBien').text('Se revirtió el stock');
				$('.modal-felicitacion').modal('show');

			});
		}
	}

	function verVencimientosPorId(idProd) {
		$.ajax({
			url: 'php/productos/listarLotesYVencimientoPorID.php',
			type: 'POST',
			data: {
				idPro: idProd
			}
		}).done(function(resp) {
			moment().locale('es');
			$('#spanRowLote').children().remove();
			$('#spanRowFechaVen').children().remove();
			$('#divLotesResumen').html(resp);
			$.each($('#divLotesResumen .fechaVencimiento'), function(index, elem) {
				let fecha1 = moment($(elem).text() + ' 00:00:00');
				moment.locale('es')
				$(elem).next().text(' (' + fecha1.fromNow() + ')');
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
	$('#btnVerBarras').click(function() {
		$('#divsBarras').children().remove();
		$.ajax({
			url: 'php/productos/listarBarrasId.php',
			type: 'POST',
			data: {
				idPro: $('#txtprodCodigo').val()
			}
		}).done(function(resp) {
			//console.log(resp);
			JSON.parse(resp).map(function(dato, index) {
				$('#divsBarras').append(
					`<div class="row"><button class="btn btn-danger btn-outline btn-xs btnEliminarCode"><i class="icofont icofont-ui-delete"></i></button>${dato.barrasCode}</div>`
					);
			})

		});
		$('.modal-barras').modal('show');
	});
	$('.modal-barras').on('click', '.btnEliminarCode', function() {
		var index = $(this).parent().index();

		//console.log('eliminar idproducto '+ $('#txtprodCodigo').val()+ ' barra: '+ $(this).parent().text());

		$.ajax({
			url: 'php/productos/eliminarBarra.php',
			type: "POST",
			data: {
				barra: $(this).parent().text(),
				idProd: $('#txtprodCodigo').val()
			}
		}).done(function() {
			$('#divsBarras .row').eq(index).remove();
		})
	});
	$('#btnActualizarDataProducto').click(function() {

		/*console.log('Para guardar:');
		console.log(` id: `+ $('#txtprodCodigo').val()+ ' nombre: ' + $.trim($('#txtprodNombre').val()));
		console.log(` desc: `+ $('#txtprodDescripcion').val()+ ' costo: ' + $('#txtprodCosto').val());
		console.log(` porcentaje: `+ $('#txtprodPorcentaje').val()+ ' precio: ' + $('#txtprodPrecio').val());
		console.log(` minimo: `+ $('#txtprodMinimo').val());
		console.log(' categ ' + $('#cmbProdCateg').parent().find('button').attr('title'));
		console.log(' propied ' + $('#cmbProdProp').parent().find('button').attr('title'));
		console.log(' labota ' + $('#cmbProdLaboratorio').parent().find('button').attr('title'));*/

		if ($(this).hasClass('disabled')) {} else {
			$(this).addClass('disabled');
			let alerta = false;
			if( $('#chAlerta').prop('checked') ){ alerta =1;}else{alerta =0;}
			$.ajax({
				url: 'php/productos/actualizarProductoDetalles.php',
				type: 'POST',
				data: {
					idProd: $('#txtprodCodigo').val(),
					nombre: $.trim($('#txtprodNombre').val()),
					obs: $('#txtprodDescripcion').val(),
					stkmin: $('#txtprodMinimo').val(),
					categ: $('#cmbProdCateg').val(), //$('#cmbProdCateg').parent().find('button').attr('title'),
					precio: $('#txtprodPrecio').val(),
					labo: $('#cmbProdLaboratorio').val(), //$('#cmbProdLaboratorio').parent().find('button').attr('title'),
					costo: $('#txtprodCosto').val(),
					porcent: $('#txtprodPorcentaje').val(),
					propi: $('#cmbProdProp').val(), //$('#cmbProdProp').parent().find('button').attr('title'),
					stock: $('#txtprodStock').val(),
					principio: $('#txtaPrincipio').val(),
					alertaStock: alerta,
					controlado: $('#cmbProdControlado').val()
				}
			}).done(function(resp) { //console.log(resp)
				if (resp == 'ok') {
					$('#lblMensajeBien').text('Los datos del producto ' + $('#txtprodBarra').val() +
						' se actualizaron correctamente .');
					$('.modal-felicitacion').modal('show');
				}
				if (resp == 0) {
					$('#lblFalta').text('No se guardó ningun cambio, sugiero que presione F5 e inténtelo de nuevo.');
					$('.modal-faltaCompletar').modal('show');
				}
				$('#btnActualizarDataProducto').removeClass('disabled');
			});

		}



	});

	$('#txtprodCosto').keyup(function() {
		calculoCostos(7);
	});
/* 	$('#txtprodPorcentaje').keyup(function() {
		calculoCostos(3);
	}); */
	$('#txtprodPrecio').keyup(function() {
		calculoCostos(7);
	});

	$('#txtprodCostoNuevo').keyup(function() {
		calculoCostos(8);
	});
	/* $('#txtprodPorcentajeNuevo').keyup(function() {
		calculoCostos(6);
	}); */
	$('#txtprodPrecioNuevo').keyup(function() {
		calculoCostos(8);
	});



	function calculoCostos(tipoCaso) {
		var vproCost, vproGana, vproPrec;
		if ($('#txtprodCosto').val() == 0) {
			vproCost = 0
		} else {
			vproCost = parseFloat($('#txtprodCosto').val());
		}
		if ($('#txtprodPorcentaje').val() == 0) {
			vproGana = 0
		} else {
			vproGana = parseFloat($('#txtprodPorcentaje').val());
		}
		if ($('#txtprodPrecio').val() == 0) {
			vproPrec = 0
		} else {
			vproPrec = parseFloat($('#txtprodPrecio').val());
		}

		if (tipoCaso == 1) {
			$('#txtprodPrecio').val(parseFloat(vproCost * (1 + vproGana) / 100).toFixed(2))
		}
		if (tipoCaso == 2) {
			$('#txtprodPrecio').val(parseFloat(vproCost * (1 + vproGana) / 100).toFixed(2))
		}
		if (tipoCaso == 3) {
			$('#txtprodCosto').val(parseFloat(vproPrec / (1 + vproGana / 100)).toFixed(2))
		}

		if (tipoCaso == 4) {
			$('#txtprodPrecioNuevo').val(parseFloat($('#txtprodCostoNuevo').val() * (1 + $('#txtprodPorcentajeNuevo').val() /
				100)).toFixed(2))
		}
		if (tipoCaso == 5) {
			$('#txtprodPrecioNuevo').val(parseFloat($('#txtprodCostoNuevo').val() * (1 + $('#txtprodPorcentajeNuevo').val() /
				100)).toFixed(2))
		}
		if (tipoCaso == 6) {
			$('#txtprodCostoNuevo').val(parseFloat($('#txtprodPrecioNuevo	').val() / (1 + $('#txtprodPorcentajeNuevo').val() /
				100)).toFixed(2))
		}
		if (tipoCaso == 7) {
			$('#txtprodPorcentaje').val( Math.round((( vproPrec / vproCost ) -1 ) *100, 2)  )
		}
		if (tipoCaso == 8) {
			$('#txtprodPorcentajeNuevo').val( Math.round( (($('#txtprodPrecioNuevo').val() /  $('#txtprodCostoNuevo').val()) -1 )*100 , 2) )
		}


	}

	$('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
		var target = $(e.target).attr("href") // activated tab
		if (target == '#tabProximosVencer') { //solo selecciona el tabProximosVencer
			$(`#listasProdVencimiento`).children().remove();
			var sumaValoriz;

			$.ajax({
				url: 'php/productos/listarProximosAVencer.php',
				type: 'POST'
			}).done(function(resp) { //console.log( resp );
				$.each(JSON.parse(resp), function(i, arg) {
					//console.log(arg)
					moment.locale('es')
					sumaValoriz += parseFloat(arg.prodPrecio);
					var dia = moment(arg.prodFechaVencimiento);
					$(`#listasProdVencimiento`).append(`
					<tr class="resulDiv noselect" data-id="${arg.idDetalle}">
						<td>${i+1}</td>
						<td class="codDivInv">${arg.idproducto}</td>
						<td class="mayuscula">${arg.prodNombre}</td>
						<td class="argTotal">${arg.prodLote}</td>
						<td class="argTotal">${dia.endOf('day').fromNow()}</td>
						<td class="argTotal " title="${dia.format('DD/MM/YYYY')}">${dia.format('DD/MM/YYYY')}</td>
						<td class="hidden"><button class="btn btn-morita btn-outline btnDetalleInvLista" id="${arg.idproducto}"><i class="icofont icofont-ui-calendar"></i></button></td>
						<td class="tachoVencimiento"><button class="btn btn-danger btn-sm btn-outline btnSinBorde" onclick="borrarLote(${arg.idDetalle})"><i class="icofont icofont-rounded-right-down"></i></button></td>
					</tr>`);
					$('.mitooltip').tooltip();

				});
			})
		}
		if (target == '#tabCrearProducto') {
			$('#tabCrearProducto #cmbProdCateg').selectpicker('val', '32');
			$('#tabCrearProducto #cmbProdLaboratorio').selectpicker('val', '354');
			$('#tabCrearProducto #cmbProdPropN').selectpicker('val', '2');
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
		$('#tabCrearProducto #cmbProdCateg').selectpicker('val', '32');
		$('#tabCrearProducto #cmbProdLaboratorio').selectpicker('val', '354');
		$('#tabCrearProducto #cmbProdPropN').selectpicker('val', '2');

	}

	function activarBtnNuevo() {
		$('#btnCrearNuevoProducto').removeClass('disabled');
	}

	$('#btnCrearNuevoProducto').click(function() {

		if (!$('#btnCrearNuevoProducto').hasClass('disabled')) {
			$(this).addClass('disabled');

			var categProd = $('#tabCrearProducto #cmbProdCateg').parent().find('button').attr('title');
			var laborat = $('#tabCrearProducto #cmbProdLaboratorio').parent().find('button').attr('title');
			var propieda = $('#tabCrearProducto #cmbProdPropN').parent().find('button').attr('title');

			if ($('#tabCrearProducto #txtprodNombre').val() == '') {
				$('#lblFalta').text('Te olvidaste del nombre para el producto');
				activarBtnNuevo();
				$('.modal-faltaCompletar').modal('show');
			} else if ($('#txtprodPrecioNuevo').val() <= 0 || $('#txtprodPrecioNuevo').val() == '') {
				$('#lblFalta').text('Verifique la casilla de precios');
				activarBtnNuevo();
				$('.modal-faltaCompletar').modal('show');
			} else if ($('#tabCrearProducto #txtprodMinimo').val() < 0) {
				$('#lblFalta').text('Verifique la casilla de alerta no puede ser negativo');
				activarBtnNuevo();
				$('.modal-faltaCompletar').modal('show');
			} else if (categProd == '' || categProd == 'Tipo de categoría...') {
				$('#lblFalta').text(
					'Debes seleccionar una «Categoría de producto» si no encuentras en la lista selecciona «Otros»');
				activarBtnNuevo();
				$('.modal-faltaCompletar').modal('show');
			} else if (propieda == '' || propieda == 'Tipo de propiedad...') {
				$('#lblFalta').text(
					'Debes seleccionar una «Propiedad de producto» si no encuentras en la lista selecciona «Otros»');
				activarBtnNuevo();
				$('.modal-faltaCompletar').modal('show');
			} else if (laborat == '' || laborat == 'Laboratorio...') {
				$('#lblFalta').text('Debes seleccionar un «Laboratorio» si no encuentras en la lista selecciona «Otros»');
				activarBtnNuevo();
				$('.modal-faltaCompletar').modal('show');
			} else {
				$.ajax({
					url: 'php/productos/insertarProductoNuevo.php',
					type: 'POST',
					data: {
						nombre: $.trim($('#tabCrearProducto #txtprodNombre').val()),
						descipt: $('#tabCrearProducto #txtprodDescripcion').val(),
						stkmin: $('#tabCrearProducto #txtprodMinimo').val(),
						categ: $('#tabCrearProducto #cmbProdCateg').parent().find('button').attr('title'),
						precio: $('#tabCrearProducto #txtprodPrecioNuevo').val(),
						labo: $('#tabCrearProducto #cmbProdLaboratorio').parent().find('button').attr('title'),
						costo: $('#tabCrearProducto #txtprodCostoNuevo').val(),
						porcent: $('#tabCrearProducto #txtprodPorcentajeNuevo').val(),
						propi: $('#tabCrearProducto #cmbProdPropN').parent().find('button').attr('title'),
						stock: $('#tabCrearProducto #txtprodStock').val(),
						barritas: $.listadoBarras,
						lotesN: $.listadoLotes,
						controlado: $('#cmbProductoControlado').val(),
						principio: $('#txtPrincipio').val()
					}
				}).done(function(resp) {
					activarBtnNuevo();
					//console.log(resp)
					if (parseInt(resp) >= 1) {
						$('#lblMensajeBien').text('Los datos del producto ' + $('#txtprodBarra').val() + ' se actualizaron correctamente .');
						$('.modal-felicitacion').modal('show');
						$.listadoBarras = [];
						$('#badCantBarras').text(0);
						$('#btnCrearNuevoProducto').removeClass('disabled');
						limpiarCamposNuevo();
					}
					if (parseInt(resp) == 0) {
						$('#lblFalta').text('No se guardó ningun cambio, sugiero que presione F5 e inténtelo de nuevo.');
						$('.modal-faltaCompletar').modal('show');
					}
				});
			}
		}
	});
	$('#btnAddStock').click(function() {
		$('#txtMovimientoCant').val(1);
		$('#spModSumaStock').text('sumar');
		$.ajax({
			url: 'php/productos/listarMovimientos.php',
			type: 'POST',
			data: {
				tipo: 'suma'
			}
		}).done(function(resp) {
			$('#sltOpcionesMovimiento').html(resp);
		});
		$('.modalModificarStock').modal('show');
	});
	$('#btnLessStock').click(function() {
		$('#txtMovimientoCant').val(1);
		$('#spModSumaStock').text('restar');
		$.ajax({
			url: 'php/productos/listarMovimientos.php',
			type: 'POST',
			data: {
				tipo: 'resta'
			}
		}).done(function(resp) {
			$('#sltOpcionesMovimiento').html(resp);
		});
		$('.modalModificarStock').modal('show');
	});
	$('#btnModificarSctock').click(function() {
		if ($('#txtMovimientoCant').val() > 0) {
			$.ajax({
				url: 'php/productos/insertarMovimientoProductoStock.php',
				type: 'POST',
				data: {
					idProducto: $('#txtprodCodigo').val(),
					movimiento: $('#sltOpcionesMovimiento').val(),
					cantidad: $('#txtMovimientoCant').val(),
					observacion: $('#txtMovimientoObs').val(),
					usuario: '<?= $_COOKIE['ckidUsuario']?>'
				}
			}).done(function(resp) {
				//console.log(resp)
				var suma = ['2', '4', '15'];
				var resta = ['1', '3', '5', '6', '7'];
				var movi = $('#sltOpcionesMovimiento option[value="' + $('#sltOpcionesMovimiento').val() + '"]').text();
				var stock;
				
				
				//console.log( 'agregar '+ stock );
				if (resp = 'ok') {
					if( suma.indexOf($('#sltOpcionesMovimiento').val())>=0 ){
							stock = parseInt($('#txtprodStock').val()) + parseInt($('#txtMovimientoCant').val());
						}
					if( resta.indexOf($('#sltOpcionesMovimiento').val())>=0 ){
						stock = parseInt($('#txtprodStock').val()) - parseInt($('#txtMovimientoCant').val());
					}
					listarMovimientosPhp($('#txtprodCodigo').val());
						
					$('#txtprodStock').val(stock);
				}
			});
		}
	});
	$('#btnInsertarVencimiento').click(function() {

		$.ajax({
			url: 'php/productos/insertarFechaVencimiento.php',
			type: 'POST',
			data: {
				idProducto: $('#txtprodCodigo').val(),
				lote: $('#txtCodigoLote').val(),
				cantidad: $('#txtCantLote').val(),
				fecha: $('#txtFechaLote').val()
			}
		}).done(function(resp) {
			//console.log(resp)
			$('#lblMensajeBien').text('Se agregó el vencimiento correctamente.');
			$('.modal-felicitacion').modal('show');
			verVencimientosPorId($('#txtprodCodigo').val());
		});
	});

	function borrarLote(lote) {
		$.lote = lote;
		$('.modalModificarLotes').modal('show');
	}
	$('#btnModificarLotes').click(function() {
		$.ajax({
			url: 'php/productos/borrarLote.php',
			type: 'POST',
			data: {
				lote: $.lote
			}
		}).done(function(resp) {
			console.log(resp)
			if (resp == 'ok') {
				$.each($('#listasProdVencimiento .resulDiv'), function(i, elem) {
					if ($(elem).attr('data-id') == $.lote) {
						$(elem).remove();
					}
				});
				$('#lblMensajeBien').text('Se retiró el lote correctamente.');
				$('.modal-felicitacion').modal('show');
				verVencimientosPorId($('#txtprodCodigo').val());
			}
		});
	});

	function eliminarListaBarras(index, queBarra) {

		$.each($('#divsBarras .contBarra'), function(i, elem) { //console.log( elem );
			if (queBarra == $(elem).text()) {
				//console.log( 'te encontre' );
				$(elem).parent().remove();
			}
		})
		$.listadoBarras.splice(index, 1);
		$('#badCantBarras').text($.listadoBarras.length);

	}
	function eliminarListaLotes(index, loteA, vencimiento) {

		$.each($('#divsLotesN .contLote'), function(i, contenido) { //console.log( lote + vencimiento );
			if (loteA + ' - ' + vencimiento == $(contenido).text()) {
				//console.log( 'te encontre' );
				$(contenido).parent().remove();
			}
		})
		$.each($.listadoLotes, function(i, lotes){ console.log( lotes.vence );
			if( lotes['lote'] == loteA && lotes['vence'] == vencimiento){
				$.listadoLotes.splice(i, 1);
				return false;
			}
		})

		$('#banAddLote').text($.listadoLotes.length);

	}

	function verBarrasPreGuardar() {
		//console.log( $.listadoBarras );
		$('#divsBarras').children().remove();
		$.each($.listadoBarras, function(i, elem) { //console.log( elem );
			$('#divsBarras').append(
				`
			<div class="row"><button class="btn btn-danger btn-outline btn-xs" onclick="eliminarListaBarras(${i}, ${elem})"><i class="icofont icofont-close"></i></button> <span class="contBarra">${elem}</span></div>`
				);
		})
		$('.modal-barras').modal('show');
	}
	function verLotesPreGuardar() {
		console.log( $.listadoLotes );
		$('#divsLotesN').children().remove();
		$.each($.listadoLotes, function(i, elem) { console.log( elem );
			$('#divsLotesN').append(`<div class="row"><button class="btn btn-danger btn-outline btn-xs" onclick="eliminarListaLotes(${i}, '${elem.lote}', '${elem.vence}')"><i class="icofont icofont-close"></i></button> <span class="contLote">${elem.lote} - ${elem.vence}</span></div>`);
		})
		$('.modal-LotesN').modal('show'); 
	}

	function addBarraN() {
		/* $.listaBarras; */
		if ($.trim($('#txtBarrasN').val()).length > 0) {

			$.ajax({
				url: 'php/productos/validarBarraEnUso.php',
				type: 'POST',
				data: {
					barra: $('#txtBarrasN').val()
				}
			}).done(function(resp) {
				var devuelto = JSON.parse(resp);
				if (devuelto.length > 0) {
					$('#lblFalta').html('La barra que intenta agregar ya está asociada a: <span class="mayuscula">«' +
						devuelto[0].prodNombre + '»</span>.');
					$('.modal-faltaCompletar').modal('show');
				} else {
					if ($.listadoBarras.indexOf($('#txtBarrasN').val()) == -1) {
						$.listadoBarras.push($('#txtBarrasN').val());
						$('#badCantBarras').text($.listadoBarras.length);

						$('#txtBarrasN').val('');
						$('#txtBarrasN').focus();
					}
				}
			});
		} else {
			$('#txtBarrasN').val('');
			$('#txtBarrasN').focus();
		}
	}
	function addLoteN() {
		/* $.listaBarras; */
		if ( moment($('#txtLoteN').val()).isValid() && $('#txtCantLoteN').val()!='' ) {
			$.listadoLotes.push({lote: $('#txtCodeLoteN').val(), vence: $('#txtLoteN').val(), cantidad: $('#txtCantLoteN').val() });
			
			$('#banAddLote').text($.listadoLotes.length);

			$('#txtCodeLoteN').val('');
			$('#txtCodeLoteN').focus();
		} else {
			$('#txtCodeLoteN').val('');
			$('#txtCodeLoteN').focus();
		}
	}
	function panelVariantes(){
		$.listaVariantes=[];
		redibujarVariables();
		$.ajax({url: 'php/productos/nombresVariables.php', type: 'POST' }).done(function(resp) {
			$.nombresVariables = JSON.parse(resp);
		});
		$.ajax({url: 'php/productos/precioVariante.php', type: 'POST', data: { idProd: $('#txtprodCodigo').val() }}).done(function(resp) {
			//console.log(resp)
			if(resp!='error'){
				if(resp==''){$.listaVariantes=[];}
				else{
				$.listaVariantes = JSON.parse(resp);
				}
				redibujarVariables();
			}
			console.log( $.listaVariantes );
		});
		
		$('#panelVariantes').css('display', 'block');
	}
	function cerrarPanel(){
		$('#panelVariantes').css('display', 'none');
	}
	function addVariant(){
		var variable = $('#sltVariantes').val();
		var nombre = $.nombresVariables.filter( variante => { return parseInt(variante.id) == parseInt(variable) })[0].nombre;
		//console.log( "agregando"+ nombre );
		
		
		if($.listaVariantes.map(dato => parseInt(dato.queEs)).indexOf( parseInt(variable) )==-1){
			$.listaVariantes.push({queEs: variable, nombre, nPrecio: 0});
		}
		redibujarVariables();

	}
	function redibujarVariables(){
		$('#bodyVariantes tbody').html('');
		if($.listaVariantes.length ==0){
			$('#bodyVariantes tbody').append(`<tr><td colspan=2>No hay precios registrados</td></tr>`)
		}else{
			$.listaVariantes.forEach((dato, index) => { //console.log( 'inidce '+ index );
				$('#bodyVariantes tbody').append(`<tr>
					<td><span class="eliminarVariante" onclick="eliminarVariante(${index})"><i class="icofont icofont-close"></i></span> ${dato.nombre}</td>
					<td><input type="number" class="form-control esMoneda" onkeyup="cambiarValorVariante(this, ${index})" value="${parseFloat(dato.nPrecio).toFixed(2)}"></td>
				</tr>`);
			});
		}
	}
	function cambiarValorVariante(e, indice){
		//console.log( indice );
		$.listaVariantes[indice].nPrecio = parseFloat(e.value);
	}
	function eliminarVariante(indice){
		$.listaVariantes.splice(indice,1);
		redibujarVariables();
	}
	function saveVariant(){
		$.ajax({url: 'php/productos/guardarVariante.php', type: 'POST', data: { idProd: $('#txtprodCodigo').val(), lista: $.listaVariantes }}).done(function(resp) {
			console.log(resp);
			if(resp=='ok'){
				alert('Datos actualizados');
			}else{
				alert('Hubo un error, intente nuevamente');
			}
		});
	}
	$('#btnAddBarraN').click(function() {
		addBarraN();
	});
	$('#txtBarrasN').keypress(function(e) {
		if (e.keyCode == 13) {
			addBarraN();
		}
	});
	$('#btnAddLoteN').click(function() {
		addLoteN();
	});
	$('#txtLoteN').keypress(function(e) {
		if (e.keyCode == 13) {
			addLoteN();
		}
	});
	$('#liYaAgotados').click(function() {
		$.ajax({url: 'php/productos/listarProductosAgotados.php', type: 'POST'}).done(function(resp) {
			console.log(resp)
			$('#tableProdAgotados').html(resp);
		});
	});

	<?php if(in_array($_COOKIE['ckPower'], $admis)){  ?>
	$('#btnBorrarDataProducto').click(function() {
		$.ProdBorrar = $(this).attr('data-id');
		$('#modalBorrarProducto').modal('show');
	});
	$('#btnEliminarProductOk').click(function() {
		$.ajax({
			url: 'php/productos/borrarProducto.php',
			type: 'POST',
			data: {
				idProd: $.ProdBorrar
			}
		}).done(function(resp) {
			//console.log(resp)
			$('#modalBorrarProducto').modal('hide');
		//	alert('Producto borrado completamente');
			if (resp == 'ok') {
				location.reload();
			}
		});
	});
	function resetearStock(idStock) {
		$.idStock =idStock
		$('#modalResetStock').modal('show');
	}
	$('#btnResetStockSi').click(function() {
		$.ajax({url: 'php/productos/resetearStock.php', type: 'POST', data: {idProd: $.idStock }}).done(function(resp) {
			console.log(resp)
			$('#modalResetStock').modal('hide');
			alert('Stock reseteado');
			if (resp == 'ok') {
				location.reload();
			}
		});
	});
	<?php } ?>
	</script>

</body>

</html>