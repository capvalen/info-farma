<?php 
require("conectkarl.php");

$sql = mysqli_query($conection,"SELECT * FROM `movimiento` where idMovimiento between 1 and 14 order by movDescripcion asc");

while($row = mysqli_fetch_array($sql, MYSQLI_ASSOC))
{

echo '<option class="optPagos mayuscula" data-tokens="'.$row['idMovimiento'].'">'.$row['movDescripcion'].'</option>';

}
//mysqli_close($conection); //desconectamos la base de datos

?>