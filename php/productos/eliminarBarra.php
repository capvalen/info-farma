<?php 
require("../config/conexion.php");

$log = mysqli_query($conection,"call eliminarBarra('".$_POST['barra']."', ".$_POST['idProd'].");");
 mysqli_fetch_array($log);

?>
