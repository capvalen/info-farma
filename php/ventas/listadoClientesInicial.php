<?php 
include "conectkarl.php";

if( $_POST['letra'] =="#"){
	$sql="SELECT * FROM `clientes` where
	razon like '1%' or
	razon like '2%' or
	razon like '3%' or
	razon like '4%' or
	razon like '5%' or
	razon like '6%' or
	razon like '7%' or
	razon like '8%' or
	razon like '9%' or
	razon like '0%' or
	razon like '-%' or
	razon like '#%'
	and id <>1 order by puntosActual desc
	; ";

}else{
	$sql="SELECT * FROM `clientes` where razon like '{$_POST['letra']}%' and id <>1 order by puntosActual desc; ";

}
$filas = array();

$resultado=$cadena->query($sql);
while($row=$resultado->fetch_assoc()){
	$filas[] = $row;
}

echo json_encode($filas);
?>