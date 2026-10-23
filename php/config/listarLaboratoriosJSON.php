<?php 
include __DIR__.'./../conectkarl.php';

$filas=array();
$log = mysqli_query($conection,"SELECT idLaboratorio, lower(labNombre) as labNombre
FROM laboratorio where activo = 1
order by labNombre asc;");
while($row = mysqli_fetch_array($log))
{
	$filas[]= array('idLaboratorio' => $row['idLaboratorio'],
		'labNombre' => $row['labNombre']
	); 
}
 echo json_encode($filas);
?>
 
