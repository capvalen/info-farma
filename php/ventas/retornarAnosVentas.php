<?php 
include 'conectkarl.php';

$log = mysqli_query($conection,"call retornarAñosVentas();");
while($row = mysqli_fetch_array($log))
{
	printf('<option>'.$row['ano'].'</option>');
}
?>