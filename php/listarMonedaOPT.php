<?php 
require("conectkarl.php");

$sql = mysqli_query($conection,"SELECT * FROM `moneda` where moneActivo order by moneDescripcion asc");

while($row = mysqli_fetch_array($sql, MYSQLI_ASSOC))
{

echo '<option class="optMoneda mayuscula" data-tokens="'.$row['idMoneda'].'">'.$row['moneDescripcion'].'</option>';

}
mysqli_close($conection); //desconectamos la base de datos

?>