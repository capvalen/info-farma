<?php 
include __DIR__.'./../conectkarl.php';

header("Content-Type: text/plain");

$log = mysqli_query($conection,"SELECT idLaboratorio, lower(labNombre) as labNombre
FROM laboratorio where activo = 1
order by labNombre asc;");
$varHtml ='';
while($row = mysqli_fetch_array($log))
{
	$varHtml=$varHtml.'<option value="'.$row['idLaboratorio'].'">'.ucfirst($row['labNombre']).'</option>';
}
printf( $varHtml);
?>
