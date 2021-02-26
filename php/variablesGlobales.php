<?php

include "conectkarl.php";
date_default_timezone_set('America/Lima');

$admis=array(1);
$soloAdmis=array(1);
$soloDios=array(1);
$soloCaja=array(1,2);
$soloEspecial=array(8);

$servidor ='127.0.0.1';
$folder = 'info-farma';
$local = '/'.$folder;

$serverLocal= "//{$servidor}/$folder/";
$servidorLocal = $serverLocal;

define('__ROOT__', dirname(dirname(__FILE__)));

$existeCaja = intval(require_once __ROOT__.'/php/comprobarCajaHoy.php' );
//if( $existeCaja>0 ){echo 'numero'; }else{ echo 'no hay'; }

?>