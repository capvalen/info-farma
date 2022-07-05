<?php 
include __DIR__.'./../conectkarl.php';

$filas=array();
$log = mysqli_query($conection,"call buscarProductoXId(".$_POST['filtro'].");");

while($row = mysqli_fetch_array($log))
{
	$filas[]= array('prodNombre' => $row['prodNombre'],
		'catprodDescipcion' => $row['catprodDescipcion'],
		'idProducto' => $row['idProducto'],
		'lote' => $row['lote'],
		'prodFechaVencimiento' => $row['prodFechaVencimiento'],
		'prodPrecioUnitario' => $row['prodPrecio'],
		'prodStock' => $row['prodStock'],
		'supervisado' => $row['supervisado'],
		'variante' => $row['variante']
	);
	
}

$sql="SELECT pb.*, p.prodNombre, catprodDescipcion, p.idProducto,
returnFechaProximaVencer(pb.idProducto) as prodFechaVencimiento, prodStock, prodPrecio, supervisado, variante
FROM `productobarras` pb inner join producto p on p.idProducto = pb.idProducto
inner join categoriaproducto as cat on cat.idcategoriaproducto= p.idcategoriaproducto
where barrasCode = '{$_POST['filtro']}' and barActivo=1";
$resultado=$cadena->query($sql);
while($row=$resultado->fetch_assoc()){
	
	$filas[]= array('prodNombre' => $row['prodNombre'],
		'catprodDescipcion' => $row['catprodDescipcion'],
		'idProducto' => $row['idProducto'],
		'lote' => '',
		'prodFechaVencimiento' => $row['prodFechaVencimiento'],
		'prodPrecioUnitario' => $row['prodPrecio'],
		'prodStock' => $row['prodStock'],
		'supervisado' => $row['supervisado'],
		'variante' => $row['variante']
	);
}

echo json_encode($filas);

?>
 
