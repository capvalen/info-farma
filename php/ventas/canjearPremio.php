<?php 
include __DIR__.'./../conectkarl.php';

$sql="INSERT INTO `premios`( `idCliente`, `premio`, `puntos`, `activo`) VALUES ({$_POST['idCliente']}, '{$_POST['premio']}', {$_POST['puntos']}, 1);
update clientes set puntosActual = puntosActual - {$_POST['puntos']} where id = {$_POST['idCliente']};
";

if($resultado=$cadena->multi_query($sql)){
	echo "ok";
}else{
	echo "error";
}

?>