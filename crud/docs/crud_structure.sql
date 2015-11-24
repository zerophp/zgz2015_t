-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema crud
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema crud
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `crud` DEFAULT CHARACTER SET utf8 ;
USE `crud` ;

-- -----------------------------------------------------
-- Table `crud`.`city`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `crud`.`city` (
  `idcity` INT NOT NULL AUTO_INCREMENT,
  `city` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`idcity`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `crud`.`gender`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `crud`.`gender` (
  `idgender` INT NOT NULL AUTO_INCREMENT,
  `gender` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idgender`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `crud`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `crud`.`user` (
  `iduser` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `name` VARCHAR(255) NOT NULL,
  `bdate` DATETIME NOT NULL,
  `usercol` VARCHAR(45) NULL,
  `photo` VARCHAR(255) NULL,
  `description` TEXT NULL,
  `created` TIMESTAMP NOT NULL,
  `updated` TIMESTAMP NULL,
  `city_idcity` INT NOT NULL,
  `gender_idgender` INT NOT NULL,
  PRIMARY KEY (`iduser`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC),
  INDEX `fk_user_city_idx` (`city_idcity` ASC),
  INDEX `fk_user_gender1_idx` (`gender_idgender` ASC),
  CONSTRAINT `fk_user_city`
    FOREIGN KEY (`city_idcity`)
    REFERENCES `crud`.`city` (`idcity`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_gender1`
    FOREIGN KEY (`gender_idgender`)
    REFERENCES `crud`.`gender` (`idgender`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `crud`.`pet`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `crud`.`pet` (
  `idpet` INT NOT NULL AUTO_INCREMENT,
  `pet` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`idpet`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `crud`.`language`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `crud`.`language` (
  `idlanguage` INT NOT NULL AUTO_INCREMENT,
  `language` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`idlanguage`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `crud`.`user_has_pet`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `crud`.`user_has_pet` (
  `user_iduser` VARCHAR(255) NOT NULL,
  `pet_idpet` INT NOT NULL,
  PRIMARY KEY (`user_iduser`, `pet_idpet`),
  INDEX `fk_user_has_pet_pet1_idx` (`pet_idpet` ASC),
  INDEX `fk_user_has_pet_user1_idx` (`user_iduser` ASC),
  CONSTRAINT `fk_user_has_pet_user1`
    FOREIGN KEY (`user_iduser`)
    REFERENCES `crud`.`user` (`iduser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_has_pet_pet1`
    FOREIGN KEY (`pet_idpet`)
    REFERENCES `crud`.`pet` (`idpet`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `crud`.`user_has_language`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `crud`.`user_has_language` (
  `user_iduser` VARCHAR(255) NOT NULL,
  `language_idlanguage` INT NOT NULL,
  PRIMARY KEY (`user_iduser`, `language_idlanguage`),
  INDEX `fk_user_has_language_language1_idx` (`language_idlanguage` ASC),
  INDEX `fk_user_has_language_user1_idx` (`user_iduser` ASC),
  CONSTRAINT `fk_user_has_language_user1`
    FOREIGN KEY (`user_iduser`)
    REFERENCES `crud`.`user` (`iduser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_has_language_language1`
    FOREIGN KEY (`language_idlanguage`)
    REFERENCES `crud`.`language` (`idlanguage`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
