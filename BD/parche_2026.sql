--versión 1.21
ALTER TABLE `clientes` ADD `activo` INT NULL DEFAULT '1' AFTER `puntosTotal`;
UPDATE `clientes` SET  `activo`=0 where `ruc`='';