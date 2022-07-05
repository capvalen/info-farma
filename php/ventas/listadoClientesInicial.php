<?php 
include __DIR__.'./../conectkarl.php';

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
}elseif( $_POST['letra'] == "|"){
	$sql="SELECT * FROM `clientes` where (razon like '%{$_POST['extra']}%' or ruc like '{$_POST['extra']}') and id <>1 order by trim(razon) asc, puntosActual desc; ";
}else{
	$sql="SELECT * FROM `clientes` where razon like '{$_POST['letra']}%' and id <>1 order by trim(razon) asc, puntosActual desc; ";
}
//echo $sql;
$filas = array();

$resultado=$cadena->query($sql);
while($row=$resultado->fetch_assoc()){
	$filas[] = $row;
}

echo json_encode($filas);
?>