<?php

 header("Content-type: application/vnd.ms-excel");
 header("Content-Disposition: attachment; filename=Reporte_Todos_Productos_Farmacia.xls");


$conexion=mysql_connect("localhost","root","*123456*");
mysql_select_db("farmacia",$conexion);	
mysql_query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'", $conexion);


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Lista de todos los productos</title>
</head>
<body>

<table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="5" bgcolor="#F8F8B4"><CENTER><strong>Reporte de todos los productos hasta: <?php echo date("d/m/Y"); ?></strong></CENTER></td>
  </tr>
  <tr >
    <td bgcolor="#F8E3B4"><strong>N°</strong></td>
    <td bgcolor="#F8E3B4"><strong>Nombre de producto</strong></td>
    <td bgcolor="#F8E3B4"><strong>Precio</strong></td>
    <td bgcolor="#F8E3B4"><strong>Categoría</strong></td>
    <td bgcolor="#F8E3B4"><strong>Laboratorio</strong></td>
  </tr>
  
<?php
		
$sql=mysql_query("SELECT @rownum:=@rownum+1 AS Num, p.prodNombre, format( p.prodPrecio,2) as Precio, cp.catprodDescipcion, l.labNombre FROM 
(SELECT @rownum:=0) r,
`producto` p inner join laboratorio l on p.idLaboratorio = l.idLaboratorio
inner join categoriaproducto cp on cp.idCategoriaProducto=p.idCategoriaProducto
order by prodNombre asc");
$i=1;
while($res=mysql_fetch_array($sql)){		
	$Correlativo=$res["Num"];
	$prodNombre=$res["prodNombre"];
	$Precio=$res["Precio"];
	$labNombre=$res["labNombre"];
	$catprodDescipcion=$res["catprodDescipcion"];

?>  
 <tr>
	<td><?php echo $i;  ?></td>
	<td><?php echo ucwords($prodNombre); ?></td>
	<td><?php echo $Precio; ?></td>
	<td><?php echo $catprodDescipcion; ?></td>
	<td><?php echo $labNombre; ?></td>
 </tr> 
  <?php
  $i++;
}
  ?>
</table>
</body>
</html>