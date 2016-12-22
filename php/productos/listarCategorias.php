<?php 
include '../config/conexion.php';

$log = mysqli_query($conection,"call listarCategoriaProducto();");
while($row = mysqli_fetch_array($log))
{
	echo'<option value="'.$row['idCategoriaProducto'].'">'.ucfirst($row['catprodDescipcion']).'</option>';
}
?>