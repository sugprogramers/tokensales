-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema tokensales
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `tokensales` ;

-- -----------------------------------------------------
-- Schema tokensales
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `tokensales` DEFAULT CHARACTER SET latin1 ;
USE `tokensales` ;

-- -----------------------------------------------------
-- Table `tokensales`.`c_country`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tokensales`.`c_country` ;

CREATE TABLE IF NOT EXISTS `tokensales`.`c_country` (
  `c_country_id` CHAR(32) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `isactive` CHAR(1) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL DEFAULT 'Y',
  `created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `createdby` CHAR(32) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `updated` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedby` CHAR(32) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `name` VARCHAR(60) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `description` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL,
  `countrycode` VARCHAR(2) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  PRIMARY KEY (`c_country_id`),
  UNIQUE INDEX `c_countrycode` (`countrycode` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `tokensales`.`c_region`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tokensales`.`c_region` ;

CREATE TABLE IF NOT EXISTS `tokensales`.`c_region` (
  `c_region_id` CHAR(32) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `isactive` CHAR(1) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL DEFAULT 'Y',
  `created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `createdby` CHAR(32) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `updated` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedby` CHAR(32) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `name` VARCHAR(60) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `description` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL,
  `c_country_id` CHAR(32) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  PRIMARY KEY (`c_region_id`),
  UNIQUE INDEX `c_region_name` (`name` ASC, `c_country_id` ASC),
  INDEX `c_region_c_country` (`c_country_id` ASC),
  CONSTRAINT `c_region_c_country`
    FOREIGN KEY (`c_country_id`)
    REFERENCES `tokensales`.`c_country` (`c_country_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `tokensales`.`c_user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tokensales`.`c_user` ;

CREATE TABLE IF NOT EXISTS `tokensales`.`c_user` (
  `c_user_id` CHAR(32) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `isactive` CHAR(1) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL DEFAULT 'Y',
  `created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `createdby` CHAR(32) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `updated` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedby` CHAR(32) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `email` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `password` VARCHAR(40) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `phone` VARCHAR(40) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `firstname` VARCHAR(60) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `lastname` VARCHAR(60) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `birthday` TIMESTAMP NULL,
  `address1` VARCHAR(150) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `address2` VARCHAR(150) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `c_country_id` CHAR(32) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `c_region_id` CHAR(32) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `city` CHAR(60) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `postal` CHAR(10) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `usertype` CHAR(60) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL DEFAULT 'INV',
  `registertoken` CHAR(60) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `tokenexpirationdate` TIMESTAMP NULL DEFAULT NULL,
  `status` VARCHAR(60) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL DEFAULT 'PEND',
  PRIMARY KEY (`c_user_id`),
  UNIQUE INDEX `c_user_email_uniq` (`email` ASC),
  INDEX `c_user_c_country_fk` (`c_country_id` ASC),
  INDEX `c_user_c_region_fk` (`c_region_id` ASC),
  CONSTRAINT `c_user_c_country_fk`
    FOREIGN KEY (`c_country_id`)
    REFERENCES `tokensales`.`c_country` (`c_country_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `c_user_c_region_fk`
    FOREIGN KEY (`c_region_id`)
    REFERENCES `tokensales`.`c_region` (`c_region_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `tokensales`.`c_admin`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tokensales`.`c_admin` ;

CREATE TABLE IF NOT EXISTS `tokensales`.`c_admin` (
  `c_admin_id` CHAR(32) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `c_user_id` CHAR(32) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `isactive` CHAR(1) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL DEFAULT 'Y',
  `created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `createdby` CHAR(32) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `updated` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedby` CHAR(32) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  PRIMARY KEY (`c_admin_id`),
  INDEX `c_admin_c_user_fk` (`c_user_id` ASC),
  CONSTRAINT `c_admin_c_user_fk`
    FOREIGN KEY (`c_user_id`)
    REFERENCES `tokensales`.`c_user` (`c_user_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `tokensales`.`c_currency`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tokensales`.`c_currency` ;

CREATE TABLE IF NOT EXISTS `tokensales`.`c_currency` (
  `c_currency_id` CHAR(32) NOT NULL,
  `isactive` CHAR(1) NOT NULL DEFAULT 'Y',
  `created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `createdby` CHAR(32) NOT NULL,
  `updated` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedby` CHAR(32) NOT NULL,
  `iso_code` VARCHAR(3) NOT NULL,
  `cursymbol` VARCHAR(10) NOT NULL,
  `description` VARCHAR(255) NOT NULL,
  `stdprecision` DECIMAL(10,0) NOT NULL,
  PRIMARY KEY (`c_currency_id`),
  UNIQUE INDEX `c_currencyisocode` (`iso_code` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `tokensales`.`c_token`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tokensales`.`c_token` ;

CREATE TABLE IF NOT EXISTS `tokensales`.`c_token` (
  `c_token_id` CHAR(32) NOT NULL,
  `isactive` CHAR(1) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL DEFAULT 'Y',
  `created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `createdby` CHAR(32) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `updated` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedby` CHAR(32) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `name` VARCHAR(45) NOT NULL,
  `description` VARCHAR(100) CHARACTER SET 'cp850' COLLATE 'cp850_general_ci' NOT NULL,
  `eth_coins` DECIMAL NOT NULL,
  `status` VARCHAR(60) NULL,
  PRIMARY KEY (`c_token_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tokensales`.`c_token_phase`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tokensales`.`c_token_phase` ;

CREATE TABLE IF NOT EXISTS `tokensales`.`c_token_phase` (
  `c_token_phase_id` CHAR(32) NOT NULL,
  `isactive` CHAR(1) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL DEFAULT 'Y',
  `created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `createdby` CHAR(32) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `updated` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedby` CHAR(32) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `total_coins_available` DECIMAL NOT NULL,
  `total_coins_sold` DECIMAL NULL DEFAULT 0,
  `c_token_id` CHAR(32) NOT NULL,
  `status` VARCHAR(60) NOT NULL,
  PRIMARY KEY (`c_token_phase_id`),
  INDEX `fk_c_token_phase_c_token1_idx` (`c_token_id` ASC),
  CONSTRAINT `fk_c_token_phase_c_token1`
    FOREIGN KEY (`c_token_id`)
    REFERENCES `tokensales`.`c_token` (`c_token_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tokensales`.`c_sales_phase`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tokensales`.`c_sales_phase` ;

CREATE TABLE IF NOT EXISTS `tokensales`.`c_sales_phase` (
  `c_sales_fase` VARCHAR(32) NOT NULL,
  `isactive` CHAR(1) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL DEFAULT 'Y',
  `created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `createdby` CHAR(32) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `updated` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedby` CHAR(32) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `coins_amt` INT NOT NULL default 0,
  `c_user_id` CHAR(32) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `c_token_phase_id` CHAR(32) NOT NULL,
  `date` TIMESTAMP NULL,
  `validation_string` VARCHAR(100) NULL,
  `payment_address` VARCHAR(100) NULL,
  `phase_number` INT NULL,
  `status` VARCHAR(60) NULL,
  PRIMARY KEY (`c_sales_fase`),
  INDEX `fk_c_sales_phase_c_user1_idx` (`c_user_id` ASC),
  INDEX `fk_c_sales_phase_c_token_phase1_idx` (`c_token_phase_id` ASC),
  CONSTRAINT `fk_c_sales_phase_c_user1`
    FOREIGN KEY (`c_user_id`)
    REFERENCES `tokensales`.`c_user` (`c_user_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_c_sales_phase_c_token_phase1`
    FOREIGN KEY (`c_token_phase_id`)
    REFERENCES `tokensales`.`c_token_phase` (`c_token_phase_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
