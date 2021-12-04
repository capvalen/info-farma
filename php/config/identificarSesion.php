<?php 
require("conexion.php");

$filas=array();

$log = mysqli_query($conection,"SELECT `returnSesionActual`(7, '2017-02-09');");
$row = mysqli_fetch_array($log);

if($row[0]==null){
	echo "No hay sesion se procede a crear una sesion nueva";
	$log2 = mysqli_query($conection,"call inicializarSesion (7);");
	$row2 = mysqli_fetch_array($log2);
	echo "\n N° ".$row2[0];
}
else{ echo $row[0];}


/* liberar la serie de resultados */
mysqli_free_result($log);
/* cerrar la conexión */
mysqli_close($conection);



 ?>