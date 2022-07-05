<?php 

include '../conectkarl.php';


$sql="SELECT variante FROM `producto` where idProducto = {$_POST['idProd']}; ";
//echo $sql;
$resultado=$cadena->query($sql);
if($row=$resultado->fetch_assoc()){
	echo $row['variante'] ;
}else{
	echo 'error';
}
?>