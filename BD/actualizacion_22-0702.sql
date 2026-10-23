DROP PROCEDURE cajaAperturar;
DELIMITER $$
CREATE PROCEDURE `cajaAperturar`(IN `idUser` INT, IN `monto` FLOAT, IN `obs` TEXT)
    NO SQL
BEGIN
SET @@session.time_zone='-05:00';
INSERT INTO `cuadre`(`idCuadre`, `idUsuario`, `fechaInicio`, `fechaFin`, `cuaApertura`, `cuaCierre`, `cuaVigente`, `cuaObs`)
VALUES (null,idUser, NOW(),'0000-00-00',monto,0,1,obs);
end$$
DELIMITER ;

