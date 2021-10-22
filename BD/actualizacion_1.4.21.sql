ALTER TABLE `empresaprincipal` ADD `logo` VARCHAR(250) NULL AFTER `Correo`;

CREATE TABLE `clientes` ( `id` INT NOT NULL , `razon` VARCHAR(250) NOT NULL , `ruc` VARCHAR(11) NOT NULL , `direccion` VARCHAR(250) NOT NULL , `puntosActual` INT NOT NULL DEFAULT '0' , `registrado` DATETIME NULL DEFAULT CURRENT_TIMESTAMP , `puntosTotal` INT NOT NULL DEFAULT '0' ) ENGINE = InnoDB;
ALTER TABLE `clientes` ADD `actualizacion` DATETIME NULL DEFAULT CURRENT_TIMESTAMP AFTER `registrado`;

ALTER TABLE `clientes` ADD PRIMARY KEY( `id`);
ALTER TABLE `clientes` CHANGE `id` `id` INT(11) NULL AUTO_INCREMENT;

INSERT INTO `clientes` (`id`, `razon`, `ruc`, `direccion`, `puntosActual`, `registrado`, `puntosTotal`) VALUES ('1', 'Cliente simple', '00000000', '', '0', current_timestamp(), '0');

ALTER TABLE `ventas` DROP `ventRuc`;
ALTER TABLE `ventas` DROP `ventRazon`;
ALTER TABLE `ventas` DROP `ventDireccion`;
ALTER TABLE `ventas` ADD `idCliente` INT NOT NULL DEFAULT '1' AFTER `ventObservacion`;

drop procedure `insertarVentas`;

DELIMITER $$
CREATE PROCEDURE `insertarVentas`(IN `sub` FLOAT, IN `igv` FLOAT, IN `total` FLOAT, IN `iduser` INT, IN `moneda` FLOAT, IN `vuelto` TEXT, IN `idCli` INT)
BEGIN
	INSERT INTO `ventas`
(`idVenta`,
`ventFecha`,
`ventSubtotal`,
`ventIGV`,
`ventTotal`,
`idUsuario`,
`ventMonedaEnDuro`,
`ventCambioVuelto`, `idCliente`)
VALUES
(null,
now(),
sub,
igv,
total,
iduser,
moneda,
vuelto, idCli);

set @id = (select LAST_INSERT_ID());
select @id;

END$$
DELIMITER ;


DELIMITER $$
CREATE FUNCTION `returnNombreCliente`(`idCli` INT) RETURNS varchar(250) CHARSET utf8mb4
    NO SQL
BEGIN
declare nombre varchar(250) default '';

select c.razon into nombre from clientes c
where id = idCli;
return nombre;
END$$
DELIMITER ;


INSERT INTO `movimiento` (`idMovimiento`, `movDescripcion`) VALUES (NULL, 'Devolución');



INSERT INTO `variantes` (`id`, `nombre`, `activo`) VALUES (6, 'Ciento', '1'), (7, 'Docena', '1')

ALTER TABLE `producto` CHANGE `prodAlertaStock` `prodAlertaStock` TINYINT(1) NULL DEFAULT '1' COMMENT '1 sale alerta; 0 no';

drop procedure listarDetalleProductoPorId;
DELIMITER $$
CREATE PROCEDURE `listarDetalleProductoPorId`(IN `idproduct` INT)
BEGIN
SELECT idProducto, prodNombre, prodStock, prodStockMinimo, idCategoriaProducto,
idPropiedadProducto, idLaboratorio, prodPrecio, prodCosto, prodPorcentaje, returnCantidadBarras(idproduct) as cantBarras, supervisado, prodPrincipioActivo, obs, prodAlertaStock
FROM producto
where idProducto= idproduct;
END$$
DELIMITER ;

DROP PROCEDURE `actualizarProductoDetalles`;
DELIMITER $$
CREATE PROCEDURE `actualizarProductoDetalles`(IN `idProd` INT, IN `nombre` TEXT, IN `stkmin` INT, IN `categ` TEXT, IN `precio` FLOAT, IN `iduser` INT, IN `labo` TEXT, IN `propi` TEXT, IN `costo` FLOAT, IN `porcent` INT, IN `stock` INT, IN `principio` TEXT, IN `observ` TEXT, IN `alerta` INT)
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
`obs` = observ,
`prodAlertaStock` = alerta
where `idProducto`=idprod;

select 1;
END$$
DELIMITER ;