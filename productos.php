<!DOCTYPE html>
<html lang="en">

<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>Productos detalle: Info-Farma</title>

		<!-- Bootstrap Core CSS -->
		<link href="css/bootstrap.css" rel="stylesheet">

		<!-- Custom CSS -->
		<link href="css/estilosElementosv2.css" rel="stylesheet">	
		<link href="css/sidebarDeslizable.css" rel="stylesheet">
		<link rel="stylesheet" href="css/cssBarraTop.css">
		<link rel="stylesheet" href="css/icofont.css">
		<link rel="stylesheet" href="css/animate.css">

		<link href="css/bootstrap-select.min.css" rel="stylesheet"> <!-- extraido de: https://silviomoreto.github.io/bootstrap-select/-->
		<link rel="stylesheet" href="css/icofont.css"> <!-- iconos extraidos de: http://icofont.com/-->
		<link rel="shortcut icon" href="images/pet2.png" />
		<link rel="stylesheet" href="css/bootstrap-datepicker3.css"> <!-- extraído de: https://uxsolutions.github.io/bootstrap-datepicker/-->

</head>

<body>

<div id="wrapper">

	<!-- Sidebar -->
	<div id="sidebar-wrapper">
		<ul class="sidebar-nav">
				<div class="sidebar-brand ocultar-mostrar-menu" >
						<a href="#">
								Control Panel
						</a>
				</div>
				<div class="logoEmpresa ocultar-mostrar-menu">
					<img class="img-responsive" src="images/empresa.png" alt="">
				</div>
				<li >
						<a href="index.php"><i class="icofont icofont-space-shuttle"></i> Inicio</a>
				</li>
				<li>
						<a href="#"><i class="icofont icofont-users"></i> Usuarios</a>
				</li>
				<li class="active">
						<a href="productos.php"><i class="icofont icofont-blood"></i> Productos</a>
				</li>
				<li>
						<a href="ventas.php"><i class="icofont icofont-cart"></i> Ventas</a>
				</li>
				<li>
						<a href="compras.php"><i class="icofont icofont-truck-alt"></i> Compras</a>
				</li>
				<li>
						<a href="#"><i class="icofont icofont-envelope-open"></i> Reportes</a>
				</li>
				<li>
						<a href="inventario.php"><i class="icofont icofont-prescription"></i> Inventario</a>
				</li>
				<li>
						<a href="configuraciones.php"><i class="icofont icofont-options"></i> Configuración</a>
				</li>
				<li>
						<a href="#!" class="ocultar-mostrar-menu"><i class="icofont icofont-logout"></i> Ocultar menú</a>
				</li>
		</ul>
	</div>
			<!-- /#sidebar-wrapper -->
<div class="navbar-wrapper">
	<div class="container-fluid">
			<nav class="navbar navbar-fixed-top encoger">
				<div class="container">
					<div class="navbar-header ">
					<a class="navbar-brand ocultar-mostrar-menu" href="#"><img class="img-responsive" src="images/logo.png" alt=""></a>
							<button type="button" class="navbar-toggle collapsed" id="btnColapsador" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							</button>
							
					</div>
					<div id="navbar" class="navbar-collapse collapse ">
							<ul class="nav navbar-nav">
								<li class="hidden down"><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">HR <span class="caret"></span></a>
											<ul class="dropdown-menu">
													<li><a href="#">Change Time Entry</a></li>
													<li><a href="#">Report</a></li>
											</ul>
									</li>
							</ul>
							<ul class="nav navbar-nav pull-right">
								 <li>
									<div class="btn-group has-clear"><label for="txtBuscarNivelGod" class="text-muted visible-xs">Buscar algo:</label>
										<input type="text" class="form-control" id="txtBuscarNivelGod" placeholder="&#xeded;">
										<span class="form-control-clear glyphicon glyphicon-remove-circle form-control-feedback hidden"></span>
									</div>
								 </li>
								 <li id="liDatosPersonales"><a href="#!"><p><strong>Usuario: </strong> <span id="menuNombreUsuario">Carlos Pariona</span></p><small class="text-muted text-center" id="menuFecha"><span id="fechaServer"></span> <span id="horaServer"><?php require('php/gethora.php') ?></span> </small></a></li>
									
				<li class="text-center"><a href="#!"><span class="visible-xs">Cerrar Sesión</span><i class="icofont icofont-sign-out"></i></a></li>
							</ul>
							
					</div>
			</div>
			</nav>
	</div>
</div>
<!-- Page Content -->
<div id="page-content-wrapper">
	<div class="container-fluid">				 
			<div class="row">
				<div class="col-lg-12 contenedorDeslizable">
				<!-- Empieza a meter contenido principal dentro de estas etiquetas -->
				 <h2><i class="icofont icofont-blood"></i> Panel de configuraciones de productos</h2>

					<ul class="nav nav-tabs">
					<li class="active"><a href="#tabBusquedaProducto" data-toggle="tab">Editar un producto</a></li>
					<li><a href="#tabProximosVencer" data-toggle="tab">Productos por vencerse</a></li>
					
					</ul>
					
					<div class="tab-content">
					<!--Panel para buscar productos-->
						<!--Clase para las tablas-->
						<div class="tab-pane fade in active container-fluid" id="tabBusquedaProducto">
						<!--Inicio de pestaña 01-->
							<div class="row"><p>Primero ubique el producto a modificar o detallar:</p>
							<div class="col-sm-6">
								<div class="input-group"> 
								<input type="text" class="form-control control-morado" id="txtBuscarProductoProd" placeholder="Busque por Nombre, Cod. interno, # de Lote">
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
									<input type="number" class="form-control text-center" id="txtprodStock" placeholder="Stock" >
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
									<select class="selectpicker mayuscula" id="cmbProdLaboratorio" data-width="100%" data-live-search="true">
										<?php require 'php/config/listarLaboratorios.php'; ?>
									</select>
									</div>
								</div>
								<div class="clearfix visible-lg"></div>
								<div class="col-sm-3">
									<div class="form-group">
									<label> Códigos de barra</label>
									<div class="input-group">
										<input type="text" class="form-control" id="txtprodBarra" placeholder="Código de barra">
										<span class="input-group-btn"> <button class="btn btn-warning btn-outline" id="btn-addbarra" type="button"><span class="glyphicon glyphicon-upload"></span></button></span>
									</div>
									<button class="btn btn-default btn-outline" id="btnVerBarras"><i class="icofont icofont-settings"></i> Ver todos los códigos <small id="spanCantBarr"></small></button>
									</div>
								</div>
								
							</div>
							<div class="row" >
								<div class="container" id="rowLotes">
									<div class="col-sm-2"><label>Lotes</label>
										<div id="spanRowLote"></div>
									</div>
									<div class="col-sm-2"><label>Fecha de vencimiento</label>
										<div id="spanRowFechaVen"></div>
									</div>
								</div>
								<!-- <div class="col-sm-2">
									<div class="form-group">
									<label> Lote registrado</label>
									<input type="text" class="form-control"  id="txtprodLote" placeholder="Ubique el producto por Código, Nombre o Lote">
									</div>
								</div>
								<div class="col-sm-2">
									<div class="form-group">
									<label> Fecha de vencimiento</label>
									<input type="text" class="form-control" id="txtprodFecha" placeholder="Ubique el producto por Código, Nombre o Lote">
									</div>
								</div> -->
								
							</div>
							<div class="row col-sm-12"><p>Producto registrado el <em id="emFechaProd">Martes, 13 de noviembre de 2016</em></p>
							<button class="btn btn-primary btn-outline pull-right btn-lg" id="btnActualizarDataProducto"><i class="icofont icofont-checked"></i> Guardar cambios</button>
							</div>

							</div>


						<!--Fin de pestaña 01-->
						</div>

						

						<!--Panel para nueva compra-->
						<div class="tab-pane fade container-fluid" id="tabProximosVencer">
						<!--Inicio de pestaña 02-->
						<p>La siguiente lista se compone de los productos vencidos hace un mes y los próximoa a vencer en los próximos 3 meses que vienen.</p>
						<div >
							<div class="col-sm-2">Código</div>
							<div class="col-sm-2">Lote</div>
							<div class="col-sm-3">Vencimiento</div>
							<div class="col-sm-3">Fecha</div>
							<div class="col-sm-2">Estado</div>
							<div id="listasProdVencimiento"></div>
						</div>
						<!--Fin de pestaña 02-->
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
							<div class="col-sm-4 text-center">Producto</div>
							<div class="col-sm-1 text-center">Precio</div>
							<div class="col-sm-2 text-center">Clase</div>
							<div class="col-sm-2 text-center">Lote</div>
							<div class="col-sm-1 text-center">Vencimiento</div>
							<div class="col-sm-1 text-center">Stock</div>
							<div class="col-sm-1 text-center"><i class="icofont icofont-robot"></i></div>
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
			<div class="modal-footer"> <button class="btn btn-danger btn-outline" data-dismiss="modal"><i class="icofont icofont-alarm"></i> Ok, revisaré</button></div>
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
			<div class="modal-footer"> <button class="btn btn-primary btn-outline" data-dismiss="modal"><i class="icofont icofont-alarm"></i> Ok</button></div>
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
	agregarRowInventario();
	$('.selectpicker').selectpicker('refresh');

		$('.mitooltip').tooltip();
		$('input').keypress(function (e) {
			if (e.keyCode == 13)
			{
				$(this).parent().next().children().focus();
				//$(this).parent().next().children().removeAttr('disabled'); //agregar atributo desabilitado
			} 
		});

	habilitarDivFecha();

	$('#btnAgregarItem').click(function () {
		agregarRowInventario();
	});
	$('#txtBuscarProductoProd').focus();


});




function agregarRowInventario() {
	$('#itemsInventarioNuevo').text($('#listaProductosNuevoInventario .row').length+1);
		$.ajax({url: 'php/productos/listarCategorias.php', type:'POST'}).success(function(resCategoria){
			$.ajax({url: 'php/config/listarLaboratorios.php', type:'POST'}).success(function(resLaboratorio){
				$.ajax({url: 'php/productos/listarPropiedadProducto.php', type:'POST'}).success(function(resPropiedad){
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
				$('.selectpicker').selectpicker('refresh'); habilitarDivFecha();
				$('.mitooltip').tooltip();
			
				});
			});
			
		});
		
}
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

function llamarBuscarProducto() {$('#divResultadoProducto').addClass('hidden');
	var filtr= $.trim($('#txtBuscarProductoProd').val());

	if(esNumero(filtr)){//es numero llamar al procedure por numero
		}
	else{//es letras llamar al procedure para que haga el filtro
		if(filtr!=''){
			filtr='%'+filtr.replace(/\ /g,'%')+'%';
		}
	}

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
				<div class="row"> 
					<div class="hidden" id="mProdID">${dato.idProducto}</div>
					<div class="col-xs-12 col-sm-4 mayuscula" id="mProdNombre"><span class="visible-xs-inline"><strong>Nombre: </strong></span> <span>${dato.prodNombre}</span></div>
					<div class="col-xs-6 col-sm-1 text-center" id="mProdPrecio"><span class="visible-xs-inline"><strong>S/. </strong></span>  ${parseFloat(dato.prodPrecioUnitario).toFixed(2)}</div>
					<div class="col-xs-6 col-sm-2"><span class="visible-xs-inline"><strong>Tipo: </strong></span> <small>${dato.catprodDescipcion}</small></div>
					<div class="col-xs-6 col-sm-2 text-center"><span class="visible-xs-inline"><strong>Lote: </strong></span> ${dato.lote}</div>
					<div class="col-xs-6 col-sm-1 mayuscula mitooltip text-center" title="${moment(dato.prodFechaVencimiento, 'DD/MM/YYYY').format('dddd, DD MMM YYYY')}"><span class="visible-xs-inline"><strong>Vence: </strong></span>  <small>${vence}</small></div>
					<div class="col-xs-6 col-sm-1 text-center"><span class="visible-xs-inline"><strong>Stock: </strong></span> ${dato.prodStock}</div>
					<div class="col-xs-6 col-sm-1 text-center"><button class="form-control btn btn-negro btn-xs btn-outline btnPasarProductoCanasta" id="${index}"><i class="icofont icofont-simple-right"></i></button></div>

				</div>
				`);
			$('.modal-detalleProductoEncontrado').modal('show');

			});
			$('.mitooltip').tooltip();			
		});

	}
	
}

$('#listadoDivs').on('click','.btnPasarProductoCanasta',function () {
	var indexSelec=$(this).attr('id');
	var idProd= $('#listadoDivs .row').eq(indexSelec).find('#mProdID').text();
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
			$('#spanCantBarr').text('('+dato.cantBarras+')');
			$('#cmbProdCateg').selectpicker('val', dato.idCategoriaProducto);
			$('#cmbProdProp').selectpicker('val', dato.idPropiedadProducto);
			$('#cmbProdLaboratorio').selectpicker('val', dato.idLaboratorio);



		});
	});
	$.ajax({url: 'php/productos/listarLotesYVencimientoPorID.php', type: 'POST', data: {idPro: idProd}}).done(function (resp) {
		moment().locale('es');
		$('#spanRowLote').children().remove();
		$('#spanRowFechaVen').children().remove();

		JSON.parse(resp).map(function (dato, index) {
			//console.log(dato);
			$('#spanRowLote').append(`<input type="text" class="form-control text-center"  id="txtprodLote" placeholder="Lote" value="${dato.prodLote}" disabled>`)
			$('#spanRowFechaVen').append(`<div class="sandbox-container"><input type="text" class="form-control text-center" id="txtprodFecha" placeholder="Fecha" value="${dato.prodFechaVencimiento}" disabled></div>`)
			$('#emFechaProd').text(moment(dato.prodFechaRegistro).format('dddd, DD [de] MMMM [de] YYYY'));
			habilitarDivFecha();

		});
		
	});

	$('.modal-detalleProductoEncontrado').modal('hide');
});
$('#btnVerBarras').click(function () {console.log('btnbarra')
	$('#divsBarras').children().remove();
	$.ajax({url: 'php/productos/listarBarrasId.php', type: 'POST', data: {idPro: $('#txtprodCodigo').val()}}).done(function (resp) {
		//console.log(resp);
		JSON.parse(resp).map(function (dato, index) {
			$('#divsBarras').append(`<div class="row"><button class="btn btn-danger btn-outline btn-xs btnEliminarCode"><i class="icofont icofont-close-circled"></i></button>${dato.barrasCode}</div>`);
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
		}}).done(function (resp) { //console.log(resp)
			if(resp==1){$('#lblMensajeBien').text('Los datos del producto '+ $('#txtprodBarra').val() + ' se actualizaron correctamente .');
							$('.modal-felicitacion').modal('show');
						}
						if(resp==0){$('#lblFalta').text('No se guardó ningun cambio, sugiero que presione F5 e inténtelo de nuevo.');
							$('.modal-faltaCompletar').modal('show');}
				$('#btnActualizarDataProducto').removeClass('disabled');
		})

	}



});

$('#txtprodCosto').keyup(function () {calculoCostos(1);});
$('#txtprodPorcentaje').keyup(function () {calculoCostos(2);});
$('#txtprodPrecio').keyup(function () {calculoCostos(3);});

function calculoCostos(tipoCaso){
	var vproCost, vproGana, vproPrec;
	if ($('#txtprodCosto').val()==0){vproCost=0}else{vproCost=$('#txtprodCosto').val()}
	if ($('#txtprodPorcentaje').val()==0){vproGana=0}else{vproGana=$('#txtprodPorcentaje').val()}
	if ($('#txtprodPrecio').val()==0){vproPrec=0}else{vproPrec=$('#txtprodPrecio').val()}

	if(tipoCaso==1){$('#txtprodPrecio').val(parseFloat(vproCost*(1+vproGana)/100).toFixed(2))}
	if(tipoCaso==2){$('#txtprodPrecio').val(parseFloat(vproCost*(1+vproGana)/100).toFixed(2))}
	if(tipoCaso==3){$('#txtprodCosto').val(parseFloat(vproPrec/(1+vproGana/100)).toFixed(2))}
	
}

$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
  var target = $(e.target).attr("href") // activated tab
  if(target=='#tabProximosVencer'){//solo selecciona el tabListadoVentas
	$(`#listasProdVencimiento`).children().remove();
	
	$.ajax({url:'php/productos/listarSoloVentasHoy.php', type:'POST'}).done(function (resp) {
		$.each(JSON.parse(resp), function (i, arg) {
			moment.locale('es')
			sumaValoriz+=parseFloat(arg.total);
			var dia=moment(arg.ventFecha);
			$(`#listadoVentaDelDia`).append(`
				<div class="row resulDiv noselect" style="cursor:default">
				<div class="col-xs-2 col-sm-1 codDivInv" >${arg.idVenta}</div>
				<div class="col-xs-3 text-center">${dia.format('dddd, DD h:mm a')}</div>
				<div class="col-xs-2 argTotal">S/. ${arg.total}</div>
				<div class="col-xs-2">S/. ${parseFloat(arg.ventMonedaEnDuro).toFixed(2)}</div>
				<div class="col-xs-2">${arg.ventCambioVuelto}</div>
				<div class="col-xs-1">${arg.Usuario}</div>
				<div class="col-xs-1"><button class="btn btn-morita btn-outline btnDetalleInvLista" id="${arg.idSimple}"><i class="icofont icofont-ui-calendar"></i></button></div></strong></div>
				`);
			$('#spanSumaDelDia').text(parseFloat(sumaValoriz).toFixed(2));
		});
	})
  }
});
</script>

</body>

</html>
