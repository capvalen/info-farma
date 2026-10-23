<?php 
include __DIR__.'./../conectkarl.php';

$filas=array();
$log = mysqli_query($conection,"call retornarMesesAñoCompras(".$_POST['anio'].");");
while($row = mysqli_fetch_array($log))
{
	$filas[]= array('mes' => $row['mes']); 
}
 echo json_encode($filas);
?>
 
