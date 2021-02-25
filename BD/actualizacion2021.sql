
DROP PROCEDURE `insertarBarraPorId`; CREATE DEFINER=`root`@`localhost` PROCEDURE `insertarBarraPorId`(IN `barra` TEXT, IN `idproduct` INT) NOT DETERMINISTIC CONTAINS SQL SQL SECURITY DEFINER BEGIN INSERT INTO `productobarras` (`idBarraCode`, `barrasCode`, `idProducto`) VALUES (null,barra, idproduct); select 1; END

