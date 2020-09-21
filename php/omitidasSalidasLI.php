<?php 
require("conectkarl.php");

$sql = mysqli_query($conection,"SELECT * FROM `movimiento`
where idMovimiento in (2, 9, 11, 12, 13, 14) order by movDescripcion;");

while($row = mysqli_fetch_array($sql, MYSQLI_ASSOC))
{
echo '<li><a href="#!" class="aLiProcesos" data-id="'.$row['idMovimiento'].'"><i class="icofont icofont-chart-pie-alt" style="font-size: 13px;"></i> '.$row['movDescripcion'].'</a></li>';
}
mysqli_close($conection); //desconectamos la base de datos

?>