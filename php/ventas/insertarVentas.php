<?php 
include '../config/conexion.php';
session_start();

$Js= json_decode($_POST['Jdata'], true);
$Jencabez=json_decode($_POST['Jencabezado'], true);
$idUser=$_COOKIE['ckidUsuario'];//$_SESSION['idUsuario'];


$variable='';
$retornoProcedure='';
$mysqli=new $conection;


$sql= "call insertarVentas (".$Jencabez[0]['subT'].",".$Jencabez[0]['igv'].",".$Jencabez[0]['Total'].",".$idUser.",".$Jencabez[0]['moneda'].",'".$Jencabez[0]['regreso']."')";

$stmt = $conection->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
		while ($row = $result->fetch_array(MYSQLI_NUM))
		{
				foreach ($row as $r)
				{
						$retornoProcedure= "$r ";
				}
		}
$stmt->fetch();

$stmt->close();

/* ------Código que funciona enviando todos los valores de JSON en un solo paguete
foreach ($Js as $row) {$variable.='('.$retornoProcedure.', '.$row['id'] .','.$row['cant'].','.$row['prec'].','.$row['sub'].'),';}
$sql22= 'insert INTO `detalleventas` (`idVenta`,`idProducto`,`detventCantidad`,`detventPrecio`,`detentPrecioparcial`) values '.substr($variable,0, strlen($variable)-1 );
mysqli_query($conection,$sql22) or die(mysql_error()); //Ejecución simple para la sentencia sql2 con envio completo de una JSON con variable unica*/

foreach ($Js as $row) {
$sql33= 'call insertarDetalleVentaProducto('.$retornoProcedure.', '.$row['id'] .','.$row['cant'].','.$row['prec'].','.$row['sub'].', '.$_POST['usuario'].');' ;
mysqli_query($conection,$sql33) or die(mysql_error());
}


echo $retornoProcedure;




 ?>