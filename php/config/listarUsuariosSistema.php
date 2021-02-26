<?php 
include 'conexion.php';

$sql="SELECT u.idUsuario, `usuNombre`, `usuApellidos`, `usuUser`, `idNivel`, `usuActivo`, ni.* FROM `usuario` u
inner join nivelusuario ni on ni.idNivelUsuario = u.idNivel
where usuActivo=1";
$resultado=$cadena->query($sql);
$i=0;
while($row=$resultado->fetch_assoc()){ 
	?> 
	<tr>
		<td><?= $i+1 ?></td>
		<td><?= $row['usuNombre']?></td>
		<td><?= $row['usuApellidos']?></td>
		<td><?= $row['usuUser']?></td>
		<td><?= $row['nivusuDescripcion']?></td>
		<?php if( in_array($_COOKIE['ckPower'], $admis) ){ ?>
		<td><button class="btn btn-danger btn-sm btn-outline btnSinBorde" onclick="borrarUsuario(<?= $row['idUsuario']?>)"><i class="icofont icofont-close"></i></button></td>
		<?php } ?>
	</tr>
	<?php
$i++; }

?>