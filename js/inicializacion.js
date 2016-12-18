$('.elementoMenu').mouseover(function(){$(this).css('font-weight','bolder'); });
$('.elementoMenu').mouseleave(function(){$(this).css('font-weight','normal'); });
$('.txtNumeroDecimal').change(function(){
	$(this).val(parseFloat($(this).val()).toFixed(2));
});
$('#agregarBarra').click(function(){
	//console.log('Se hizo clic en el boton agregar barra');
	if($('#txtBarras').val()!=''){
	$('#listBarras').show('normal');
	$('#listBarras').append('<li class="collection-item">'+$('#txtBarras').val()+'<a href="#!" class="secondary-content"><i class="material-icons red-text">close</i></a></li>')
	$('#txtBarras').val('');}
});
$(document).ready(function(){
	$('#fechaServer').load("php/getFecha.php");
	setInterval(function(){$('#horaServer').load("php/gethora.php");},'1000');
	$('#listBarras').hide();
	
	//$('.side-nav').hide();
	//$('.top-nav').show();
	

});
$.fn.modal.prototype.constructor.Constructor.DEFAULTS.backdrop = 'static'; //Para que no cierre el modal, cuando hacen clic en cualquier parte