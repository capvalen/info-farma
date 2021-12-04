<?php 
include '../config/conexion.php';

$filas=array();
$log = mysqli_query($conection,"call listarLaboratorios();");
while($row = mysqli_fetch_array($log))
{
	$filas[]= array('idLaboratorio' => $row['idLaboratorio'],
		'labNombre' => $row['labNombre']
	); 
}
 echo json_encode($filas);
?>
 
