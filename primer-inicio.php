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
		<div class="col-sm-6 text-center"><small id="horaServer"></small> <small class="text-muted" id="fechaServer"></small> <p><small>Usuario:</small> <small class="text-primary">Carlos Pariona</small></p></div>
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
								<label class="col-sm-3 control-label">Nombre de la empresa:</label>
								<div class="col-sm-9"><input type="text" class="form-control" placeholder="Su razón Social"></div>
							</div><!-- form-group -->
							<div class="form-group">
								<label class="col-sm-3 control-label">R.U.C:</label>
								<div class="col-sm-5"><input type="text" class="form-control" placeholder="Su código tributario"></div>
							</div><!-- form-group -->
							<div class="form-group">
								<label class="col-sm-3 control-label">Dirección:</label>
								<div class="col-sm-5"><input type="text" class="form-control" placeholder="Su dirección fiscal"></div>
							</div><!-- form-group -->
							<div class="form-group">
								<label class="col-sm-3 control-label">Contacto de teléfonos o celulares:</label>
								<div class="col-sm-9"><input type="text" class="form-control" placeholder="Teléfonos o celulares de contacto. (sepárelos por comas)"></div>
							</div><!-- form-group -->
							<div class="form-group">
								<label class="col-sm-3 control-label">Correo Electrónico:</label>
								<div class="col-sm-5"><input type="text" class="form-control" placeholder="Su correo para información con los clientes"></div>
							</div><!-- form-group -->
						</div><!-- form-horizontal -->

						

					</div>
					
					</div><!-- fin de pane warning-->
			</div>
			<div class="col-sm-3 ">
				<div class="panel panel-cielo blue-text text-lighten-1">
					<div class="panel-heading">Datos generales de economía</div>
					<div class="panel-body">
						<div class=" text-center">
							
							<label class="">% Impuesto: <small>En entero</small></label><br>
								<input type="text" class="form-control text-center" placeholder="Ejm: 18"><br>
							<label for="">Símbolo de moneda local:</label><br>
								<input type="text" class="form-control text-center" placeholder="Ejm: $"><br>
							<label for="">Porcentaje de ganancia: <small>De los produtos en general</small></label><br>
								<input type="text" class="form-control text-center" placeholder="Ejm: 20"><br>
						</div>
					</div>
				</div><!-- fin de pane cielo-->
			</div><!-- fin de sm-4 -->
		</div>

		<div class="col-sm-6 col-sm-offset-2">
			<div class="checkbox checkbox-danger">
					<input id="checkbox6" class="styled" checked="" type="checkbox">
					<label for="checkbox6">
							Acepto que toda la información proporcionada aquí es válida. Sólo yo soy responsable de los errores con éstos datos<small>, aunque si deseo puedo regresar, corregirlo y tener la salvación eterna.</small>
					</label>
			</div>
			<div class="text-center"><button class="btn btn-danger btn-outline" onclick="primerBoton();"><i class="icofont icofont-rocket-alt-2"></i> Enviar información</button></div>
		</div>

		</div>
		

		
		
	

	</main>

	<?php /************** Comienzan las funciones en PHP *******************/
	function primerBoton(){
		echo "Existo desde el momento inmediato que comenzó el programa.\n";
	}
	 ?>
	


	<script src="js/jquery-2.2.4.min.js"></script>
	<script src="js/bootstrap.min.js"></script>

	<script type="text/javascript">
	//codigo
	</script>
</body>
</html>