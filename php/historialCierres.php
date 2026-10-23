<select name="" id="sltHistorialCierres" class="form-control" >

<?php 
include 'conectkarl.php';
/*if ( ! isset ($_GET['cuadre'])){
}else{
	$sql= "select cu.*, u.usuNombres from cuadre cu 
inner join usuario u on u.idUsuario=cu.idUsuario where idCuadre = {$_GET['cuadre']}; ";
} */

$sql= "SELECT cu.*, u.usuNombre from cuadre cu 
inner join usuario u on u.idUsuario=cu.idUsuario where date_format(fechaInicio,'%Y-%m-%d') =date_format('{$_GET['fecha']}','%Y-%m-%d') ";

//echo "cuadre ".$_GET['cuadre'];
$llamadoSQL = $conection->query($sql);
if($llamadoSQL->num_rows==0){
?> <option class="optMovesBox" value="0">Nadie aperturó este día</option> <?php
}else{
	?> <option class="optMovesBox" value="0">Cajas que existen: <?= $llamadoSQL->num_rows ;?></option> <?php
	while($row = $llamadoSQL->fetch_assoc()): 
		if( $row['fechaFin']=='0000-00-00 00:00:00' ){ $fechaFinal = " - ahora"; }
		else{ $fechaFinal = ' - '.date( 'g:i a', strtotime($row['fechaFin'])); }
		?>
		
		<option class="optMovesBox" value="<?= $row['idCuadre'] ?>" ><?php if(isset($_GET['cuadre'])){if($_GET['cuadre']==$row['idCuadre']){echo "&#xeb27;";} }?><?= ucwords($row['usuNombre']).' ('.date( 'g:i a', strtotime($row['fechaInicio'])).$fechaFinal.")"; ?></option>
	<?php 
	endwhile;

}
?>

</select> 