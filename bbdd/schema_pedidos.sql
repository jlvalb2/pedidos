-- MySQL Script generated by MySQL Workbench
-- seg 01 fev 2021 19:57:10 -03
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema pedidos
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `pedidos` ;

-- -----------------------------------------------------
-- Schema pedidos
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `pedidos` DEFAULT CHARACTER SET utf8 ;
USE `pedidos` ;

-- -----------------------------------------------------
-- Table `pedidos`.`meiopgto`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pedidos`.`meiopgto` ;

CREATE TABLE IF NOT EXISTS `pedidos`.`meiopgto` (
  `idmeiopgto` INT(11) NOT NULL AUTO_INCREMENT,
  `meio` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idmeiopgto`))
ENGINE = InnoDB
AUTO_INCREMENT = 7
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `pedidos`.`pagamento`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pedidos`.`pagamento` ;

CREATE TABLE IF NOT EXISTS `pedidos`.`pagamento` (
  `idpagamento` INT(11) NOT NULL AUTO_INCREMENT,
  `data` DATE NOT NULL,
  `valor` DOUBLE NOT NULL,
  `meiopgto` INT(11) NOT NULL,
  `titular` VARCHAR(45) NULL DEFAULT NULL,
  `obs` VARCHAR(128) NULL DEFAULT NULL,
  PRIMARY KEY (`idpagamento`),
  CONSTRAINT `ref_meiopgto`
    FOREIGN KEY (`meiopgto`)
    REFERENCES `pedidos`.`meiopgto` (`idmeiopgto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `pedidos`.`status`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pedidos`.`status` ;

CREATE TABLE IF NOT EXISTS `pedidos`.`status` (
  `idstatus` INT NOT NULL,
  `descricao` VARCHAR(128) NOT NULL,
  PRIMARY KEY (`idstatus`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pedidos`.`logradouro`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pedidos`.`logradouro` ;

CREATE TABLE IF NOT EXISTS `pedidos`.`logradouro` (
  `cep` CHAR(8) NOT NULL,
  `nome` VARCHAR(80) NULL,
  `bairro` VARCHAR(80) NULL,
  PRIMARY KEY (`cep`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pedidos`.`pedido`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pedidos`.`pedido` ;

CREATE TABLE IF NOT EXISTS `pedidos`.`pedido` (
  `idpedido` INT(11) NOT NULL AUTO_INCREMENT,
  `horaPedido` DATETIME NOT NULL,
  `horaEntrega` DATETIME NOT NULL,
  `valor` DOUBLE NOT NULL,
  `entregador` VARCHAR(45) NULL,
  `status` INT NOT NULL DEFAULT '0',
  `nomecliente` VARCHAR(45) NOT NULL,
  `sobrenomecliente` VARCHAR(45) NULL DEFAULT NULL,
  `formapgto` INT NULL,
  `CEP` CHAR(8) NOT NULL,
  `numero` VARCHAR(45) NULL DEFAULT NULL,
  `complemento` VARCHAR(45) NULL DEFAULT NULL,
  `referencia` VARCHAR(128) NULL DEFAULT NULL,
  `obs` VARCHAR(128) NULL DEFAULT NULL,
  PRIMARY KEY (`idpedido`),
  CONSTRAINT `ref_status`
    FOREIGN KEY (`status`)
    REFERENCES `pedidos`.`status` (`idstatus`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `ref_cep`
    FOREIGN KEY (`CEP`)
    REFERENCES `pedidos`.`logradouro` (`cep`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `ref_formapgto`
    FOREIGN KEY (`formapgto`)
    REFERENCES `pedidos`.`meiopgto` (`idmeiopgto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `pedidos`.`pedidopagamentos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pedidos`.`pedidopagamentos` ;

CREATE TABLE IF NOT EXISTS `pedidos`.`pedidopagamentos` (
  `idpedido` INT(11) NOT NULL,
  `idpagamento` INT(11) NOT NULL,
  PRIMARY KEY (`idpagamento`),
  CONSTRAINT `ref_pagamento`
    FOREIGN KEY (`idpagamento`)
    REFERENCES `pedidos`.`pagamento` (`idpagamento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `ref_pedido3`
    FOREIGN KEY (`idpedido`)
    REFERENCES `pedidos`.`pedido` (`idpedido`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `pedidos`.`prato`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pedidos`.`prato` ;

CREATE TABLE IF NOT EXISTS `pedidos`.`prato` (
  `idprato` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(128) NOT NULL,
  `preco` DOUBLE NOT NULL,
  PRIMARY KEY (`idprato`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `pedidos`.`pratospedido`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pedidos`.`pratospedido` ;

CREATE TABLE IF NOT EXISTS `pedidos`.`pratospedido` (
  `idprato` INT(11) NOT NULL,
  `idpedido` INT(11) NOT NULL,
  `quantidade` INT(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idprato`, `idpedido`),
  CONSTRAINT `ref_pedido`
    FOREIGN KEY (`idpedido`)
    REFERENCES `pedidos`.`pedido` (`idpedido`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `ref_prato`
    FOREIGN KEY (`idprato`)
    REFERENCES `pedidos`.`prato` (`idprato`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `pedidos`.`telefone`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pedidos`.`telefone` ;

CREATE TABLE IF NOT EXISTS `pedidos`.`telefone` (
  `idtelefone` INT(11) NOT NULL AUTO_INCREMENT,
  `prefixo` VARCHAR(8) NOT NULL DEFAULT '5571',
  `numero` VARCHAR(12) NOT NULL,
  `titular` VARCHAR(45) NULL DEFAULT NULL,
  `zap` TINYINT(4) NULL DEFAULT NULL,
  `obs` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`idtelefone`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `pedidos`.`telefonespedido`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pedidos`.`telefonespedido` ;

CREATE TABLE IF NOT EXISTS `pedidos`.`telefonespedido` (
  `idtelefone` INT(11) NOT NULL,
  `idpedido` INT(11) NOT NULL,
  PRIMARY KEY (`idtelefone`, `idpedido`),
  CONSTRAINT `ref_pedido2`
    FOREIGN KEY (`idpedido`)
    REFERENCES `pedidos`.`pedido` (`idpedido`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `ref_telefone`
    FOREIGN KEY (`idtelefone`)
    REFERENCES `pedidos`.`telefone` (`idtelefone`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
