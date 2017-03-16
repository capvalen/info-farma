var idUsuario=1;
usuario ={idUsuario:[], nombre:[], apellidos:[]};
var datosGenerales,datosCitasDelDia;

var asignarCalendarioABD=false;
var clientePuedeCitaHoy=false;
var geneIdConsulta=0;//3 para consultas, 4 para revaluaciones, 5 para procedimientos, 8 para cirujías, 6 para el cambio de fechas
var idRegistroMovible=0;
var motivProcedimiento;
var listaRegistrosCliente;
$.fn.modal.prototype.constructor.Constructor.DEFAULTS.backdrop = 'static'; //Para que no cierre el modal, cuando hacen clic en cualquier parte
$('.thumbnail').mouseenter(function(){
	$(this).children('.btn').addClass('animated bounce').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', 
		function(){
		$(this).removeClass('animated bounce');
	});
});

$(document).ready(function(){
	$('#fechaServer').load("php/getfecha.php");
	$('#horaServer').load("php/gethora.php");
	setInterval(function(){$('#horaServer').load("php/gethora.php");},'60000');
	$('#listBarras').hide();	
});

$('#cmbTipoPersona').change(function(){
	//console.log($(this).val());
	switch($(this).val()){
		case "1": $('#txtDni').attr('disabled', false);$('#cmbGrado').val('4');$('#txtDni').focus();break;
		case "2": $('#txtDni').attr('disabled', false);$('#cmbGrado').val('3');$('#cmbOcupacion').val('25'); break;
		case "3": $('#txtDni').val("");$('#txtDni').attr('disabled', true);$('#cmbGrado').val('4');break; 
	}
});

function limpiarCamposCLiente () {
	$('#cmbProcedencia').val(1);
	$('#cmbTipoPersona').val(1).change();
	$('#txtApellidoPaterno').val('');
	$('#txtApellidoMaterno').val('');
	$('#txtNombres').val('');
	$('#dtpFechaNacimiento').val(moment().format('YYYY-MM-DD'));
	$('#txtDireccion').val('');
	$('#txtTelefono').val('');
	$('#txtCelular').val('');
}

$('#btnGuardarCliente').click(function(){
$( "#btnGuardarCliente" ).html('<i class="icofont icofont-ui-laoding"></i> Analizando...')
$( "#btnGuardarCliente" ).prop( "disabled", true );
	if(validarCamposCliente()) {
		if ( ! $( "#btnGuardarCliente" ).hasClass('disabled')){
			grabarCliente('grabar');
		}
	}else{
		$( "#btnGuardarCliente" ).html('<i class="icofont icofont-folder-open"></i> Guardar cliente')
		$( "#btnGuardarCliente" ).prop( "disabled", false );
	}
});

function validarCamposCliente() {

	if(($('#txtDni').val()=="" || $('#txtDni').val().length<8) && $('#cmbTipoPersona').val()==1){
		$('#contenidoErrorCliente').html('El campo del DNI esta incompleto.');
		$('#mensajeErrorCliente').removeClass('sr-only'); return false;//console.log("falta DNI");
	}
	else if($('#txtDni').val()=="" && $('#cmbTipoPersona').text()=="Menor de edad "){
		$('#contenidoErrorCliente').html('El campo del DNI esta incompleto.');
		$('#mensajeErrorCliente').removeClass('sr-only'); return false;
	}
	else if($('#txtApellidoPaterno').val()=="" || $('#txtApellidoMaterno').val()=="" || $('#txtNombres').val()==""){
		$('#contenidoErrorCliente').html('Faltan los apellidos o nombres del cliente.');
		$('#mensajeErrorCliente').removeClass('sr-only'); return false;
	}
	else{
		
	//listo para guardar
		//$( "#btnGuardarCliente" ).prop( "disabled", true );
		$('#mensajeErrorCliente').addClass('sr-only'); return true;
		//console.log("guardando");		
		//location.href = 'ClientePanel.html';
	}
}

$('#txtFechaNacimiento').focusout(function(){
	//console.log($('#txtFechaNacimiento').val());
		
});
$(".modal").on("hidden.bs.modal", function(){
		//borrar los campos del modal
});

$("#cmbAdelanto").change(function(){
	switch($("#cmbAdelanto").val()){
		case "1": $("#txtMontoPagado").val("60.00");break;
		case "2":
		case "3": $("#txtMontoPagado").val("0.00");break;   
	}
});
$('.modal-cita #asignarDias').click(function(){
	var dias=$('#txtAsignarDias').val();
	if( dias==''){  dias=0;}
	//else {console.log(dias);}
	moment.locale('fr-ca');
	var fecha = moment();
	fecha = fecha.add(dias, 'days');
	//console.log(fecha.format('L'));
	$("#dtpFechaCita").val(fecha.format('L'));
	$("#dtpFechaCita").change();
});

$("#dtpFechaCita").change(function(){	
	//solicitar via socket las citas de los clientes por fecha
	//console.log($("#dtpFechaCita").val())	;
	if(moment($("#dtpFechaCita").val()).isValid()){
		socket.emit('listarCitasHoy',$("#dtpFechaCita").val());}
});
$('#btnCrearCita').click(function(){
	if(!$(this).hasClass('disabled')){
	prepararModalCitas();
	asignarCalendarioABD=true;
	geneIdConsulta=3;
	$('.nav-tabs a[href="#calendar"]').tab('show');}
	//solicitar via socket las citas de los clientes de hoy

	//socket.emit('listarCitasHoy',moment().format('L'));
});
function prepararModalCitas() {
	
	moment.locale('fr-ca');
	var hora=moment();
	hora=hora.add(10,'minutes');
	//console.log(hora.format('LT')); 
	$('#dtpHoraCita').val(hora.format('LT'));
	var lim=moment().subtract(1,'days').format('L');
	$("#dtpFechaCita").attr('min',moment().format('L'));
	$("#dtpFechaCita").val(moment().format('L'));
	$('#divErrorCita').addClass('sr-only');
}
$('#btnProgramarCita').click(function(){
	if(!$(this).hasClass('disabled')){
	moment.locale('fr-ca');
	console.log('cli pro')
	var horaNueva=moment($('#dtpHoraCita').val(),'HH:mm');
	//console.log('hora que viene del objeto ' +horaNueva.format('LT'));
	var estado = true;
	
	var diferencia=0;
	$('#tblCitas>tbody>tr').each(function(index,element){
		
		var horaComparar=moment($(element).find('.hora').html(),'HH:mm');
		
		diferencia = horaComparar.diff(horaNueva,'minutes');
		//console.log('Diferencia entre horas ' + diferencia);
		if (diferencia>-10 && diferencia<10) {estado=false; return false;}
		else{//asignar valor verdadero para luego agregar a la BD
			 estado = true;}

	});

	if (estado==false){
		$('.mensajeError').text("Conflicto, No se cumplen 10 minutos entre citas.")
		$('#divErrorCita').removeClass('sr-only');
		//console.log('No hay 10 min entre las citas.' +  ${diferencia} + ' min');
	}
	else{
		var FechaHora= $("#dtpFechaCita").val() + ' ' + $("#dtpHoraCita").val()
		//console.log(FechaHora);
		socket.emit('agregarCita',datosGenerales.idCliente,FechaHora,idUsuario);    
	}
	}

});
function verificarCitaClienteporDia(idPaciente){
	var estadoExiste=true;
	$('#tblCitas>tbody>tr').each(function(index,element){
		var idPacienteLista=$(element).find('.id').html();
		if(datosGenerales.idCliente==idPacienteLista){
			$('#btnProgramarCita').prop( "disabled", true );
			$('.mensajeError').text('El cliente ya tiene cita en este día.');
			$('#divErrorCita').removeClass('sr-only');
			estadoExiste=false;
			return false;}
		else{estadoExiste=true;}
	});
	if( estadoExiste){return true;}
}
function agregarFila(){

		// Obtenemos el numero de filas (td) que tiene la primera columna
		// (tr) del id "tabla"
		var tds=$("#tblCitas tr:first td").length;
		// Obtenemos el total de columnas (tr) del id "tabla"
		var trs=$("#tblCitas tr").length;
		var nuevaFila="<tr>";
		for(var i=0;i<tds;i++){
				// añadimos las columnas
				nuevaFila+="<td>"+(i+1)+" Añadida con jquery</td>";
		}
		// Añadimos una columna con el numero total de columnas.
		// Añadimos uno al total, ya que cuando cargamos los valores para la
		// columna, todavia no esta añadida
		nuevaFila+="<td>"+(trs+1)+" columnas";
		nuevaFila+="</tr>";
		$("#tblCitas").append(nuevaFila);
}
$('.eliminarCita').click(function(){
	 /**
 * Funcion para eliminar la ultima columna de la tabla.
 * Si unicamente queda una columna, esta no sera eliminada
 */
		// Obtenemos el total de columnas (tr) del id "tabla"
		var trs=$("table tr").length;
		console.log (trs);
		if(trs>1)
		{
				// Eliminamos la ultima columna
				$("table tr:last").remove();
		}
});

$('#btnGuardarPago').click(function(){
	if($('.modal-adelanto').find('#cmbTipoDeposito').val()==0){
		$('.modal-adelanto').find(".mensajeError").html("Debe escoger un turno.");
		$('.modal-adelanto').find('#divErrorPago').removeClass('sr-only');}
	else if($('.modal-adelanto').find('#txtMontoPagado').val()<=0){
		$('.modal-adelanto').find(".mensajeError").html("El monto no puede ser negativo o estar vacío.");
		$('.modal-adelanto').find('#divErrorPago').removeClass('sr-only');
	}
	else{//console.log($('#cmbTipoDeposito').val())
		$('.modal-adelanto').find('#divErrorPago').addClass('sr-only');
	//datosCitasDelDia
	var idreg=parseInt($('.modal-adelanto').find('#lblidRegistro').text());
	var cant=parseFloat($('.modal-adelanto').find('#txtMontoPagado').val());
	var obsv=$('.modal-adelanto').find('#txtObservacion').val();
	$.ajax({url: 'php/insertarPago.php', type: 'POST', data: {
		idreg: parseInt($('.modal-adelanto').find('#lblidRegistro').text()),
		cant: parseFloat($('.modal-adelanto').find('#txtMontoPagado').val()),
		obs: obsv,
		idcli: datosGenerales.idCliente,
		tipoPago: 2,
		turno: $('#cmbTipoDeposito').val()
	}}).done(function (resp) {
		console.log(resp);
		if(resp!=null){
			if(obsv!="") {obsv= '<strong>Obs: </strong>'+obsv;}
			$('.modal-adelanto').modal('hide');
			$(`#Reg${idreg}`).find('.pagos').append(`<p>Pagó <strong>S/. ${parseFloat(cant).toFixed(2)}</strong> el ${moment().format('dddd[,] DD [de] MMMM [de] YYYY')}. <span class="capital">${obsv}</span>. <em>${usuario.nombre}</em></p>`);
			$(`#Reg${idreg}`).parent().find('.moneda').html(`<span class="label label-primary pull-right">S/.</span>`);
			if(idreg==0){$('#panelPago').removeClass('sr-only');}
		}
	});
		
	}
});
$('#btnIngresarPago').click(function(){
	$('#divErrorPago').addClass('sr-only');
});

$('#btnGuardarMotivo').click(function(){ 
	datosGenerales.motivo=$('#txtMotivo').val().toUpperCase();
	//socket.emit('crearHistoria',datosGenerales.idCliente,datosGenerales.motivo.toUpperCase(),usuario.idUsuario);
	$.ajax({
		url: 'php/insertarHistoriaClinica.php',
		type: 'POST',
		data: { idcliente: datosGenerales.idCliente,
			motivo: datosGenerales.motivo.toUpperCase()}
	}).success(function (resp) {
		dato= JSON.parse(resp);

		if (dato == null){
			console.log('un error');
		}else{
			
			datosGenerales.idHistoria=dato.idHistoria;
			datosGenerales.histclifechaCreacion=moment().format('YYYY-MM-DD H:mm')
			$('#lblHistoria').html(`<strong ><span id="lblIdHistoria">${dato.idHistoria}</span></strong>`);
			$('#crearHistoria').addClass('hidden');$('#imprHistoria').removeClass('hidden');
			$('#btnCrearCita').removeClass('disabled');
			$('#btnCrearRevaluacion').removeClass('disabled');
			$('#btnCrearProcedimiento').removeClass('disabled');
			$("#imprHistoria").click();
		}
	});
	$('.modal-motivo').modal('hide');
	
});
$('#txtMotivo').keypress(function(event){
	if (event.keyCode === 10 || event.keyCode === 13) 
		{event.preventDefault();
		$('#btnGuardarMotivo').click();
		$('#txtMotivo').val('');
	 }
});

function toTitleCase(str)
{
		return str.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
}
$('#txtBuscar').keypress(function(event){
	if (event.keyCode === 10 || event.keyCode === 13) 
		{event.preventDefault();
		$('#btnBuscar').click();
		$('#txtBuscar').val('');}
});
$('#btnBuscar').click(function(){
	if($('#txtBuscar').val().length==8){
		if(esNumero($('#txtBuscar').val())){ //sólo letras devuelve true, combinado letras con números es false
			//buscar en dnis
			//socket.emit('buscarClientePorDni',$('#txtBuscar').val());
			$.ajax({url: 'php/buscarClientePorDni.php', type: 'POST', data: {texto: $('#txtBuscar').val() }}).done(function (resp) {
				//console.log(JSON.parse(resp))
				
				
				$('.modal-resultadosBusqueda').modal('show').find('tbody').empty();
				$('.modal-resultadosBusqueda').find('strong').html(JSON.parse(resp).length);
				if(JSON.parse(resp).length==0){$('.modal-resultadosBusqueda').find('table').hide();}
				else{$('.modal-resultadosBusqueda').find('table').show();}
				$.each(JSON.parse(resp), function (index, element) { console.log(element)
					var cumple=moment(element.cliFechaNacimiento, "YYYY-MM-DD");	
					cumple.locale('es');			
					
					//console.log(moment(cumple).preciseDiff(moment.().format('YYYY')));
					$('.modal-resultadosBusqueda').find('tbody').append(`<tr>
								<th scope="row">${index +1}</th>
								<td>${element.idHistoria}</td>
								<td>${element.nombres}</td>
								<td class="hidden id">${element.idCliente}</td>
								<td class="">${moment(cumple).toNow(true)}</td>
								<td><a class="btn btn-sm btn-success" href="ClientePanel.php?id=${element.idCliente}" role="button">Ver <span class="glyphicon glyphicon-user"></span></a></td>
							</tr>`);
				});
			});
		}
	}
	else{
		//socket.emit('buscarClientePorNumeroHistoria',$('#txtBuscar').val());
		$.ajax({url: 'php/buscarClientePorNumeroHistoria.php', type: 'POST', data: {texto: $('#txtBuscar').val() }}).done(function (resp) {
				//console.log(JSON.parse(resp))
				
				
				$('.modal-resultadosBusqueda').modal('show').find('tbody').empty();
				$('.modal-resultadosBusqueda').find('strong').html(JSON.parse(resp).length);
				if(JSON.parse(resp).length==0){$('.modal-resultadosBusqueda').find('table').hide();}
				else{$('.modal-resultadosBusqueda').find('table').show();}
				$.each(JSON.parse(resp), function (index, element) { console.log(element)
					var cumple=moment(element.cliFechaNacimiento, "YYYY-MM-DD");	
					cumple.locale('es');			
					
					//console.log(moment(cumple).preciseDiff(moment.().format('YYYY')));
					$('.modal-resultadosBusqueda').find('tbody').append(`<tr>
								<th scope="row">${index +1}</th>
								<td>${element.idHistoria}</td>
								<td>${element.nombres}</td>
								<td class="hidden id">${element.idCliente}</td>
								<td class="">${moment(cumple).toNow(true)}</td>
								<td><a class="btn btn-sm btn-success" href="ClientePanel.php?id=${element.idCliente}" role="button">Ver <span class="glyphicon glyphicon-user"></span></a></td>
							</tr>`);
				});
			});
	}

	if(!esNumero($('#txtBuscar').val()) && $('#txtBuscar').val().length>=3){//buscar en nombres
		//socket.emit('buscarClientePorApellido',$('#txtBuscar').val());
		$.ajax({url: 'php/buscarClientePorNombre.php', type: 'POST', data: {texto: $('#txtBuscar').val() }}).done(function (resp) {
				//console.log(JSON.parse(resp))
				
				$('.modal-resultadosBusqueda').modal('show').find('tbody').empty();
				$('.modal-resultadosBusqueda').find('strong').html(JSON.parse(resp).length);
				if(JSON.parse(resp).length==0){$('.modal-resultadosBusqueda').find('table').hide();}
				else{$('.modal-resultadosBusqueda').find('table').show();}
				$.each(JSON.parse(resp), function (index, element) { console.log(element)
					var cumple=moment(element.cliFechaNacimiento, "YYYY-MM-DD");	
					cumple.locale('es');			
					
					//console.log(moment(cumple).preciseDiff(moment.().format('YYYY')));
					$('.modal-resultadosBusqueda').find('tbody').append(`<tr>
								<th scope="row">${index +1}</th>
								<td>${element.idHistoria}</td>
								<td>${element.nombres}</td>
								<td class="hidden id">${element.idCliente}</td>
								<td class="">${moment(cumple).toNow(true)}</td>
								<td><a class="btn btn-sm btn-success" href="ClientePanel.php?id=${element.idCliente}" role="button">Ver <span class="glyphicon glyphicon-user"></span></a></td>
							</tr>`);
				});
			});
	}
	$('#txtBuscar').val('');
});
$('#txtBuscarMini').keypress(function(event){
	if (event.keyCode === 10 || event.keyCode === 13) 
		{event.preventDefault();
		$('#btnBuscarMini').click();
		$('#txtBuscarMini').val('');}
});
$('#btnBuscarMini').click(function(){
	if($('#txtBuscarMini').val().length==8){
		if(esNumero($('#txtBuscarMini').val())){ //sólo letras devuelve true, combinado letras con números es false
			//buscar en dnis
			socket.emit('buscarClientePorDni',$('#txtBuscarMini').val());
		}
	}
	else{
		socket.emit('buscarClientePorNumeroHistoria',$('#txtBuscarMini').val());
	}

	if(!esNumero($('#txtBuscarMini').val()) && $('#txtBuscarMini').val().length>=3){//buscar en nombres
		socket.emit('buscarClientePorApellido',$('#txtBuscarMini').val());
	}
	$('#txtBuscarMini').val('');
});
function esNumero(cadena)
{
			if (cadena.match(/^[0-9]+$/))
			{
				return true;
			}
			else
			{
				return false;
			}
}
$('#alistarUltimos').click(function() {
	socket.emit('listarUltimosRegistrados');
});
$('#btnActualizarDatos').click(function(){
	
	//console.log(`${}`);
	$('.modal-actualizarCliente #txtDni').val(datosGenerales.dni);
	$('.modal-actualizarCliente #cmbProcedencia').val(datosGenerales.idprocedencia);
	$('.modal-actualizarCliente #cmbTipoPersona').val(datosGenerales.idTipoDocumentoIdentidad).change();
	$('.modal-actualizarCliente #cmbEstadoCivil').val(datosGenerales.idestadocivil);
	$('.modal-actualizarCliente #cmbOcupacion').val(datosGenerales.idocupacion);
	$('.modal-actualizarCliente #cmbGrado').val(datosGenerales.idgradoestudios);
	$('.modal-actualizarCliente #txtApellidoPaterno').val(toTitleCase(datosGenerales.cliApellidoPaterno));
	$('.modal-actualizarCliente #txtApellidoMaterno').val(toTitleCase(datosGenerales.cliApellidoMaterno));
	$('.modal-actualizarCliente #txtNombres').val(toTitleCase(datosGenerales.cliNombres));
	$('.modal-actualizarCliente #txtTelefono').val(datosGenerales.cliTelefono);
	$('.modal-actualizarCliente #txtCelular').val(datosGenerales.cliCelular);
	if(datosGenerales.cliDireccion!='-'){$('.modal-actualizarCliente #txtDireccion').val(toTitleCase(datosGenerales.cliDireccion));}
	if(datosGenerales.sexo=='M'){$('#chkSexo').bootstrapSwitch('state', true);}
	else{$('#chkSexo').bootstrapSwitch('state', false);}

	
	fechaNa=moment(datosGenerales.cliFechaNacimiento);
	//console.log(fechaNa.format('YYYY-MM-DD'));
	$('.modal-actualizarCliente #dtpFechaNacimiento').val(fechaNa.format('YYYY-MM-DD'));
	$('.modal-actualizarCliente').modal('show');
});

$('#btnActualizarCliente').click(function(){
	if(validarCamposCliente()) {grabarCliente('actualizar');}
});
$('#btnIngresarPagoExtraCliente').click(function() {
	$('#lblidRegistro').html('0');
	$('.modal-adelanto').modal('show');
})
$('#listRegistro').on('click','.btnPagar',function() {
	var idReg=$(this).attr("id").replace('btnPagar','');
	idRegistroMovible=idReg;
	reconocerTurno();
	$('#lblidRegistro').html(idReg);
	$('.modal-adelanto').modal('show');
});
$('#listRegistro').on('click','.btnImprimirConsulta',function(){
	var idd=$(this).attr("id");
	var idReg, titulo;
	var observacion=encodeURIComponent('');
	var usuarioResp=$(this).parent().parent().find('.userResponsable').text();
	var sfecha=$(this).parent().parent().find('.creadoEn').text();
	if(idd.search('btnImprimirConsulta')!=-1){
		idReg=$(this).attr("id").replace('btnImprimirConsulta','');
		titulo=encodeURIComponent('REGISTRO DE CONSULTA');
	}
	if(idd.search('btnImprimirRevaluación')!=-1){
		idReg=$(this).attr("id").replace('btnImprimirRevaluación','');
		titulo=encodeURIComponent('CITA DE CONTROL GRATUITA');
	}
	if(idd.search('btnImprimirProcedimiento')!=-1){ 
		idReg=$(this).attr("id").replace('btnImprimirProcedimiento','');
		titulo=encodeURIComponent('PROCEDIMIENTO: ' + $('#cmbTipoProcedimiento option:selected').text());
		if($('#txtMotivoProcedimiento').val().length>0){
			observacion=encodeURIComponent('<em>Obs.: «'+$('#txtMotivoProcedimiento').val()+'»</em>');
		}
			else{observacion=encodeURIComponent('');}
		
	}
	
	var hora= encodeURIComponent ($('#listRegistro').find(`#Reg${idReg} .phora`).text());
	var dia=encodeURIComponent ($('#listRegistro').find(`#Reg${idReg} .pdia`).text());
	urlImpr='imprimirCita.php?motivo='+titulo+'&dia='+dia+'&hora='+hora+'&nombres='+encodeURIComponent(datosGenerales.nombres)+'&idHistoria='+datosGenerales.idHistoria+'&observacion='+observacion+'&nomUsuario='+encodeURIComponent(usuarioResp)+'&sfecha='+encodeURIComponent(sfecha);
	console.log(urlImpr);
	loadPrintDocument(this,{
		url: urlImpr,
		attr: "href",
		message:"Tu documento está siendo creado"
	});
});
/*$('#listRegistro').on('click','.btnModificar',function(){
	$('.modal-cita').find('h4').text('Cambiar de fecha una cita existente');
	var idReg=$(this).attr("id").replace('btnModificar','');
	$('#btnActualizarProgramacionCita').removeClass('sr-only');
	$('#btnProgramarCita').addClass('sr-only');
	prepararModalCitas();
	$('.modal-cita #lblidRegistroUpdate').text(idReg);
	$('.modal-cita').modal('show');
	
});*/
$('#listRegistro').on('click','.btnModificar',function(){
	idRegistroMovible=$(this).attr("id").replace('btnModificar','');
	geneIdConsulta=6; asignarCalendarioABD=true;
	var dia=$(`#Reg${idRegistroMovible}`).find('.pdia').text();
	var nuev=dia.substr(dia.search(',')+2,dia.length);

	var horacio= moment(nuev.replace(/de /g,''), 'DD MMMM YYYY');
	//console.log(horacio.format('YYYY-MM-DD'))
	$('.nav-tabs a[href="#calendar"]').tab('show');
	//$('#dtpFechaCalendario').val(horacio.format('YYYY-MM-DD'));

});
$('#listRegistro').on('click','.btnCancelarControl',function(){
	idRegistroMovible=$(this).attr("id").replace('btnCancelarControl','');
	$('.modal-cancelarCita').modal('show');	
});
$('#btnActualizarProgramacionCita').click(function() {
	var FechaHora= $("#dtpFechaCita").val() + ' ' + $("#dtpHoraCita").val();
	socket.emit('updateFechaConsulta',parseInt($('#lblidRegistroUpdate').text()), FechaHora,usuario.idUsuario);
});
$('#btnCrearRevaluacion').click(function () {
	if(!$(this).hasClass('disabled')){
	geneIdConsulta=4; asignarCalendarioABD=true;
	$('.nav-tabs a[href="#calendar"]').tab('show');
	}
});
$('#btnCrearProcedimiento').click(function () {
	if(!$(this).hasClass('disabled')){
	$('.modal-motivoProcedimiento').modal('show');
	}
});
$('#btnEliminarCliente').click(function () {
	
});
$('#btnCrearMotivoProcedimiento').click(function(){
	
	if($('#cmbTipoProcedimiento').val()=='0'){$('#divErrorMotivoProcedimiento').removeClass('sr-only').find('.mensajeError').text('Debe seleccionar una categoría de procedimiento.');}
	else if($('#cmbTipoProcedimiento').val()=='8' && $('#txtMotivoProcedimiento').val()==''){$('#divErrorMotivoProcedimiento').removeClass('sr-only').find('.mensajeError').text('Debe rellenar una razón en la caja de texto.');}
	else{
		if($('#cmbTipoProcedimiento').val()=='8'){motivProcedimiento=$('#txtMotivoProcedimiento').val();}
		else{motivProcedimiento=$('#cmbTipoProcedimiento option:selected').html() + ' '+ $('#txtMotivoProcedimiento').val().toLowerCase();}
				$('.modal-motivoProcedimiento').modal('hide');
				geneIdConsulta=5; asignarCalendarioABD=true;
				$('.nav-tabs a[href="#calendar"]').tab('show');}
	
});

/*$('td').on({mouseenter: function () {
	col =$(this).html();
	console.log(col);}
})*/
$('td').hover(function() {
	col =$(this).attr('data-column');
	//console.log(col)
	$('.tablaCalendario').find(`th[data-column='${col}']`).css({'background-color':'#fce7ba', 'color':'#694D9F'});
}).mouseleave(function(){
	$('.tablaCalendario').find(`th[data-column='${col}']`).css({'background-color':'#9d85cc', 'color': '#fff'});
})

$('td').dblclick(function(){
	var row = $(this).attr("data-row");
	var col = $(this).attr("data-column");
	if(geneIdConsulta==6){clientePuedeCitaHoy=true;}
		else{
	clientePuedeCitaHoy=$('#mnjClienteCitadoHoy').hasClass('hidden');}
	//console.log(asignarCalendarioABD + ' '+ clientePuedeCitaHoy);

	if($(this).text()=='' && asignarCalendarioABD && clientePuedeCitaHoy 	){//asignar un boton
	//$(this).text(row+':'+col);
	var hora=moment(row+':'+col,'H:mm');
	$('#lblAsignarHoraAMPM').text(hora.format('LT'));
	$('#lblAsignarHoraCompleta').text(row+':'+col);
	$('#modalAsignar').modal('show');
	}
	clientePuedeCitaHoy=false;
});
$('.tablaCalendario').on('click','.btnDer',function(){
	var sumaMinutos;
	if($(this).parents('.tablaCalendario').attr('id')=='mañana5min'){sumaMinutos=5;}
	if($(this).parents('.tablaCalendario').attr('id')=='mañana10min'){sumaMinutos=10;}
	if($(this).parents('.tablaCalendario').attr('id')=='tarde'){sumaMinutos=15;}
	var row = parseInt($(this).parent().parent().attr("data-row"));
	var col = parseInt($(this).parent().parent().attr("data-column"));
	
	//console.log('Fila clickeada: '+row+':'+col);
	//Para la siguiente casilla
	var nextRow;
	var nextCol=col+sumaMinutos;
	if(nextCol==60){nextRow=row+1;nextCol='0';}//console.log('Proxima fila a mover '+ (row+1)+':0');}
	else {nextRow=row;}//console.log('Proxima columna a mover '+row+':'+nextCol);}

	var proxRow = row; var proxCol=col;
	var minutos, minutosLibre, minutosOcupado;	var estado = true;	var ocupado=0;
	var rowLibre, colLibre;
	var rowUltimo = row;
	var colUltimo = col;
	console.log(minutosControl)
	while (estado){
		if(proxRow>=6 && proxRow<=9){minutos=minutosControl}
			else{minutos=15}
		if(proxCol==45 && proxRow>=10){proxRow=proxRow+1;proxCol=0;}
		else if(proxCol==(60-minutosControl)){proxRow=proxRow+1;proxCol=0;}
		else{proxCol+=minutos;}
		//console.log('actual ' + proxRow+'~'+proxCol);
		if($(`td[data-row='${proxRow}'][data-column='${proxCol}']`).html().length==0){estado=false; rowLibre=proxRow,colLibre=proxCol}
		else {estado=true;ocupado++;rowUltimo=proxRow;colUltimo=proxCol;}
		//console.log(estado);
	} 
	/*console.log('ocupado ' + rowUltimo+'~'+colUltimo);
	console.log('libre ' + rowLibre+'~'+colLibre);*/
	

	estado = true;
	var idReg
	while(estado){
		idReg=datosCitasDelDia[parseInt($(`td[data-row='${rowUltimo}'][data-column='${colUltimo}']`).find('.btnPacienteCalendario').attr('id'))].idregistroMovimientos;
		//console.log($('#dtpFechaCalendario').val() +' '+ rowLibre +':' +colLibre);
		socket.emit('moverFechaConsulta', idReg,$('#dtpFechaCalendario').val() +' '+ rowLibre +':' +colLibre,idUsuario );
		$(`td[data-row='${rowLibre}'][data-column='${colLibre}']`).html($(`td[data-row='${rowUltimo}'][data-column='${colUltimo}']`).html());
		$(`td[data-row='${rowUltimo}'][data-column='${colUltimo}']`).html('');
		rowLibre=rowUltimo; colLibre=colUltimo;
		//console.log('row libre '+rowLibre+' col libre ' + colLibre);
		
		if(rowLibre==10 && colUltimo==0){minutosOcupado=minutosControl}
		else if(rowUltimo>=6 && rowUltimo<=9){minutosOcupado=minutosControl}
		else{minutosOcupado=15}
			//console.log('minutos '+minutosOcupado)
		if(colUltimo==0){rowUltimo=rowUltimo-1;colUltimo=60-minutosOcupado;}
		else{colUltimo-=minutosOcupado;}
		//if(rowUltimo==9 && colUltimo==50){}
		//console.log('ulti row ocupado '+rowUltimo+' ulti col ocupado ' + colUltimo);
		//console.log('row libre '+rowLibre+' col libre ' + colLibre);				
		if(colLibre<=col && rowLibre==row){estado=false}
			else estado = true;
	}

	/*if($(`td[data-row='${nextRow}'][data-column='${nextCol}']`).html().length==0){
		$(`td[data-row='${nextRow}'][data-column='${nextCol}']`).html($(`td[data-row='${row}'][data-column='${col}']`).html());
		$(`td[data-row='${row}'][data-column='${col}']`).html('');
	}*/
	
});

$('.tablaCalendario').on('click','.btnIzq',function(){
	var sumaMinutos;
	if($(this).parents('.tablaCalendario').attr('id')=='mañana'){sumaMinutos=10;}
	if($(this).parents('.tablaCalendario').attr('id')=='tarde'){sumaMinutos=15;}
	var row = parseInt($(this).parent().parent().attr("data-row"));
	var col = parseInt($(this).parent().parent().attr("data-column"));
	//console.log($(this).parents('.tablaCalendario').attr('id'));
	//console.log('Fila clickeada: '+row+':'+col);
	//Para la siguiente casilla
	var nextRow;
	var nextCol=col-sumaMinutos;

	if(nextCol<0){nextRow=row-1;nextCol=60-sumaMinutos;}//console.log('Proxima fila a mover '+ (row-1)+':'+(60-sumaMinutos));
	else {nextRow=row;console.log('Proxima columna a mover '+row+':'+nextCol);}			
	if(nextRow==9 && nextCol==45)	{nextCol=50;}
	if($(`td[data-row='${nextRow}'][data-column='${nextCol}']`).html().length==0){
		$(`td[data-row='${nextRow}'][data-column='${nextCol}']`).html($(`td[data-row='${row}'][data-column='${col}']`).html());
		$(`td[data-row='${row}'][data-column='${col}']`).html('');
	}
});

$('#btnAgregarConsultaHorario').click(function(){

	var completa=moment($('#lblAsignarHoraCompleta').text(),'H:mm');
	var row=completa.format('H');
	var col=completa.format('m');
	var fechaHoraC =$('#dtpFechaCalendario').val()+ ' '+row+':'+col;
	/*$(`td[data-row='${row}'][data-column='${col}']`).html(`<div class="btn-group contenido">
		<button type="button" class="btn btn-sm btn-negro btnIzq"><span class="glyphicon glyphicon-backward"></span></button><button type="button" class="btn btn-sm btn-primary">Consulta</button>
		<button type="button" class="btn btn-sm btn-negro btnDer"><span class="glyphicon glyphicon-forward"></span></button></div>`);*/
	//agregar a la BD
	//console.log('ci')
	switch(geneIdConsulta){
		case 3: $.ajax({url: 'php/insertarCitaNueva.php', type: 'POST', data: {
			idcliente: datosGenerales.idCliente,
			fechaHora:fechaHoraC}
		}). done(function (resp) { 
			if(resp!=null){
				var dato=JSON.parse(resp);
				if(dato.id>=0){
					
					var cita= moment(fechaHoraC,'YYYY-MM-DD H:m');	
					cita.locale('es');
					cita=cita.format('LLLL');
					
					$('.modal-cita').modal('hide');
					$('#mnjCitaRegistrada').removeClass('hidden')
					.find('#lblMnjCita').html(cita);
					
					$('#listRegistro').prepend(`<div class="panel bs-callout bs-callout-success panel-sombreado" style="margin-bottom: 10px;">
										<div class="panel-heading " role="button" data-toggle="collapse" data-parent="#accordion" href="#Reg${dato.id}" aria-expanded="true" aria-controls="${dato.id}" role="tab">
										  <h4 class="panel-title">
											<span >
											  <strong>Consulta</strong> <span class="lblTiempoCita">${moment(fechaHoraC).fromNow()}</span> <span class="moneda"></span></span>
										  </h4>
										</div>
										<div id="Reg${dato.id}" class="panel-collapse collapse in" role="tabpanel" >
										  <div class="panel-body">
										  	<p class="pagos"></p>
											<p class="pconsulta">Consulta creada para las <span class="phora">${moment(fechaHoraC,'YYYY-MM-DD H:mm').format('h:mm a')}</span> del día <span class="pdia">${moment(fechaHoraC).format('dddd[,] DD [de] MMMM [de] YYYY')}</span>. <em class="userResponsable mayuscula">${usuario.nombreCompleto}</em>
											<br><span class="text-muted"><small>Registrado el: <span class="creadoEn">${moment().format('dddd[,] DD [de] MMMM [de] YYYY')}</span>. </small></span></p>
											<div class="form-group">
												<button type="button" class="btn btn-success btn-outline btnImprimirConsulta" id="btnImprimirConsulta${dato.id}" ><span class="glyphicon glyphicon-print"></span> Imprimir voucher</button>
												<button type="button" class="btn btn-amarillo btn-outline btnPagar" id="btnPagar${dato.id}" ><span class="glyphicon glyphicon-piggy-bank"></span> Pagar</button>
												<button type="button" class="btn btn-info btn-outline btnModificar" id="btnModificar${dato.id}"><span class="glyphicon glyphicon-export"></span> Mover fecha</button>
												<button type="button" class="btn btn-danger btn-outline btnCancelarControl" id="btnCancelarControl${dato.id}"><span class="glyphicon glyphicon-fire"></span> Quemar consulta</button>
											</div>
										  </div>
										</div>
								  </div>`);
						}
					}
					
					});break;

		case 4: $.ajax({url: 'php/insertarRevaluacionNueva.php', type: 'POST', data: {
			idcliente: datosGenerales.idCliente,
			fechaHora:fechaHoraC}
			}). done(function (resp) { 
			if(resp!=null){
				var dato=JSON.parse(resp);
				if(dato.id>=0){
					
					var cita= moment(fechaHoraC,'YYYY-MM-DD H:m');	
					cita.locale('es');
					cita=cita.format('LLLL');
					//console.log(dato);
					
					$('.modal-cita').modal('hide');
					$('#mnjCitaRegistrada').removeClass('hidden')
					.find('#lblMnjCita').html(cita);
					
					$('#listRegistro').prepend(`<div class="panel bs-callout bs-callout-success panel-sombreado" style="margin-bottom: 10px;">
							<div class="panel-heading " role="tab">
							  <h4 class="panel-title">
								<span role="button" data-toggle="collapse" data-parent="#accordion" href="#Reg${dato.id}" aria-expanded="true" aria-controls="${dato.id}">
								  <strong>Revaluación</strong> <span class="lblTiempoCita">${moment(fechaHoraC).fromNow()}</span>  <span class="moneda"></span></span>
							  </h4>
							</div>
							<div id="Reg${dato.id}" class="panel-collapse collapse in" role="tabpanel" >
							  <div class="panel-body">
								<p class="pconsulta">Consulta creada para las <span class="phora">${moment(fechaHoraC,'YYYY-MM-DD H:mm').format('h:mm a')}</span> del día <span class="pdia">${moment(fechaHoraC).format('dddd[,] DD [de] MMMM [de] YYYY')}</span>. <em class="userResponsable mayuscula">${usuario.nombreCompleto}</em>
								<br><span class="text-muted"><small>Registrado el: <span class="creadoEn">${moment().format('dddd[,] DD [de] MMMM [de] YYYY')}</span>. </small></span></p>
								<p class="pagos"></p>
								<div class="form-group">
									<button type="button" class="btn btn-success btn-outline btnImprimirConsulta" id="btnImprimirRevaluación${dato.id}" ><span class="glyphicon glyphicon-print"></span> Imprimir voucher</button>
									<button type="button" class="btn btn-amarillo btn-outline btnPagar" id="btnPagar${dato.id}" ><span class="glyphicon glyphicon-piggy-bank"></span> Pagar</button>
									<button type="button" class="btn btn-info btn-outline btnModificar" id="btnModificar${dato.id}"><span class="glyphicon glyphicon-export"></span> Mover fecha</button>
									<button type="button" class="btn btn-danger btn-outline btnCancelarControl" id="btnCancelarControl${dato.id}"><span class="glyphicon glyphicon-fire"></span> Cancelar control</button>
								</div>
							  </div>
							</div>
					  </div>`);
						}
					}
					
					});break;
		case 5: 
			$.ajax({url: 'php/insertarProcedimientoNuevo.php', type: 'POST', data: {
			idcliente: datosGenerales.idCliente,
			fechaHora:fechaHoraC,
			motivo:motivProcedimiento}
			}). done(function (resp) { 
			if(resp!=null){
				var dato=JSON.parse(resp);
				if(dato.id>=0){
					
					var cita= moment(fechaHoraC,'YYYY-MM-DD H:m');	
					cita.locale('es');
					cita=cita.format('LLLL');
					//console.log(dato);
					
					$('.modal-cita').modal('hide');
					$('#mnjCitaRegistrada').removeClass('hidden')
					.find('#lblMnjCita').html(cita);
					
					$('#listRegistro').prepend(`<div class="panel bs-callout bs-callout-success panel-sombreado" style="margin-bottom: 10px;">
								<div class="panel-heading " role="tab">
								  <h4 class="panel-title">
									<span role="button" data-toggle="collapse" data-parent="#accordion" href="#Reg${dato.id}" aria-expanded="true" aria-controls="${dato.id}">
									  <strong>Procedimiento</strong> ${motivProcedimiento} <span class="lblTiempoCita">${moment(fechaHoraC).fromNow()}</span>  <span class="moneda"></span></span>
								  </h4>
								</div>
								<div id="Reg${dato.id}" class="panel-collapse collapse in" role="tabpanel" >
								  <div class="panel-body">
									<p class="pconsulta">Consulta creada para las <span class="phora">${moment(fechaHoraC,'YYYY-MM-DD H:mm').format('h:mm a')}</span> del día <span class="pdia">${moment(fechaHoraC).format('dddd[,] DD [de] MMMM [de] YYYY')}</span>. <em class="userResponsable mayuscula">${usuario.nombreCompleto}</em>
									<br><span class="text-muted"><small>Registrado el: <span class="creadoEn">${moment().format('dddd[,] DD [de] MMMM [de] YYYY')}</span>. </small></span></p>
									<p class="pagos"></p>
									<div class="form-group">
										<button type="button" class="btn btn-success btn-outline btnImprimirConsulta" id="btnImprimirProcedimiento${dato.id}" ><span class="glyphicon glyphicon-print"></span> Imprimir voucher</button>
										<button type="button" class="btn btn-amarillo btn-outline btnPagar" id="btnPagar${dato.id}" ><span class="glyphicon glyphicon-piggy-bank"></span> Pagar</button>
										<button type="button" class="btn btn-info btn-outline btnModificar" id="btnModificar${dato.id}"><span class="glyphicon glyphicon-export"></span> Mover fecha</button>
										<button type="button" class="btn btn-danger btn-outline btnCancelarControl" id="btnCancelarControl${dato.id}"><span class="glyphicon glyphicon-fire"></span> Cancelar control</button>
									</div>
								  </div>
								</div>
						  </div>`);
						}
					}
					
					}); break;
		case 6: socket.emit('updateFechaConsulta',idRegistroMovible,$('#dtpFechaCalendario').val()+ ' '+row+':'+col,usuario.idUsuario); break;
		default: break;
	}	
	$('.nav-tabs a[href="#home"]').tab('show');
	idRegistroMovible=0;

});

$('a[aria-controls="home"]').on('shown.bs.tab', function (){
	$('html body').animate({scrollTop: 110}, 800);
	asignarCalendarioABD=false;
	$('#mnjClienteCitadoHoy').addClass('hidden');
});

$('a[aria-controls="calendar"]').on('shown.bs.tab', function () {
	$('html body').animate({scrollTop: 110}, 800);
	$('.alert').addClass('sr-only');
	moment.locale('es');
	$('#dtpFechaCalendario').val(moment().format('YYYY-MM-DD'));
	$('#dtpFechaCalendario').change();
	/*var dia = moment($('#dtpFechaCalendario').val());
	
	$('#lblDiaCalendar').text(dia.format('dddd, D [de] MMMM [de] YYYY'));
	if(moment($("#dtpFechaCalendario").val()).isValid()){
		socket.emit('listarCitasHoy',$("#dtpFechaCalendario").val());}*/
});

$('a[aria-controls="messages"]').on('shown.bs.tab', function (){

	$.ajax({url:'php/listarComentariosParaCliente.php', type: 'POST', data: {idCli: datosGenerales.idCliente}}).done(function (resp) {
		$.each(JSON.parse(resp), function (index, elemento) {
		
		$('#divNotas').append(`<div class="col-sm-3 animated fadeInUp" >
			<div class="panel panel-primary">
				<div class="panel-heading"><span class="glyphicon glyphicon-paperclip"></span> <strong> ${elemento.comentTitulo}</strong></div>
				<div class="panel-body">
					<em><h6 class="text-right">	${moment(elemento.comentFecha).fromNow()}</h6>
					<p class="text-primary">«${elemento.comentRelleno}»</p>								
					<h6 class="text-right">${elemento.usuNombre}.</p></h6></em>
				</div>
				<div class="panel-footer text-center">
					<div class="btn-group" role="group" aria-label="...">
						<button type="button" class="btn btn-success mitooltip btnEditarNota hidden" data-toggle="tooltip" data-placement="top" title="Editar"><span class="glyphicon glyphicon-pencil"></span></button>
						<button type="button" class="btn btn-danger btn-outline mitooltip btnEliminarNota" id="${elemento.idComentario}"  data-toggle="tooltip" data-placement="top" title="Eliminar nora"><span class="glyphicon glyphicon-remove-sign"></span></button>
					</div>
				</div>
			</div>
		</div>`);
	
		$('.mitooltip').tooltip();
	});
	});
	$('html body').animate({scrollTop: 110}, 800);

});

$('#dtpFechaCalendario').change(function () {
	var dia = moment($('#dtpFechaCalendario').val());
	var hoy= moment().format('YYYY-MM-DD');
	var estado=false;
	
	$('#lblDiaCalendar').text(dia.format('dddd, D [de] MMMM [de] YYYY'));
	

	if(dia.diff(hoy,'day')<0){$('.tablaCalendario td').html('');
		$('#mnjClienteCitadoHoy').removeClass('hidden').find('#lblMnjCita').html(`No se puede asignar fechas anteriores a ${moment(hoy).format('LLLL')}.`);
	}
	else{
		if(moment($("#dtpFechaCalendario").val()).isValid()){
			//socket.emit('listarCitasHoy',$("#dtpFechaCalendario").val());
			$.ajax({url:'php/listarCitasPorFecha.php', type:'POST', data:{dia :$("#dtpFechaCalendario").val() }
			}).success(function (resp) { 
				var dato=JSON.parse(resp);
				$('.tablaCalendario td').html('');
				$('#mnjClienteCitadoHoy').addClass('hidden');
				datosCitasDelDia=dato;
				//console.log(datosCitasDelDia);

				//console.log(datosCitasDelDia);
				var row, col;clientePuedeCitaHoy=false;
				var estado = dato.map(function (elemento,index) {//map divide todos los objetos en mini Objetos con sus propiedades
					var horacio=moment(elemento.hora,'H:mm a')
					row=horacio.format('H');
					col=horacio.format('m');
					//console.log(row+':'+col)
					if(elemento.descripcion=='Consulta'){
						$(`.tablaCalendario td[data-row='${row}'][data-column='${col}']`).html(`<div class="btn-group contenido">
							<!--// <button type="button" class="btn btn-sm btn-negro btnIzq hidden"><span class="glyphicon glyphicon-backward"></span>-->	
							</button><button type="button" class="btn btn-sm btn-primary btnPacienteCalendario" id='${index}'>Consulta</button><button type="button" class="btn btn-sm btn-negro btnDer"><span class="glyphicon glyphicon-forward"></span></button></div>`);
					}
					if(elemento.descripcion=='Revaluación'){
						$(`.tablaCalendario td[data-row='${row}'][data-column='${col}']`).html(`<div class="btn-group contenido">
							<!--// <button type="button" class="btn btn-sm btn-negro btnIzq hidden"><span class="glyphicon glyphicon-backward"></span>-->	
							</button><button type="button" class="btn btn-sm btn-success btnPacienteCalendario" id='${index}'>Control</button><button type="button" class="btn btn-sm btn-negro btnDer"><span class="glyphicon glyphicon-forward"></span></button></div>`);
					}
					if(elemento.descripcion=='Procedimiento'){
						$(`.tablaCalendario td[data-row='${row}'][data-column='${col}']`).html(`<div class="btn-group contenido">
							<!--// <button type="button" class="btn btn-sm btn-negro btnIzq hidden"><span class="glyphicon glyphicon-backward"></span>-->	
							</button><button type="button" class="btn btn-sm btn-warning btnPacienteCalendario" id='${index}'>Procedimiento</button><button type="button" class="btn btn-sm btn-negro btnDer"><span class="glyphicon glyphicon-forward"></span></button></div>`);
					}
					if(elemento.idCliente==datosGenerales.idCliente){
						$('#mnjClienteCitadoHoy').removeClass('hidden').find('#lblMnjCita').html('El cliente ya tiene una cita programada para este día.');
						$(`.tablaCalendario td[data-row='${row}'][data-column='${col}']`).find('.btnPacienteCalendario').removeClass('btn-primary').addClass('btn-danger');
					}
				});
				bloquearCeldasHoyxHora();
			});
		}
	}
	$.each( $.feriados, function (index, elemento) {
		if(elemento.ferFecha==$('#dtpFechaCalendario').val()) {//console.log('si');
		$('.calendLunesaViernes').hide();
		$('.calendSabados').hide();
		$('#spanFeriado').text(elemento.ferDescripcion);
		$('#divDomingos').removeClass('hidden');
		 return false;}
		 else{
		 	//console.log('no');
			if($('#lblDiaCalendar').text().search('Sábado')!=-1){
				//console.log('llamar el calendario de sabado')
				$('.calendLunesaViernes').hide();
				$('.calendSabados').show();
				$('#divDomingos').addClass('hidden');
			}
			else if($('#lblDiaCalendar').text().search('Domingo')!=-1){
				//console.log('llamar el calendario de sabado')
				$('.calendLunesaViernes').hide();
				$('.calendSabados').hide();
				$('#spanFeriado').text('Domingo');
				$('#divDomingos').removeClass('hidden');
			}
			else{$('.calendLunesaViernes').show();
				$('#divDomingos').addClass('hidden');
				$('.calendSabados').hide();}
			}
	});

	
});
$('#btnRestarFecha').click(function() {
	var actual=moment($('#dtpFechaCalendario').val()).subtract(1,'days').format('YYYY-MM-DD');
	$('#dtpFechaCalendario').val(actual);
	$('#dtpFechaCalendario').change();
});
$('#btnSumarFecha').click(function() {
	var actual=moment($('#dtpFechaCalendario').val()).add(1,'day').format('YYYY-MM-DD');
	$('#dtpFechaCalendario').val(actual);
	$('#dtpFechaCalendario').change();
});
function bloquearCeldasHoyxHora() {
	var hoy= moment().format('YYYY-MM-DD');
	var row,col,hora;
	var ahora=moment().format('H:m');

	$('.tablaCalendario tbody tr td').css("background-color", "");

		if($('#dtpFechaCalendario').val()==hoy){
			//Anular las horas anteriores a la actual

			$('table tbody tr').each(function(index){
				$(this).children('td').each(function (index2){
					row = $(this).attr("data-row");
					col = $(this).attr("data-column");
					var hora=moment(row+':'+ col,'H:m');
					if(moment().diff(hora,'minutes')>=20){
						$(this).css("background-color", "#eceff1");
						if($(this).html()==''){
							$(this).html(`<button type="button" class="btn btn-negro btn-sm"><span class="glyphicon glyphicon-pushpin grey-text text-lighten-2"></span></button>`)
						}else{$(this).find('.btnIzq').remove();$(this).find('.btnDer').remove();}
					}
					//if(){$(this).css("background-color", "#efebe9");}					
				});
			});
		}
}
$('#btnCancelarCita').click(function(){

	//socket.emit('eliminarCita',parseInt(idRegistroMovible), usuario.nombre);
	$.ajax({url: 'php/eliminarCita.php', type: 'POST', data: {idCita: parseInt(idRegistroMovible)}}).done(function (resp) {
		console.log(resp)
		if(resp ==1){
			$('.modal-cancelarCita').modal('hide');
 			$('#listRegistro').find(`#Reg${parseInt(idRegistroMovible)}`).parent().remove();
		}
	})
});
$('#btnAdelantarFecha').click(function() {
	if($('#txtAdelantarFecha').val()!=''){
		var numDias=$('#txtAdelantarFecha').val();
		var semanasHabiles=parseInt(numDias/5);
		var diasFindesemana=semanasHabiles*2;
		var diasHabiles= parseInt(numDias)+ parseInt(numDias/5)*2;
		//console.log('días '+numDias + '\nSemanas ' + semanasHabiles+ '\nSábados y domingos ' + diasFindesemana+ '\nDías hábiles ' + diasHabiles);
		$('#dtpFechaCalendario').val(moment().add(diasHabiles,'days').format('YYYY-MM-DD')).change();
	}
});
function capitalizeFirstLetter(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}
$('.tablaCalendario').on('mouseenter', '.btnPacienteCalendario',function() {
	$(this).attr('data-container',"body");
	$(this).attr('data-toggle',"popover");
	$(this).attr('data-placement',"top");
	$(this).attr('data-trigger',"focus");
	$(this).attr('title',`${datosCitasDelDia[$(this).attr('id')].descripcion}`);
	$(this).attr('data-content',`<strong>Paciente:</strong> <em class="mayuscula">${datosCitasDelDia[$(this).attr('id')].nombres.toLowerCase()}</em><br>
	<strong>#H.C.:</strong> <em>${('0000'+datosCitasDelDia[$(this).attr('id')].idHistoriaClinica).slice(-5)}</em><br>
	<strong>Tipo:</strong> <em class="mayuscula">${datosCitasDelDia[$(this).attr('id')].prodDetalle.toLowerCase()}</em>`)
	$(this).popover({ html : true });
	$(this).popover('toggle');
 //console.log(datosCitasDelDia[$(this).attr('id')].descripcion);
});
$('.tablaCalendario').on('mouseleave', '.btnPacienteCalendario',function() {
	$(this).popover('hide');
	});
$('#ingresoExterno').click(function() {	

	limpiarCamposIngresos();
	$('.modal-ingreso').find('h4').text('Ingreso de soles a caja');
	$('.modal-ingreso').find('.modal-body p').text('¿Cuánto ingresa a caja y por qué motivo?');
	$('.modal-ingreso').find('.modal-body label').text('Monto ingresando (S/.):');
	$('.modal-ingreso').modal('show');
	
});
$('#egresoExterno').click(function() {
	limpiarCamposIngresos();
	$('.modal-ingreso').find('h4').text('Egreso de soles de caja');
	$('.modal-ingreso').find('.modal-body p').text('¿Cuánto egresa de caja y por qué motivo?');
	$('.modal-ingreso').find('.modal-body label').text('Monto egresando (S/.):');
	$('.modal-ingreso').modal('show');
	

});
$('#btnGuardarIngreso').click(function() {
	if(validarCamposIngresos()){//guardar
		var monto=parseFloat($('.modal-ingreso #txtMontoPagado').val());
		var moti=$('.modal-ingreso #txtMotivo').val();
		if($('.modal-ingreso').find('h4').text()=='Ingreso de soles a caja'){
			socket.emit('insertarIngresoExtra',monto, usuario.idUsuario, moti, reconocerTurno());
		}
		if($('.modal-ingreso').find('h4').text()=='Egreso de soles de caja'){
			socket.emit('insertarEgresoExtra',monto, usuario.idUsuario, moti , reconocerTurno());
		}
	}
});
function limpiarCamposIngresos() {
	$('.modal-ingreso').find('#txtMontoPagado').val('');
	$('.modal-ingreso').find('#txtMotivo').val('');
	$('.modal-ingreso #divErrorPago').addClass('sr-only');
}
function validarCamposIngresos () {	
	if($('.modal-ingreso #txtMontoPagado').val()<0 || $('.modal-ingreso #txtMontoPagado').val()==''){
		$('.modal-ingreso #divErrorPago .mensajeError').text('La cantidad no debe ser negativo o vacío.');
		$('.modal-ingreso #divErrorPago').removeClass('sr-only');
		return false;
	}
	else if ($('.modal-ingreso #txtMotivo').val()==''){
		$('.modal-ingreso #divErrorPago .mensajeError').text('Debe rellenar el campo de motivo.');
		$('.modal-ingreso #divErrorPago').removeClass('sr-only');
		return false;
	}
	else{
	$('.modal-ingreso #divErrorPago').addClass('sr-only');	return true;
	}
};

$('#activarCamara').click(function () {
	imgHtml=$('#mi_camara').html();
	Webcam.attach('#mi_camara' );
	$(this).addClass('sr-only');
	$('#tomarFoto').removeClass('sr-only');
	$('#cancelarFoto').removeClass('sr-only');
});
var imgHtml='';
$('#cancelarFoto').click(function () {
	Webcam.reset();
	$(this).addClass('sr-only');	
	$('#tomarFoto').addClass('sr-only');
	$('#activarCamara').removeClass('sr-only');
	$('#mi_camara').html(imgHtml);
});
$('#tomarFoto').click(function () {
	Webcam.snap( function(data_uri) {
		$('#mi_camara').html('<img src="'+data_uri+'"/>');
		//console.log(data_uri);		
		var url='php/camara_img.php?nombre='+datosGenerales.idCliente;
		Webcam.upload( data_uri, url, function(code, text) {
			$('#tomarFoto').addClass('sr-only');	
			$('#cancelarFoto').addClass('sr-only');
			$('#activarCamara').removeClass('sr-only');
		});
	});
});
function UrlExists(url)
{
    var http = new XMLHttpRequest();
    http.open('HEAD', url, false);
    http.send();
    return http.status!=404;
}
$('#optSinAdelanto').click(function () {
	// body...
});
$('#optConAdelanto').click(function () {
	// body...
});
function verificarContrasenaIgual () {
	if($('#txtPassNuevo').val()!=$('#txtPassReNuevo').val()){
		$('.modal-password .alert-danger').find('#texto').text('Las contraseñas nuevas no coinciden.');
		$('.modal-password .alert-danger').removeClass('sr-only');
	}
	else{$('.modal-password .alert-danger').addClass('sr-only');}
}
$('#txtPassNuevo').focusout(function () {
	verificarContrasenaIgual();
});
$('#txtPassReNuevo').focusout(function () {
	verificarContrasenaIgual();
});
$('#guardarContraseña').click(function() {
	if($('.modal-password .alert-danger').hasClass('sr-only') && $('#txtPassNuevo').val().length>0){
		$('.modal-password .alert-danger').addClass('sr-only');
		//socket.emit('actualizarContraseña', usuario.idUsuario, $('#txtPassReNuevo').val());
		$.ajax({url: 'php/actualizarContrasena.php', type: 'POST', data:{pssNuevo: $('#txtPassReNuevo').val()}}).done(function (resp) {
			if(resp==1){$('.modal-password').modal('hide');}
			else{$('.modal-password .alert-danger').find('#texto').text('Hubo un error con la consexión.');
			$('.modal-password .alert-danger').removeClass('sr-only');}
		})
	}else{
		$('.modal-password .alert-danger').find('#texto').text('Ingrese una contraseña nueva');
		$('.modal-password .alert-danger').removeClass('sr-only');
	}
});
$('#txtPassAnterior').focusout(function() {
	//socket.emit('confirmarContrasena',usuario.idUsuario,$(this).val());
	$.ajax({url: 'php/confirmarContrasena.php', type: 'POST', data: {campo: $(this).val()}}).done(function (estadoCoincide) {
		//console.log(estadoCoincide)
		if(!estadoCoincide){console.log('no coincide')//no coincide la contraseña anterior
		$('.modal-password .alert-danger').find('#texto').text('La contraseña inicial no es correcta.');
		$('.modal-password').find('.alert-danger').removeClass('sr-only');}
		else{$('.modal-password .alert-danger').addClass('sr-only');}
		
	});


});
$('.modal-password').on('show.bs.modal', function (e) {
	$('.modal-password').find('.alert-danger').addClass('sr-only');
  $('.modal-password').find('#txtPassAnterior').val('');
	$('.modal-password').find('#txtPassNuevo').val('');
	$('.modal-password').find('#txtPassReNuevo').val('');
});

$('#agregarNota').click(function() {
	$('.modal-notas').find('input').val('');
	$('.modal-notas').modal();
});
$('#btnGuardarNota').click(function() {
	$('.modal-notas').find('input').each(function(index, element) {
		$('.modal-notas').find('.alert').addClass('sr-only');
		if($(this).val().length==0){
			$('.modal-notas').find('.alert').removeClass('sr-only').find('.mensajeError').text('Rellene todos campos, por favor');
		}
	});
	if($('.modal-notas').find('.alert').hasClass('sr-only')){//guardar
		$.ajax({url: 'php/insertarComentario.php', type: 'POST', data:{
			idCli: datosGenerales.idCliente,
			titulo: $('#txtTituloNota').val(),
			relleno: $('#txtMensajeNota').val()}}).done(function (resp) { console.log(resp)
				if(resp==1){
				$('#divNotas').prepend(`<div class="col-sm-3 animated rotateInDownLeft ">
					<div class="panel panel-negro">
						<div class="panel-heading"><span class="glyphicon glyphicon-paperclip"></span> <strong class="lblTituloNota"> ${$('#txtTituloNota').val()}</strong></div>
						<div class="panel-body">
							<em><h6 class="text-right">	${moment().fromNow()}</h6>
							<p class="text-primary">«<span class="lblMensajeNota">${$('#txtMensajeNota').val()}</span>»</p>								
							<h6 class="text-right">${usuario.nombre}.</p></h6></em>
						</div>
						<div class="panel-footer text-center">
							<div class="btn-group" role="group" aria-label="...">
								<button type="button" class="btn btn-success mitooltip btnEditarNota" data-toggle="tooltip" data-placement="top" title="Editar"><span class="glyphicon glyphicon-pencil"></span></button>
							</div>
						</div>
					</div>
				</div>`);
	
				$('.mitooltip').tooltip();
				$('.modal-notas').modal('hide');
				}
				// body...
			})
		//socket.emit('insertarComentario', datosGenerales.idCliente, moment().format('YYYY-MM-DD HH:mm'), $('#txtTituloNota').val(), $('#txtMensajeNota').val(), usuario.idUsuario )
		
	}	
});

$('#divNotas').on('click','.btnEditarNota',function () {
	$('.modal-notas').find('#txtTituloNota').val($(this).parent().parent().parent().find('.lblTituloNota').text());
	$('.modal-notas').find('#txtMensajeNota').val($(this).parent().parent().parent().find('.lblMensajeNota').text());
	$('.modal-notas').modal('show');
});
$('#divNotas').on('click','.btnEliminarNota',function () {
	$.ajax({url:'php/eliminarComentarioDeCliente.php', type: 'POST', data:{
		idCom: $(this).attr('id')
	}}).done(function (resp) {
		console.log(resp)
	});
	$(this).parent().parent().parent().parent().addClass('animated rotateOutUpLeft').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
		$(this).remove();	
	})
	
});
function reconocerTurno(){
	if(moment().format('HH')<14){
		$('#cmbTipoDeposito').val(1); return 1;
	}else{$('#cmbTipoDeposito').val(2); return 2;}
}

$('#btnAgregarReceta').click(function () {
	$('.modal-Receta').modal('show');
});
$('.modal').on('shown.bs.modal', function () {
    $(this).find('#foc').focus();
});

function solicitarDatosClientePanel(idCliente){
	$.ajax({url: 'php/listarClientePanel.php',
	data: {idCli:idCliente }, type: 'POST'
	}).success(function (resp) { 
		var dato= JSON.parse(resp);
		$('#lblNombre').text(dato.nombres.toLowerCase());
		$('#lblOcupacion').text(dato.ocupDetalle.toLowerCase());
		$('#lblGrado').text(dato.gradDescripcion.toLowerCase());		
		$('#lblEdad').text(calcularEdadHastaHoy(dato.cliFechaNacimiento));
		$('#lblEstado').text(dato.estcivDescripcion.toLowerCase());
		if(dato.idHistoria ==''){$('#lblHistoria').text(`Aún no tiene número de Historia Clínica`);$('#imprHistoria').addClass('hidden');$('#crearHistoria').removeClass('hidden');}
		else{$('#lblHistoria').html(`<strong class="text-primary"><span id="lblIdHistoria">${dato.idHistoria}</span></strong>`);$('#imprHistoria').removeClass('hidden');$('#crearHistoria').addClass('hidden');
		$('#btnCrearCita').removeClass('disabled');
		$('#btnCrearRevaluacion').removeClass('disabled');
		$('#btnCrearProcedimiento').removeClass('disabled');}
		if (dato.cliDireccion ==''){$('#lblDireccion').text('No precisó'); dato.cliDireccion='-'}
		else{$('#lblDireccion').text(dato.cliDireccion.toLowerCase());}
		$('#lblTelefono').text(dato.cliTelefono);
		if(dato.cliCelular=='')
			{
				$('#lblCelular').text('S/N');
			}else{
				$('#lblCelular').text(dato.cliCelular);
			}
		
		
		$('#lblProcedencia').text(dato.prodDetalle.toLowerCase());
		$('#datoClienteTitulo').text(dato.nombres.toLowerCase());
		datosGenerales=dato;	
		console.log(datosGenerales);
	});

	$.ajax({url: 'php/listarRegistroPorCliente.php',
	data:{idCli:idCliente }, type:'POST'
	}).success(function(resp) {
		var dato= JSON.parse(resp);
		listaRegistrosCliente=dato;
		//console.log(listaRegistrosCliente)		
		$.each(JSON.parse(resp), function(i, elemento ) {
			//console.log(elemento)
			moment.locale('es');
			//if(elemento.idPagos != null){pagos=`Pagó cancelado <strong>S/. ${parseFloat(elemento.pagoMonto).toFixed(2)}</strong> el ${moment(elemento.pagoFecha).format('dddd[,] DD [de] MMMM [de] YYYY')}.`}
			if (elemento.tiempo=='pasado') {
				$('#listRegistro').append(`<div class="panel bs-callout bs-callout-primary panel-sombreado" style="margin-bottom: 10px;">
							<div class="panel-heading collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#Reg${elemento.idreg}" aria-expanded="true" aria-controls="Reg${elemento.idreg}" role="tab">
							  <h4 class="panel-title">
								<span >
								  <strong class="mayusculas">${elemento.descripcion}</strong> <span class="lblTiempoCita">${moment(elemento.regFecha).fromNow()}</span>  <span class="moneda"></span></span>
							  </h4>
							</div>
							<div id="Reg${elemento.idreg}" class="panel-collapse collapse" role="tabpanel" >
							  <div class="panel-body">						  	
								<p class="pconsulta">Consulta creada para las <span class="phora">${moment(elemento.regFecha).format('h:mm a')}</span> del día <span class="pdia">${moment(elemento.regFecha).format('dddd[,] DD [de] MMMM [de] YYYY')}</span>. <em class="userResponsable mayuscula">${elemento.usuNombre}</em>
								<br><span class="text-muted"><small>Registrado el: <span class="creadoEn">${moment(elemento.regCreado).format('dddd[,] DD [de] MMMM [de] YYYY')}</span>. </small></span></p>
								<p class="pagos"></p>
								<div class="form-group">
									<button type="button" class="btn btn-success btn-outline btnImprimirConsulta" id="btnImprimir${elemento.descripcion}${elemento.idreg}" ><span class="glyphicon glyphicon-print"></span> Imprimir voucher</button>
									<button type="button" class="btn btn-amarillo btn-outline btnPagar" id="btnPagar${elemento.idreg}" ><span class="glyphicon glyphicon-piggy-bank"></span> Pagar</button>
								</div>
							  </div>
							</div>
					  </div>`);
				/*$('#listRegistro').append(`<a href="#!" class="list-group-item">
			<p class="list-group-item-text"><strong>${elemento.descripcion} </strong>${moment(elemento.regCreado).fromNow()} <span class="hidden">aa</span></p></a>`);*/
			}
			var botones='';
			if(elemento.descripcion=='Consulta'){botones=`<button type="button" class="btn btn-success btn-outline btnImprimirConsulta" id="btnImprimir${elemento.descripcion}${elemento.idreg}" ><span class="glyphicon glyphicon-print"></span> Imprimir voucher</button>
									<button type="button" class="btn btn-amarillo btn-outline btnPagar" id="btnPagar${elemento.idreg}" ><span class="glyphicon glyphicon-piggy-bank"></span> Pagar</button>
									<button type="button" class="btn btn-info btn-outline btnModificar" id="btnModificar${elemento.idreg}"><span class="glyphicon glyphicon-export"></span> Mover fecha</button>
									<button type="button" class="btn btn-danger btn-outline btnCancelarControl" id="btnCancelarControl${elemento.idreg}"><span class="glyphicon glyphicon-fire"></span> Quemar consulta</button>`;}
			else{botones=`<button type="button" class="btn btn-success btnImprimirConsulta btn-outline " id="btnImprimir${elemento.descripcion}${elemento.idreg}" ><span class="glyphicon glyphicon-print"></span> Imprimir voucher</button>
									<button type="button" class="btn btn-amarillo  btn-outline btnPagar" id="btnPagar${elemento.idreg}" ><span class="glyphicon glyphicon-piggy-bank"></span> Pagar</button>
									<button type="button" class="btn btn-info btn-outline  btnModificar" id="btnModificar${elemento.idreg}"><span class="glyphicon glyphicon-export"></span> Mover fecha</button>
									<button type="button" class="btn btn-danger btn-outline  btnCancelarControl" id="btnCancelarControl${elemento.idreg}"><span class="glyphicon glyphicon-fire"></span> Remover</button>`;}
			if (elemento.tiempo=='futuro') {
				$('#listRegistro').append(`<div class="panel bs-callout bs-callout-primary panel-sombreado" style="margin-bottom: 10px;">
							<div class="panel-heading " role="button" data-toggle="collapse" data-parent="#accordion" href="#Reg${elemento.idreg}" aria-expanded="true" aria-controls="Reg${elemento.idreg}" role="tab">
							  <h4 class="panel-title">
								<span >
								  <strong>${elemento.descripcion}</strong> ${elemento.regDescripcion} <span  class="lblTiempoCita">${moment(elemento.regFecha).fromNow()}</span> <span class="moneda"></span></span>
							  </h4>
							</div>
							<div id="Reg${elemento.idreg}" class="panel-collapse collapse" role="tabpanel" >
							  <div class="panel-body">						  	
								<p  class="pconsulta">Consulta creada para las <span class="phora">${moment(elemento.regFecha).format('h:mm a')}</span> del día <span class="pdia">${moment(elemento.regFecha).format('dddd[,] DD [de] MMMM [de] YYYY')}</span>. <em class="userResponsable mayuscula">${elemento.usuNombre}</em>
								<br><span class="text-muted"><small>Registrado el: <span class="creadoEn">${moment(elemento.regCreado).format('dddd[,] DD [de] MMMM [de] YYYY')}</span>. </small></span></p>
								<p class="pagos"></p>
								<div class="form-group">
									${botones}
								</div>
							  </div>
							</div>
					  </div>`);
				
				/*$('#listRegistro').append(`<a href="#!" class="list-group-item">
			<p class="list-group-item-text"><strong>${elemento.descripcion} </strong>${moment(elemento.regFecha).fromNow()} <span class="hidden">aa</span></p></a>`);*/
			}
		});

	
	$.ajax({url:'php/listarPagosPorCliente.php', type: 'POST', data: {idCli:idCliente}}).done(function (resp) {
		//console.log(JSON.parse(resp))
		$.each(JSON.parse(resp), function (i, pagos) {

			
			$('#listRegistro').prepend(`<div class="panel bs-callout bs-callout-warning panel-sombreado sr-only" id="panelPago">
			<div class="panel-heading " role="button" data-toggle="collapse" data-parent="#accordion" href="#Reg0" aria-expanded="true" aria-controls="Reg0"  role="tab">
				<h4 class="panel-title">
				<span >
					<strong>Otros Pagos Realizados</strong> <span class="moneda"></span></span>
				</h4>
			</div>
			<div id="Reg0" class="panel-collapse collapse" role="tabpanel" >
				<div class="panel-body">
				<p class="pagos"></p>
				</div>
			</div>
		</div>`);
			$(`#Reg0`).parent().find('.moneda').html(`<span class="label label-primary pull-right">S/.</span>`);

			
			var pagoDescripcion;
			if(pagos.idtipopago==1){pagoDescripcion='Adelantó' ;}
			else{pagoDescripcion='Canceló';}

			if(pagos.idRegistro==0){$('#panelPago').removeClass('sr-only');}
			var obs;
			if(pagos.pagoObservacion!="") {obs= '<strong>Obs: </strong> <span class="capital">'+pagos.pagoObservacion+'</span>.';}
			else {obs='';}
			$(`#Reg${pagos.idRegistro}`).find('.pagos').append(`<p><strong>${pagoDescripcion} S/. ${parseFloat(pagos.pagoMonto).toFixed(2)}</strong> el ${moment(pagos.pagoFecha).format('dddd[,] DD [de] MMMM [de] YYYY')}.
				 ${obs} <em>${pagos.usuNombre}</em></p>`);
			$(`#Reg${pagos.idRegistro}`).parent().find('.moneda').html(`<span class="label label-warning pull-right">S/.</span>`);
			//console.log(pagos.idRegistro)
		});
	});

	});
	
}