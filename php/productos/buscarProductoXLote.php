<?php 

include '../conectkarl.php';


$sql="SELECT pb.*, p.prodNombre, catprodDescipcion, p.idProducto, case prodLote when '' then '-' else  upper(prodLote) end as lote,
prodFechaVencimiento, prodStock, prodPrecio
FROM `productobarras` pb inner join producto p on p.idProducto = pb.idProducto
inner join detalleproductos dp on dp.idProducto = p.idProducto
inner join categoriaproducto as cat on cat.idcategoriaproducto= p.idcategoriaproducto
where prodActivo =1 and prodLote = '{$_POST['filtro']}' and prodDisponible=1;";
$resultado=$cadena->query($sql);
while($row=$resultado->fetch_assoc()){
	
	$filas[]= array('prodNombre' => $row['prodNombre'],
		'catprodDescipcion' => $row['catprodDescipcion'],
		'idProducto' => $row['idProducto'],
		'lote' => $row['lote'],
		'prodFechaVencimiento' => $row['prodFechaVencimiento'],
		'prodPrecioUnitario' => $row['prodPrecio'],
		'prodStock' => $row['prodStock']
	);
}

echo json_encode($filas);

?>