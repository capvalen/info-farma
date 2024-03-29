<!DOCTYPE html>
<html lang="en">

<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>Inventario: Info-Farma</title>

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
		<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css"> <!-- extraido de: http://flatlogic.github.io/awesome-bootstrap-checkbox/demo/-->
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
				<li>
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
				<li class="active">
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
								 <li id="liDatosPersonales"><a href="#!"><p><strong>Usuario: </strong> <span id="menuNombreUsuario">Carlos Pariona</span></p><small class="text-muted text-center" id="menuFecha"><span id="fechaServer"></span> <span id="horaServer"><?php require('php/getHora.php') ?></span> </small></a></li>
									
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
				 <h2><i class="icofont icofont-prescription"></i> Inventario de los productos</h2>

					<ul class="nav nav-tabs">
					<li class="active"><a href="#invRegist" data-toggle="tab">Inventarios registrados</a></li>
					<li><a href="#nuevoInventario" data-toggle="tab">Agregar inventario</a></li>
					
					</ul>
					
					<div class="tab-content">
					<!--Panel para buscar productos-->
						<!--Clase para las tablas-->
						<div class="tab-pane fade in active container-fluid" id="invRegist">
						<!--Inicio de pestaña 01-->
							<div class="row">Selecione año, luego de click en el botón <strong>Filtrar</strong> y navegue por las pestañas para que pueda visualizar la lista de inventario.</div>
							<div class="row">
								<div class="col-xs-6 col-sm-2" id="divAñoInventario"><select class="selectpicker"  title="Año..." data-container="body" data-width="100%" >
									<?php require('php/config/retornarAnosCompras.php'); ?>
								</select></div>
								<button class="btn btn-success btn-outline" id="btnBuscarPorAñoInventario"><i class="icofont icofont-search-alt-1"></i></button>
								
							</div>
							<div class="row"><br>
								<ul class="nav nav-tabs nav-tabs-meses">
									<li class="hidden"><a href="#mes0" data-toggle="tab">Enero</a></li>
									<li class="hidden"><a href="#mes1" data-toggle="tab">Febrero</a></li>
									<li class="hidden"><a href="#mes2" data-toggle="tab">Marzo</a></li>
									<li class="hidden"><a href="#mes3" data-toggle="tab">Abril</a></li>
									<li class="hidden"><a href="#mes4" data-toggle="tab">Mayo</a></li>
									<li class="hidden"><a href="#mes5" data-toggle="tab">Junio</a></li>
									<li class="hidden"><a href="#mes6" data-toggle="tab">Julio</a></li>
									<li class="hidden"><a href="#mes7" data-toggle="tab">Agosto</a></li>
									<li class="hidden"><a href="#mes8" data-toggle="tab">Septiembre</a></li>
									<li class="hidden"><a href="#mes9" data-toggle="tab">Octubre</a></li>
									<li class="hidden"><a href="#mes10" data-toggle="tab">Noviembre</a></li>
									<li class="hidden"><a href="#mes11" data-toggle="tab">Diciembre</a></li>
									
								</ul>
							</div>
							<div class="tab-content tabConenidoMeses">
								<div class="tab-pane fade " id="mes0"></div>
								<div class="tab-pane fade " id="mes1"></div>
								<div class="tab-pane fade " id="mes2"></div>
								<div class="tab-pane fade " id="mes3"></div>
								<div class="tab-pane fade " id="mes4"></div>
								<div class="tab-pane fade " id="mes5"></div>
								<div class="tab-pane fade " id="mes6"></div>
								<div class="tab-pane fade " id="mes7"></div>
								<div class="tab-pane fade " id="mes8"></div>
								<div class="tab-pane fade " id="mes9"></div>
								<div class="tab-pane fade " id="mes10"></div>
								<div class="tab-pane fade " id="mes11"></div>
							</div>

						<!--Fin de pestaña 01-->
						</div>

						

						<!--Panel para nueva compra-->
						<div class="tab-pane fade container-fluid" id="nuevoInventario"><br>
						<!--Inicio de pestaña 01-->
						<div class="col-sm-6 col-sm-push-3"><button class="form-control btn btn-primary btn-outline activarNuevoInventario" ><i class="icofont icofont-space-shuttle"></i> Crear nuevo inventario</button>
						</div>
						<div class="col-xs-12 hidden" id="rellenoNuevoInventario">
							<p>Ingrese los productos de su inventario inicial, rellenando	 los campos correspondientes:</p>
							<div id="listaProductosNuevoInventario">
								<!--<div class="row text-bold text-center " data-spy="affix" data-offset-top="200"><strong>
									<div class="col-xs-6 col-sm-3 aprovecharAncho">Nombre completo</div>
									<div class="col-xs-6 col-sm-2 aprovecharAncho">Composición</div>
									<div class="col-xs-6 col-sm-1 aprovecharAncho">Cantidad</div>
									<div class="col-xs-6 col-sm-1 aprovecharAncho">Precio <span class="lblMonedaLocal">S/.</span></div>
									<div class="col-xs-6 col-sm-1 aprovecharAncho">Stock Mínimo</div>
									<div class="col-xs-6 col-sm-1 aprovecharAncho">Lote</div>
									<div class="col-xs-6 col-sm-2 aprovecharAncho">Grupo</div>
									<div class="col-xs-6 col-sm-2 aprovecharAncho">Vencimiento</div>
									<div class="col-xs-6 col-sm-1 aprovecharAncho mitooltip" title="Comandos"><i class="icofont icofont-dna-alt-1" style="font-size: 24px;"></i></div></strong>
								</div>-->
								
							</div>
							<div class="row"><br><p class="text-center"><button class="btn btn-success btn-outline hidden" id="btnAgregarItem"><i class="icofont icofont-first-aid-alt"></i> Agregar nuevo item</button></p></div>
							<p>Cantidad de items en la lista: <strong><span id="itemsInventarioNuevo">1</span></strong> </p>
						</div>

						<!--Fin de pestaña 01-->
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
	$('#sandbox-container .input-group.date').datepicker({language: "es", orientation: "top auto", daysOfWeekHighlighted: "0", autoclose: true, todayHighlight: true});
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
$('#listaProductosNuevoInventario').on('click', '.btnModificarItemInventario', function () {
	var indiceRow= $(this).parents().parents().index();//contar el elemento (this) entre el grupo a listar
	desabilitarCampos(3, indiceRow)
});
$('#listaProductosNuevoInventario').on('click', '.btnActualizarItemInventario', function () {
	var indiceRow= $(this).parents().parents().index();//contar el elemento (this) entre el grupo a listar
	desabilitarCampos(1, indiceRow);
	var idCambio= $(this).attr('id');
	var nombreProd=$('#listaProductosNuevoInventario .row').eq(indiceRow).find('.txtNomProducto').val();
	var composi= $('#listaProductosNuevoInventario .row').eq(indiceRow).find('.txtComposicion').val();
	var cantProd=$('#listaProductosNuevoInventario .row').eq(indiceRow).find('.txtCantidad').val();
	var precProd=$('#listaProductosNuevoInventario .row').eq(indiceRow).find('.txtMonedas').val();
	var stockProd=$('#listaProductosNuevoInventario .row').eq(indiceRow).find('.txtStockMinimo').val();
	var loteProd=$('#listaProductosNuevoInventario .row').eq(indiceRow).find('.txtLote').val();
	var categProd=$('#listaProductosNuevoInventario .row').eq(indiceRow).find('.cmbCategorias button').attr('title');
	var fechaProd=$('#listaProductosNuevoInventario .row').eq(indiceRow).find('.txtFechaVencimiento input').val();
	var fechaMoment= moment(fechaProd, 'DD/MM/YYYY').format('YYYY-MM-DD');
	var idcompra = $('.activarNuevoInventario').attr('id');
	var laborat= $('#listaProductosNuevoInventario .row').eq(indiceRow).find('.cmbLaboratorios button').attr('title');
	var propieda= $('#listaProductosNuevoInventario .row').eq(indiceRow).find('.cmbPropiedades button').attr('title');
	
	//******** Se empieza a validad y a actualizar la BD *************

	if(nombreProd==''){$('.modal-faltaCompletar').modal('show'); $('#lblFalta').text('No puedo guardar un «Nombre de producto» vacío');}
	else if(composi==''){$('.modal-faltaCompletar').modal('show'); $('#lblFalta').text('No puedo guardar el campo «Composición» vacío');}
	else if(cantProd=='' || cantProd<=0  ){$('.modal-faltaCompletar').modal('show'); $('#lblFalta').text('No puedo guardar una «Cantidad» negativa o igual a cero');}
	else if(precProd=='' || precProd<=0  ){$('.modal-faltaCompletar').modal('show'); $('#lblFalta').text('No puedo guardar un «Precio» negativo o igual a cero');}
	else if(stockProd=='' || stockProd<=0  ){$('.modal-faltaCompletar').modal('show'); $('#lblFalta').text('No puedes ingresar un «Stock» negativo o igual a cero');}
	else if(categProd=='' || categProd=='Categorías...'  ){$('.modal-faltaCompletar').modal('show'); $('#lblFalta').text('Debes seleccionar una «Categoría de producto» si no encuentras en la lista selecciona «Otros»');}
	else if(laborat=='' || laborat=='Laboratorios...'  ){$('.modal-faltaCompletar').modal('show'); $('#lblFalta').text('Debes seleccionar un «Laboratorio», si no está en la lista selecciona la opción «Ninguno»');}
	else if(propieda=='' || propieda=='Tipo de propiedad...'  ){$('.modal-faltaCompletar').modal('show'); $('#lblFalta').text('Debes seleccionar un «Tipo de propiedad del producto»');}
	else if(moment(fechaMoment).isBefore(moment().format('YYYY-MM-DD'))){ $('.modal-faltaCompletar').modal('show'); $('#lblFalta').text('No se puede agregar «Fechas ya vencidas»');}
	else if($(this).hasClass('disabled')){} //Si esta desabilitado no puede ingresar de nuevo
	else{ 
		$(this).addClass('disabled');

		$.ajax({url:'php/productos/actualizarProductoPorInventario.php', data:{
			idProd:idCambio ,nombre:nombreProd + ' '+ composi, cantidad:cantProd, stockMin:stockProd, categoria: categProd, precio: precProd ,  lote:loteProd,  fecha:fechaProd, idCompr: idcompra, labo:laborat, propi:propieda
		}, type:'POST' }).done(function (resp) {//console.log(resp); //Muestra el error real que se tiene
			$('#listaProductosNuevoInventario .row').eq(indiceRow).find('.btnActualizarItemInventario').removeClass('disabled'); //Desabilita el boton para que no haya muchos ingresos a la BD
			if($.isNumeric(resp)){
				desabilitarCampos(3, indiceRow);
				
			}
			
		});
	} // Fin de ultimo else grande validador
});


$('#listaProductosNuevoInventario').on('click','.btnGuardarItemInventario',function () {
	var indiceRow= $(this).parents().parents().index();//contar el elemento (this) entre el grupo a listar
	desabilitarCampos(1, indiceRow);
	//$('#listaProductosNuevoInventario .row').index(this); No funciona este codigo
	
	//console.log($('#listaProductosNuevoInventario .row').eq(indiceRow).find('.cmbCategorias').selectpicker( 'val'));
	var nombreProd=$('#listaProductosNuevoInventario .row').eq(indiceRow).find('.txtNomProducto').val();
	var composi= $('#listaProductosNuevoInventario .row').eq(indiceRow).find('.txtComposicion').val();
	var cantProd=$('#listaProductosNuevoInventario .row').eq(indiceRow).find('.txtCantidad').val();
	var precProd=$('#listaProductosNuevoInventario .row').eq(indiceRow).find('.txtMonedas').val();
	var stockProd=$('#listaProductosNuevoInventario .row').eq(indiceRow).find('.txtStockMinimo').val();
	var loteProd=$('#listaProductosNuevoInventario .row').eq(indiceRow).find('.txtLote').val();
	var categProd=$('#listaProductosNuevoInventario .row').eq(indiceRow).find('.cmbCategorias button').attr('title');
	var fechaProd=$('#listaProductosNuevoInventario .row').eq(indiceRow).find('.txtFechaVencimiento input').val();
	var fechaMoment= moment(fechaProd, 'DD/MM/YYYY').format('YYYY-MM-DD');
	var idcompra = $('.activarNuevoInventario').attr('id');
	var laborat= $('#listaProductosNuevoInventario .row').eq(indiceRow).find('.cmbLaboratorios button').attr('title');
	var propieda= $('#listaProductosNuevoInventario .row').eq(indiceRow).find('.cmbPropiedades button').attr('title');

	//******** Se empieza a validad y a rellenar la BD *************

	if(nombreProd==''){$('.modal-faltaCompletar').modal('show'); $('#lblFalta').text('No puedo guardar un «Nombre de producto» vacío');}
	else if(composi==''){$('.modal-faltaCompletar').modal('show'); $('#lblFalta').text('No puedo guardar el campo «Composición» vacío');}
	else if(cantProd=='' || cantProd<=0  ){$('.modal-faltaCompletar').modal('show'); $('#lblFalta').text('No puedo guardar una «Cantidad» negativa o igual a cero');}
	else if(precProd=='' || precProd<=0  ){$('.modal-faltaCompletar').modal('show'); $('#lblFalta').text('No puedo guardar un «Precio» negativo o igual a cero');}
	else if(stockProd=='' || stockProd<=0  ){$('.modal-faltaCompletar').modal('show'); $('#lblFalta').text('No puedes ingresar un «Stock» negativo o igual a cero');}
	else if(categProd=='' || categProd=='Categorías...'  ){$('.modal-faltaCompletar').modal('show'); $('#lblFalta').text('Debes seleccionar una «Categoría de producto» si no encuentras en la lista selecciona «Otros»');}
	else if(laborat=='' || laborat=='Laboratorios...'  ){$('.modal-faltaCompletar').modal('show'); $('#lblFalta').text('Debes seleccionar un «Laboratorio», si no está en la lista selecciona la opción «Ninguno»');}
	else if(propieda=='' || propieda=='Tipo de propiedad...'  ){$('.modal-faltaCompletar').modal('show'); $('#lblFalta').text('Debes seleccionar un «Tipo de propiedad del producto»');}
	else if(moment(fechaMoment).isBefore(moment().format('YYYY-MM-DD'))){ $('.modal-faltaCompletar').modal('show'); $('#lblFalta').text('No se puede agregar «Fechas ya vencidas»');}
	else if($(this).hasClass('disabled')){} //Si esta desabilitado no puede ingresar de nuevo
	else{ 
		$(this).addClass('disabled');

		$.ajax({url:'php/productos/insertarProductoPorInventario.php', data:{
			nombre:nombreProd + ' '+ composi, cantidad:cantProd, stockMin:stockProd, categoria: categProd, precio: precProd ,  lote:loteProd,  fecha:fechaProd, idCompr: idcompra, labo:laborat, propi:propieda
		}, type:'POST' }).done(function (resp) {//console.log(resp); //Muestra el error real que se tiene
			$('#listaProductosNuevoInventario .row').eq(indiceRow).find('.btnGuardarItemInventario').removeClass('disabled'); //Desabilita el boton para que no haya muchos ingresos a la BD
			if($.isNumeric(resp)){
				desabilitarCampos(1, indiceRow);
				//id a actualizariteminventario
				$('#listaProductosNuevoInventario .row').eq(indiceRow).find('.btnActualizarItemInventario').attr('id', resp)
				$('#btnAgregarItem').click();
			}
			else{desabilitarCampos(2, indiceRow);
				$('.modal-faltaCompletar').modal('show');
				$('#lblFalta').text('Ocurrió un problema interno o con la conexión, no se guardó su registro. Contáctese con su proveedor de Software.');
			}		
		});
	} // Fin de ultimo else grande validador
});


$('.activarNuevoInventario').click(function () {
	$.ajax('php/compras/insertarNuevoInventario.php').done(function (respuesta) {
		if(respuesta!=0){
			$('.activarNuevoInventario').attr('id',respuesta);
			//console.log($('.activarNuevoInventario').attr('id'))//El boton contiene el id del inventario
			$('.activarNuevoInventario').addClass('hidden');
			$('#rellenoNuevoInventario').removeClass('hidden');
		}

	});
});

$('#listaProductosNuevoInventario').on('lostfocus','.txtNomProducto',function () {
	
});
function filtrarAñosSelect(){
	$('.nav-tabs-meses li').addClass('hidden');
	$('.tabConenidoMeses .tab-pane').children().remove();
	var anioSeleccionado=$('#divAñoInventario button').attr('title');
	$.ajax({url:'php/config/retornarMesesAnoCompras.php', type: 'POST', data: {anio:anioSeleccionado }}).done(function(res){
		$.each(JSON.parse(res), function (i, arg) {
			//console.log(arg.mes)
			$('.nav-tabs-meses li').eq(arg.mes-1).removeClass('hidden');
		});
	$('.nav-tabs-meses li').removeClass('active')
	});
}
$('#btnBuscarPorAñoInventario').click(function () {
	 filtrarAñosSelect()
});
$('body').on('click', '.bootstrap-select .open', function () {
	filtrarAñosSelect()
});
$('.nav-tabs-meses li').click(function () {
	var sumaValoriz =0;
	var indMes=$(this).index();
	//console.log( 'clic en el mes ' + ($(this).index()+1))
	//rellenar contenido del mes con clic:
	$(`.tabConenidoMeses #mes${indMes}`).children().remove();
	
	var anioSeleccionado=$('#divAñoInventario button').attr('title');
	$.ajax({url:'php/productos/listarTodoInventarios.php', type: 'POST', data: {anio:anioSeleccionado, mes: (indMes+1) }}).done(function(res){
		$(`.tabConenidoMeses #mes${indMes}`).append(`<div class="row"><strong><div class="col-xs-2">Cod.</div><div class="col-xs-3">Fecha</div><div class="col-xs-2">Valorizado.</div><div class="col-xs-2">Creador</div><div class="col-xs-1">Detalles</div></strong></div>`);
		console.log(res)
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
})
</script>

</body>

</html>
