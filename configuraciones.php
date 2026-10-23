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
							<li><a href="#tabAgregarLabo" data-toggle="tab">Laboratorios</a></li>
							<li><a href="#tabCategorias" data-toggle="tab">Categorías</a></li>

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
								<!--Inicio de pestaña laboratorios-->
								<button class="btn btn-success btn-outline" @click="crearLaboratorio()">Nuevo Laboratorio</button>
								<p>Listado de todos los laboratorios registrados:</p>
								<table class="table table-hover">
									<thead>
										<tr>
											<th>N°</th>
											<th>Laboratorio</th>
											<th>@</th>
										</tr>
									</thead>
									<tbody>
										<tr v-for="(laboratorio, index) in laboratorios" >
											<td>{{index+1}}</td>
											<td class="text-capitalize">{{laboratorio.labNombre}}</td>
											<td>
												<button class="btn btn-primary btn-outline btn-sm " @click="editarLaboratorio(laboratorio.idLaboratorio, index)" style="margin: 0 0.5em"><i class="icofont icofont-edit"></i></button>
												<button class="btn btn-danger btn-outline btn-sm " @click="borrarLaboratorio(laboratorio.idLaboratorio, index)" style="margin: 0 0.5em"><i class="icofont icofont-ui-delete"></i></button>
											</td>
										</tr>
									</tbody>
								</table>
								<!--Fin de pestaña laboratorios-->
							</div>
							<div class="tab-pane fade container-fluid" id="tabCategorias">
								<!--Inicio de pestaña categorías -->
								<button class="btn btn-success btn-outline" @click="crearCategoria()">Nueva categoria</button>
								<p>Listado de todos las categorías registradas:</p>
								<table class="table table-hover">
									<thead>
										<tr>
											<th>N°</th>
											<th>Categorías</th>
											<th>@</th>
										</tr>
									</thead>
									<tbody>
										<tr v-for="(categoria, index) in categorias" >
											<td>{{index+1}}</td>
											<td class="text-capitalize">{{categoria.catprodDescipcion}}</td>
											<td>
												<button class="btn btn-primary btn-outline btn-sm " @click="editarCategoria(categoria.idCategoriaProducto, index)" style="margin: 0 0.5em"><i class="icofont icofont-edit"></i></button>
												<button class="btn btn-danger btn-outline btn-sm " @click="borrarCategoria(categoria.idCategoriaProducto, index)" style="margin: 0 0.5em"><i class="icofont icofont-ui-delete"></i></button>
											</td>
										</tr>
									</tbody>
								</table>
								<!--Fin de pestaña categorías -->
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
									<button class="btn btn-primary btn-block has-clear" @click="crearNuevoUsuario" id="btnCrearUsuario">Crear usuario</button>

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
	<script src="https://unpkg.com/vue@3"></script>


	<!-- Menu Toggle Script -->
	<script>
	$(document).ready(function() {

		$('.selectpicker').selectpicker('refresh');
		$('.mitooltip').tooltip();
	});

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
<script>
  const { createApp } = Vue

  createApp({
    data() {
      return {
        laboratorios:[], categorias:[], idElegido: -1
      }
    },
		mounted(){
			this.listarLabs();
			this.listarCategorias();
		},
		methods:{
			async listarLabs(){
				let resp = await fetch('php/config/listarLaboratoriosJSON.php');
				this.laboratorios = await resp.json();
			},
			async crearLaboratorio(){
				var texto = '';
				if(  texto = prompt('¿Cuál es el nuevo laboratorio?') ){
					let datos = new FormData();
					datos.append('nombre', texto)
					let resp = await fetch('php/config/insertLaboratorio.php',{
						method:'POST', body:datos
					});
					var respuesta =await resp.text();
					if( parseInt(respuesta)>0){
						this.laboratorios.push({
							idLaboratorio: respuesta,
							catprodDeslabNombrecipcion: texto
						});
						alert('Se creó exitosamente')
					}else{
						alert('Hubo un error en la operación');
					}
				}
			},
			async editarLaboratorio(idLaboratorio, mIndex){
				var texto = '';
				if(  texto = prompt('¿Cuál es el nombre al que desea cambiar?', this.laboratorios[mIndex].labNombre ) ){
					let datos = new FormData();
					datos.append('id', idLaboratorio)
					datos.append('nombre', texto)
					let resp = await fetch('php/config/updateLaboratorio.php',{
						method:'POST', body:datos
					});
					if(await resp.text()=='ok'){
						this.laboratorios[mIndex].labNombre = texto;
					}else{
						alert('Hubo un error en la operación');
					}

				}
			},
			async borrarLaboratorio(idLaboratorio, mIndex){
				if( confirm('¿Desea eliminar el laboratorio ' + this.laboratorios[mIndex].labNombre + '?' ) ){
					let datos = new FormData();
					datos.append('id', idLaboratorio)
					let resp = await fetch('php/config/deleteLaboratorio.php',{
						method:'POST', body:datos
					});
					if(await resp.text()=='ok'){
						this.laboratorios.splice(mIndex,1)
					}else{
						alert('Hubo un error en la operación');
					}

				}
			},
			async crearNuevoUsuario(){
				<?php if(in_array($_COOKIE['ckPower'], $soloAdmis)):?>
					let datos = new FormData();
					datos.append('nombre', $('#txtNombre').val());
					datos.append('apellidos', $('#txtApellidos').val());
					datos.append('usuario', $('#txtUsuario').val());
					datos.append('passw', $('#txtContrasena').val());
					datos.append('nivel', $('#sltNiveles').val());
					let resp = await fetch('php/config/crearUsuario.php',{
						method:'POST', body:datos
					});
					if(await resp.text()=='ok'){
						alert('Usuario creado con éxito');
						location.reload();
					}else{
						alert('Hubo un error en la operación');
					}
				<?php endif; ?>
			},
			async listarCategorias(){
				let resp = await fetch('php/config/listarCategorias.php');
				this.categorias = await resp.json();
			},
			async crearCategoria(){
				var texto = '';
				if(  texto = prompt('¿Cuál es la nueva categoría?') ){
					let datos = new FormData();
					datos.append('nombre', texto)
					let resp = await fetch('php/config/insertCategoria.php',{
						method:'POST', body:datos
					});
					var respuesta =await resp.text();
					if( parseInt(respuesta)>0){
						this.categorias.push({
							idCategoriaProducto: respuesta,
							catprodDescipcion: texto
						});
						alert('Se creó exitosamente')
					}else{
						alert('Hubo un error en la operación');
					}
				}
			},
			async editarCategoria(idCategoria, mIndex){
				var texto = '';
				if(  texto = prompt('¿Cuál es el nombre al que desea cambiar?', this.categorias[mIndex].catprodDescipcion ) ){
					let datos = new FormData();
					datos.append('id', idCategoria)
					datos.append('nombre', texto)
					let resp = await fetch('php/config/updateCategoria.php',{
						method:'POST', body:datos
					});
					if(await resp.text()=='ok'){
						this.categorias[mIndex].catprodDescipcion = texto;
					}else{
						alert('Hubo un error en la operación');
					}
				}
			},
			async borrarCategoria(idCategoria, mIndex){
				if( confirm('¿Desea eliminar el laboratorio ' + this.categorias[mIndex].catprodDescipcion + '?' ) ){
					let datos = new FormData();
					datos.append('id', idCategoria)
					let resp = await fetch('php/config/deleteCategoria.php',{
						method:'POST', body:datos
					});
					if(await resp.text()=='ok'){
						this.categorias.splice(mIndex,1)
					}else{
						alert('Hubo un error en la operación');
					}

				}
			},
			
		}
  }).mount('#wrapper')
</script>

</body>

</html>