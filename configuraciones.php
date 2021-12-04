<!DOCTYPE html>
<html lang="es">

<head>
	<title>Configuración: Info-Farma</title>

	<?php include 'headers.php';
	include 'php/variablesGlobales.php'; ?>

</head>

<body>

	<div id="wrapper">

		<?php $pagina = 'configuraciones'; include 'menu-wrapper.php'; ?>

		<!-- Page Content -->
		<div id="page-content-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12 contenedorDeslizable">
						<!-- Empieza a meter contenido principal dentro de estas etiquetas -->
						<h2><i class="icofont icofont-options"></i> Panel de configuraciones generales</h2>

						<ul class="nav nav-tabs">
							<li class="active"><a href="#tabCambiarPassUser" data-toggle="tab">Cambiar contraseña</a></li>
							<li><a href="#tabUsuariosNuevos" data-toggle="tab">Agregar usuario</a></li>
							<li><a href="#tabAgregarLabo" data-toggle="tab">Agregar laboratorio</a></li>

						</ul>

						<div class="tab-content">
							<!--Panel para buscar productos-->
							<!--Clase para las tablas-->

							<div class="tab-pane fade in active container-fluid" id="tabCambiarPassUser">
								<!--Inicio de pestaña 02-->
								<div class="row">
									<div class="col-md-6">
										<p>Contraseña actual </p>
										<input type="password" class="form-control" id="txtPassAct">
										<p>Contraseña Nueva </p>
										<input type="password" class="form-control" id="txtPassNew">
										<p>Repita su nueva Contraseña</p>
										<input type="password" class="form-control" id="txtPassReNew">
										<button class="btn btn-primary has-clear" id="btnCambiarPassw">Cambiar</button>
									</div>
								</div>
								<!--Fin de pestaña 02-->
							</div>

							<div class="tab-pane fade container-fluid" id="tabAgregarLabo">
								<!--Inicio de pestaña 01-->
								<p>Listado de todos los laboratorios registrados:</p>
								<div class="row">
									<div class="col-sm-1">Cod. Int</div>
									<div class="col-sm-4">Nombre de Laboratorio</div>
								</div>
								<div id="divListadoLaboratorio">

								</div>

								<!--Fin de pestaña 01-->
							</div>

							<div class="tab-pane fade container-fluid" id="tabUsuariosNuevos">
								<div class="col-md-5">
									<div class="row">
										<label for="">Nombre</label>
										<input type="text" class="form-control" autocomplete="nope" id="txtNombre">
									</div>
									<div class="row">
										<label for="">Apellidos</label>
										<input type="text" class="form-control" autocomplete="nope" id="txtApellidos">
									</div>
									<div class="row">
										<label for="">Usuario</label>
										<input type="text" class="form-control" autocomplete="nope" id="txtUsuario">
									</div>
									<div class="row">
										<label for="">Contraseña</label>
										<input type="text" class="form-control" autocomplete="nope" id="txtContrasena">
									</div>
									<div class="row">
										<label for="">Nivel</label>
										<select name="" id="sltNiveles" class="form-control">
											<option value="1">Administrador</option>
											<option value="2">Caja</option>
											<option value="3">Sin privilegios</option>
										</select>
									</div>
									<button class="btn btn-primary btn-block has-clear" id="btnCrearUsuario">Crear usuario</button>

								</div>
								<div class="col-md-5">
									<h3>Usuarios en el sistema</h3>
									<table class="table table-hover">
										<tbody>
											<?php require 'php/config/listarUsuariosSistema.php'; ?>
										</tbody>
									</table>
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

	<!-- Modal para: borrar un usuario-->
	<div class='modal fade ' id="modalBorrarUsuario" tabindex='-1' role='dialog' aria-hidden='true'>
		<div class='modal-dialog modal-sm' >
		<div class='modal-content '>
			<div class='modal-header-danger'>
				<button type='button' class='close' data-dismiss='modal' aria-label='Close' ><span aria-hidden='true'>&times;</span></button>
				<h4 class='modal-tittle'> Eliminar usuario</h4>
			</div>
			<div class='modal-body'>
				<p>¿Desea borrar al usuario?</p>
			</div>
			<div class='modal-footer'>
				<button type='button' class='btn btn-danger' id="btnBorrarUsuarioDef">Borrar usuario</button>
			</div>
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
	$(document).ready(function() {

		$('.selectpicker').selectpicker('refresh');
		$('.mitooltip').tooltip();
		listarLabs();

	});

	function listarLabs() {
		$.ajax({
			url: 'php/config/listarLaboratoriosJSON.php',
			type: 'POST'
		}).done(function(resp) {

			$.each(JSON.parse(resp), function(index, elem) {
				//console.log(elem)
				$('#divListadoLaboratorio').append(`<div class="row">
			<div class="col-sm-1">${elem.idLaboratorio}</div>
			<div class="col-sm-4 mayuscula">${elem.labNombre}</div>
		</div>`);
			})

		});

	}
	$('#btnCambiarPassw').click(function() {
		$.ajax({
			url: 'php/config/cambiarContrasena.php',
			type: 'POST',
			data: {
				txtPassAct: $('#txtPassAct').val()
			}
		}).done(function(resp) {
			console.log(resp)
		});
	});
	$('#txtUsuario').focusout(function() {
		
		$.ajax({url: 'php/config/buscarUsuarioDuplicado.php', type: 'POST', data: { nick: $('#txtUsuario').val() }}).done(function(resp) {
			if( parseInt(resp)>0){
				$.crearUsuario = false;
				alert('Usuario Duplicado, ponga otro usuario sino no podrá guardar.');
			}else{
				$.crearUsuario = true;
			}
		});
	});
	$('#btnCrearUsuario').click(function() {
		if($.crearUsuario){
			$.ajax({url: 'php/config/crearUsuario.php', type: 'POST', data: {nombre: $('#txtNombre').val(), apellidos: $('#txtApellidos').val(), usuario: $('#txtUsuario').val(), passw: $('#txtContrasena').val(), 
				nivel: $('#sltNiveles').val() }}).done(function(resp) {
				console.log(resp)
				if(resp=='ok'){
					alert('Usuario creado con éxito');
					location.reload();
				}
			});
		}
	});
	function borrarUsuario(user){
		$.idUser= user;
		$('#modalBorrarUsuario').modal('show');
	}
	$('#btnBorrarUsuarioDef').click(function() {
		$.ajax({url: 'php/config/eliminarUsuario.php', type: 'POST', data: { idUser: $.idUser }}).done(function(resp) {
			console.log(resp)
			if(resp=='ok'){
				location.reload();
			}
		});
	});
	</script>

</body>

</html>