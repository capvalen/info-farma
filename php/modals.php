<!-- Modal para decir que todo guardo bien  -->
<div class="modal fade modal-GuardadoCorrecto" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
<div class="modal-dialog modal-sm" role="document">
	<div class="modal-content">
		<div class="modal-header-blanco">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel"><i class="icofont icofont-social-readernaut"></i> Datos guardados</h4>
		</div>
		<div class="modal-body">
			<div class="container-fluid">
			<div class="row">
			<img src="images/path4585.png?ver=1.1" class="img-responsive" alt=""><br>
			<p class="text-center blue-text text-darken-1"><strong>Tu información fue guardada:</strong></p>
			<div class="text-center blue-text text-darken-1"><span id="spanBien"></span><h3 class="text-center blue-text text-darken-1" id="h1Bien"></h3></div>
			</div>
		</div>
			
		<div class="modal-footer">
			<button class="btn btn-primary btn-outline hidden" id="btnRefre2" data-dismiss="modal" ><i class="icofont icofont-social-smugmug"></i> Ok</button>
			<button class="btn btn-primary btn-outline" id="btnBien" data-dismiss="modal" ><i class="icofont icofont-social-smugmug"></i> Bien</button>
		</div>
	</div>
	</div>
</div>
</div>

<!-- Modal para decir que hay una observación  -->
<div class="modal fade modal-algunaAlerta" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
<div class="modal-dialog modal-sm" role="document">
	<div class="modal-content">
		<div class="modal-header-blanco">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel"><i class="icofont icofont-social-readernaut"></i> Atención</h4>
		</div>
		<div class="modal-body">
			<div class="container-fluid">
			<div class="row">
			<img src="images/anotacion171511.jpg?ver=1.1" class="img-responsive" alt="">
			<p class="text-center orange-text text-lighten-1 hidden"><strong>Tu información fue guardada:</strong></p>
			<div class="text-center orange-text text-lighten-1"><span id="spanMyAlerta"></span><h3 class="text-center orange-text text-lighten-1" id="h1MyAlerta"></h3></div>
			</div>
		</div>
			
		<div class="modal-footer">
			<button class="btn btn-warning btn-outline" data-dismiss="modal" ><i class="icofont icofont-warning-alt"></i> Ok</button>
		</div>
	</div>
	</div>
</div>
</div>

<!-- Modal para decir que hubo un error  -->
<div class="modal fade modal-GuardadoError" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
<div class="modal-dialog modal-sm" role="document">
	<div class="modal-content">
		<div class="modal-header-blanco">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel"><i class="icofont icofont-animal-cat-alt-4"></i> Hay un problema</h4>
		</div>
		<div class="modal-body">
			<div class="container-fluid">
			<div class="row">
				<img src="images/gatodead30.png" class="img-responsive" style="max-width: 80%; margin: auto;">
				<p><strong>Ups!</strong> <span id="mdErrorGenerico">Lo sentimos sucedió un error, el servidor tiene un mensaje.</span></p>
				<p><strong id="spanMalo"></strong></p>
				<div class="text-right"><button class="btn btn-danger btn-outline" data-dismiss="modal" ><i class="icofont icofont-warning-alt"></i> Ok, revisar</button></div>
			</div>
		</div>
			
	</div>
	</div>
</div>
</div>

<!-- Modal para decir que hubo un error  -->
<div class="modal fade modal-accionesCaja" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
<div class="modal-dialog modal-sm" role="document">
	<div class="modal-content">
		<div class="modal-header-blanco">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel"><i class="icofont icofont-animal-cat-alt-4"></i> Acciones para caja</h4>
		</div>
		<div class="modal-body">
			<div class="container-fluid">
			<div class="row">
				<p>¿Qué deseas hacer con el préstamo?</p>
				<span>
					<button class="btn btn-block btn-morado btn-outline">Finalizar préstamo</button>
				</span>
			</div>
		</div>
			
		<div class="modal-footer">
			<button class="btn btn-danger btn-outline" data-dismiss="modal" ><i class="icofont icofont-warning-alt"></i> Ok</button>
		</div>
	</div>
	</div>
</div>
</div>

<div class="modal fade modal-iniciarSesion" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
<div class="modal-dialog modal-sm" role="document">
	<div class="modal-content">
		<div class="modal-header">

			<h4 class="modal-title" id="myModalLabel"><i class="icofont icofont-help-robot"></i> Iniciar sesión</h4>
		</div>
		<div class="modal-body">
			<div class="text-center" style="margin: 0 auto; padding-bottom: 10px;"><img src="images/peto.png" width="128px" alt=""></div>
			<p>Lo siento, tu sesión ya expiró, ingresa tus credenciales nuevamente para acceder.</p>
			<input type="text" class="form-control input-lg input-block text-center" id="txtVolverUsuario" placeholder="Usuario" style="font-size: 24px;" autocomplete="nope">
			<input type="text" class="form-control input-lg input-block text-center" id="txtVolverPasw" placeholder="Contraseña" style="font-size: 24px;" oninput="turnOnPasswordStyle()">
			<div class="divError text-left animated fadeIn hidden" style="margin-bottom: 20px;"><i class="icofont icofont-animal-cat-alt-4"></i> Lo sentimos, <span class="spanError">La cantidad de producto no puede ser cero o negativo.</span></div>
			<button class="btn btn-morado btn-outline btn-block btn-lg" id='btnVolverIniciarSesion' ><i class="icofont icofont-atom"></i> Iniciar sesión</button>
		</div>

	</div>
</div>
</div>

<!-- Modal para mostrar los clientes coincidentes -->
<div class="modal fade modal-mostrarResultadosProducto" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
<div class="modal-dialog modal-lg" role="document">
	<div class="modal-content">
		<div class="modal-header-blanco" style="background-color: #6C5BBB;">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel"><i class="icofont icofont-help-robot"></i> Resultados de la búsqueda</h4>
		</div>
		<div class="modal-body">
			<!-- <div class="row container-fluid"> <strong>
				<div class="col-xs-5">Producto</div>
				<div class="col-xs-5">Nombre de Cliente</div>
				<div class="col-xs-2">Monto inicial</div></strong>
			</div> -->
			<div class="" id="rowProductoEncontrado">
				
			</div>
			
		</div>
		<div class="modal-footer hidden"> <button class="btn btn-primary btn-outline" data-dismiss="modal"><i class="icofont icofont-alarm"></i> Aceptar</button></div>
	</div>
</div>
</div>