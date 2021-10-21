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
	<div class="container-fluid" id="app">
			<div class="row">
				<div class="col-lg-12 contenedorDeslizable">
				<!-- Empieza a meter contenido principal dentro de estas etiquetas -->
				 <h2><i class="icofont icofont-users"></i> Panel para Clientes</h2>

					<ul class="nav nav-tabs">
					<li class="active"><a href="#tabClientes" data-toggle="tab">Lista de clientes</a></li>
					
					
					</ul>
					
					<div class="tab-content">
					<!--Panel para buscar productos-->
						<!--Clase para las tablas-->
						<div class="tab-pane fade in active container-fluid" id="tabClientes">
						<!--Inicio de pestaña 01-->
							<p>Listado de clientes, por puntos de consumo 1 punto equivale a S/ 1.00 de compra realizada, ordenados de mayor a menor.</p>
							<div>
								<a class="mayuscula" href="#!" style="margin-right: 2rem;" v-for="letra in letras" @click="cambiarLetra(letra)">{{letra}}</a>
							</div>
							<hr>
							<div>
								<table class="table table-hover">
									<thead>
										<tr>
											<th>N°</th>
											<th>Nombres/Razón Social</th>
											<th>Dni/RUC</th>
											<th>Puntos Actuales</th>
											<th>Puntos Globales</th>
											<th>Antigüedad</th>
											<th>Última compra</th>
										</tr>
									</thead>
									<tbody>
										<tr v-for="(cliente, index) in clientes" :key="cliente.id">
											<td>{{index+1}}</td>
											<td class="mayuscula">{{cliente.razon}}</td>
											<td class="mayuscula">{{cliente.ruc}}</td>
											<td class="mayuscula">{{cliente.puntosActual}}</td>
											<td class="mayuscula">{{cliente.puntosTotal}}</td>
											<td class="mayuscula">{{fechaLatam(cliente.registrado)}}</td>
											<td class="mayuscula">{{fechaLatam(cliente.actualizacion)}}</td>
										</tr>
										<tr v-if="clientes.length==0">
											<td colspan="6">No hay registros</td>
										</tr>
									</tbody>
								</table>
							</div>

						<!--Fin de pestaña 01-->
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
<script src="js/vue.js"></script>

<script>
	moment.locale('es');
var app = new Vue({
	el:'#app',
	data:{
		letras: ['#', 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'ñ', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'x', 'y', 'z'],
		clientes:[]
	},
	mounted() {
		
	},
	methods: {
		cambiarLetra(queLetra){
			var that = this;
			$.ajax({url: 'php/ventas/listadoClientesInicial.php', type: 'POST', data: { letra: queLetra }}).done(function(resp) {
				//console.log(resp)
				that.clientes = JSON.parse(resp);
			});
		},
		fechaLatam(fecha){
			return moment(fecha).fromNow();
		}
	},
})
</script>

</body>

</html>
