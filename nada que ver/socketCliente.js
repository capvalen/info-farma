// var socket = io.connect('https://localhost:8080', { secure: true });


$('#btnNuevoCliente').click(function () {
llamadoNuevoRegistroClientePorModal();
});
function llamadoNuevoRegistroClientePorModal(){
	limpiarCamposCLiente();
	$('#cmbProcedencia').val('1').change();
	$('#cmbOcupacion').val('6').change();
	$('#cmbEstadoCivil').val('1').change();
	$('#cmbGrado').val('4').change();
	$('#otroCmb').val('1').change();
	$('.modal-nuevoCliente').modal();
}

function limpiarCamposCLiente(){
	
	$( "#btnGuardarCliente" ).html('<i class="icofont icofont-folder-open"></i> Guardar cliente')
	$( "#btnGuardarCliente" ).prop( "disabled", false );
	$('#mensajeErrorCliente').addClass('sr-only');
	$('.modal-nuevoCliente input').val('')
	$('#cmbTipoPersona').val(1).change();
	$('#dtpFechaNacimiento').val(moment().format('YYYY-MM-DD'))
}


function grabarCliente(tipo) {
	var vSexo='';
	if($('#chkSexo').bootstrapSwitch('state')){vSexo='M'}
	else{vSexo='F'}
	/*var datos=[{
		procedencia: $('#cmbProcedencia').val(),
		dni: $('#txtDni').val(),
		tipoDni: $('#cmbTipoPersona').val(),
		paterno: $('#txtApellidoPaterno').val(),
		materno: $('#txtApellidoMaterno').val(), 
		nombre: $('#txtNombres').val(),
		fecha: $('#dtpFechaNacimiento').val(),
		civil: $('#cmbEstadoCivil').val(),
		sexo: vSexo,
		grado: $('#cmbGrado').val(),
		ocupacion: $('#cmbOcupacion').val(),
		direccion: $('#txtDireccion').val(),
		telefono: $('#txtTelefono').val(),
		celular: $('#txtCelular').val(),
	}];*/
	//console.log(datos);
	// console.log($('#dtpFechaNacimiento').val());
//	socket.emit('grabarCliente',datos);
if(tipo=='grabar'){
	//socket.emit('grabarClienteProcedure',datos,usuario.idUsuario);
	$.ajax({url:'php/grabarClienteNuevo.php', type: 'POST', data:{
		procedencia: $('#cmbProcedencia').val(),
		dni: $('#txtDni').val(),
		tipoDni: $('#cmbTipoPersona').val(),
		paterno: $('#txtApellidoPaterno').val(),
		materno: $('#txtApellidoMaterno').val(),
		nombre: $('#txtNombres').val(),
		fecha: $('#dtpFechaNacimiento').val(),
		civil: $('#cmbEstadoCivil').val(),
		sexo: vSexo,
		grado: $('#cmbGrado').val(),
		ocupacion: $('#cmbOcupacion').val(),
		direccion: $('#txtDireccion').val(),
		telefono: $('#txtTelefono').val(),
		celular: $('#txtCelular').val()
	}}).success(function (resp) {
		$( "#btnGuardarCliente" ).html('<i class="icofont icofont-folder-open"></i> Guardar cliente')
		$( "#btnGuardarCliente" ).prop( "disabled", false );
		if(resp == null){
			$("#contenidoErrorCliente").html(`Hubo un error intentando guardar, por favor, intente otra vez o comuníquelo a Soporte.`);

		}else{//console.log(JSON.parse(resp).id);
			location.href = `ClientePanel.php?id=${JSON.parse(resp).id}&n=1`;
		}
		
	});
}
else if(tipo=='actualizar'){
	//datos[0].idCliente=datosGenerales.idCliente;
	//console.log(datos);
	//socket.emit('actualizarCliente',datos,usuario.idUsuario);}
	$.ajax({url:'php/actualizarClienteDatos.php', type: 'POST', data:{
		idCli: datosGenerales.idCliente,
		procedencia: $('#cmbProcedencia').val(),
		dni: $('#txtDni').val(),
		tipoDni: $('#cmbTipoPersona').val(),
		paterno: $('#txtApellidoPaterno').val(),
		materno: $('#txtApellidoMaterno').val(),
		nombre: $('#txtNombres').val(),
		fecha: $('#dtpFechaNacimiento').val(),
		civil: $('#cmbEstadoCivil').val(),
		sexo: vSexo,
		grado: $('#cmbGrado').val(),
		ocupacion: $('#cmbOcupacion').val(),
		direccion: $('#txtDireccion').val(),
		telefono: $('#txtTelefono').val(),
		celular: $('#txtCelular').val()
	}}).success(function (resp) {
		console.log(resp);
		if(resp == null){
			$("#contenidoErrorCliente").html(`Hubo un error intentando guardar, por favor, intente otra vez o comuníquelo a Soporte.`);

		}else{//console.log(JSON.parse(resp).id);
			location.href = `ClientePanel.php?id=${datosGenerales.idCliente}&n=2`;
		}
		
	});
}
}

// socket.on('retornoClienteCreado',function (id,tipo){
// 	//console.log('idCliente: '+id);
// 	$( "#btnGuardarCliente" ).prop( "disabled", false );
// 	location.href = `ClientePanel.php?id=${id}&n=${tipo}`;
// 	});

$('#txtDni').focusout(function(){
	if($(this).val().length==8){
	//socket.emit('validarDniExistente',$('#txtDni').val());
	$.ajax(
		{url:'php/validarDniExistente.php', type: 'POST', dataType: 'json', data: {dni: $('#txtDni').val()}}).success(function (resp) {
			//yaExisteCliente(true,JSON.parse( resp));
			if(resp == null){ yaExisteCliente(false, null)} //retorna nulo cuando no hay ningun registro guardado
			else{yaExisteCliente(true, resp)} //retorna un objeto
	});
	
}
});
function yaExisteCliente(existe,dato) {
	if (existe) {//console.log('si existe'); console.log(dato[0]);
		$("#contenidoErrorCliente").html(`El cliente que intenta registrar ya existe: <strong>${dato.cliNombres}, ${dato.cliApellidoPaterno} ${dato.cliApellidoMaterno}</strong>
			<a class="btn btn-success" href="ClientePanel.php?id=${dato.idCliente}" role="button"><i class="icofont icofont-ui-rate-blank"></i> Ir a la ficha</a>`);
		$('#mensajeErrorCliente').removeClass('sr-only');
		$( "#btnGuardarCliente" ).prop( "disabled", true );
	}
	else {$('#mensajeErrorCliente').addClass('sr-only');
		$( "#btnGuardarCliente" ).prop( "disabled", false );}
}

$('#txtNombres').focusout(function(){
	if($(this).val().length>2){
	var nombreAValidar=$('#txtApellidoPaterno').val().toUpperCase()+ ' '+$('#txtApellidoMaterno').val().toUpperCase()+ ' '+$('#txtNombres').val().toUpperCase();

	$.ajax({url:'php/validarNombreExiste.php', type: 'POST', dataType: 'json', data: {nombre: nombreAValidar}}).success(function (resp) {
		console.log(resp)
			//yaExisteCliente(true,JSON.parse( resp));
			if(resp == null){ yaExisteCliente(false, null)} //retorna nulo cuando no hay ningun registro guardado
			else{yaExisteCliente(true, resp)} //retorna un objeto
	});
	//socket.emit('validarNombreExistente',$('#txtApellidoPaterno').val().toUpperCase()+ ' '+$('#txtApellidoMaterno').val().toUpperCase()+ ' '+$('#txtNombres').val().toUpperCase());
}
});
/*function (idCliente){
	listarClientePanel(idCliente)
	
	socket.emit('listarRegistroCliente',idCliente);
}*/


$("#crearHistoria").click(function(){
	
	if($('#lblHistoria').text()=='Aún no tiene número de Historia Clínica'){

		$('.modal-motivo').modal('show');
		//socket.emit('crearHistoria',parseInt($('#lblIdCliente').text()));
	}
});
$('.modal-motivo').on('shown.bs.modal', function () {
    $('#txtMotivo').focus();
}) 
$("#imprHistoria").click(function() {
	
	var idHi=datosGenerales.idHistoria;
	var nom=encodeURIComponent( datosGenerales.nombres);
	
	var proc=encodeURIComponent (datosGenerales.prodDetalle);
	var ocup=encodeURIComponent (datosGenerales.ocupDetalle);
	var est=encodeURIComponent (datosGenerales.estcivDescripcion);
	var sex=encodeURIComponent (datosGenerales.sexo);
	var cumple=moment(datosGenerales.cliFechaNacimiento, "YYYY-MM-DD");
	var celul=encodeURIComponent (datosGenerales.cliCelular);
	cumple=cumple.year();
	//cumple.locale('fr-ca');moment.locale('fr-ca');
	var hoy = moment().year();
	
	
	var edad=encodeURIComponent (hoy -cumple + ' AÑOS');
	//console.log();
	var dire=encodeURIComponent (datosGenerales.cliDireccion);
	var regisfe=encodeURIComponent(datosGenerales.histclifechaCreacion);
	//console.log(regisfe);

	var naci=moment(datosGenerales.cliFechaNacimiento);
	var moti=encodeURIComponent(datosGenerales.motivo);
	var tippac=encodeURIComponent(datosGenerales.prodDetalle);
	var usunom=encodeURIComponent(usuario.nombre)
	naci.locale('es');
	naci=encodeURIComponent (naci.format('L'));	
	moment.locale('es');
	hoy=encodeURIComponent(moment().format('L'));
	moment.locale('en');
	hora=encodeURIComponent(moment().format('LT'));

	urlImpr='imprimirHistoria.php?nombres='+nom+'&idHistoria='+idHi+'&ocupacion='+ocup+'&estado='+est+'&sexo='+sex+'&edad='+
					edad+'&direccion='+dire+'&nacimiento='+naci+'&motivo='+moti+'&registro='+regisfe+'&tipopaciente='+tippac+'&usunom='+usunom+'&celular='+celul;
	console.log(urlImpr);
	//window.open(urlImpr,'_blank');
	loadPrintDocument(this,{
		url: urlImpr,
		attr: "href",
		message:"Tu documento está siendo creado"
	});
});

/*$("#imprHistoria").printPage({
		url: urlImpr,
		attr: "href",
		message:"Tu documento está siendo creado"
});

socket.on('idHistoriaCreada',function(dato) {
	//console.log(dato)
	
});*/	
// socket.on('agregadoCita',function(fechaHora,dato){	//console.log(dato)
// 	var cita= moment(fechaHora,'YYYY-MM-DD H:m');	
// 	cita.locale('es');
// 	cita=cita.format('LLLL');
	
// 	$('.modal-cita').modal('hide');
// 	$('#mnjCitaRegistrada').removeClass('sr-only')
// 	.find('#lblMnjCita').html(cita);
	
// 	$('#listRegistro').prepend(`<div class="panel panel-success">
// 						<div class="panel-heading " role="button" data-toggle="collapse" data-parent="#accordion" href="#Reg${dato.id}" aria-expanded="true" aria-controls="${dato.id}" role="tab">
// 						  <h4 class="panel-title">
// 							<span >
// 							  <strong>Consulta</strong> <span class="lblTiempoCita">${moment(fechaHora).fromNow()}</span> <span class="moneda"></span></span>
// 						  </h4>
// 						</div>
// 						<div id="Reg${dato.id}" class="panel-collapse collapse in" role="tabpanel" >
// 						  <div class="panel-body">
// 						  	<p class="pagos"></p>
// 							<p class="pconsulta">Consulta creada para las <span class="phora">${moment(fechaHora,'YYYY-MM-DD H:mm').format('h:mm a')}</span> del día <span class="pdia">${moment(fechaHora).format('dddd[,] DD [de] MMMM [de] YYYY')}</span>.</p>
// 							<div class="form-group">
// 								<button type="button" class="btn btn-success btnImprimirConsulta" id="btnImprimirConsulta${dato.id}" ><span class="glyphicon glyphicon-print"></span> Imprimir voucher</button>
// 								<button type="button" class="btn btn-amarillo btnPagar" id="btnPagar${dato.id}" ><span class="glyphicon glyphicon-piggy-bank"></span> Pagar</button>
// 								<button type="button" class="btn btn-info btnModificar" id="btnModificar${dato.id}"><span class="glyphicon glyphicon-export"></span> Mover fecha</button>
// 								<button type="button" class="btn btn-danger btnCancelarControl" id="btnCancelarControl${dato.id}"><span class="glyphicon glyphicon-fire"></span> Quemar consulta</button>
// 							</div>
// 						  </div>
// 						</div>
// 				  </div>`);
// });
// socket.on('listadoCitas',function(dato){
// 	//console.log(moment().isAfter($("#dtpFechaCita").val(),'days'));
// 	//console.log(dato);
// 	$("#tblCitas tbody").remove();
// 	dato.map(function(item,index){
// 			$("#tblCitas").append(`<tr>
// 					<td class="hora hidden">${item.hora}</td>
// 					<td>${item.hora.replace('AM','a.m.').replace('PM','p.m.')}</td>
// 					<td class="id sr-only">${item.idcliente}</td>
// 					<td class="mayuscula">${item.nombres}</td>
// 					<td><button class="btn btn-danger btn-sm eliminarCita">Cancelar cita</button>
// 					<button class="btn btn-success btn-sm" id="btnImprimirCita"><span class="glyphicon glyphicon-print"></span></button></td>
// 				</tr>`);
// 		});
// 	if (moment().isAfter($("#dtpFechaCita").val(),'days')){		//true es anterior 
// 		$('#btnProgramarCita').prop( "disabled", true );
// 		$('.mensajeError').text('No se puede asignar citas con fecha anterior a hoy.');
// 		$('#btnActualizarProgramacionCita').prop( "disabled", true );
// 		$('#divErrorCita').removeClass('sr-only');

		
// 		}
// 	else{
// 		$('#btnProgramarCita').prop( "disabled", false );
// 		$('#btnActualizarProgramacionCita').prop( "disabled", false );
// 		$('#divErrorCita').addClass('sr-only');
// 		$('#divErrorCita').addClass('sr-only');
// 		$('#btnProgramarCita').prop( "disabled", false );
// 		verificarCitaClienteporDia();		
// 	}

	
// });
// socket.on('listadoRegistroCliente',function(dato){
// 	//console.log(dato)
	
// });
// socket.on('listadoClientesEncontrados',function(dato){
// 	//console.log(dato);
// 	$('.modal-resultadosBusqueda').modal('show').find('tbody').empty();
// 	$('.modal-resultadosBusqueda').find('strong').html(dato.length);
// 	if(dato.length==0){$('.modal-resultadosBusqueda').find('table').hide();}
// 	else{$('.modal-resultadosBusqueda').find('table').show();}
// 	dato.map(function(element,index) {
// 		var cumple=moment(element.cliFechaNacimiento, "YYYY-MM-DD");	
// 		cumple.locale('es');			
		
// 		//console.log(moment(cumple).preciseDiff(moment.().format('YYYY')));
// 		$('.modal-resultadosBusqueda').find('tbody').append(`<tr>
// 								<th scope="row">${index +1}</th>
// 								<td>${element.idHistoria}</td>
// 								<td>${element.nombres}</td>
// 								<td class="hidden id">${element.idCliente}</td>
// 								<td class="">${moment(cumple).toNow(true)}</td>
// 								<td><a class="btn btn-sm btn-success" href="ClientePanel.php?id=${element.idCliente}" role="button">Ver <span class="glyphicon glyphicon-user"></span></a></td>
// 							</tr>`);
// 	});
// });

// socket.on('pagosCliente',function(pagos) {
// 	console.log(pagos)
// 	$('#listRegistro').prepend(`<div class="panel panel-warning sr-only" id="panelPago">
// 	<div class="panel-heading " role="button" data-toggle="collapse" data-parent="#accordion" href="#Reg0" aria-expanded="true" aria-controls="Reg0"  role="tab">
// 		<h4 class="panel-title">
// 		<span >
// 			<strong>Otros Pagos Realizados</strong> <span class="moneda"></span></span>
// 		</h4>
// 	</div>
// 	<div id="Reg0" class="panel-collapse collapse" role="tabpanel" >
// 		<div class="panel-body">
// 		<p class="pagos"></p>
// 		</div>
// 	</div>
// </div>`);
// 	$(`#Reg0`).parent().find('.moneda').html(`<span class="label label-primary pull-right">S/.</span>`);

// 	pagos.map(function(elemento,index){ var pagoDescripcion;
// 		switch(elemento.idtipopago){
// 			case 1: pagoDescripcion='Adelantó' ; break;
// 			case 2: pagoDescripcion='Canceló'; break;
// 		}
// 		if(elemento.idRegistro==0){$('#panelPago').removeClass('sr-only');}
// 		var obs;
// 		if(elemento.pagoObservacion!="") {obs= '<strong>Obs: </strong> <span class="capital">'+elemento.pagoObservacion+'</span>.';}
// 		else {obs='';}
// 		$(`#Reg${elemento.idRegistro}`).find('.pagos').append(`<p><strong>${pagoDescripcion} S/. ${parseFloat(elemento.pagoMonto).toFixed(2)}</strong> el ${moment(elemento.pagoFecha).format('dddd[,] DD [de] MMMM [de] YYYY')}.
// 			 ${obs} <em>${elemento.usuNombre}</em></p>`);
// 		$(`#Reg${elemento.idRegistro}`).parent().find('.moneda').html(`<span class="label label-primary pull-right">S/.</span>`);
// 	});
// });
// socket.on('actualizadoFechaConsulta',function(idreg,fechaHora) {
// 	$('.modal-cita').modal('hide');

// 	var cita= moment(fechaHora,'YYYY-MM-DD H:m');
// 	cita.locale('es');
	
// 	$('#mnjCitaRegistrada').removeClass('sr-only').find('#lblMnjCita').html(cita.calendar());
// 	$(`#Reg${idreg}`).parent().removeClass('panel-info').addClass('panel-success')
// 	.find('.lblTiempoCita').html(`${cita.calendar()}`);
// 	$(`#Reg${idreg}`).find('.phora').text(moment(fechaHora,'YYYY-MM-DD H:mm').format('h:mm a'));
// 	$(`#Reg${idreg}`).find('.pdia').text(cita.format('dddd[,] DD [de] MMMM [de] YYYY'));
// });
// /*socket.on('listadoCitasCalendar',function (dato) {
	
// });*/

// socket.on('agregadoRevaluacion',function(fechaHora,dato){	
// 	var cita= moment(fechaHora,'YYYY-MM-DD H:m');	
// 	cita.locale('es');
// 	cita=cita.format('LLLL');
// 	//console.log(dato);
	
// 	$('.modal-cita').modal('hide');
// 	$('#mnjCitaRegistrada').removeClass('sr-only')
// 	.find('#lblMnjCita').html(cita);
	
// 	$('#listRegistro').prepend(`<div class="panel panel-success">
// 						<div class="panel-heading " role="tab">
// 						  <h4 class="panel-title">
// 							<span role="button" data-toggle="collapse" data-parent="#accordion" href="#Reg${dato.id}" aria-expanded="true" aria-controls="${dato.id}">
// 							  <strong>Revaluación</strong> <span class="lblTiempoCita">${moment(fechaHora).fromNow()}</span>  <span class="moneda"></span></span>
// 						  </h4>
// 						</div>
// 						<div id="Reg${dato.id}" class="panel-collapse collapse in" role="tabpanel" >
// 						  <div class="panel-body">
// 							<p class="pconsulta">Consulta creada para las <span class="phora">${moment(fechaHora,'YYYY-MM-DD H:mm').format('h:mm a')}</span> del día <span class="pdia">${moment(fechaHora).format('dddd[,] DD [de] MMMM [de] YYYY')}</span>.</p>
// 							<p class="pagos"></p>
// 							<div class="form-group">
// 								<button type="button" class="btn btn-success btnImprimirConsulta" id="btnImprimirRevaluación${dato.id}" ><span class="glyphicon glyphicon-print"></span> Imprimir voucher</button>
// 								<button type="button" class="btn btn-amarillo btnPagar" id="btnPagar${dato.id}" ><span class="glyphicon glyphicon-piggy-bank"></span> Pagar</button>
// 								<button type="button" class="btn btn-info btnModificar" id="btnModificar${dato.id}"><span class="glyphicon glyphicon-export"></span> Mover fecha</button>
// 								<button type="button" class="btn btn-danger btnCancelarControl" id="btnCancelarControl${dato.id}"><span class="glyphicon glyphicon-fire"></span> Cancelar control</button>
// 							</div>
// 						  </div>
// 						</div>
// 				  </div>`);
// });
// socket.on('agregadoProcedimiento',function(fechaHora,dato){	
// 	var cita= moment(fechaHora,'YYYY-MM-DD H:m');	
// 	cita.locale('es');
// 	cita=cita.format('LLLL');
// 	//console.log(dato);
	
// 	$('.modal-cita').modal('hide');
// 	$('#mnjCitaRegistrada').removeClass('sr-only')
// 	.find('#lblMnjCita').html(cita);
	
// 	$('#listRegistro').prepend(`<div class="panel panel-success">
// 						<div class="panel-heading " role="tab">
// 						  <h4 class="panel-title">
// 							<p role="button" data-toggle="collapse" data-parent="#accordion" href="#Reg${dato.id}" aria-expanded="true" aria-controls="${dato.id}">
// 							  <strong>Procedimiento</strong> <span class="lblTiempoCita">${moment(fechaHora).fromNow()}</span> <span class="moneda"></span></p>
// 						  </h4>
// 						</div>
// 						<div id="Reg${dato.id}" class="panel-collapse collapse in" role="tabpanel" >
// 						  <div class="panel-body">
// 							<p class="pconsulta">Procedimiento creado para las <span class="phora">${moment(fechaHora,'YYYY-MM-DD H:mm').format('h:mm a')}</span> del día <span class="pdia">${moment(fechaHora).format('dddd[,] DD [de] MMMM [de] YYYY')}</span>.</p>
// 							<p class="pagos"></p>
// 							<div class="form-group">
// 								<button type="button" class="btn btn-success btnImprimirConsulta" id="btnImprimirProcedimiento${dato.id}" ><span class="glyphicon glyphicon-print"></span> Imprimir voucher</button>
// 								<button type="button" class="btn btn-amarillo btnPagar" id="btnPagar${dato.id}" ><span class="glyphicon glyphicon-piggy-bank"></span> Pagar</button>
// 								<button type="button" class="btn btn-info btnModificar" id="btnModificar${dato.id}"><span class="glyphicon glyphicon-export"></span> Mover fecha</button>
// 								<button type="button" class="btn btn-danger btnCancelarControl" id="btnCancelarControl${dato.id}"><span class="glyphicon glyphicon-fire"></span> Cancelar control</button>
// 							</div>
// 						  </div>
// 						</div>
// 				  </div>`);
// });
// socket.on('eliminadoCita',function(idReg){
// 	$('.modal-cancelarCita').modal('hide');
// 	$('#listRegistro').find(`#Reg${idReg}`).parent().remove();
// });
function listadoUltimosRegistrados(){
	$.ajax({
		url: 'php/listarUltimosRegistrados.php', type: 'POST'

	}).success(function (resp) {
		var dato= JSON.parse(resp);
		console.log(dato)
	moment.locale('es')
	$('.modal-ultimosRegistrados').modal('show').find('tbody').empty();
	if(dato.length==0){$('.modal-ultimosRegistrados').find('table').hide();}
	else{$('.modal-ultimosRegistrados').find('table').show();}
	dato.map(function(element,index) {
	
	$('.modal-ultimosRegistrados').find('tbody').append(`<tr>
							<th scope="row">${index +1}</th>
							<td>${element.idHistoria}</td>
							<td class="mayuscula">${element.nombres}</td>
							<td class="hidden id">${element.idCliente}</td>
							<td class="mayuscula">${moment(element.regFecha).toNow(true)}</td>
							<td><a class="btn btn-sm btn-success" href="ClientePanel.php?id=${element.idCliente}" role="button">Ver <span class="glyphicon glyphicon-user"></span></a></td>
						</tr>`);
	});

	})
}

// socket.on('listadoUltimosRegistrados',function(dato) {
// 	// body...
// 	console.log(dato)
// 	moment.locale('es')
// 	$('.modal-ultimosRegistrados').modal('show').find('tbody').empty();
// 	if(dato.length==0){$('.modal-ultimosRegistrados').find('table').hide();}
// 	else{$('.modal-ultimosRegistrados').find('table').show();}
// 	dato.map(function(element,index) {
	
// 	$('.modal-ultimosRegistrados').find('tbody').append(`<tr>
// 							<th scope="row">${index +1}</th>
// 							<td>${element.idHistoria}</td>
// 							<td>${element.nombres}</td>
// 							<td class="hidden id">${element.idCliente}</td>
// 							<td class="">${moment(element.regFecha).toNow(true)}</td>
// 							<td><a class="btn btn-sm btn-success" href="ClientePanel.php?id=${element.idCliente}" role="button">Ver <span class="glyphicon glyphicon-user"></span></a></td>
// 						</tr>`);
// 	});
// });
// socket.on('listadoProcedimientos', function(dato) {
// 	dato.map(function(elemento,index) {
// 		$('#cmbTipoProcedimiento').append(`<option value=${elemento.idtiempos}>${toTitleCase(elemento.tiempConsulta)}</option>`);
// 	});
// });
function listadoDatosUsuario(){
	$.ajax({url: 'php/solicitarDatosUsuario.php', type: "POST"}).success(function (resp) {
		var dato=JSON.parse(resp);
		usuario.idUsuario=dato.idUsuario;	
		usuario.nombre=dato.usuNombre;
		usuario.apellidos=dato.usuApellidos;
		usuario.nombreCompleto= dato.usuNombre+', '+dato.usuApellidos;
		usuario.tipo=dato.idTipo;
	});
}

// socket.on('insertadoIngresoExtra',function(){
// 	$('.modal-ingreso').modal('hide');
// });
// socket.on('insertadoEgresoExtra',function(){
// 	$('.modal-ingreso').modal('hide');
// });
var pagosRealizados;
// socket.on('listadoPagosXFecha',function (data) {
	
// 	pagosRealizados=data;
// 	console.log(pagosRealizados);
// 	plasmarPagos(false);
	
// });
function plasmarPagos(permitirAdelantos){
	resetearCambioDiaCaja();
	limpiarTodoPagos();
	var monto =0, sumaParcialConsulta=0, sumaParcialProcedimientos=0, sumaParcialOtros=0, tipoProc='', sumaParcialEgresos=0, sumaTotal=0, cantidad=0;
	var adelanto='', cantAdelanto =0, cantNoAdelanto=0;
	pagosRealizados.map(function(elemento,index){
		//console.log(elemento.idtipopago)
		if(elemento.idtipopago==1){adelanto='EsAdelanto';cantAdelanto++}
		else{adelanto='NoEsAdelanto';cantNoAdelanto++}
		if (permitirAdelantos && adelanto=='EsAdelanto' ){//agregar todos los adelantos
			console.log(elemento.nombres + ' ' + elemento.pagoObservacion)
			switch(elemento.Tipo){
			case 'CONSULTA':
				$(`#${elemento.prodDetalle}`).find('.panelCuadre ul').append(`<li class="list-group-item"><div class='col-xs-7 col-sm-9 mayuscula ${adelanto}'>${elemento.nombres.toLowerCase()} <em class="text-muted">Adelanto ${elemento.pagoObservacion}</em></div><div class="col-xs-push-7 col-sm-push-9">S/. ${parseFloat(elemento.pagoMonto).toFixed(2)}</div></li>`);
				$(`#${elemento.prodDetalle}`).parent().removeClass('sr-only');
				cantidad=$(`#${elemento.prodDetalle}`).parent().find('#cantidad').text();
				$(`#${elemento.prodDetalle}`).parent().find('#cantidad').text(parseInt(cantidad)+1);
				monto=parseFloat($(`#${elemento.prodDetalle}`).parent().find('.montoSumado').text())+elemento.pagoMonto;
				$(`#${elemento.prodDetalle}`).parent().find('.montoSumado').text(parseFloat(monto).toFixed(2));			
				sumaParcialConsulta+=elemento.pagoMonto; break;
			case 'PROCEDIMIENTO':
				tipoProc=elemento.regDescripcion.substring(0, elemento.regDescripcion.search(' ')).toUpperCase();
				$(`#${tipoProc}`).find('.panelCuadre ul').append(`<li class="list-group-item"><div class='col-xs-7 col-sm-9 mayuscula ${adelanto}'>${elemento.nombres.toLowerCase()} <em class="text-muted">Adelanto ${elemento.pagoObservacion}</em></div><div class="col-xs-push-7 col-sm-push-9">S/. ${parseFloat(elemento.pagoMonto).toFixed(2)}</div></li>`);
				$(`#${tipoProc}`).parent().removeClass('sr-only');
				cantidad=$(`#${elemento.prodDetalle}`).parent().find('#cantidad').text();
				$(`#${elemento.prodDetalle}`).parent().find('#cantidad').text(parseInt(cantidad)+1);
				monto=parseFloat($(`#${tipoProc}`).parent().find('.montoSumado').text())+elemento.pagoMonto;
				$(`#${tipoProc}`).parent().find('.montoSumado').text(parseFloat(monto).toFixed(2));			
				sumaParcialProcedimientos+=elemento.pagoMonto;break;
			case 'OTROS':
				if(elemento.nombres == null){
					if(elemento.pagoObservacion.search('Ingreso extra: ')!=-1){
						$('#OTROSINGRESOS').find('.panelCuadre ul').append(`<li class="list-group-item"><div class='col-xs-7 col-sm-9 mayuscula ${adelanto}'>${elemento.pagoObservacion.replace('Ingreso extra: ','').toLowerCase()} </div><div class="col-xs-push-7 col-sm-push-9">S/. ${parseFloat(elemento.pagoMonto).toFixed(2)}</div></li>`);
						monto=parseFloat($('#OTROSINGRESOS').parent().find('.montoSumado').text())+elemento.pagoMonto;
						$('#OTROSINGRESOS').parent().find('.montoSumado').text(parseFloat(monto).toFixed(2));					
						sumaParcialOtros+=elemento.pagoMonto;
					}
					if(elemento.pagoObservacion.search('Egreso extra: ')!=-1){
						$('#EGRESOS').find('.panelCuadre ul').append(`<li class="list-group-item"><div class='col-xs-7 col-sm-9 mayuscula ${adelanto}'>${elemento.pagoObservacion.replace('Egreso extra: ','').toLowerCase()} </div><div class="col-xs-push-7 col-sm-push-9">S/. ${parseFloat(elemento.pagoMonto).toFixed(2)}</div></li>`);
						monto=parseFloat($('#EGRESOS').parent().find('.montoSumado').text())+elemento.pagoMonto;
						$('#EGRESOS').parent().find('.montoSumado').text(parseFloat(monto).toFixed(2));
						sumaParcialEgresos+=elemento.pagoMonto;
						}
					}
					else{$('#OTROSINGRESOS').find('.panelCuadre ul').append(`<li class="list-group-item"><div class='col-xs-7 col-sm-9 mayuscula ${adelanto}'>${elemento.nombres.toLowerCase()}: <em class="mayuscula text-muted">${elemento.pagoObservacion.toLowerCase()}</em></div><div class="col-xs-push-7 col-sm-push-9">S/. ${parseFloat(elemento.pagoMonto).toFixed(2)}</div></li>`);
							monto=parseFloat($('#OTROSINGRESOS').parent().find('.montoSumado').text())+elemento.pagoMonto;
							$('#OTROSINGRESOS').parent().find('.montoSumado').text(parseFloat(monto).toFixed(2));					
							sumaParcialOtros+=elemento.pagoMonto;}
			}
		}

		if (adelanto=='NoEsAdelanto'){
			switch(elemento.Tipo){
			case 'CONSULTA':
				$(`#${elemento.prodDetalle}`).find('.panelCuadre ul').append(`<li class="list-group-item mitooltip"  data-toggle="tooltip" data-placement="right" title="Cobró: ${elemento.usuNombre}" ><div class='col-xs-7 col-sm-9 mayuscula ${adelanto} '>${elemento.nombres.toLowerCase()} <em class="text-muted">${elemento.pagoObservacion}</em></div><div class="col-xs-push-7 col-sm-push-9">S/. ${parseFloat(elemento.pagoMonto).toFixed(2)}</div></li>`);
				$(`#${elemento.prodDetalle}`).parent().removeClass('sr-only');
				cantidad=$(`#${elemento.prodDetalle}`).parent().find('#cantidad').text();
				$(`#${elemento.prodDetalle}`).parent().find('#cantidad').text(parseInt(cantidad)+1);
				monto=parseFloat($(`#${elemento.prodDetalle}`).parent().find('.montoSumado').text())+elemento.pagoMonto;
				$(`#${elemento.prodDetalle}`).parent().find('.montoSumado').text(parseFloat(monto).toFixed(2));			
				sumaParcialConsulta+=elemento.pagoMonto; break;
			case 'PROCEDIMIENTO':
				tipoProc=elemento.regDescripcion.substring(0, elemento.regDescripcion.search(' ')).toUpperCase();
				$(`#${tipoProc}`).find('.panelCuadre ul').append(`<li class="list-group-item"><div class='col-xs-7 col-sm-9 mayuscula ${adelanto}'>${elemento.nombres.toLowerCase()} <em class="text-muted">${elemento.pagoObservacion}</em></div><div class="col-xs-push-7 col-sm-push-9">S/. ${parseFloat(elemento.pagoMonto).toFixed(2)}</div></li>`);
				$(`#${tipoProc}`).parent().removeClass('sr-only');
				cantidad=$(`#${elemento.prodDetalle}`).parent().find('#cantidad').text();
				$(`#${elemento.prodDetalle}`).parent().find('#cantidad').text(parseInt(cantidad)+1);
				monto=parseFloat($(`#${tipoProc}`).parent().find('.montoSumado').text())+elemento.pagoMonto;
				$(`#${tipoProc}`).parent().find('.montoSumado').text(parseFloat(monto).toFixed(2));			
				sumaParcialProcedimientos+=elemento.pagoMonto;break;
			case 'OTROS':
				if(elemento.nombres == null){
					if(elemento.pagoObservacion.search('Ingreso extra: ')!=-1){
						$('#OTROSINGRESOS').find('.panelCuadre ul').append(`<li class="list-group-item"><div class='col-xs-7 col-sm-9 mayuscula ${adelanto}'>${elemento.pagoObservacion.replace('Ingreso extra: ','').toLowerCase()} </div><div class="col-xs-push-7 col-sm-push-9">S/. ${parseFloat(elemento.pagoMonto).toFixed(2)}</div></li>`);
						monto=parseFloat($('#OTROSINGRESOS').parent().find('.montoSumado').text())+elemento.pagoMonto;
						$('#OTROSINGRESOS').parent().find('.montoSumado').text(parseFloat(monto).toFixed(2));					
						sumaParcialOtros+=elemento.pagoMonto;
					}
					if(elemento.pagoObservacion.search('Egreso extra: ')!=-1){
						$('#EGRESOS').find('.panelCuadre ul').append(`<li class="list-group-item"><div class='col-xs-7 col-sm-9 mayuscula ${adelanto}'>${elemento.pagoObservacion.replace('Egreso extra: ','').toLowerCase()} </div><div class="col-xs-push-7 col-sm-push-9">S/. ${parseFloat(elemento.pagoMonto).toFixed(2)}</div></li>`);
						monto=parseFloat($('#EGRESOS').parent().find('.montoSumado').text())+elemento.pagoMonto;
						$('#EGRESOS').parent().find('.montoSumado').text(parseFloat(monto).toFixed(2));
						sumaParcialEgresos+=elemento.pagoMonto;
						}
					}
					else{$('#OTROSINGRESOS').find('.panelCuadre ul').append(`<li class="list-group-item"><div class='col-xs-7 col-sm-9 mayuscula ${adelanto}'>${elemento.nombres.toLowerCase()}: <em class="mayuscula text-muted">${elemento.pagoObservacion.toLowerCase()}</em></div><div class="col-xs-push-7 col-sm-push-9">S/. ${parseFloat(elemento.pagoMonto).toFixed(2)}</div></li>`);
							monto=parseFloat($('#OTROSINGRESOS').parent().find('.montoSumado').text())+elemento.pagoMonto;
							$('#OTROSINGRESOS').parent().find('.montoSumado').text(parseFloat(monto).toFixed(2));					
							sumaParcialOtros+=elemento.pagoMonto;}
			}
		}

	});
	

	$('#sumaParcialConsultas').text(parseFloat(sumaParcialConsulta).toFixed(2));
	$('#sumaParcialProcedimientos').text(parseFloat(sumaParcialProcedimientos).toFixed(2));
	$('#sumaParcialOtros').text(parseFloat(sumaParcialOtros).toFixed(2));
	$('#sumaParcialEgresos').text(parseFloat(sumaParcialEgresos).toFixed(2));

	$('#aConAdelantos').html('('+ (cantNoAdelanto + cantAdelanto) + ') Con adelantos');
	$('#aSinAdelantos').html('('+ cantNoAdelanto + ') Sin adelantos');
	calcularSumaDia();
	calcularCantidadesUnidadesxPago();
	$('.mitooltip').tooltip();

}

function calcularSumaDia(){
	var sumaParcialConsulta, sumaParcialProcedimientos, sumaParcialOtros, sumaParcialEgresos, sumaTotal;
	sumaParcialConsulta=parseFloat($('#sumaParcialConsultas').text(),2);
	sumaParcialProcedimientos=parseFloat($('#sumaParcialProcedimientos').text(),2);
	sumaParcialOtros=parseFloat($('#sumaParcialOtros').text(),2);
	sumaParcialEgresos=parseFloat($('#sumaParcialEgresos').text(),2);
	//console.log(sumaParcialConsulta+' '+sumaParcialProcedimientos+' '+sumaParcialOtros+' '+sumaParcialEgresos);
	sumaTotal=parseFloat(sumaParcialConsulta+sumaParcialProcedimientos+sumaParcialOtros-sumaParcialEgresos).toFixed(2);
	$('#montoIngresos').text(parseFloat(sumaParcialConsulta+sumaParcialProcedimientos+sumaParcialOtros).toFixed(2));
	$('#montoEgresos').text(parseFloat(sumaParcialEgresos).toFixed(2));
	$('#sumaTotal').text(sumaTotal);
	$('#TotalDia').text(sumaTotal);
	//console.log('total' +sumaTotal)
}
function calcularCantidadesUnidadesxPago() {
	$('#PARTICULAR').parent().find('#cantidad').text($('#PARTICULAR li').length);
	$('#PUNO').parent().find('#cantidad').text($('#PUNO li').length);
	$('#CONVENIO').parent().find('#cantidad').text($('#CONVENIO li').length);
	$('#CAYETANO_HEREDIA').parent().find('#cantidad').text($('#CAYETANO_HEREDIA li').length);
	$('#FRANK_PAIS').parent().find('#cantidad').text($('#FRANK_PAIS li').length);
	$('#FRANCO_PERUANO').parent().find('#cantidad').text($('#FRANCO_PERUANO li').length);
	$('#NIÑO_JESUS').parent().find('#cantidad').text($('#NIÑO_JESUS li').length);
	$('#SALUD_MUJER').parent().find('#cantidad').text($('#SALUD_MUJER li').length);
	$('#SAN_PABLO').parent().find('#cantidad').text($('#SAN_PABLO li').length);
	$('#SANTO_DOMINGO').parent().find('#cantidad').text($('#SANTO_DOMINGO li').length);
	$('#PNP').parent().find('#cantidad').text($('#PNP li').length);

	$('#AUDIOMETRÍA').parent().find('#cantidad').text($('#AUDIOMETRÍA li').length);
	$('#CAUTERIZACIÓN').parent().find('#cantidad').text($('#CAUTERIZACIÓN li').length);
	$('#CIRUJÍA').parent().find('#cantidad').text($('#CIRUJÍA li').length);
	$('#CURACIÓN').parent().find('#cantidad').text($('#CURACIÓN li').length);
	$('#LARINGOSCOPÍA').parent().find('#cantidad').text($('#LARINGOSCOPÍA li').length);
	$('#LIBERACIÓN').parent().find('#cantidad').text($('#LIBERACIÓN li').length);
	$('#OTROS').parent().find('#cantidad').text($('#OTROS li').length);
	$('#REDUCCIÓN').parent().find('#cantidad').text($('#REDUCCIÓN li').length);

	$('#OTROSINGRESOS').parent().find('#cantidad').text($('#OTROSINGRESOS li').length);
	$('#EGRESOS').parent().find('#cantidad').text($('#EGRESOS li').length);
}
function resetearCambioDiaCaja () {
	$('#PARTICULAR').parent().addClass('sr-only');
	$('#PUNO').parent().addClass('sr-only');
	$('#CONVENIO').parent().addClass('sr-only');
	$('#CAYETANO_HEREDIA').parent().addClass('sr-only');
	$('#FRANK_PAIS').parent().addClass('sr-only');
	$('#FRANCO_PERUANO').parent().addClass('sr-only');
	$('#NIÑO_JESUS').parent().addClass('sr-only');
	$('#SALUD_MUJER').parent().addClass('sr-only');
	$('#SAN_PABLO').parent().addClass('sr-only');
	$('#SANTO_DOMINGO').parent().addClass('sr-only');
	$('#PNP').parent().addClass('sr-only');

	$('#AUDIOMETRÍA').parent().addClass('sr-only');
	$('#CAUTERIZACIÓN').parent().addClass('sr-only');
	$('#CIRUJÍA').parent().addClass('sr-only');
	$('#CURACIÓN').parent().addClass('sr-only');
	$('#LARINGOSCOPÍA').parent().addClass('sr-only');
	$('#LIBERACIÓN').parent().addClass('sr-only');
	$('#OTROS').parent().addClass('sr-only');
	$('#REDUCCIÓN').parent().addClass('sr-only');
}

var minutosControl;
// socket.on('TiempoControles',function (minutos) {minutosControl=minutos;
// 	if(minutos==5){	$('#tblControl10min').remove();}
// 	if(minutos==10){ $('#tblControl5min').remove();}
// });
// socket.on('resultadoContraseña',function(estadoCoincide){
// 	if(!estadoCoincide){console.log('no coincide')//no coincide la contraseña anterior
// 		$('.modal-password .alert-danger').find('#texto').text('La contraseña anterior no es correcta.');
// 		$('.modal-password').find('.alert-danger').removeClass('sr-only');}
// 	else{$('.modal-password .alert-danger').addClass('sr-only');}

// });
// socket.on('actualizadoContraseña',function() {
// 	$('.modal-password').modal('hide');
// });

// socket.on('listadoComentariosParaCliente',function(datos) {
// 	datos.map(function(elemento,index) {
// 		$('#divNotas').append(`<div class="col-sm-3 animated fadeInUp" >
// 						<div class="panel panel-primary">
// 							<div class="panel-heading"><span class="glyphicon glyphicon-paperclip"></span> <strong> ${elemento.comentTitulo}</strong></div>
// 							<div class="panel-body">
// 								<em><h6 class="text-right">	${moment(elemento.comentFecha).fromNow()}</h6>
// 								<p class="text-primary">«${elemento.comentRelleno}»</p>								
// 								<h6 class="text-right">${elemento.usuNombre}.</p></h6></em>
// 							</div>
// 							<div class="panel-footer text-center">
// 								<div class="btn-group" role="group" aria-label="...">
// 									<button type="button" class="btn btn-success mitooltip btnEditarNota" data-toggle="tooltip" data-placement="top" title="Editar"><span class="glyphicon glyphicon-pencil"></span></button>
// 									<button type="button" class="btn btn-danger mitooltip btnEliminarNota" id="${elemento.idComentario}"  data-toggle="tooltip" data-placement="top" title="Eliminar nora"><span class="glyphicon glyphicon-remove-sign"></span></button>
// 								</div>
// 							</div>
// 						</div>
// 					</div>`);
// 	});
// 	$('.mitooltip').tooltip();
// });
// socket.on('contadoComentarios',function(datos){
// 	$('#lblContarComentarios').text(datos.num);
// });
function calcularEdadHastaHoy(fechaNacimiento){
	var cumple=moment(fechaNacimiento, "YYYY-MM");
	cumple.locale('fr-ca');moment.locale('fr-ca');
	var hoy = moment().format("YYYY-MM");
	return moment(cumple).preciseDiff(hoy);
}
// socket.on('listadoConsolidadxCliente', function(dato, idPaciente){
// 	console.log(dato);
// 	$.get('images/fotosClientes/'+idPaciente+'.jpg')
// 		.done(function() { 
// 				$('#fotoCompendio').attr('src',`images/fotosClientes/${idPaciente}.jpg`);
// 		}).fail(function() { 
// 				$('#fotoCompendio').attr('src',`images/kids.jpg`);
// 		});
	
// 	$('#emNombre').text(dato.nombres.toLowerCase());
// 	$('#emEdad').text(calcularEdadHastaHoy(dato.cliFechaNacimiento));
// 	$('#emCivil').text(dato.estcivDescripcion.toLowerCase());
// 	$('#emGrado').text(dato.gradDescripcion.toLowerCase());
// 	$('#emOcupacion').text(dato.ocupDetalle.toLowerCase());
// 	$('#emProcedencia').text(dato.prodDetalle.toLowerCase());
// 	if(dato.ultimVisita ==''){$('#emVisita').text('Nunca, es nuevo');}
// 		else{moment.locale('es');
// 			$('#emVisita').text(moment(dato.ultimVisita).fromNow());}
// });