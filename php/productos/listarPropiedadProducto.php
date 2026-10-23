<?php 
include __DIR__.'./../conectkarl.php';

$log = mysqli_query($conection,"call listarPropiedadProducto();");
while($row = mysqli_fetch_array($log))
{
	echo'<option value="'.$row['idpropiedadProducto'].'">'.ucfirst($row['proproNombre']).'</option>';
}
?>