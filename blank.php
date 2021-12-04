<?php 
require_once ( 'php/variablesGlobales.php');
?>
<!DOCTYPE html>
<html lang="es">

<head>
		<title>Inventario: Info-Farma</title>
		<?php include 'headers.php'; ?>
</head>

<body>

<div id="wrapper">

<?php $pagina = 'QUE_PAGINA_eS'; include 'menu-wrapper.php'; ?>

<!-- Page Content -->
<div id="page-content-wrapper">
	<div class="container-fluid">				 
			<div class="row">
				<div class="col-lg-12 contenedorDeslizable">
				<!-- Empieza a meter contenido principal dentro de estas etiquetas -->
				 <h2><i class="icofont icofont-options"></i> Panel de configuraciones generales</h2>

					<ul class="nav nav-tabs">
					<li class="active"><a href="#tabAgregarLabo" data-toggle="tab">Agregar laboratorio</a></li>
					<li><a href="#tabCambiarPassUser" data-toggle="tab">Cambiar contraseña</a></li>
					
					</ul>
					
					<div class="tab-content">
					<!--Panel para buscar productos-->
						<!--Clase para las tablas-->
						<div class="tab-pane fade in active container-fluid" id="tabAgregarLabo">
						<!--Inicio de pestaña 01-->
							Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, eos vero cum tenetur minus eius enim eaque at saepe in nulla fugit molestiae libero nostrum inventore aperiam unde provident nesciunt.

						<!--Fin de pestaña 01-->
						</div>

						

						<!--Panel para nueva compra-->
						<div class="tab-pane fade container-fluid" id="tabCambiarPassUser">
						<!--Inicio de pestaña 02-->
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur, quis, facilis beatae recusandae optio molestias ipsam quibusdam aliquid rerum voluptatem incidunt in vero quo illo natus? Asperiores, ipsum placeat dolorum.
						<!--Fin de pestaña 02-->
						</div>
						
					</div>
					<!-- Fin de meter contenido principal -->
					</div>
					
				</div>
		</div>
</div>
<!-- /#page-content-wrapper -->
</div><!-- /#wrapper -->


		

	
<?php include 'footers.php'; ?>

<script>

</script>

</body>

</html>
