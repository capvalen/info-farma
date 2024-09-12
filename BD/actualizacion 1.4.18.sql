ALTER TABLE `ventas` ADD `ventRazon` VARCHAR(250) NULL DEFAULT '' AFTER `ventRuc`;
ALTER TABLE `ventas` ADD `ventDireccion` VARCHAR(1250) NULL DEFAULT '' AFTER `ventActivo`;



DELIMITER $$
CREATE PROCEDURE `insertarVentas`(IN `sub` FLOAT, IN `igv` FLOAT, IN `total` FLOAT, IN `iduser` INT, IN `moneda` FLOAT, IN `vuelto` TEXT, IN `ruc` VARCHAR(11), IN `razon` VARCHAR(250), IN `direccion` VARCHAR(1250))
BEGIN
	INSERT INTO `ventas`
(`idVenta`,
`ventFecha`,
`ventSubtotal`,
`ventIGV`,
`ventTotal`,
`idUsuario`,
`ventMonedaEnDuro`,
`ventCambioVuelto`,ventRuc, ventRazon, ventDireccion)
VALUES
(null,
now(),
sub,
igv,
total,
iduser,
moneda,
vuelto, ruc, razon, direccion);

set @id = (select LAST_INSERT_ID());
select @id;

END$$
DELIMITER ;