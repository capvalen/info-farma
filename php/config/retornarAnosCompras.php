<?php 
include 'conexion.php';

$log = mysqli_query($conection,"call retornarAñosCompras();");
while($row = mysqli_fetch_array($log))
{
	printf('<option>'.$row['ano'].'</option>');
}
?>
  
?>
  