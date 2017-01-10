<!DOCTYPE html>
<html lang="en">

<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>Inicio: Info-Farma</title>

		<!-- Bootstrap Core CSS -->
		<link href="css/bootstrap.css" rel="stylesheet">

		<!-- Custom CSS -->
		<link href="css/estilosElementosv2.css" rel="stylesheet">	
		<link href="css/sidebarDeslizable.css" rel="stylesheet">
		<link rel="stylesheet" href="css/cssBarraTop.css">
		<link rel="stylesheet" href="css/icofont.css">
		<link rel="stylesheet" href="css/animate.css">
		<link rel="stylesheet" href="css/pacifico.css">

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
				<li class="active">
						<a href="index.php"><i class="icofont icofont-space-shuttle"></i> Inicio</a>
				</li>
				<li>
						<a href="#"><i class="icofont icofont-users"></i> Usuarios</a>
				</li>
				<li>
						<a href="#"><i class="icofont icofont-blood"></i> Productos</a>
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
				<li >
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
					<a class="navbar-brand ocultar-mostrar-menu" href="#"><img class="img-responsive" src="images/logo.png"  alt=""></a>
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
				<div class="col-lg-12 contenedorDeslizable fondoGeo">
				<!-- Empieza a meter contenido principal dentro de estas etiquetas -->
				 <h2 class="blue-text text-darken-1"><i class="icofont icofont-animal-cat-alt-4"></i> Bienvenido: <small>Software Info-Farma v1.0.1.a</small> <small class="blue-text text-lighten-3">2017.01.10</small></h2>
	
	
				<div class="row">
				<div class="col-sm-6 col-md-3">
					<div class="thumbnail">
					 <!-- <img src="images/cara.jpg" alt="...">-->
						<div class="caption">
							<p class="text-center"><a href="ventas.php" class="btn btn-warning btn-outline btn-circle-grande" role="button"><i class="icofont icofont-cart-alt"></i></a> </p>
							<h3 class="text-center">Realizar una nueva venta</h3 >
							
							
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-3">
					<div class="thumbnail">
					 <!-- <img src="images/cara.jpg" alt="...">-->
						<div class="caption">
							<p class="text-center"><a href="#" class="btn btn-success btn-outline btn-circle-grande	" role="button"><i class="icofont icofont-herbal"></i></a> </p>
							<h3 class="text-center">Crear un producto nuevo</h3 >
							
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-3">
					<div class="thumbnail">
						<!-- <img src="images/cara.jpg" alt="...">-->
						<div class="caption">
							<p class="text-center"><a href="ventas.php" class="btn btn-negro btn-outline btn-circle-grande	" role="button"><i class="icofont icofont-money-bag"></i></a> </p>
							<h3 class="text-center">Cerrar caja</h3 class="text-center">
							
							
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-3">
					<div class="thumbnail">
						<!-- <img src="images/cara.jpg" alt="...">-->
						<div class="caption">
							<p class="text-center"><a href="compras.php" class="btn btn-info btn-outline btn-circle-grande	" role="button"><i class="icofont icofont-meeting-add"></i></a> </p>
							<h3 class="text-center">Ingresar nueva compra</h3 >
							
							
						</div>
					</div>
				</div>
					<div class="col-sm-6 col-md-3">
					<div class="thumbnail">
						<!-- <img src="images/cara.jpg" alt="...">-->
						<div class="caption">
							<p class="text-center"><a href="#" class="btn btn-morado btn-outline btn-circle-grande	" role="button"><i class="icofont icofont-businessman"></i></a> </p>
							<h3 class="text-center">Ingresar un proveedor</h3>
							
							
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-3">
					<div class="thumbnail">
						<!-- <img src="images/cara.jpg" alt="...">-->
						<div class="caption">
							<p class="text-center"><a href="#" class="btn btn-morita btn-outline btn-circle-grande	" role="button"><i class="icofont icofont-industries-alt-5"></i></a> </p>
							<h3 class="text-center">Ingresar un Laboratorio</h3>
							
							
						</div>
					</div>
				</div>
					<div class="col-sm-6 col-md-3">
					<div class="thumbnail">
						<!-- <img src="images/cara.jpg" alt="...">-->
						<div class="caption">
							<p class="text-center"><a href="#" class="btn btn-primary btn-outline btn-circle-grande	" role="button"><i class="icofont icofont-growth"></i></a> </p>
							<h3 class="text-center">Ver todas las compras</h3>        
							
						</div>
					</div>
				</div>
					<div class="col-sm-6 col-md-3">
					<div class="thumbnail">
						<!-- <img src="images/cara.jpg" alt="...">-->
						<div class="caption">
							<p class="text-center"><a href="inventario.php#nuevoInventario" class="btn btn-indigo btn-outline btn-circle-grande" role="button"><i class="icofont icofont-list"></i></a> </p>
							<h3 class="text-center">Ingresar inventario</h3>
											
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-3">
					<div class="thumbnail">
						<!-- <img src="images/cara.jpg" alt="...">-->
						<div class="caption">
							<p class="text-center"><a href="#" class="btn btn-success btn-outline btn-circle-grande	" role="button"><i class="icofont icofont-files"></i></a> </p>
							<h3 class="text-center">Solicitar reportes</h3>
											
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-3">
					<div class="thumbnail">
						<!-- <img src="images/cara.jpg" alt="...">-->
						<div class="caption">
							<p class="text-center"><a href="#" class="btn btn-danger btn-outline btn-circle-grande	" role="button"><i class="icofont icofont-paw"></i></a> </p>
							<h3 class="text-center">Otras configuraciones</h3>
											
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
