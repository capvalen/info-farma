<?php 
header('Content-Type: text/html; charset=utf8');
require("../config/conexion.php");


$sql= "call insertarNuevoInventario (1)";
 
if ($llamadoSQL = $conection->query($sql)) { //Ejecución mas compleja con retorno de dato de sql del procedure.
    /* obtener el array de objetos */
    while ($resultado = $llamadoSQL->fetch_row()) {
        echo $resultado[0]; //Retorna los resultados via post
    }
    /* liberar el conjunto de resultados */
    $llamadoSQL->close();
}else{echo 0;} //Cero se interpreta como error
 ?>