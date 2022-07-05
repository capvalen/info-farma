<?php 

include __DIR__.'./../conectkarl.php';

$filas=array();
if($_POST['tipo']=='suma'){
	$log = mysqli_query($conection,"SELECT * FROM `movimiento` where idMovimiento in (2, 4, 15) order by movDescripcion; ");
}
else if($_POST['tipo']=='resta'){
	$log = mysqli_query($conection,"SELECT * FROM `movimiento` where idMovimiento in (1, 3, 5, 6, 7) order by movDescripcion;");
}
while($row = mysqli_fetch_array($log))
{
	?> 
	<option value="<?= $row['idMovimiento'];?>"><?= $row['movDescripcion'];?></option>
	<?php
}
?>