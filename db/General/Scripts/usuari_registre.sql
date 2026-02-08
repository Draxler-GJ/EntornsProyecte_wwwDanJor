DROP DATABASE IF EXISTS `usuari_registre`;

CREATE DATABASE IF NOT EXISTS `usuari_registre`;

USE `usuari_registre`;

CREATE TABLE IF NOT EXISTS `usuaris`(
	`id` INTEGER AUTO_INCREMENT PRIMARY KEY NOT NULL,
	`nom_usuari` VARCHAR(50) NOT NULL,
	`cognoms_usuari` VARCHAR(100),
	`correu_usuari` VARCHAR(100) NOT NULL,
	`contrasenya_usuari` VARCHAR(100) NOT NULL,
	`imatge_usuari` VARCHAR(100) DEFAULT 'usuariDefecte.png',
	`data_registre` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
)ENGINE=INNODB;


/*BLOB -> para introducir una imagen dentro del servidor*/

