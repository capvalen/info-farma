DROP PROCEDURE `reporteIngresoDiaxCuadre`; 
DELIMITER $$
CREATE PROCEDURE `reporteIngresoDiaxCuadre`(IN `cuadre` INT)
    NO SQL
BEGIN
DECLARE fecha1 DATETIME ;
DECLARE fecha2 varchar(100) ;
SET FOREIGN_KEY_CHECKS=0;
SELECT `fechaInicio`, `fechaFin` into fecha1 , fecha2 FROM `cuadre`
where idCuadre=cuadre;
if fecha2='0000-00-00 00:00:00' then set fecha2=now(); end if;
SELECT
c.idCaja, ROUND(cajaValor,2) as pagoMonto, cajaFecha, date_format(cajaFecha, '%h:%i %p') as hora, lower(replace(cajaObservacion, 'Ingreso extra: ', '')) as cajaObservacion, 
u.usuNombre as usuNick, tp.movDescripcion, c.idProducto, p.prodNombre, m.moneDescripcion, c.cajaActivo, c.cajaMoneda, tpr.catprodDescipcion
FROM `caja` c
inner join movimiento tp on tp.idMovimiento = c.idTipoProceso
left join producto p on p.idProducto = c.idProducto
LEFT JOIN usuario u on u.idUsuario=c.idUsuario
LEFT JOIN categoriaproducto tpr on tpr.idCategoriaProducto=p.idCategoriaProducto
inner join moneda m on m.idMoneda = c.cajaMoneda
where date_format(`cajaFecha`, "%Y-%m-%d %H:%i") BETWEEN date_format(fecha1, "%Y-%m-%d %H:%i") and fecha2
and c.idTipoProceso in (1, 4, 8, 10)
and cajaActivo=1;
END$$
DELIMITER ;

DROP PROCEDURE `reporteEgresoDiaxCuadre`; 
DELIMITER $$
CREATE DEFINER=`wfvrkfap`@`localhost` PROCEDURE `reporteEgresoDiaxCuadre`(IN `cuadre` INT)
    NO SQL
BEGIN
DECLARE fecha1 DATETIME ;
DECLARE fecha2 varchar(100) ;
SET FOREIGN_KEY_CHECKS=0;
SELECT `fechaInicio`, `fechaFin` into fecha1, fecha2 
FROM `cuadre`
where idCuadre=cuadre;
if fecha2='0000-00-00 00:00:00' then set fecha2=now(); end if;
SELECT
c.idCaja, ROUND(cajaValor,2) as pagoMonto, cajaFecha, date_format(cajaFecha, '%h:%i %p') as hora, lower(replace(cajaObservacion, 'Ingreso extra: ', '')) as cajaObservacion, 
u.usuNombre as usuNick, tp.movDescripcion, c.idProducto, p.prodNombre, m.moneDescripcion, c.cajaActivo, c.cajaMoneda, tpr.catprodDescipcion, c.idTipoProceso, cajPorcentaje
FROM `caja` c
inner join movimiento tp on tp.idMovimiento = c.idTipoProceso
left join producto p on p.idProducto = c.idProducto
LEFT JOIN usuario u on u.idUsuario=c.idUsuario
LEFT JOIN categoriaproducto tpr on tpr.idCategoriaProducto=p.idCategoriaProducto
inner join moneda m on m.idMoneda = c.cajaMoneda
where date_format(`cajaFecha`, "%Y-%m-%d %H:%i") BETWEEN date_format(fecha1, "%Y-%m-%d %H:%i") and fecha2
and tp.idMovimiento in (2, 3, 5, 6, 7, 9, 11, 12, 13, 14)
and cajaActivo=1;
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`wfvrkfap`@`localhost` FUNCTION `ultimaFechaxId`(`idProd` INT) RETURNS date
    NO SQL
BEGIN
declare ultFecha date default '';

SELECT prodFechaVencimiento into ultFecha FROM `detalleproductos`
where idProducto = idProd
and prodDisponible =1 and prodFechaVencimiento <> '0000-00-00'
order by prodFechaVencimiento asc
limit 1;

return ultFecha;

END$$
DELIMITER ;