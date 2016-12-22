<?php 
include '../config/conexion.php';

header("Content-Type: text/plain");

$log = mysqli_query($conection,"call listarLaboratorios();");
$varHtml ='';
while($row = mysqli_fetch_array($log))
{
	$varHtml=$varHtml.'<option value="'.$row['idLaboratorio'].'">'.ucfirst($row['labNombre']).'</option>';
}
printf( $varHtml);
?>
