<?php 
date_default_timezone_set("America/Lima");
$dias = array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
 
echo $dias[date('w')].", ".date('d')." ".$meses[date('n')-1]. " ".date('Y') ;
//Salida: Viernes 24 de Febrero del 2012
 ?>