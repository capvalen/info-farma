<?php 
header('Content-Type: text/html; charset=utf8');
require("conexion.php");


$sql= "call insertarInfoEmpresa('".$_POST['ruc']."', '".$_POST['social']."', '".$_POST['direccion']."', '".$_POST['telefono']."', '".$_POST['correo']."')";
$sql2= "call insertarEconomia ('".$_POST['nomIGV']."',".$_POST['cantIGV'].",".$_POST['porcGanancia'].",'".$_POST['MonedaLocal']."')";

mysqli_query($conection,$sql2); //Ejecución simple para la sentencia sql2
//echo $sql2;

if ($llamadoSQL = $conection->query($sql)) { //Ejecución mas compleja con retorno de dato de sql del procedure.
    /* obtener el array de objetos */
    while ($resultado = $llamadoSQL->fetch_row()) {
        echo $resultado[0];
    }
    /* liberar el conjunto de resultados */
    $llamadoSQL->close();
}else{echo 0;}


?>