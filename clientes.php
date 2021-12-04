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
<style>
	.icoSpan{cursor: pointer;}
</style>
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
							<div class="row col-md-5" style="margin:1rem 0;">
								<p >O use el filtro y enter</p>
								<input type="text" class="form-control" placeholder='Buscar por nombre, Dni' id="" v-model="texto" @keyup.enter="buscarCampo()">
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
											<th>@</th>
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
											<td v-if="cliente.puntosActual>=50"><span class="text-primary icoSpan mitooltip" title="Canjear puntos" @click="modalPuntos(cliente.puntosActual, cliente.id, cliente.razon)"><i class="icofont icofont-heartbeat"></i></span></td>
											<td v-else></td>
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
			<!-- Modal para: -->
			<div class='modal fade ' id="modalCanjear" tabindex='-1' role='dialog' aria-hidden='true'>
				<div class='modal-dialog modal-sm' >
				<div class='modal-content '>
					<div class='modal-header-blanco'>
						<button type='button' class='close' data-dismiss='modal' aria-label='Close' ><span aria-hidden='true'>&times;</span></button>
						<h4 class='modal-tittle'> Canjear Puntos</h4>
					</div>
					<div class='modal-body'>
						<p>Elija la cantidad de puntos que desea canjear</p>
						<select class="form-control" name="" id="sltPuntosCanje">
							<option v-for="cant in maximo" :value="cant">{{cant}}</option>
						</select>
						<p>Ingrese el premio:</p>
						<input type="text" class="form-control" v-model="premio" autocomplete="off">
						
					</div>
					<div class='modal-footer'>
						<button type='button' class='btn btn-default' @click="canjearPuntos()"><i class="icofont icofont-heart-alt"></i> Canjear puntos</button>
					</div>
					</div>
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
		clientes:[], texto:'', maximo:[], premio:'', elCliente:'', nomCliente:''
	},
	mounted() {
		
	},
	methods: {
		cambiarLetra(queLetra){
			var that = this;
			$.ajax({url: 'php/ventas/listadoClientesInicial.php', type: 'POST', data: { letra: queLetra, extra: this.texto }}).done(function(resp) {
				console.log(resp)
				that.clientes = JSON.parse(resp);
			});
		},
		fechaLatam(fecha){
			return moment(fecha).fromNow();
		},
		buscarCampo(){
			this.cambiarLetra('|');
		},
		modalPuntos(max, id, nombre){
			this.maximo=[];
			this.elCliente=id;
			this.nomCliente=nombre;
			for(let i =50; i<=max; i+=150 ){
				if(i<=600){
					this.maximo.push(i);
				}
				if(i>=150){
					i+=50;
				}
			}
			
			$('#modalCanjear').modal('show');
		},
		canjearPuntos(){
			let cliente = this.nomCliente;
			let premio = this.premio;
			let puntos = $('#sltPuntosCanje').val();
			if(this.premio!=''){
				$.ajax({url: 'php/ventas/canjearPremio.php', type: 'POST', data: { idCliente: this.elCliente, puntos, premio }}).done(function(resp) {
					console.log(resp)
					if(resp=='ok'){
						$.ajax({url: '<?= $localServer?>impresion/printCanje.php', type: 'POST', data: { nombre: cliente, puntos, premio }}).done(function(resp) {
							console.log(resp);
						});
					}
					location.reload();
				});
			}
		}
	},
})
</script>

</body>

</html>
