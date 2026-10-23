--versión 1.21
ALTER TABLE `clientes` ADD `activo` INT NULL DEFAULT '1' AFTER `puntosTotal`;
UPDATE `clientes` SET  `activo`=0 where `ruc`='';
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertarVentas`(IN `sub` FLOAT, IN `igv` FLOAT, IN `total` FLOAT, IN `iduser` INT, IN `moneda` FLOAT, IN `vuelto` TEXT, IN `idCli` INT, IN `idMon` INT)
BEGIN
SET @@session.time_zone='-05:00';
INSERT INTO `ventas`
(`idVenta`,
`ventFecha`,
`ventSubtotal`,
`ventIGV`,
`ventTotal`,
`idUsuario`,
`ventMonedaEnDuro`,
`ventCambioVuelto`, `idCliente`,`idMoneda`)
VALUES
(null,
now(),
sub,
igv,
total,
iduser,
moneda,
vuelto, idCli, idMon);
set @id = (select LAST_INSERT_ID());
select @id;
END$$
DELIMITER ;



DELIMITER $$
CREATE PROCEDURE `insertarDetalleVentaProducto`(IN `idvent` INT, IN `idprod` INT, IN `ventCant` FLOAT, IN `ventPrec` FLOAT, IN `VentParc` FLOAT, IN `usuario` INT, IN `dscto` VARCHAR(250))
BEGIN
insert INTO `detalleventas` (`idVenta`,`idProducto`,`detventCantidad`,`detventPrecio`,`detentPrecioparcial`, `descuento`)
values
(idvent, idprod ,ventCant ,ventPrec ,VentParc, returnCualDsctoEs(dscto) );
UPDATE `producto`
SET
`prodStock` =`prodStock` - ventCant
WHERE `idProducto` = idprod;
INSERT INTO `stock`(`idStock`, `idProducto`, `stoCant`, `idMovimiento`, `stoObservacion`, `idUsuario`) VALUES (null, idprod, ventCant, 1, '', usuario);
END$$
DELIMITER ;


ALTER TABLE `variantes` CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
ALTER TABLE `clientes`            CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
ALTER TABLE `stock`               CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
ALTER TABLE `movimiento`          CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
ALTER TABLE `creditos_historial`  CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;