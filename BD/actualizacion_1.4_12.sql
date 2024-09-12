DELIMITER $$
CREATE DEFINER=`root`@`localhost` FUNCTION `returnCualDsctoEs`(`queDscto` VARCHAR(250)) RETURNS int(11)
    NO SQL
BEGIN
declare descuentoEs int default 0;
SELECT v.id into descuentoEs
from variantes v
where v.nombre = queDscto;

return descuentoEs;
end$$
DELIMITER ;

ALTER TABLE `producto` ADD `supervisado` INT NOT NULL DEFAULT '0' COMMENT '0=no; 1=si' AFTER `prodAlertaStock`;
DROP PROCEDURE `listarDetalleProductoPorId`; 
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `listarDetalleProductoPorId`(IN `idproduct` INT)
BEGIN
SELECT idProducto, prodNombre, prodDescripcion, prodStock, prodStockMinimo, idCategoriaProducto,
idPropiedadProducto, idLaboratorio, prodPrecio, prodCosto, prodPorcentaje, returnCantidadBarras(idproduct) as cantBarras, supervisado
FROM producto
where idProducto= idproduct;
END$$
DELIMITER ;


DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `buscarProductoXId`(IN `filtro` TEXT)
BEGIN
SELECT distinct   prd.idProducto, prodNombre, prd.prodPrecio , catprodDescipcion, 
case prodLote when '' then '-' else  upper(prodLote) end as lote,
prodFechaVencimiento, prodStock, supervisado

FROM `producto` as prd
inner join categoriaproducto as cat on cat.idcategoriaproducto= prd.idcategoriaproducto
inner join detalleproductos det on det.idProducto=prd.idProducto
WHERE prd.idProducto = filtro and prd.prodActivo=1

ORDER BY prodFechaVencimiento asc, prd.`prodNombre` asc
limit 1;
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `buscarProductoXNombreOLote`(IN `filtro` TEXT)
BEGIN
SELECT DISTINCT prd.idProducto, prodNombre, prodPrecio, catprodDescipcion,
case prodLote when '' then '-' else  upper(prodLote) end as lote,
returnFechaProximaVencer(prd.idProducto) as nFecha,prodFechaVencimiento, prodStock, supervisado
FROM `producto` as prd
INNER JOIN `detalleproductos` as det ON prd.`idProducto`=det.`idProducto`
inner join categoriaproducto as cat on cat.idcategoriaproducto= prd.idcategoriaproducto
left join productobarras as prb on prb.idProducto = prd.idProducto
WHERE ( concat(catprodDescipcion , ' ', prodnombre  ) like concat('%', filtro, '%')
or prd.idProducto like concat('%', filtro, '%')
or prb.barrasCode = filtro )
and prodDisponible=1 and prd.prodActivo=1
group by prd.idProducto
ORDER BY prd.`prodNombre` asc;
END$$
DELIMITER ;


DROP PROCEDURE `insertarProductoNuevo`;
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertarProductoNuevo`(IN `nombre` TEXT, IN `descipt` TEXT, IN `stkmin` INT, IN `categ` TEXT, IN `precio` FLOAT, IN `iduser` INT, IN `labo` TEXT, IN `propi` TEXT, IN `costo` FLOAT, IN `porcent` INT, IN `stock` INT, IN `controlado` INT)
BEGIN
INSERT INTO `producto`
(`idProducto`,
`prodNombre`,
`prodDescripcion`,
`prodStock`,
`prodStockMinimo`,
`idCategoriaProducto`,
`idPropiedadProducto`,
`idLaboratorio`,
`prodPrecio`,
`prodCosto`,
`prodPorcentaje`, `supervisado`)
VALUES
(null,
nombre, descipt,
stock, stkmin,
returnIdCategoriaProducto(categ), returnIdPropiedad(propi), returnIdLaboratorio(labo),
precio, costo, porcent, controlado);

set @idProducto = (select LAST_INSERT_ID());

INSERT INTO `detalleproductos` (`idProducto`, `prodPrecioUnitario`, `prodLote`, `prodFechaVencimiento`, `prodFechaRegistro`, `prodCantidadXLote`, `prodDisponible`) VALUES (@idProducto, precio, '', '', NOW(), stock, b'1');

select @idProducto;
END$$
DELIMITER ;


ALTER TABLE `producto` ADD `variante` VARCHAR(250) NOT NULL AFTER `supervisado`;
