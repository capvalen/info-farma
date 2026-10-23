<?php 
session_start();
include 'php/conectkarl.php';
if(isset($_COOKIE['ckAtiende'])){
	echo '<script> window.location="ventas.php"; </script>';
}
?>

<!DOCTYPE html>
<html lang="es">
<head >
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/icofont.css">
	
	<title>Bienvenido: Info-Farma</title>
	<link href="css/bootstrap5.min.css" rel="stylesheet">
	<link href="css/inicio.css?version=1.0" rel="stylesheet">
	<link href="css/animate.css" rel="stylesheet">
	<link rel="shortcut icon" href="images/pet2.png" />


</head>

<body >
<style type="text/css">
.form-control:focus{    border-color: #FFEB3B;box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 6px rgba(255, 193, 7, 0.55);}
body, .bg-plomo{background: #f5f5f5;}
main{ margin-top:80px; padding:0 50px}
.wello{padding:40px 50px; border-radius: 6px;padding-bottom: 58px;
	
}
.noselect {
	-webkit-touch-callout: none; /* iOS Safari */
	-webkit-user-select: none;   /* Chrome/Safari/Opera */
	-khtml-user-select: none;    /* Konqueror */
	-moz-user-select: none;      /* Firefox */
	-ms-user-select: none;       /* Internet Explorer/Edge */
	user-select: none;           /* Non-prefixed version, currently not supported by any browser */
}
input{height: 40px!important;}
label{font-size: 14px!important}
input::placeholder{font-size: 14px!important;}
input{height: 45px!important; color: #673ab7!important;
display: inline-block!important; font-size: 18px!important;
    /* width: 95%!important; */}
.icoTransparent{display: inline-block; color: #555; font-size: 16px;
margin-left: -25px; opacity: 0.5}
a{    color: #6d3cca;
    font-weight: 700;}
a:hover{color:#462782;}
#rowPadre{
	box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;

}
.btn-outline-primary {
    color: #721ecf;
    border-color: #721ecf;
}
.btn-outline-primary:hover {
    color: #fff;
    background-color: #721ecf;
    border-color: #721ecf;
}
.bg-blanco{background:#fff;}
.rounded {
    border-radius: .75rem!important;
}
</style>
<main class="noselect">
	<div class="container-fluid">
		<div class="row d-flex flex-row-reverse">
			<div class="col-10 col-md-12 col-lg-10 mx-auto ">
				<div class="row d-flex flex-sm-row-reverse rounded bg-blanco" id="rowPadre">
					<div class="col-12 col-lg-4 p-4 ">
						<div class="text-center"><img src="images/VirtualCorto.png" class="mx-auto img-responsive" alt=""></div>
						<h4 class="text-muted text-center fs-2">Hola! Bienvenido</h4>
						<p class="text-muted">Ingrese sus credenciales</p>
					<div>
					<div class="form-floating mb-3">
					  <input type="email" class="form-control" id="txtUser_app"  placeholder=" ">
					  <label for="txtUser_app">Usuario</label>
					</div>
					<div class="form-floating">
					  <input type="password" class="form-control" id="txtPassw" placeholder="Contraseña">
					  <label for="txtPassw">Contraseña</label>
					</div>
					<div class="d-grid gap-1 mt-4">
						<button class="btn btn-outline-primary btn-lg" id="btnAcceder"><img src="images/door-open.svg"/> Ingresar</button>
					</div>
					
				</div>
			</div>

				<div class="col-12 col-lg p-5 ">
					<img src="images/portada.jpg" class="img-fluid">
					<h4 class="fs-1 text-center" style="color: #721ecf;">Sistema para Farmacias y Boticas</h4>
					<div class="mt-5">
						<p class="text-end"><small><?php include 'php/version.php' ?> | 2016 - <?php echo date("Y"); ?></small></p>
						<p class="text-end"><a href="https://www.facebook.com/infocatsoluciones/photos/?tab=album&album_id=2015441245336874" class="text-decoration-none">Desarrollado por Infocat Soluciones</a></p>
					</div>
				</div>
					
				</div>
			</div>
		</div>
	
	</div>
</main>
</body>

<script src="js/jquery-2.2.4.min.js"></script>
<script src="js/bootstrap5.bundle.min.js"></script>

<!-- <script src="./node_modules/socket.io/node_modules/socket.io-client/socket.io.js"></script> 
<script src="js/socketCliente.js"></script>-->
<script>
	$(document).ready(function () {
		$('#txtUser_app').val('');
		$('#txtPassw').val('');
		$('#txtUser_app').focus();
		/*$('.wello').addClass('animated bounceIn');*/
		$('.fa-spin').addClass('sr-only');
		//$('body').css("background-image", "url(images/fondo.jpg)");		
	});
	$('#txtPassw').keypress(function(event){
		if (event.keyCode === 10 || event.keyCode === 13) 
			{event.preventDefault();
			$('#btnAcceder').click();
		 }
	});
	$('#btnAcceder').click(function() {
		$('.fa-spin').removeClass('sr-only');$('.icofont-key').addClass('sr-only');
		$('#divError').addClass('hidden');
		$.ajax({
			type:'POST',
			url: 'php/validarLogin.php',
			data: {user: $('#txtUser_app').val(), pws: $('#txtPassw').val()},
			success: function(iduser) { //console.log(iduser)
				if (parseInt(iduser)>0){//console.log('el id es '+data)
					//console.log(iduser)
					window.location="principal.php";
				}
				else {
					$('#divError').removeClass('hidden');
					//var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
					// $('#btnAcceder').addClass('animated wobble' ).one(animationEnd, function() {
					// 		$(this).removeClass('animated wobble');
					// });
					$('#txtUser_app').select();
					$('.fa-spin').addClass('sr-only');$('.icofont-key').removeClass('sr-only');
					//console.log(iduser);
					console.log('error en los datos')}
			}
		});
	});
</script>
</html>