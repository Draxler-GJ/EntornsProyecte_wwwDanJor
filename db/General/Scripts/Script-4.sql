CREATE TABLE IF NOT EXISTS `animals`(
	`id` INTEGER AUTO_INCREMENT PRIMARY KEY,
	`nom_comu` VARCHAR(50) NOT NULL,
	`nom_cientific` VARCHAR(50) NOT NULL,
	`descripcio` TEXT,
	`donacio` DECIMAL(10,2) NOT NULL,
	`imatge` VARCHAR(50) DEFAULT 'animalDefecte.png',
	`quantitat` INTEGER DEFAULT '0',
	`data` TIMESTAMP DEFAULT CURRENT_TIMESTAMP()
)ENGINE = InnoDB;


/*INSERT VALORS MANUALMENT*/

INSERT INTO `animals` (`nom_comu`,`nom_cientific`,`descripcio`,`donacio`) VALUES
('Goril·la Blanc', 'Nfumu Ngui','El nom científic de Floquet va ser Gorilla Gorilla, ja que va pertànyer a la espècie de Gorilla Occidental. Aquest goril·la va néixer a Rio Muni i va ser descobert per uns caçadors a la Selva de Nko ubicada a Guinea Equatorial, que el van denominar «Gorila Blanco». El van vendre a un professor que era conservador al Centre de Experimentació de Ikunde de la Ajuntament de Barcelona i el professor el va portar a Espanya al any 66, convertint-se en protagonista de la portada de National Geographic al any següent, convertint-se en un símbol del zoo de Barcelona i fent-se mundialment famós.', 20),
('Linx Ibèric', 'Lynx Pardinus', 'La espècie més rara de linx és el linx espanyol. El seu hàbitat natural són els boscos i les dunes de sorra obertes a zones aïllades de Espanya i Portugal. És una espècie en perill de extinció, amb només 1000 que romanen al mig silvestre. La seva valorada pell i les plagues agrícoles han reduït considerablement el seu hàbitat. Ara es troba principalment en un petit enclavament a Espanya i algunes poblacions disperses a zones remotes de Portugal.', 25),
('Axolot','Ambystoma Mexicanum', 'De color negre o marró clapejat, albí o blanc, al ajolot mexicà conserva la seva aleta dorsal de capgròs que se estén gairebé per tot el cos que fa de 15 i fins a 30 centímetres de longitud, i les seves brànquies externes en forma de plomes sobresurten de la part del darrere del seu ample cap.', 20),
('Dodo','Raphus Cucullatus','Era una au de aproximadament un metre de alçada, de plomatge grisenc i amb un pes, que segons anàlisis realitzades el 2012, rondava els 10 kg; no obstant això, altres publicacions estimen un rang dentre 9.5 i 17.5 kg.', 25),
('Rosegador','Reithrodontomys Spectabilis','És nocturn i semiarborícola. És endèmic de a la illa de Cozumel (Mèxic).', 15),
('Paquita','York-Share Terrier','Perillosa i diminuta gosseta que hi viu a casa de la persona que esta fent aquest projecte de PHP i no el deixa dormir al llit', 200),
('Romansaurus','ROMANSAURUS_REX','Conill domèstic entrenat per el seu amo. Es un famòs youtuber que cada día impresiona al món amb les seues carreres i la forma grasiosa de fer sprints.', 100);