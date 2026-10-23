<?
header('Content-Type: text/html; charset=utf8');
include 'conectkarl.php';

$comentario = '';
if($_POST['nueObs']<>''){
   $comentario = '<p>'.$_POST['nueObs'].'</p>';
}
$sql="UPDATE `cuadre` SET `cuaApertura` = '{$_POST['nueVal']}', cuaObs = concat( cuaObs ,'{$comentario}') WHERE `idCuadre` = {$_POST['cuadre']};";

if($cadena->query($sql)){ 
   echo $_POST['cuadre'];
}else{
   echo '-1';
}

?>