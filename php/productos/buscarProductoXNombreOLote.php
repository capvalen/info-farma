<?php 
include __DIR__.'./../conectkarl.php';

if(!isset($_POST['principioActivo'])){ $filtro = "prodNombre like '%{$_POST['filtro']}%'"; }

else if($_POST['principioActivo']=='activo') { $filtro = "prodPrincipioActivo like '%{$_POST['filtro']}%'"; }
else{ $filtro = "prodNombre like '%{$_POST['filtro']}%'"; }
$filas=array();
//$sql="call buscarProductoXNombreOLote('".$_POST['filtro']."');";
$sql = "SELECT p.*, '' as lote, ultimaFechaxId(p.idProducto) as prodFechaVencimiento, prodPrecio as prodPrecioUnitario, obs as observaciones, catprodDescipcion, prodPrincipioActivo as principioActivo from producto p inner join categoriaproducto cp on cp.idCategoriaProducto = p.idCategoriaProducto where {$filtro} and prodActivo = 1";
// or prodPrincipioActivo like '%{$_POST['filtro']}%')
//echo $sql;
$log = mysqli_query($conection, $sql);

while($row = mysqli_fetch_array($log))
{
	$filas[] = $row;
	/* $filas[]= array('prodNombre' => $row['prodNombre'],
		'catprodDescipcion' => $row['catprodDescipcion'],
		'idProducto' => $row['idProducto'],
		'lote' => $row['lote'],
		'prodFechaVencimiento' => $row['nFecha'],
		'prodPrecioUnitario' => $row['prodPrecio'],
		'prodStock' => $row['prodStock'],
		'supervisado' => $row['supervisado'],
		'variante' => $row['variante'],
		'principioActivo' => $row['prodPrincipioActivo'],
		'observaciones' => $row['obs']
	); */
	
}

echo json_encode($filas);

?>
 
