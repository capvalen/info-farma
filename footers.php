
<!-- jQuery -->
<script src="js/jquery-2.2.4.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
<script src="js/moment.js"></script>
<script src="js/inicializacion.js?version=1.0.2"></script>
<script src="js/bootstrap-select.js"></script>
<script src="js/bootstrap-datepicker.min.js"></script>
<script src="js/bootstrap-datepicker.es.min.js"></script>
<script src="js/anatsunamun.js?version=1.0.1"></script>
<script src="js/axios.min.js"></script>

<!-- Modal para: -->
<div class='modal fade ' id="modalResultadoGeneral" tabindex='-1' role='dialog' aria-hidden='true'>
	<div class='modal-dialog modal-sm' >
	<div class='modal-content '>
		<div class='modal-header-blanco'>
			<button type='button' class='close' data-dismiss='modal' aria-label='Close' style="font-size:3rem; color:red; opacity:0.8;" ><span aria-hidden='true'>&times;</span></button>
			<h4 class='modal-tittle'> Búsqueda rápida</h4>
		</div>
		<div class='modal-body'>

			<div class="hidden" id="divHeNada">
				<p>No se encontraron resultados con ésta búsqueda</p>
			</div>
			<div class="hidden" id="divHeDetalles">
				<p><strong>Nombre:</strong> <span id="mnSpanNombre"></span></p>
				<p><strong>Principio activo:</strong> <span id="mnSpanPrincipio"></span></p>
				<p><strong>Stock:</strong> <span id="mnSpanStock"></span></p>
				<p><strong>Precio unitario:</strong> <span id="mnSpanPrecio"></span></p>
				<p><strong>Supervisado:</strong> <span id="mnSpanSupervisado"></span></p>
				<p><strong>Datos extras:</strong> <span id="mnSpanDatos"></span></p>
			</div>
			<div class="hidden" id="divHeMuchos">
				<table class="table-hover table">
					<thead>
						<tr>
							<th>N°</th>
							<th>Producto</th>
							<th>Precio</th>
							<th>Stock</th>
						</tr>
					</thead>
					<tbody id="tboHeVarios">

					</tbody>
				</table>
			</div>
		</div>
		
		</div>
	</div>
</div>

<script>
var datitos;
$('body').on('keypress', '#txtBuscarNivelGod',function (e) { 
	
	if(e.keyCode == 13 && $('#txtBuscarNivelGod').val()!=''){ 
		//Código
		$('#modalResultadoGeneral .modal-dialog').addClass('modal-sm')
		$('#divHeNada').addClass('hidden')
		$('#divHeDetalles').addClass('hidden')
		$('#divHeMuchos').addClass('hidden')
		$.ajax({url: 'php/productos/buscarProductoXNombreOLote.php', type: 'POST', data: { filtro: $('#txtBuscarNivelGod').val() }}).done(function(resp) {
			
			datitos = JSON.parse(resp);
			$('#modalResultadoGeneral').modal('show');
			console.log( datitos.length );
			if( datitos.length==0){
				//nada
				document.getElementById('divHeNada').classList.remove('hidden');
			}else if( datitos.length==1){
				//Un solo dato

				document.getElementById('divHeDetalles').classList.remove('hidden');
				rellenarMiniDetalles(0);
			}else{
				document.getElementById('divHeMuchos').classList.remove('hidden');
				$('#modalResultadoGeneral .modal-dialog').removeClass('modal-sm')

				//más de uno
				$('#tboHeVarios').children().remove();
				datitos.forEach((daProduct, index) =>{
					$('#tboHeVarios').append(`/*html*/
					<tr>
						<td>${index+1}</td>
						<td onclick="rellenarMiniDetalles(${index})">${daProduct.prodNombre}</td>
						<td>${daProduct.prodPrecioUnitario}</td>
						<td>${daProduct.prodStock}</td>
					</tr>
					`)
				})
			}
		});
	}
});
function rellenarMiniDetalles(index){
	$('#modalResultadoGeneral .modal-dialog').addClass('modal-sm')

	$('#divHeNada').addClass('hidden')
	$('#divHeMuchos').addClass('hidden')
	$('#divHeDetalles').removeClass('hidden')

	document.getElementById('mnSpanNombre').innerText=datitos[index].prodNombre;
	document.getElementById('mnSpanPrincipio').innerText=datitos[index].principioActivo;
	document.getElementById('mnSpanStock').innerText=datitos[index].prodStock;
	document.getElementById('mnSpanPrecio').innerText=datitos[index].prodPrecioUnitario;
	if(datitos[index].supervisado =='0' ){
		document.getElementById('mnSpanSupervisado').innerText='No';
	}else{
		document.getElementById('mnSpanSupervisado').innerText='Si';
	}
	document.getElementById('mnSpanDatos').innerText=datitos[index].observaciones;
}
</script>