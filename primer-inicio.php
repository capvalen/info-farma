<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Ventas: Info-Farma</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="iconfont/material-icons.css">
		<!-- <link href="css/bootstrap-select.min.css" rel="stylesheet">--> <!-- extraido de: https://silviomoreto.github.io/bootstrap-select/-->
		<link href="css/estilos.css" rel="stylesheet">
		<link rel="stylesheet" href="css/icofont.css"> <!-- iconos extraidos de: http://icofont.com/-->
		<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css"> <!-- extraido de: http://flatlogic.github.io/awesome-bootstrap-checkbox/demo/-->
		<link rel="stylesheet" href="css/font-awesome.css"> 
		
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
			<a class="navbar-brand" href="#"><i class="icofont icofont-medical-sign-alt"></i> Info-Farma</a>
		</div>


		
	</nav>

	
	<main class="col-md-10 col-md-offset-1 ">

	<div class="row">
		<ol class="breadcrumb col-sm-6">
		<li class="active"><i class="icofont icofont-dart"></i> Configuración interiores</li>
		
	</ol>
		<div class="col-sm-6 text-center "><small id="horaServer"></small> <small class="text-muted" id="fechaServer"></small> <p><small>Usuario:</small> <small class="text-primary">Carlos Pariona</small></p></div>
	</div>
	<h2 style="color: #FF5252;"><i class="icofont icofont-dart"></i> Configuraciones vitales del sistema</h2>
	
	
	

		<div class="tab-pane fade in active" id="tabRealizarVenta"><br>
		<div class="container-fluid">
			<div class="col-sm-12 col-md-9 red-text text-accent-1">
				<div class="panel panel-dulce  ">
					<div class="panel-heading">Información sólo de la empresa</div>
					
					<div class="panel-body">
						<div class="form-horizontal">
							<div class="form-group">
								<label class="col-sm-3 control-label"><i class="icofont icofont-animal-squirrel"></i> Nombre de la empresa:</label>
								<div class="col-sm-9"><input type="text" class="form-control text-capitalize"  id ="txtRazonSocial" placeholder="Su razón Social"></div>
							</div><!-- form-group -->
							<div class="form-group">
								<label class="col-sm-3 control-label"><i class="icofont icofont-animal-squirrel"></i> R.U.C:</label>
								<div class="col-sm-5"><input type="text" class="form-control text-capitalize"  id ="txtRUC" placeholder="Su código tributario"></div>
							</div><!-- form-group -->
							<div class="form-group">
								<label class="col-sm-3 control-label"><i class="icofont icofont-animal-squirrel"></i> Dirección:</label>
								<div class="col-sm-5"><input type="text" class="form-control text-capitalize" id ="txtDireccion"  placeholder="Su dirección fiscal"></div>
							</div><!-- form-group -->
							<div class="form-group">
								<label class="col-sm-3 control-label">Contacto de teléfonos o celulares:</label>
								<div class="col-sm-9"><input type="text" class="form-control text-capitalize"  id ="txtTelefonos" placeholder="Teléfonos o celulares de contacto. (sepárelos por comas)"></div>
							</div><!-- form-group -->
							<div class="form-group">
								<label class="col-sm-3 control-label">Correo Electrónico:</label>
								<div class="col-sm-5"><input type="text" class="form-control text-capitalize"  id ="txtCorreo" placeholder="Su correo para información con los clientes"></div>
							</div><!-- form-group -->
						</div><!-- form-horizontal -->

						

					</div>
					
					</div><!-- fin de pane warning-->

			<div class="text-muted"><i class="icofont icofont-tick-mark"></i> <i class="icofont icofont-animal-squirrel"></i> <em>Todos los campos son obligatorios.</em></div><!-- Este div se acomoda despues del naranja-->
			</div>
			<div class="col-sm-3 ">
				<div class="panel panel-cielo blue-text text-lighten-1">
					<div class="panel-heading">Datos generales de economía</div>
					<div class="panel-body">
						<div class=" text-center">
							<label class=""><i class="icofont icofont-animal-squirrel"></i>  Iniciales del impuesto en su pais:</label><br>
								<input type="text" class="form-control text-center text-capitalize" id="txtNombreImpuesto" placeholder="Ejm: IGV, IVA, TAX"><br>
							<label class=""><i class="icofont icofont-animal-squirrel"></i>  % Impuesto: <small>En entero</small></label><br>
								<input type="text" class="form-control text-center text-capitalize" id="txtPorcentajeImpuesto" placeholder="Ejm: 18"><br>
							<label for=""><i class="icofont icofont-animal-squirrel"></i>  Símbolo de moneda local:</label><br>
								<input type="text" class="form-control text-center text-capitalize" id="txtSimboloMoneda" placeholder="Ejm: $"><br>
							<label for="">Porcentaje de ganancia: <small>De los produtos en general</small></label><br>
								<input type="text" class="form-control text-center text-capitalize" id="txtPorcentajeGanaciaProductos" placeholder="Ejm: 20, 30"><br>
						</div>
					</div>
				</div><!-- fin de pane cielo-->
			</div><!-- fin de sm-4 -->

		</div>

		<div class="col-sm-6 col-sm-offset-2">
			<div class="checkbox checkbox-danger">
					<input id="chkReglas" class="styled" type="checkbox" value=1>
					<label for="chkReglas">
							Acepto que toda la información proporcionada aquí es válida. Sólo yo soy responsable de los errores con éstos datos<small>, aunque si deseo puedo regresar, corregirlo y tener la salvación eterna.</small>
					</label>
			</div>
			<div class="text-center"><button type="submit" class="btn btn-danger btn-outline" id="btnEnviarDataCritica"><i class="icofont icofont-rocket-alt-2"></i> Enviar información</button></div>
		</div>

		</div>
		

		
		
	

	</main>

	<!-- Modal para indicar que falta completar campos-->
	<div class="modal fade modal-faltaCompletar" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header-danger">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel"><i class="icofont icofont-help-robot"></i> Campos incompletos</h4>
			</div>
			<div class="modal-body">
				Debe rellenar todos los campos que se marcan con el ícono de: <i class="icofont icofont-animal-squirrel"></i> <strong id="lblFalta"></strong>
			</div>
			<div class="modal-footer"> <button class="btn btn-danger btn-outline" data-dismiss="modal"><i class="icofont icofont-alarm"></i> Ok, revisaré</button></div>
		</div>
		</div>
	</div>

	<!-- Modal para decir que está guardado todo-->
	<div class="modal fade modal-todoExitoso">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header-primary">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel"><i class="icofont icofont-help-robot"></i> Datos guardados</h4>
			</div>
			<div class="modal-body">
				Enhorabuena, todos sus datos fueros guardados exitósamente.
			</div>
			<div class="modal-footer"> <a class="btn btn-warning btn-outline" id="btnfinGuardado" data-dismiss="modal"><i class="icofont icofont-alarm"></i> Bien, vamonos de acá</a></div>
		</div>
		</div>
	</div>


	


	<script src="js/jquery-2.2.4.min.js"></script>
	<script src="js/bootstrap.min.js"></script>

	<script type="text/javascript">
	$('input').val('');
	
	$( document ).ready(function() {
		$( "#txtRazonSocial" ).focus();
	});
	$('#btnEnviarDataCritica').click(function () {
		// body...
		
		if($('#txtRazonSocial').val()===''){$('#txtRazonSocial').focus(); $('.modal-faltaCompletar').modal('show'); $('#lblFalta').text('Falta Razón social');}
		else if($('#txtRUC').val()===''){$('#txtRUC').focus(); $('.modal-faltaCompletar').modal('show'); $('#lblFalta').text('Falta # de RUC');}
		else if($('#txtDireccion').val()===''){$('#txtDireccion').focus(); $('.modal-faltaCompletar').modal('show'); $('#lblFalta').text('Falta Dirección');}
		else if($('#txtTelefonos').val()===''){$('#txtTelefonos').focus(); $('.modal-faltaCompletar').modal('show'); $('#lblFalta').text('Falta Teléfonos de contacto');}
		else if($('#txtCorreo').val()===''){$('#txtCorreo').focus(); $('.modal-faltaCompletar').modal('show'); $('#lblFalta').text('Falta Correo electrónico');}
		else if($('#txtNombreImpuesto').val()===''){$('#txtNombreImpuesto').focus(); $('.modal-faltaCompletar').modal('show'); $('#lblFalta').text('Falta Nombre de Impuesto');}
		else if($('#txtPorcentajeImpuesto').val()===''){$('#txtPorcentajeImpuesto').focus(); $('.modal-faltaCompletar').modal('show'); $('#lblFalta').text('Falta % de Impuesto');}
		else if($('#txtSimboloMoneda').val()===''){$('#txtSimboloMoneda').focus(); $('.modal-faltaCompletar').modal('show'); $('#lblFalta').text('Falta Tipo de moneda');}
		else if($('#txtPorcentajeGanaciaProductos').val()===''){$('#txtPorcentajeGanaciaProductos').focus(); $('.modal-faltaCompletar').modal('show'); $('#lblFalta').text('Falta % de Ganancia por productos');}
		else if (!($('#chkReglas:checked').val()=='')){console.log('no acepto los términos'); $('.modal-faltaCompletar').modal('show'); $('#lblFalta').text('Falta aceptar el contrato');}
		else{
			$.ajax({ url:'php/config/guardarDatosEmpresa.php', type:'POST',
				data: {ruc:$('#txtRUC').val(), social: $('#txtRazonSocial').val(), direccion: $('#txtDireccion').val(), telefono: $('#txtTelefonos').val(), correo: $('#txtCorreo').val(), nomIGV: $('#txtNombreImpuesto').val(), cantIGV: $('#txtPorcentajeImpuesto').val(), porcGanancia: $('#txtPorcentajeGanaciaProductos').val(), MonedaLocal: $('#txtSimboloMoneda').val() }
			}).
			done(function (resul) { console.log(resul);
				if(resul>=1){console.log('Se guardó con exito'); $('.modal-todoExitoso').modal('show');}
			});
		}

		
	});
	$('#btnfinGuardado').click(function () {location.href ='index.html';});
	</script>
</body>
</html>