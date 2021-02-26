ALTER TABLE `usuario` ADD `usuActivo` INT NULL DEFAULT '1' AFTER `idNivel`;


CREATE DEFINER=`root`@`localhost` FUNCTION `returnCostoProducto`(`idProd` INT) RETURNS FLOAT(11) NOT DETERMINISTIC NO SQL SQL SECURITY DEFINER BEGIN declare costo float default 0; SELECT prodCosto into costo FROM `producto` WHERE idProducto=idProd; return costo; END








DROP PROCEDURE `insertarBarraPorId`; CREATE DEFINER=`root`@`localhost` PROCEDURE `insertarBarraPorId`(IN `barra` TEXT, IN `idproduct` INT) NOT DETERMINISTIC CONTAINS SQL SQL SECURITY DEFINER BEGIN INSERT INTO `productobarras` (`idBarraCode`, `barrasCode`, `idProducto`) VALUES (null,barra, idproduct); select 1; END

