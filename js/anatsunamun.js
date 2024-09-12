$(document).ready(function(){
	$('.selectpicker').selectpicker('refresh');
	$('.mitooltip').tooltip();
});

$('input').keypress(function (e) {
	if (e.keyCode == 13)
	{
		$(this).parent().next().children().focus();
		//$(this).parent().next().children().removeAttr('disabled'); //agregar atributo desabilitado
	} 
});
function pantallaOver(tipo) {
	if(tipo){$('#overlay').css('display', 'initial');}
	else{ $('#overlay').css('display', 'none'); }
}
function listaBugs(data, comentario=''){
	var motivo =''
		 switch (data) {
				case "err1": motivo = "No hay ninguna caja abierta aún."; break;
				case "err2": motivo = "Faltan rellenar datos: " + comentario; break;
				case "err3": motivo = "Tu sesión expiró, vuelve a intentarlo luego de iniciar sessión."; break;
				default: motivo = "El error aún desconocido, posiblemente interno"; break;
		 }
		 $('.modal-GuardadoError').find('#spanMalo').text('El servidor dice: ' + motivo);
		 $('.modal-GuardadoError').modal('show');
	}