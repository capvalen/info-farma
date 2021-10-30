<?php 
include 'conectkarl.php';

$suma=[2,4, 15];
$resta=[1, 3, 5, 6, 7];

$sql="SELECT * FROM stock where idStock= {$_POST['idMovimiento']}; ";
$resultado=$cadena->query($sql);
$row=$resultado->fetch_assoc();

if( in_array($row['idMovimiento'], $suma) ){
	$actualizar = "UPDATE producto set
	prodStock = prodStock - {$row['stoCant']}
	WHERE idProducto = {$row['idProducto']} ; ";
	$queHice = array(
		'operacion' => 'resta',
		'cantidad' => $row['stoCant']
	);

}else{
	$actualizar = "UPDATE producto set
	prodStock = prodStock + {$row['stoCant']}
	WHERE idProducto = {$row['idProducto']} ; ";
	$queHice = array(
		'operacion' => 'suma',
		'cantidad' => $row['stoCant']
	);
}
$actualizar .= "UPDATE stock set stoActivo=0, stoObservacion ='Revertido por {$_COOKIE['ckAtiende']}' 
WHERE idStock = {$_POST['idMovimiento']};";


if($cadena->multi_query($actualizar)){
echo json_encode($queHice);
}else{
	echo 'error';
}

?>