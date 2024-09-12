DROP PROCEDURE `listarLotesYVencimientoPorID`; 
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `listarLotesYVencimientoPorID`(IN `idprod` INT)
BEGIN
SELECT idDetalle,
case prodLote when '' then '-' else prodLote end as prodLote
, prodFechaVencimiento, prodFechaRegistro , prodCantidadXLote
FROM detalleproductos
where idproducto = idprod and prodDisponible=1 and prodFechaVencimiento is not null
order by prodFechaRegistro desc;
END$$
DELIMITER ;