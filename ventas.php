<!DOCTYPE html>
<html lang="en">

<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>Ventas: Info-Farma</title>

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
		<link rel="shortcut icon" href="images/pet.png" />
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
				<div class="logoEmpresa">
					<img class="img-responsive" src="images/empresa.png" alt="">
				</div>
				<li >
						<a href="index.php"><i class="icofont icofont-space-shuttle"></i> Inicio</a>
				</li>
				<li>
						<a href="#"><i class="icofont icofont-users"></i> Usuarios</a>
				</li>
				<li>
						<a href="#"><i class="icofont icofont-blood"></i> Productos</a>
				</li>
				<li class="active">
						<a href="ventas.php"><i class="icofont icofont-cart"></i> Ventas</a>
				</li>
				<li>
						<a href="#"><i class="icofont icofont-truck-alt"></i> Compras</a>
				</li>
				<li>
						<a href="#"><i class="icofont icofont-envelope-open"></i> Reportes</a>
				</li>
				<li >
						<a href="inventario.php"><i class="icofont icofont-prescription"></i> Inventario</a>
				</li>
				<li>
						<a href="#"><i class="icofont icofont-options"></i> Configuración</a>
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
				 <h2><i class="icofont icofont-brand-aliexpress"></i> Ventas de productos</h2>
	
	<ul class="nav nav-tabs">
	<li class="active"><a href="#tabRealizarVenta" data-toggle="tab">Realizar una venta</a></li>
	<li><a href="#nuevo" data-toggle="tab">Detalle de ventas</a></li>
	<li><a href="#todos" data-toggle="tab">Todas las ventas</a></li>
	</ul>
	
	<div class="tab-content">
	<!--Panel para buscar productos-->
		<!--Clase para las tablas-->

		<div class="tab-pane fade in active" id="tabRealizarVenta"><br>
		<div class="container-fluid">
			<div class="col-sm-12 col-md-9">
				<div class="panel panel-morado">
					<div class="panel-heading">Detalle de la venta</div>
					
					<div class="panel-body">
						<div class="row col-md-8"><label class="purple-text text-darken-3">Ubique el producto:</label>
							<div class="input-group"> 
								<input type="text" class="form-control control-morado" placeholder="Busque por Nombre, Cod. interno, # de Lote">
								<span class="input-group-btn">
									<button class="btn btn-warning btn-outline" id="btn-BuscarProductoVenta" type="button"><span class="glyphicon glyphicon-search"></span></button>
								</span>
							</div><!-- /input-group -->
						</div><!-- /.col-lg-6 -->
						
						
						
						<!-- Tabla -->
						<div class="row col-md-12 table-responsive purple-text text-darken-3">
						<table class="table table-hover tablaResultadosCompras conInputPersonalizados"> 
						<thead> <tr> <th>#</th> <th class="col-xs-4">Producto</th> <th class="text-center">Cantidad</th> <th class="col-xs-1 text-center">Precio x unidad</th> <th class="text-center">Descuento</th> <th class="text-center">Sub-Total</th> </tr> </thead>
						<tbody>
						<tr> <th ><button type="button" class="btn btn-danger btn-xs btn-outline eliminarRowVenta"><i class="icofont icofont-error"></i></button> 1.</th> <td class="col-xs-4">Elemento 1 Composición ABC</td> <td class="col-xs-4 col-sm-3 text-center">
							<div class="input-group">
								<span class="input-group-btn">
									<button class="btn btn-morado btn-outline btnRestarCantidad hidden-xs" type="button"><i class="icofont icofont-minus-circle"></i></button>
								</span>
								<input type="number" class="form-control text-center control-morado" value="1" min=1>
								<span class="input-group-btn">
									<button class="btn btn-morado btn-outline btnAumentarCantidad hidden-xs" type="button"><i class="icofont icofont-plus-circle"></i></button>
								</span>
							</div><!-- /input-group --></td>
						<td class="col-sm-1 text-center"> <span>S/. 43</span></td> <td class="text-center">S/. 0.69</td> <td class="text-center">S/. <span class="spanSubTotal">42.00</span></td> </tr>
						<tr> <th><button type="button" class="btn btn-danger btn-xs btn-outline eliminarRowVenta"><i class="icofont icofont-error"></i></button> 2.</th> <td class="col-xs-4">Elemento 2</td><td class="col-xs-4 col-sm-3 text-center">
						<div class="input-group">
								<span class="input-group-btn">
									<button class="btn btn-morado btn-outline btnRestarCantidad hidden-xs" type="button"><i class="icofont icofont-minus-circle"></i></button>
								</span>
								<input type="number" class="form-control text-center control-morado" value="1" min=1>
								<span class="input-group-btn ">
									<button class="btn btn-morado btn-outline btnAumentarCantidad hidden-xs" type="button"><i class="icofont icofont-plus-circle"></i></button>
								</span>
							</div><!-- /input-group --></td>
						<td class="col-sm-1 text-center"> <span>S/. 99</span></td> <td class="text-center">S/. 2.30</td> <td class="text-center">S/.  <span class="spanSubTotal">198.0</span>0</td> </tr>
						<tr> <th><button type="button" class="btn btn-danger btn-xs btn-outline eliminarRowVenta"><i class="icofont icofont-error"></i></button> 3.</th> <td class="col-xs-4">Elemento 3</td> <td class="col-xs-4 col-sm-3 text-center">
						<div class="input-group">
								<span class="input-group-btn">
									<button class="btn btn-morado btn-outline btnRestarCantidad hidden-xs" type="button"><i class="icofont icofont-minus-circle"></i></button>
								</span>
								<input type="number" class="form-control text-center control-morado" value="1" min=1>
								<span class="input-group-btn">
									<button class="btn btn-morado btn-outline btnAumentarCantidad hidden-xs" type="button"><i class="icofont icofont-plus-circle"></i></button>
								</span>
							</div><!-- /input-group --></td>
						<td class="col-sm-1 text-center"> <span>S/. 25</span></td> <td class="text-center">S/. 6.00</td> <td class="text-center">S/. <span class="	">75.00</span></td>  </tr>
						<tr> <th><button type="button" class="btn btn-danger btn-xs btn-outline eliminarRowVenta"><i class="icofont icofont-error"></i></button> 4.</th> <td class="col-xs-4">Elemento 4</td> <td class="col-xs-4 col-sm-3 text-center">
						<div class="input-group">
								<span class="input-group-btn">
									<button class="btn btn-morado btn-outline btnRestarCantidad hidden-xs" type="button"><i class="icofont icofont-minus-circle"></i></button>
								</span>
								<input type="number" class="form-control text-center control-morado" value="1" min=1>
								<span class="input-group-btn">
									<button class="btn btn-morado btn-outline btnAumentarCantidad hidden-xs" type="button"><i class="icofont icofont-plus-circle"></i></button>
								</span>
							</div><!-- /input-group --></td>
						<td class="col-sm-1 text-center"> <span>S/. 6</span></td> <td class="text-center">S/. 5.00</td> <td class="text-center">S/.  <span class="spanSubTotal">24.00</span></td>  </tr>
						</tbody>
						</table></div>
						<p class="row col-sm-12 purple-text text-darken-3"><em>Total de items en la cesta: <strong id="itemsCesta">0</strong></em></p>

					</div>
					
					</div><!-- fin de pane warning-->
			</div>
			<div class="col-sm-3">
				<div class="panel panel-morado text-muted conInputPersonalizados">
					<div class="panel-heading">Datos generales de la nueva venta</div>
					<div class="panel-body">
						<div class=" text-center">
							
							<label class="">Total de venta:</label><br>
								<h4>S/. <span id="spanTotalVenta">540.20</span></h4>
								<label for="">Dinero del cliente (S/.):</label><br>
								<div class="input-group">
									<span class="input-group-btn mitooltip" title="Abrir el asistente de contador de monedas" >
										<button class="btn btn-morado btn-outline" type="button" id="btnContarMoneda" ><i class="icofont icofont-chart-pie-alt"></i></button>
									</span>
									<input type="number" class="form-control text-center txtMonedas control-morado" id="txtMonedaEnDuro" value="0" min=0 step=1><br>
								</div><!-- /input-group -->
								
								<label for="">Cambio a entregar:</label><br>
								<h4>S/. <span id="spanResiduoCambio">9.80</span></h4>
						</div>
					</div>
				</div><!-- fin de pane cielo-->
				<div class="row text-center" style="line-height: 60px;">
				<button class="btn btn-morado btn-outline btn-lg btn-block"><i class="icofont icofont-ui-calculator"></i> Completar la compra</button>
				<button class="btn btn-morado btn-outline btn-lg btn-block"><i class="icofont icofont-ui-rate-add"></i> Guardar en la memoria</button>
				<button class="btn btn-morado btn-outline btn-lg btn-block"><i class="icofont icofont-ui-rate-blank"></i> Liberar de la memoria</button>
				</div>
			</div><!-- fin de sm-3 -->
		</div>

		

		</div>
		<style>.divForm>.row{padding-bottom: 15px}</style>

		<!--Panel para nueva compra-->
		<div class="tab-pane fade " id="nuevo"><br>
		<div class="panel panel-negro">
			<div class="panel-heading">Datos generales de la nueva venta</div>
			<div class="panel-body container divForm">
				<div class="row">
					<div class="col-sm-5">
					<label for="">Razón social de proveedor:</label><br>
					<select class="selectpicker" title="Seleccione uno..." data-live-search="true" data-width="100%">
						<option>Farma Ahorro Sac</option>
						<option>Botica Año Nuevo Eirl</option>
						<option>Laboratorio Clinico Control y Desarrollo Sac</option>
						<option>Clinica Femenina Eirl</option>
						<option>Nova Dental Clinica Odontologia Sac</option>
					</select>

					</div>
					<div class="col-sm-3">
					<label for="">Serie de comprobante:</label>
					<input type="text" class="form-control">
					</div>
					<div class="col-sm-2">
						<label for="">Fecha de venta:</label>
						<input type="date" class="form-control"  id="dtpFechaComprobante" >
					</div>

				</div>
				<div class="row">
					<div class="col-sm-2">
						<label for="">Considerar:</label>
						<select class="selectpicker" data-width='100%'>
							<option value=true>Con IGV</option>
							<option value=false>Libre de Impuesto</option>
						</select>
					</div>
					<div class="col-sm-2">
						<label for="">Neto:</label>
						<input type="text" class="form-control" id="txtNetoCompra" disabled>
					</div>
					<div class="col-sm-2">
						<label for="">IGV:</label>
						<input type="text" class="form-control" id="txtIGVCompra" disabled>
					</div>
					<div class="col-sm-2">
						<label for="">Total:</label>
						<input type="number" class="form-control" placeholder="S/. 0.00" min=0 step=0.1 lang="en" id="txtTotalCompra">
					</div>
					<div class="col-sm-3">
						<label for="">¿Items con IGV?</label>
						<select  class="selectpicker" data-width="60%">
							<option value="1">Si</option>
							<option value="2">No</option>
						</select>
					</div>
				</div>
				
			</div>
		</div>

		<div class="panel panel-negro">
			<div class="panel-heading">Buscar producto</div>
			<div class="panel-body divForm">
				<div class="row">
					<div class="col-sm-9">
						<label for="">Búsqueda del producto:</label>
						<input type="text" class="form-control" placeholder="Puede buscar por nombre, por código o por lote del producto...">
					</div>

					<div class="col-sm-1"><label for=""></label>
						<button type="button" class="btn btn-success"><span class="glyphicon glyphicon-search"></span> Filtrar resultados</button>
					</div>
				</div>
				
				<div class="row"><hr>
					<div class="col-sm-8">
						<label for="">Nombre del producto:</label> <span id="lblNombreProductoCompra">Ibuprofeno</span>		
					</div>
					<div class="col-sm-4"><label for="">¿Vence?:</label> <select name="" id="cmbVenceCompra" class="selectpicker" data-width="50%">
						<option value=true>Sí</option>
						<option value=false>No</option></select>
					</div>
				</div>
			<div class="row container">
				<div class="col-sm-1"><label for="">Cantidad:</label> <input type="text" class="form-control" id="txtCantProductoCompra" placeholder="0"></div>				
				<div class="col-sm-2"><label for="">Lote:</label> <input type="text" class="form-control" id="txtLoteProductoCompra" placeholder="Ejm: LX11"></div>
				<div class="col-sm-3"><label for="">Fecha de vencimiento: </label><input type="date" class='form-control' id="dtpFechaVencimientoProductoCompra"></div>
				<div class="col-sm-2"><label for="">SubTotal</label><input type="text" class="form-control" id="txtSubTotalProductoCompra" placeholder="S/. 0.00"></div>				
				<div class="col-sm-1"><br><button class="btn btn-primary" id="btnAgregarListaCompras"><span class="glyphicon glyphicon-download"></span> Agregar Elemento</button></div>
			</div>
			<div class="row container">
				
				
			</div>
			</div>
		</div>

		<div class="panel panel-negro">
			<div class="panel-heading">Detalles de la venta</div>
			<div class="panel-body divForm">
				<div class="row">
					<div class="col-xs-1">#</div>
					<div class="col-xs-4">Producto</div>
					<div class="col-xs-1">Cantidad</div>
					<div class="col-xs-1">Lote</div>
					<div class="col-xs-2">Costo x Und.</div>
					<div class="col-xs-2">Sub-Total</div>
					<div class="col-xs-1"><span class="glyphicon glyphicon-flag"></span></div>
				</div>
			</div>
		</div>
		</div>
		<div class="tab-pane fade" id="todos">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque, placeat, a. Alias, amet perferendis molestias modi nobis labore voluptates debitis ab obcaecati quis quas eius inventore. Beatae, natus doloribus reprehenderit.</div>
	</div>
					<!-- Fin de meter contenido principal -->
					</div>
					
				</div>
		</div>
</div>
<!-- /#page-content-wrapper -->
</div><!-- /#wrapper -->

	<!-- Modal para mostrar el detalle de las facturas-->
	<div class="modal fade modal-detalleCompras " tabindex="-1" role="dialog">
		<div class="modal-dialog modal-lg ">
			<div class="modal-content">
				<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close" ><span aria-hidden="true">&times;</span></button> <!--Boton para cerrar-->
				<h4 class="modal-tittle purple-text text-darken-3">Detalle de Factura</h4></div>
				<div class="modal-body">
					<dl class="dl-horizontal">
						<dt>Proveedor:</dt> <dd class="col-xs-offset-1">Laboratorio Mi Farma S.R.L.</dd>
						<dt>Serie:</dt> <dd class="col-xs-offset-1">001-061584</dd>
						<dt>Fecha de registro:</dt> <dd class="col-xs-offset-1">Domingo, 15 de marzo de 2016 11:34 a.m.</dd>
						<dt>Registrador:</dt> <dd class="col-xs-offset-1">Carlos Pariona</dd>
						</dl>            
						<table class="table table-hover">
							<thead>
								<tr class="purple-text text-darken-3">
									<th>#</th> <th>Cant.</th> <th>Descripción de producto</th> <th>Costo Und.</th> <th>Importe</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>1</td> <td>16</td>
									<td>Red Bull lata 350ml</td>
									<td>5.00</td>
									<td>S/. 80.00</td>
								</tr>
								<tr>
									<td>2</td> <td>100</td>
									<td>Bicarbonato sódico frasco frambuesa x20 cápsulas</td>
									<td>1.60</td>
									<td>S/. 160.00</td>
								</tr>
								<tr>
									<td>3</td> <td>12</td>
									<td>Aciclovid calox 400mg x 30 tabletas</td>
									<td>22.79</td>
									<td>S/. 273.48</td>
								</tr>
								<tr>
									<td>4</td> <td>18</td>
									<td>Dolocam plus jarabe 50ml</td>
									<td>6.75</td>
									<td>S/. 121.50</td>
								</tr>
							</tbody>
						</table>
						<div class="col-xs-6 col-xs-offset-3">
							<dl class="dl-horizontal">
							<dt>Neto:</dt><dd>634.98</dd>
							<dt>IGV (18%):</dt><dd>114.30</dd>
							<dt>Total:</dt><dd>749.28</dd>
						</dl>
						</div>
						<br><br><br>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default">Ver cambios</button>
					<button type="button" class="btn btn-primary">Editar</button>
					<button type="button" class="btn btn-success" data-dismiss="modal">Aceptar</button>          
				</div>
			</div>
		</div>
	</div>

<!-- Modal para contar monedas -->
	<div class="modal fade modal-contarMonedas" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
	<div class="modal-dialog " role="document">
		<div class="modal-content">
			<div class="modal-header-wysteria">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel"><i class="icofont icofont-help-robot"></i> Contador de monedas ágil</h4>
			</div>
			<div class="modal-body">
				<p>Ingrese las unidades en cada valor de moneda:</p>
				<label for="">Billetes y monedas en Perú:</label>
				<div class="row espacioDoble">
					<div class="container-fluid">
						<div class="col-sm-2 text-right">
					<label class="">S/. 200: </label> <small></small>

					</div>
					<div class="col-sm-4">
						<div class="input-group">
							<span class="input-group-btn">
								<button class="btn btn-morado btn-outline  hidden-xs btn-restMoney" type="button"><i class="icofont icofont-minus-circle"></i></button>
							</span>
							<input type="number" class="form-control text-center" value="0" min=0 step="1">
							<span class="input-group-btn">
								<button class="btn btn-morado btn-outline  hidden-xs btn-addMoney" type="button"><i class="icofont icofont-plus-circle"></i></button>
							</span>
						</div>
					</div>
					<div class="col-sm-2 text-right">
						<label>S/. 100: </label> <small></small>
					</div>
					<div class="col-sm-4">
						<div class="input-group">
							<span class="input-group-btn">
								<button class="btn btn-morado btn-outline  hidden-xs btn-restMoney" type="button"><i class="icofont icofont-minus-circle"></i></button>
							</span>
							<input type="number" class="form-control text-center" value="0" min=0 step="1">
							<span class="input-group-btn">
								<button class="btn btn-morado btn-outline  hidden-xs btn-addMoney" type="button"><i class="icofont icofont-plus-circle"></i></button>
							</span>
						</div>
					</div>
					</div>

					<div class="container-fluid">
						<div class="col-sm-2 text-right">
					<label class="">S/. 50: </label> <small></small>
					</div>
					<div class="col-sm-4">
						<div class="input-group">
							<span class="input-group-btn">
								<button class="btn btn-morado btn-outline  hidden-xs btn-restMoney" type="button"><i class="icofont icofont-minus-circle"></i></button>
							</span>
							<input type="number" class="form-control text-center" value="0" min=0 step="1">
							<span class="input-group-btn">
								<button class="btn btn-morado btn-outline  hidden-xs btn-addMoney" type="button"><i class="icofont icofont-plus-circle"></i></button>
							</span>
						</div>
					</div>
					<div class="col-sm-2 text-right">
						<label>S/. 20: </label> <small></small>
					</div>
					<div class="col-sm-4">
						<div class="input-group">
							<span class="input-group-btn">
								<button class="btn btn-morado btn-outline  hidden-xs btn-restMoney" type="button"><i class="icofont icofont-minus-circle"></i></button>
							</span>
							<input type="number" class="form-control text-center" value="0" min=0 step="1">
							<span class="input-group-btn">
								<button class="btn btn-morado btn-outline  hidden-xs btn-addMoney" type="button"><i class="icofont icofont-plus-circle"></i></button>
							</span>
						</div>
					</div>
					</div>

					<div class="container-fluid">
						<div class="col-sm-2 text-right">
					<label class="">S/. 10: </label> <small></small>
					</div>
					<div class="col-sm-4">
						<div class="input-group">
							<span class="input-group-btn">
								<button class="btn btn-morado btn-outline  hidden-xs btn-restMoney" type="button"><i class="icofont icofont-minus-circle"></i></button>
							</span>
							<input type="number" class="form-control text-center" value="0" min=0 step="1">
							<span class="input-group-btn">
								<button class="btn btn-morado btn-outline  hidden-xs btn-addMoney" type="button"><i class="icofont icofont-plus-circle"></i></button>
							</span>
						</div>
					</div>
					<div class="col-sm-2 text-right">
						<label>S/. 5: </label> <small></small>
					</div>
					<div class="col-sm-4">
						<div class="input-group">
							<span class="input-group-btn">
								<button class="btn btn-morado btn-outline  hidden-xs btn-restMoney" type="button"><i class="icofont icofont-minus-circle"></i></button>
							</span>
							<input type="number" class="form-control text-center" value="0" min=0 step="1">
							<span class="input-group-btn">
								<button class="btn btn-morado btn-outline  hidden-xs btn-addMoney" type="button"><i class="icofont icofont-plus-circle"></i></button>
							</span>
						</div>
					</div>
					</div>

					<div class="container-fluid">
						<div class="col-sm-2 text-right">
					<label class="">S/. 2: </label> <small></small>
					</div>
					<div class="col-sm-4">
						<div class="input-group">
							<span class="input-group-btn">
								<button class="btn btn-morado btn-outline  hidden-xs btn-restMoney" type="button"><i class="icofont icofont-minus-circle"></i></button>
							</span>
							<input type="number" class="form-control text-center" value="0" min=0 step="1">
							<span class="input-group-btn">
								<button class="btn btn-morado btn-outline  hidden-xs btn-addMoney" type="button"><i class="icofont icofont-plus-circle"></i></button>
							</span>
						</div>
					</div>
					<div class="col-sm-2 text-right">
						<label>S/. 1:</label> <small></small>
					</div>
					<div class="col-sm-4">
						<div class="input-group">
							<span class="input-group-btn">
								<button class="btn btn-morado btn-outline  hidden-xs btn-restMoney" type="button"><i class="icofont icofont-minus-circle"></i></button>
							</span>
							<input type="number" class="form-control text-center" value="0" min=0 step="1">
							<span class="input-group-btn">
								<button class="btn btn-morado btn-outline  hidden-xs btn-addMoney" type="button"><i class="icofont icofont-plus-circle"></i></button>
							</span>
						</div>
					</div>
					</div>

					<div class="container-fluid">
						<div class="col-sm-2 text-right">
					<label class="">S/. 0.50: </label> <small></small>
					</div>
					<div class="col-sm-4">
						<div class="input-group">
							<span class="input-group-btn">
								<button class="btn btn-morado btn-outline  hidden-xs btn-restMoney" type="button"><i class="icofont icofont-minus-circle"></i></button>
							</span>
							<input type="number" class="form-control text-center" value="0" min=0 step="1">
							<span class="input-group-btn">
								<button class="btn btn-morado btn-outline  hidden-xs btn-addMoney" type="button"><i class="icofont icofont-plus-circle"></i></button>
							</span>
						</div>
					</div>
					<div class="col-sm-2 text-right">
						<label>S/. 0.20: </label> <small></small>
					</div>
					<div class="col-sm-4">
						<div class="input-group">
							<span class="input-group-btn">
								<button class="btn btn-morado btn-outline  hidden-xs btn-restMoney" type="button"><i class="icofont icofont-minus-circle"></i></button>
							</span>
							<input type="number" class="form-control text-center" value="0" min=0 step="1">
							<span class="input-group-btn">
								<button class="btn btn-morado btn-outline  hidden-xs btn-addMoney" type="button"><i class="icofont icofont-plus-circle"></i></button>
							</span>
						</div>
					</div>
					</div>

					<div class="container-fluid">
						<div class="col-sm-2 text-right">
					<label class="">S/. 0.10: </label> <small></small>
					</div>
					<div class="col-sm-4">
						<div class="input-group">
							<span class="input-group-btn">
								<button class="btn btn-morado btn-outline  hidden-xs btn-restMoney" type="button"><i class="icofont icofont-minus-circle"></i></button>
							</span>
							<input type="number" class="form-control text-center" value="0" min=0 step="1">
							<span class="input-group-btn">
								<button class="btn btn-morado btn-outline  hidden-xs btn-addMoney" type="button"><i class="icofont icofont-plus-circle"></i></button>
							</span>
						</div>
					</div>
					</div>
					
				</div>
				
			</div>
			<div class="modal-footer">
			<span class="pull-left"><h4>Cantidad: S/. <span id="spanSumaMonedas">-</span></h4></span>
			<button class="btn btn-morado btn-outline" data-dismiss="modal" id="btnPasarMonedas"><i class="icofont icofont-swoosh-right"></i> Pasar el valor final</button></div>
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
	$('#dtpFechaComprobante').val(moment().format('YYYY-MM-DD'));
		$('#dtpFechaVencimientoProductoCompra').val(moment().format('YYYY-MM-DD'));
		$('.mitooltip').tooltip();
		$('.mitooltipTipo').mouseover(function(){
			var rowindex = $(this).closest('tr').index();
			filaTool="#tool"+(rowindex+1)
			//console.log(filaTool);
			switch($(filaTool).html()){
				case 'F': $(filaTool).attr('title','Factura'); break;
				case 'B': $(filaTool).attr('title','Boleta'); break;
				case 'T': $(filaTool).attr('title','Ticket'); break;
			}
			$(filaTool).tooltip('show');
		});
		$('.mitooltipTipo').mouseleave(function(){
			var rowindex = $(this).closest('tr').index();
			filaTool="#tool"+(rowindex+1)
			$(filaTool).tooltip('destroy');
		});

		$('#txtTotalCompra').focusout(function () {
			if($(this).val()<0){$(this).val(0);}
			var neto=($(this).val()/1.18).toFixed(2);
			var igvCalc= ($(this).val()-neto).toFixed(2);
			$('#txtNetoCompra').val(neto);
			$('#txtIGVCompra').val(igvCalc);


		});
		$("input").focus(function(){	   
			this.select();
		});

		$('#cmbVenceCompra').on('changed.bs.select',function(){
			console.log($(this).val())
			if($(this).val()=='false'){console.log('deberia eliminar')
			$('#dtpFechaVencimientoProductoCompra').attr('disabled', true);}
		else{$('#dtpFechaVencimientoProductoCompra').attr('disabled', false);}
		});

		$('#btnAgregarListaCompras').click(function(){

		});
		$('.tablaResultadosCompras').on('click', '.btnAumentarCantidad',function () {
			var valorAnt=$(this).parent().parent().find('input').val();
			$(this).parent().parent().find('input').val(parseInt(valorAnt)+1);
		});
		$('.tablaResultadosCompras').on('click', '.btnRestarCantidad',function () {
			var valorAnt=$(this).parent().parent().find('input').val();
			if(valorAnt!=1){$(this).parent().parent().find('input').val(parseInt(valorAnt)-1);}
		});

	
	$('.selectpicker').selectpicker('refresh');



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
	$('#sandbox-container .input-group.date').datepicker({
		language: "es", orientation: "top auto", daysOfWeekHighlighted: "0", autoclose: true, todayHighlight: true});
}
$('body').on('focusout','.txtMonedas',function () {
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


$(".ocultar-mostrar-menu").click(function() {
	ocultar()
});
function ocultar(){console.log('oc')
	$("#wrapper").toggleClass("toggled");
	//$('.navbar-fixed-top').css('left','0');
	$('.navbar-fixed-top').toggleClass('encoger');
	$('#btnColapsador').addClass('collapsed');
	$('#btnColapsador').attr('aria-expanded','false');
	$('#navbar').removeClass('in');
}
$('.has-clear').mouseenter(function(){$(this).find('input').focus();})

$('.has-clear input[type="text"]').on('input propertychange', function() {
	var $this = $(this);
	var visible = Boolean($this.val());
	$this.siblings('.form-control-clear').toggleClass('hidden', !visible);
}).trigger('propertychange');

$('.form-control-clear').click(function() {
	$(this).siblings('input[type="text"]').val('')
		.trigger('propertychange').focus();
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
	
})

$('#btnBuscarPorAñoInventario').click(function () {
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
function calcularVentaVsMonedas(moneda ){
	var total=parseFloat($('#spanTotalVenta').text());
	var monedaInput=parseFloat(moneda);
	var differ=monedaInput-total;
	if(differ==0){$('#spanResiduoCambio').text('Sin vuelto'); $('#spanResiduoCambio').addClass('text-danger');}
	if(differ<0){$('#spanResiduoCambio').text('Falta '+Math.abs(differ).toFixed(2)); $('#spanResiduoCambio').addClass('purple-text text-darken-3');}
	if(differ>0){$('#spanResiduoCambio').text(differ.toFixed(2)); $('#spanResiduoCambio').addClass('purple-text text-darken-3');}
}
$('#txtMonedaEnDuro').focusout(function () {
	calcularVentaVsMonedas($(this).val());
});
$('#btnContarMoneda').click(function () {
	$('.modal-contarMonedas').modal('show');
});
$('.btn-addMoney').click(function () {
	var previo=parseInt($(this).parent().prev().val());
	$(this).parent().prev().val(previo+1);
	calculoTotalMonedas();
});
$('.btn-restMoney').click(function () {
	var previo=parseInt($(this).parent().next().val());
	if(previo<=0){
		$(this).parent().next().val(0)
	}else{$(this).parent().next().val(previo-1)}
	calculoTotalMonedas();
});
$('.modal-contarMonedas input').keyup(function () {
	if($(this).val()==""){$(this).val(0)}
	calculoTotalMonedas();
});

function calculoTotalMonedas(){
	var bil200=parseInt($('.modal-contarMonedas input').eq(0).val())*200;
	var bil100=parseInt($('.modal-contarMonedas input').eq(1).val())*100;
	var bil50=parseInt($('.modal-contarMonedas input').eq(2).val())*50;
	var bil20=parseInt($('.modal-contarMonedas input').eq(3).val())*20;
	var bil10=parseInt($('.modal-contarMonedas input').eq(4).val())*10;
	var mon5=parseInt($('.modal-contarMonedas input').eq(5).val())*5;
	var mon2=parseInt($('.modal-contarMonedas input').eq(6).val())*2;
	var mon1=parseInt($('.modal-contarMonedas input').eq(7).val());
	var mon50=parseInt($('.modal-contarMonedas input').eq(8).val())*0.5;
	var mon20=parseInt($('.modal-contarMonedas input').eq(9).val())*0.2;
	var mon10=parseInt($('.modal-contarMonedas input').eq(10).val())*0.1;

	$('.modal-contarMonedas small').eq(0).text(bil200.toFixed(2));
	$('.modal-contarMonedas small').eq(1).text(bil100.toFixed(2));
	$('.modal-contarMonedas small').eq(2).text(bil50.toFixed(2));
	$('.modal-contarMonedas small').eq(3).text(bil20.toFixed(2));
	$('.modal-contarMonedas small').eq(4).text(bil10.toFixed(2));
	$('.modal-contarMonedas small').eq(5).text(mon5.toFixed(2));
	$('.modal-contarMonedas small').eq(6).text(mon2.toFixed(2));
	$('.modal-contarMonedas small').eq(7).text(mon1.toFixed(2));
	$('.modal-contarMonedas small').eq(8).text(mon50.toFixed(2));
	$('.modal-contarMonedas small').eq(9).text(mon20.toFixed(2));
	$('.modal-contarMonedas small').eq(10).text(mon10.toFixed(2));

	sumaTodo=bil200+bil100+bil50+bil20+bil10+mon5+mon2+mon1+mon50+mon20+mon10;
	$('#spanSumaMonedas').text(sumaTodo.toFixed(2))
}
$('#btnPasarMonedas').click(function () {
	calculoTotalMonedas();
	$('#txtMonedaEnDuro').val($('#spanSumaMonedas').text());
	$('#txtMonedaEnDuro').focusout();
});
$('.tablaResultadosCompras').on('click', '.eliminarRowVenta',function () {
	$(this).parent().parent().remove();calcularRowTabla()
});

function calcularRowTabla(){
	$('#itemsCesta').text($('.tablaResultadosCompras tbody tr').length)
}
$('#btn-BuscarProductoVenta').click(function () {
	$('.tablaResultadosCompras tbody').append(`<tr> <th ><button type="button" class="btn btn-danger btn-xs btn-outline eliminarRowVenta"><i class="icofont icofont-error"></i></button> 1.</th> <td class="col-xs-4">Elemento 1 Composición ABC</td> <td class="col-xs-4 col-sm-3 text-center">
							<div class="input-group">
								<span class="input-group-btn">
									<button class="btn btn-morado btn-outline btnRestarCantidad hidden-xs" type="button"><i class="icofont icofont-minus-circle"></i></button>
								</span>
								<input type="number" class="form-control text-center control-morado" value="1" min=1>
								<span class="input-group-btn">
									<button class="btn btn-morado btn-outline btnAumentarCantidad hidden-xs" type="button"><i class="icofont icofont-plus-circle"></i></button>
								</span>
							</div><!-- /input-group --></td>
						<td class="col-sm-1 text-center"> <span>S/. 43</span></td> <td class="text-center">S/. 0.69</td> <td class="text-center">S/. <span class="spanSubTotal">42.00</span></td> </tr>`);
	calcularRowTabla();
});


</script>

</body>

</html>
