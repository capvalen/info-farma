<?php 
global $nomArchivo;
global $pagActual;
$GLOBALS['nomArchivo'] = str_replace( '.php', '', trim(basename($_SERVER['PHP_SELF'])));


function casoActivo($quePagina){
	if($GLOBALS['nomArchivo'] == $quePagina ){ echo 'class="active"'; }
	
}
?>
<style>
@media (max-width: 750px){
	.form-control-feedback{
		top: 15px;
	}
}
</style>
<!-- Sidebar -->
<div id="sidebar-wrapper">
	<ul class="sidebar-nav">
			<div class="sidebar-brand ocultar-mostrar-menu hidden" >
					<a href="#">
							Control Panel
					</a>
			</div>
			<div class="logoEmpresa ocultar-mostrar-menu">
				<img class="img-responsive" src="images/farmacovid.png?v=1.1" alt="">
			</div>
			<li <?php casoActivo('principal'); ?>>
					<a href="principal.php"><i class="icofont icofont-space-shuttle"></i> Inicio</a>
			</li>
			<!-- <li <?php casoActivo('#'); ?>>
					<a href="#"><i class="icofont icofont-users"></i> Usuarios</a>
			</li> -->
			<li <?php casoActivo('productos'); ?>>
					<a href="productos.php"><i class="icofont icofont-blood"></i> Productos</a>
			</li>
			<li <?php casoActivo('caja'); ?>>
					<a href="caja.php"><i class="icofont icofont-tick-boxed"></i> Caja</a>
			</li>
			<li <?php casoActivo('ventas'); ?>>
					<a href="ventas.php"><i class="icofont icofont-cart"></i> Ventas</a>
			</li>
			<li <?php casoActivo('reportes'); ?>>
					<a href="reportes.php"><i class="icofont icofont-envelope-open"></i> Reportes</a>
			</li>
			<!-- <li>
					<a href="inventario.php"><i class="icofont icofont-prescription"></i> Inventario</a>
			</li> -->
			<li <?php casoActivo('configuraciones'); ?>>
					<a href="configuraciones.php"><i class="icofont icofont-options"></i> Configuración</a>
			</li>
			<li>
					<a href="#!" class="ocultar-mostrar-menu"><i class="icofont icofont-logout"></i> Ocultar menú</a>
			</li>
	</ul>
</div>
<!-- /#sidebar-wrapper -->
<div class="navbar-wrapper">
	
	<nav class="navbar navbar-fixed-top encoger">
		<div class="container-fluid">
			<div class="row">
				<div class="navbar-header col">
				<a class="navbar-brand ocultar-mostrar-menu" href="#"  ><img class="img-responsive" src="images/infocat.png" style="max-height: 70px;"></a>
						<button type="button" class="navbar-toggle collapsed" id="btnColapsador" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						</button>
						
				</div>
				<div id="navbar" class="navbar-collapse collapse col-auto">
						<ul class="nav navbar-nav">
							<li class="hidden down"><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">HR <span class="caret"></span></a>
										<ul class="dropdown-menu">
												<li><a href="#">Change Time Entry</a></li>
												<li><a href="#">Report</a></li>
										</ul>
								</li>
						</ul>
						<ul class="nav navbar-nav navbar-right" style="padding: 0 20px;">
								<li>
								<div class="btn-group has-clear" style="width:100%"><small class=" visible-xs" style="color:white;">Buscar algo:</small> 
									<input type="text" class="form-control" id="txtBuscarNivelGod" placeholder="&#xeded;" autocomplete="off">
									<span class="form-control-clear glyphicon glyphicon-remove-circle form-control-feedback hidden"></span>
								</div>
								</li>
								<li id="liDatosPersonales"><a href="#!" ><p><strong>Usuario: </strong> <span id="menuNombreUsuario"><?php echo $_COOKIE['cknomCompleto']; ?></span></p><small class="text-muted text-center" id="menuFecha"><span id="fechaServer"></span> <span id="horaServer"><?php require('php/gethora.php') ?></span> </small></a></li>
								<li class="text-center"><a href="php/desconectar.php"><span class="visible-xs">Cerrar Sesión</span><i class="icofont icofont-sign-out"></i></a></li>
						</ul>
						
				</div>
			</div>
		</div>
	</nav>
	
</div>