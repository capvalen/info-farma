DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `reporteEgresoDiaxCuadreFechas`(IN `fecha1` TEXT, IN `fecha2` TEXT)
    NO SQL
BEGIN
SET FOREIGN_KEY_CHECKS=0;
SELECT
c.idCaja, ROUND(cajaValor,2) as pagoMonto, cajaFecha, lower(replace(cajaObservacion, 'Ingreso extra: ', '')) as cajaObservacion, 
u.usuNombre as usuNick, tp.movDescripcion, c.idProducto, p.prodNombre, m.moneDescripcion, c.cajaActivo, c.cajaMoneda, tpr.catprodDescipcion, c.idTipoProceso, cajPorcentaje
FROM `caja` c
inner join movimiento tp on tp.idMovimiento = c.idTipoProceso
left join producto p on p.idProducto = c.idProducto
LEFT JOIN usuario u on u.idUsuario=c.idUsuario
LEFT JOIN categoriaproducto tpr on tpr.idCategoriaProducto=p.idCategoriaProducto
inner join moneda m on m.idMoneda = c.cajaMoneda
where `cajaFecha` BETWEEN concat(fecha1,' 00:00:00') AND concat(fecha2,' 00:00:00')
and tp.idMovimiento in (2, 3, 5, 6, 7, 9, 11, 12, 13, 14)
and cajaActivo=1;
END$$
DELIMITER ;
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `reporteIngresoDiaxCuadreFechas`(IN `fecha1` TEXT, IN `fecha2` TEXT)
    NO SQL
BEGIN

SET FOREIGN_KEY_CHECKS=0;

SELECT
c.idCaja, ROUND(cajaValor,2) as pagoMonto, cajaFecha, lower(replace(cajaObservacion, 'Ingreso extra: ', '')) as cajaObservacion, 
u.usuNombre as usuNick, tp.movDescripcion, c.idProducto, p.prodNombre, m.moneDescripcion, c.cajaActivo, c.cajaMoneda, tpr.catprodDescipcion
FROM `caja` c
inner join movimiento tp on tp.idMovimiento = c.idTipoProceso
left join producto p on p.idProducto = c.idProducto
LEFT JOIN usuario u on u.idUsuario=c.idUsuario
LEFT JOIN categoriaproducto tpr on tpr.idCategoriaProducto=p.idCategoriaProducto
inner join moneda m on m.idMoneda = c.cajaMoneda
where `cajaFecha` BETWEEN concat(fecha1,' 00:00:00') AND concat(fecha2,' 00:00:00')
and c.idTipoProceso in (1, 4, 8, 10)
and cajaActivo=1;
END$$
DELIMITER ;









ALTER TABLE `usuario` ADD `usuActivo` INT NULL DEFAULT '1' AFTER `idNivel`;


CREATE DEFINER=`root`@`localhost` FUNCTION `returnCostoProducto`(`idProd` INT) RETURNS FLOAT(11) NOT DETERMINISTIC NO SQL SQL SECURITY DEFINER BEGIN declare costo float default 0; SELECT prodCosto into costo FROM `producto` WHERE idProducto=idProd; return costo; END








DROP PROCEDURE `insertarBarraPorId`; CREATE DEFINER=`root`@`localhost` PROCEDURE `insertarBarraPorId`(IN `barra` TEXT, IN `idproduct` INT) NOT DETERMINISTIC CONTAINS SQL SQL SECURITY DEFINER BEGIN INSERT INTO `productobarras` (`idBarraCode`, `barrasCode`, `idProducto`) VALUES (null,barra, idproduct); select 1; END

