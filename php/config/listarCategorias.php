<?php 
include __DIR__.'./../conectkarl.php';

$filas=[];
$log = mysqli_query($conection,"SELECT *
FROM categoriaproducto where activo = 1
order by catprodDescipcion asc;");
while($row = mysqli_fetch_assoc($log))
{
	$filas[]= $row;
}
 echo json_encode($filas);
?>
 
