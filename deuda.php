<style>
	#deuda{color:white; background-color: #d9071b;}
	#deuda a{color: #00cdb0; text-decoration: none;font-weight: 700;}
</style>
<div class="alert alert-danger" role="alert" id="deuda">
							<i class="icofont icofont-warning-alt"></i> <strong>Urgente!</strong> Se tiene una <strong>deuda</strong> de alquiler del servidor por 6 meses. Evite el <strong>corte del servicio</strong> contactándose al <a href="https://wa.me/51977692108">977692108</a>. Fecha límite 12 enero.
						</div>

<div class="modal fade" tabindex="-1" role="dialog" id="modalDeudaUrgente">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      
      <div class="modal-body">
        <h4 style="line-height:normal; color:red"><i class="icofont icofont-warning-alt"></i> <strong>Urgente!</strong> Se tiene una <strong>deuda</strong> de alquiler del servidor por 6 meses. Evite el <strong>corte del servicio</strong> contactándose al <a href="https://wa.me/51977692108">977692108</a>. Fecha límite 12 enero.</h4>
				<button type="button" class="btn btn-danger " id="btnBotonDeuda" >Leer el aviso (<span id="spanCountDeuda">9</span>)</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
	window.addEventListener('load', function () {
		$('#modalDeudaUrgente').modal()
		var contador = 9;
		
		var intervalo = setInterval( quitarAviso , 1000)

		function quitarAviso(){
			contador --;
			
			if(contador == 0){
				document.getElementById('btnBotonDeuda').innerHTML = "Cerrar aviso";
				document.getElementById('btnBotonDeuda').setAttribute('data-dismiss', 'modal');
				clearInterval(intervalo)
			}else{
				document.getElementById('spanCountDeuda').textContent = contador;
				
			}
		}
	}, false);
	

</script>