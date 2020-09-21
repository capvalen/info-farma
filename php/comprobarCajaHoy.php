<?php 
require("conectkarl.php");
//include "variablesGlobales.php";

$fechaCompr=date('Y-m-d');
$sql = mysqli_query($conection,"SELECT idCuadre, fechaInicio, case fechaFin when '0000-00-00 00:00:00' then now() else fechaFin end as fechaFinal  FROM `cuadre` cu
where cu.cuaVigente =1"); // DATE_FORMAT(`fechaInicio`, '%Y-%m-%d') = '{$fechaCompr}' and 

$numRow = mysqli_num_rows($sql);
$row = mysqli_fetch_array($sql, MYSQLI_ASSOC);

//echo date("Y-m-d H:i:s");
if($numRow>=1){ $idCaja = $row['idCuadre']; /* $_POST['cajaActiva']=true; */ 
	$_POST['fechaInicio'] = $row['fechaInicio'];
	$_POST['fechaFin'] = $row['fechaFinal'];
} else { $idCaja = 0; /* $_POST['cajaActiva']=false; */}

return $idCaja; // $_POST['cajaActiva'];
mysqli_close($conection); //desconectamos la base de datos


?>
