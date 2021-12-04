ALTER TABLE `producto` CHANGE `prodDescripcion` `prodPrincipioActivo` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;
ALTER TABLE `producto` ADD `obs` TEXT NULL DEFAULT NULL AFTER `variante`;

DROP PROCEDURE `insertarProductoNuevo`;
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertarProductoNuevo`(IN `nombre` TEXT, IN `descipt` TEXT, IN `stkmin` INT, IN `categ` TEXT, IN `precio` FLOAT, IN `iduser` INT, IN `labo` TEXT, IN `propi` TEXT, IN `costo` FLOAT, IN `porcent` INT, IN `stock` INT, IN `controlado` INT, IN `principio` TEXT)
BEGIN
INSERT INTO `producto`
(`idProducto`,
`prodNombre`,
`prodStock`,
`prodStockMinimo`,
`idCategoriaProducto`,
`idPropiedadProducto`,
`idLaboratorio`,
`prodPrecio`,
`prodCosto`,
`prodPorcentaje`, `supervisado`, `prodPrincipioActivo`, `obs`)
VALUES
(null,
nombre, stock, stkmin,
returnIdCategoriaProducto(categ), returnIdPropiedad(propi), returnIdLaboratorio(labo),
precio, costo, porcent, controlado, principio, descipt);

set @idProducto = (select LAST_INSERT_ID());

INSERT INTO `detalleproductos` (`idProducto`, `prodPrecioUnitario`, `prodLote`, `prodFechaVencimiento`, `prodFechaRegistro`, `prodCantidadXLote`, `prodDisponible`) VALUES (@idProducto, precio, '', '', NOW(), stock, b'1');

select @idProducto;
END$$
DELIMITER ;

DROP PROCEDURE `buscarProductoXNombreOLote`; 
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `buscarProductoXNombreOLote`(IN `filtro` TEXT)
BEGIN
SELECT DISTINCT prd.idProducto, prodNombre, prodPrecio, catprodDescipcion,
case prodLote when '' then '-' else  upper(prodLote) end as lote,
returnFechaProximaVencer(prd.idProducto) as nFecha,prodFechaVencimiento, prodStock, supervisado, variante, prodPrincipioActivo, prd.`obs`

FROM `producto` as prd
INNER JOIN `detalleproductos` as det ON prd.`idProducto`=det.`idProducto`
inner join categoriaproducto as cat on cat.idcategoriaproducto= prd.idcategoriaproducto
left join productobarras as prb on prb.idProducto = prd.idProducto
WHERE ( concat(catprodDescipcion , ' ', prodnombre  ) like concat('%', filtro, '%')
or prd.idProducto like concat('%', filtro, '%')
or prb.barrasCode = filtro )
or prd.prodPrincipioActivo like concat('%', filtro, '%')
and prodDisponible=1 and prd.prodActivo=1
group by prd.idProducto
ORDER BY prd.`prodNombre` asc;
END$$
DELIMITER ;

DROP PROCEDURE `buscarProductoXId`;
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `buscarProductoXId`(IN `filtro` TEXT)
BEGIN
SELECT distinct   prd.idProducto, prodNombre, prd.prodPrecio , catprodDescipcion, 
case prodLote when '' then '-' else  upper(prodLote) end as lote,
prodFechaVencimiento, prodStock, supervisado, variante, prodPrincipioActivo

FROM `producto` as prd
inner join categoriaproducto as cat on cat.idcategoriaproducto= prd.idcategoriaproducto
inner join detalleproductos det on det.idProducto=prd.idProducto
WHERE prd.idProducto = filtro and prd.prodActivo=1

ORDER BY prodFechaVencimiento asc, prd.`prodNombre` asc
limit 1;
END$$
DELIMITER ;

DROP PROCEDURE `listarDetalleProductoPorId`;
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `listarDetalleProductoPorId`(IN `idproduct` INT)
BEGIN
SELECT idProducto, prodNombre, prodStock, prodStockMinimo, idCategoriaProducto,
idPropiedadProducto, idLaboratorio, prodPrecio, prodCosto, prodPorcentaje, returnCantidadBarras(idproduct) as cantBarras, supervisado, prodPrincipioActivo, obs
FROM producto
where idProducto= idproduct;
END$$
DELIMITER ;

DROP PROCEDURE `actualizarProductoDetalles`;
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizarProductoDetalles`(IN `idProd` INT, IN `nombre` TEXT, IN `stkmin` INT, IN `categ` TEXT, IN `precio` FLOAT, IN `iduser` INT, IN `labo` TEXT, IN `propi` TEXT, IN `costo` FLOAT, IN `porcent` INT, IN `stock` INT, IN `principio` TEXT, IN `observ` TEXT)
BEGIN
update `producto`
set 
`prodNombre`=nombre,
`prodStockMinimo`=stkmin,
`idCategoriaProducto`=returnIdCategoriaProducto(categ),
`idPropiedadProducto`=returnIdPropiedad(propi),
`idLaboratorio`=returnIdLaboratorio(labo),
`prodPrecio`=precio, `prodCosto`=costo, `prodPorcentaje`= porcent,
`prodStock` = stock,
`prodPrincipioActivo` = principio,
`obs` = observ
where `idProducto`=idprod;

select 1;
END$$
DELIMITER ;