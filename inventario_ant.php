<?php include 'php/config/conexion.php'; ?>
<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Compras: Info-Farma</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="iconfont/material-icons.css">
		<link href="css/estilos.css" rel="stylesheet">
		<link href="css/bootstrap-select.min.css" rel="stylesheet"> <!-- extraido de: https://silviomoreto.github.io/bootstrap-select/-->
		<link rel="stylesheet" href="css/icofont.css"> <!-- iconos extraidos de: http://icofont.com/-->
		<link rel="shortcut icon" href="images/pet.png" />
		<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css"> <!-- extraido de: http://flatlogic.github.io/awesome-bootstrap-checkbox/demo/-->
		<link rel="stylesheet" href="css/bootstrap-datepicker3.css"> <!-- extraído de: https://uxsolutions.github.io/bootstrap-datepicker/-->

</head>
<body>

	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="index.html"><i class="icofont icofont-medical-sign-alt"></i> Info-Farma</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li><a href="index.html"><i class="icofont icofont-home"></i></a></li>
				<li><a href="usuarios.html"><i class="icofont icofont-users-alt-5"></i> Usuarios</a></li>
				<li><a href="productos.html"><i class="icofont icofont-drug"></i> Productos</a></li>
				<li><a href="ventas.html"><i class="icofont icofont-cart-alt"></i> Ventas</a></li>
				<li class="active"><a href="compras.html"><i class="icofont icofont-oil-truck"></i> Compras</a></li>
				<li><a href="reportes.html"><i class="icofont icofont-list"></i> Reportes</a></li>
			</ul>
		 
			<ul class="nav navbar-nav navbar-right">
											 
			 <form class="navbar-form navbar-left" role="search">
	 
				<div class="input-group">
					<input type="text" class="form-control" placeholder="Buscar">
					<span class="input-group-btn">
						<button type="button" class="btn btn-warning"><span class="glyphicon glyphicon-search"></span></button>
					</span>
				</div>
				
			</form>        
				<li><a href="configuraciones.html"><i class="material-icons">settings</i></a></li>
				
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="material-icons">fingerprint</i> <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="#" data-toggle="modal" data-target=".modal-password">Cambiar contraseña</a></li>
						<li role="separator" class="divider"></li>
						<li><a href="#">Cerrar sesión</a></li>
					</ul>
				</li>
			</ul>
		</div><!-- /.navbar-collapse -->
		
	</nav>

	<div class="section col-md-2 hidden-xs hidden-sm">
		<div class="list-group">
			<a href="index.html" class="list-group-item elementoMenu"><i class="material-icons">home</i> Principal</a>
			<a href="usuarios.html" class="list-group-item elementoMenu"><i class="material-icons">supervisor_account</i> Usuarios</a>
			<a href="productos.html" class="list-group-item elementoMenu"><i class="material-icons">loyalty</i> Productos</a>
			<a href="ventas.html" class="list-group-item elementoMenu"><i class="material-icons">shopping_cart</i> Ventas</a>
			<a href="compras.html" class="list-group-item elementoMenu list-group-item-warning"><i class="material-icons">shopping_basket</i> Compras</a>
			<a href="seguridad.html" class="list-group-item elementoMenu"><i class="material-icons">security</i> Seguridad</a>
			<a href="reportes.html" class="list-group-item elementoMenu"><i class="material-icons">assessment</i> Reportes</a>
		</div>
	</div>
	<main class="col-md-8 col-lg-9 container">

	<div class="row">
		<ol class="breadcrumb col-sm-6">
		<li><a href="index.html"><i class="material-icons">home</i>Inicio</a></li>
		<li class="active"><i class="material-icons">shopping_basket</i>Compras</li>
	</ol>
		<div class="col-sm-6 text-center"><small id="horaServer"></small> <small class="text-muted" id="fechaServer"></small> <p><small>Usuario:</small> <small class="text-primary">Carlos Pariona</small></p></div>
	</div>
	<h2>Inventario de los productos</h2>
	
	<ul class="nav nav-tabs">
	<li class="active"><a href="#busqueda" data-toggle="tab">Búsqueda</a></li>
	<li><a href="#nuevoInventario" data-toggle="tab">Agregar inventario</a></li>
	<li><a href="#todos" data-toggle="tab">Todas las compras</a></li>
	</ul>
	
	<div class="tab-content">
	<!--Panel para buscar productos-->
		<!--Clase para las tablas-->
		<div class="tab-pane fade in active container-fluid" id="busqueda"><br>
		<!--Inicio de pestaña 01-->
			Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum, rem, placeat numquam sapiente totam hic qui quod aliquid aliquam repellendus atque soluta explicabo ab quibusdam sunt a quisquam! Similique, et.
		<!--Fin de pestaña 01-->

		</div>
		<style>.aprovecharAncho {padding-left: 2px; padding-right: 2px; padding-bottom: 2px}
		.aprovecharAncho i{font-size: 20px;}.affix {
			top: 20px;
	}</style>
		

		<!--Panel para nueva compra-->
		<div class="tab-pane fade container-fluid" id="nuevoInventario"><br>
		<!--Inicio de pestaña 01-->
		<p>Ingrese todo su inventario inicial, seleccionando los campos correspondientes:</p>
		<div id="listaProductosNuevoInventario">
			<div class="row text-bold text-center " data-spy="affix" data-offset-top="200"><strong>
				<div class="col-xs-3 aprovecharAncho">Nombre completo</div>
				<div class="col-xs-1 aprovecharAncho">Cantidad</div>
				<div class="col-xs-1 aprovecharAncho">Precio <span class="lblMonedaLocal">S/.</span></div>
				<div class="col-xs-1 aprovecharAncho">Stock Mínimo</div>
				<div class="col-xs-1 aprovecharAncho">Lote</div>
				<div class="col-xs-2 aprovecharAncho">Grupo</div>
				<div class="col-xs-2 aprovecharAncho">Vencimiento</div>
				<div class="col-xs-1 aprovecharAncho mitooltip" title="Comandos"><i class="icofont icofont-dna-alt-1" style="font-size: 24px;"></i></div></strong>
			</div>
			<div class="row">
				<div class="col-xs-3 aprovecharAncho"><input type="text" class="form-control text-capitalize txtNomProducto" placeholder="Nombre"></div>
				<div class="col-xs-1 aprovecharAncho"><input type="number" class="text-center form-control txtCantidad" placeholder="Cant." min=0></div>
				<div class="col-xs-1 aprovecharAncho"><input type="number" class="text-center form-control txtMonedas" placeholder="Precio" min=1></div>
				<div class="col-xs-1 aprovecharAncho"><input class="text-center form-control txtStockMinimo" type="number" value="10" placeholder="Min." min=0></div>
				<div class="col-xs-1 aprovecharAncho"><input type="text" class="form-control text-uppercase txtLote" placeholder="Lote"></div>
				<div class="col-xs-2 aprovecharAncho"><select class="selectpicker cmbCategorias" title="Seleccione uno..." data-live-search="true" data-width="100%">
						<?php // Llenado por php
							include 'php/productos/listarCategorias.php';
						?>
					</select></div>
				<div class="col-xs-2 aprovecharAncho" id="sandbox-container"><div class="input-group date txtFechaVencimiento">
					<input type="text" class="form-control text-center"><span class="input-group-addon" style="background-color: #CDDC39; color: white; border: 1px solid rgba(204, 204, 204, 0.01);"><i class="glyphicon glyphicon-equalizer" style="font-size: 16px;"></i></span></div>
				</div>
				<div class="col-xs-1 aprovecharAncho text-center">
					<button class="btn btn-success btn-outline btn-sm btnGuardarItemInventario"><i class="icofont icofont-check"></i></button>
				</div>
			</div>
			
		</div>
		<div class="row"><br><p class="text-center"><button class="btn btn-success btn-outline" id="btnAgregarItem"><i class="icofont icofont-first-aid-alt"></i> Agregar nuevo item</button></p></div>
		<p>Cantidad de items <strong><span id="itemsInventarioNuevo">5</span></strong> en la lista.</p>

		<!--Fin de pestaña 01-->
		</div>
		<div class="tab-pane fade container-fluid" id="todos"><br>
		<!--Inicio de pestaña 01-->
			Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum, rem, placeat numquam sapiente totam hic qui quod aliquid aliquam repellendus atque soluta explicabo ab quibusdam sunt a quisquam! Similique, et.
		<!--Fin de pestaña 01-->
		</div>
	</div>

	</main>


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



	<script src="js/jquery-2.2.4.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/moment.js"></script>
	<script src="js/inicializacion.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap-datepicker.min.js"></script>
	<script src="js/bootstrap-datepicker.es.min.js"></script>



	<script type="text/javascript">

	$(document).ready(function(){

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
		$('#itemsInventarioNuevo').text($('#listaProductosNuevoInventario .row').length);
		$.ajax({url: 'php/productos/listarCategorias.php', type:'POST'}).done(function(resultado){
			$('#listaProductosNuevoInventario').append(`<div class="row">
				<div class="col-xs-3 aprovecharAncho"><input type="text" class="form-control text-capitalize txtNomProducto" placeholder="Nombre"></div>
				<div class="col-xs-1 aprovecharAncho"><input type="number" class="text-center form-control txtCantidad" placeholder="Cant." min=0></div>
				<div class="col-xs-1 aprovecharAncho"><input type="number" class="text-center form-control txtMonedas" placeholder="Precio" min=1></div>
				<div class="col-xs-1 aprovecharAncho"><input class="text-center form-control txtStockMinimo" type="number" value="10" placeholder="Min." min=0></div>
				<div class="col-xs-1 aprovecharAncho"><input type="text" class="form-control text-uppercase txtLote" placeholder="Lote"></div>
				<div class="col-xs-2 aprovecharAncho"><select class="selectpicker cmbCategorias" title="Seleccione uno..." data-live-search="true" data-width="100%">
						${resultado}
					</select></div>
				<div class="col-xs-2 aprovecharAncho" id="sandbox-container"><div class="input-group date txtFechaVencimiento">
					<input type="text" class="form-control text-center"><span class="input-group-addon" style="background-color: #CDDC39; color: white; border: 1px solid rgba(204, 204, 204, 0.01);"><i class="glyphicon glyphicon-equalizer" style="font-size: 16px;"></i></span></div>
				</div>
				<div class="col-xs-1 aprovecharAncho text-center">
					<button class="btn btn-success btn-outline btn-sm btnGuardarItemInventario"><i class="icofont icofont-check"></i></button>
				</div>
			</div>
			`);
			$('.selectpicker').selectpicker();
			habilitarDivFecha();
		});
		
		});
	});
function habilitarDivFecha(){
	$('#sandbox-container .input-group.date').datepicker({
		language: "es", orientation: "top auto", daysOfWeekHighlighted: "0", autoclose: true, todayHighlight: true});
}
$('#listaProductosNuevoInventario').on('focusout','.txtMonedas',function () {
	var valor = parseFloat($('.txtMonedas').val());
	$(this).val(valor.toFixed(2));
});


$('#listaProductosNuevoInventario').on('click','.btnGuardarItemInventario',function () {
	var indiceRow=$('#listaProductosNuevoInventario .btnGuardarItemInventario').index(this)+1; //contar el elemento (this) entre el grupo a listar
	var nombreProd=$('#listaProductosNuevoInventario .row').eq(indiceRow).find('.txtNomProducto').val();
	var cantProd=$('#listaProductosNuevoInventario .row').eq(indiceRow).find('.txtCantidad').val();
	var precProd=$('#listaProductosNuevoInventario .row').eq(indiceRow).find('.txtMonedas').val();
	var stockProd=$('#listaProductosNuevoInventario .row').eq(indiceRow).find('.txtStockMinimo').val();
	var loteProd=$('#listaProductosNuevoInventario .row').eq(indiceRow).find('.txtLote').val();
	var categProd=$('#listaProductosNuevoInventario .row').eq(indiceRow).find('.cmbCategorias button').attr('title');
	var fechaProd=$('#listaProductosNuevoInventario .row').eq(indiceRow).find('.txtFechaVencimiento input').val();
	var fechaMoment= moment(fechaProd, 'DD/MM/YYYY').format('YYYY-MM-DD');
	console.log(categProd);
	if(nombreProd==''){$('.modal-faltaCompletar').modal('show'); $('#lblFalta').text('No puedo guardar un «Nombre de producto» vacío');}
	else if(cantProd=='' || cantProd<=0  ){$('.modal-faltaCompletar').modal('show'); $('#lblFalta').text('No puedo guardar una «Cantidad» negativa o igual a cero');}
	else if(precProd=='' || precProd<=0  ){$('.modal-faltaCompletar').modal('show'); $('#lblFalta').text('No puedo guardar un «Precio» negativo o igual a cero');}
	else if(stockProd=='' || stockProd<=0  ){$('.modal-faltaCompletar').modal('show'); $('#lblFalta').text('No puedes ingresar un «Stock» negativo o igual a cero');}
	else if(categProd==''  ){$('.modal-faltaCompletar').modal('show'); $('#lblFalta').text('Debes seleccionar una «Categoría de producto»');}
	else if(moment(fechaMoment).isBefore(moment().format('YYYY-MM-DD'))){ $('.modal-faltaCompletar').modal('show'); $('#lblFalta').text('No se puede agregar «Fechas ya vencidas»');}
	else if($(this).hasClass('disabled')){}
	else{ 
	$(this).addClass('disabled');
	console.log( 'Guardar lo siguiente '+indiceRow + ' \n' +nombreProd + ' ' +cantProd + ' ' +precProd + ' ' +stockProd + ' ' +loteProd + ' ' +categProd + ' ' +fechaProd);
	$.ajax({url:'php/productos/insertarProductoPorInventario.php', data:{
		nombre:nombreProd, cantidad:cantProd, stockMin:stockProd, categoria: categProd, precio: precProd ,  lote:loteProd,  fecha:fechaProd
	}, type:'POST' }).done(function (resp) {console.log(resp);
		$('#listaProductosNuevoInventario .row').eq(indiceRow).find('.btnGuardarItemInventario').removeClass('disabled');
		// body...
	})

}
});

	

</script>

</body>
</html>