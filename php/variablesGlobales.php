<?php

include "conectkarl.php";
date_default_timezone_set('America/Lima');

$admis=array(1,4,8);
$soloAdmis=array(1,4,8);
$soloDios=array(1);
$soloCaja=array(1,4);
$soloEspecial=array(8);

$folder = 'info-farma';
$local = '/'.$folder;


$existeCaja = intval(require_once 'php/comprobarCajaHoy.php' );
//if( $existeCaja>0 ){echo 'numero'; }else{ echo 'no hay'; }

?>