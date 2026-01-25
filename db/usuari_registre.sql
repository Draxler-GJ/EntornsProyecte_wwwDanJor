CREATE DATABASE `usuari_registre`;

USE `usuari_registre`;

CREATE TABLE `usuaris`(
	`id` INTEGER AUTO_INCREMENT PRIMARY KEY NOT NULL,
	`nom_usuari` VARCHAR(50) NOT NULL,
	`cognoms_usuari` VARCHAR(100),
	`correu` VARCHAR(100) NOT NULL,
	`imatge` INT,
	`data_registre` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
)ENGINE=INNODB;