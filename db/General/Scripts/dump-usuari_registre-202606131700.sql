-- MySQL dump 10.13  Distrib 8.0.46, for Linux (x86_64)
--
-- Host: localhost    Database: usuari_registre
-- ------------------------------------------------------
-- Server version	8.0.46-0ubuntu0.24.04.2

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `animals`
--

DROP TABLE IF EXISTS `animals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `animals` (
  `id_animal` int NOT NULL AUTO_INCREMENT,
  `nom_comu` varchar(50) NOT NULL,
  `nom_cientific` varchar(50) NOT NULL,
  `descripcio` text,
  `donacio` decimal(10,2) NOT NULL,
  `imatge` varchar(50) DEFAULT 'animalDefecte.png',
  `quantitat` int DEFAULT '0',
  `data` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_animal`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `animals`
--

LOCK TABLES `animals` WRITE;
/*!40000 ALTER TABLE `animals` DISABLE KEYS */;
INSERT INTO `animals` VALUES (1,'Goril·la Blanc','Nfumu Ngui','El nom científic de Floquet va ser Gorilla Gorilla, ja que va pertànyer a la espècie de Gorilla Occidental. Aquest goril·la va néixer a Rio Muni i va ser descobert per uns caçadors a la Selva de Nko ubicada a Guinea Equatorial, que el van denominar «Gorila Blanco». El van vendre a un professor que era conservador al Centre de Experimentació de Ikunde de la Ajuntament de Barcelona i el professor el va portar a Espanya al any 66, convertint-se en protagonista de la portada de National Geographic al any següent, convertint-se en un símbol del zoo de Barcelona i fent-se mundialment famós.',20.00,'animalDefecte.png',0,'2026-03-03 15:22:12'),(2,'Linx Ibèric','Lynx Pardinus','La espècie més rara de linx és el linx espanyol. El seu hàbitat natural són els boscos i les dunes de sorra obertes a zones aïllades de Espanya i Portugal. És una espècie en perill de extinció, amb només 1000 que romanen al mig silvestre. La seva valorada pell i les plagues agrícoles han reduït considerablement el seu hàbitat. Ara es troba principalment en un petit enclavament a Espanya i algunes poblacions disperses a zones remotes de Portugal.',25.00,'animalDefecte.png',0,'2026-03-03 15:22:12'),(3,'Axolot','Ambystoma Mexicanum','De color negre o marró clapejat, albí o blanc, al ajolot mexicà conserva la seva aleta dorsal de capgròs que se estén gairebé per tot el cos que fa de 15 i fins a 30 centímetres de longitud, i les seves brànquies externes en forma de plomes sobresurten de la part del darrere del seu ample cap.',20.00,'animalDefecte.png',0,'2026-03-03 15:22:12'),(4,'Dodo','Raphus Cucullatus','Era una au de aproximadament un metre de alçada, de plomatge grisenc i amb un pes, que segons anàlisis realitzades el 2012, rondava els 10 kg; no obstant això, altres publicacions estimen un rang dentre 9.5 i 17.5 kg.',25.00,'animalDefecte.png',0,'2026-03-03 15:22:12'),(5,'Rosegador','Reithrodontomys Spectabilis','És nocturn i semiarborícola. És endèmic de a la illa de Cozumel (Mèxic).',15.00,'animalDefecte.png',4,'2026-03-03 15:22:12'),(6,'Paquita','York-Share Terrier','Perillosa i diminuta gosseta que hi viu a casa de la persona que esta fent aquest projecte de PHP i no el deixa dormir al llit',200.00,'animalDefecte.png',200,'2026-03-03 15:22:12'),(7,'Romansaurus','ROMANSAURUS_REX','Conill domèstic entrenat per el seu amo. Es un famòs youtuber que cada día impresiona al món amb les seues carreres i la forma grasiosa de fer sprints.',100.00,'animalDefecte.png',1000,'2026-03-03 15:22:12');
/*!40000 ALTER TABLE `animals` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `apadrina`
--

DROP TABLE IF EXISTS `apadrina`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `apadrina` (
  `id_apad` int NOT NULL AUTO_INCREMENT,
  `idapadrina` int DEFAULT '1',
  `idusuari` int DEFAULT NULL,
  `idanimal` int DEFAULT NULL,
  `quantitatAnimal` int NOT NULL,
  `donacio_unitaria` decimal(10,2) NOT NULL,
  `data_apadrina` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_apad`),
  KEY `idusuari` (`idusuari`),
  KEY `idanimal` (`idanimal`),
  CONSTRAINT `apadrina_ibfk_1` FOREIGN KEY (`idusuari`) REFERENCES `usuaris` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `apadrina_ibfk_2` FOREIGN KEY (`idanimal`) REFERENCES `animals` (`id_animal`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `apadrina`
--

LOCK TABLES `apadrina` WRITE;
/*!40000 ALTER TABLE `apadrina` DISABLE KEYS */;
INSERT INTO `apadrina` VALUES (2,1,7,6,20100,2020000.00,NULL),(3,1,7,6,20100,2020000.00,NULL),(4,1,7,6,20100,2020000.00,NULL),(5,1,7,6,20100,2020000.00,NULL),(19,1,7,7,500,50000.00,NULL),(20,1,7,7,500,50000.00,NULL),(21,1,7,5,504,50060.00,NULL);
/*!40000 ALTER TABLE `apadrina` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuaris`
--

DROP TABLE IF EXISTS `usuaris`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuaris` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom_usuari` varchar(50) NOT NULL,
  `cognoms_usuari` varchar(100) DEFAULT NULL,
  `correu_usuari` varchar(100) NOT NULL,
  `contrasenya_usuari` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `imatge_usuari` varchar(100) DEFAULT 'usuariDefecte.png',
  `data_registre` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuaris`
--

LOCK TABLES `usuaris` WRITE;
/*!40000 ALTER TABLE `usuaris` DISABLE KEYS */;
INSERT INTO `usuaris` VALUES (2,'Daniel','Jornet Gómez','correu@alumne.com','$2a$12$QS0rIVbHrGaRsoKq1WlYre3B6ZmJpwLHarHyfGLqUMnj9DoKCrQJi','usuariDefecte.png','2026-02-16 08:54:29'),(7,'Begoña María','Martínez Esparza','begu@alumne.es','$2a$12$kCXE4ZT5gH2rIGfEV6zMEeojCHP013YEbc9Qsfm5gHnjk/QH/wAE6','usuariDefecte.png','2026-02-18 21:37:22'),(10,'Jose María','Núñez López','jose@alumne.es','$2a$12$j8BCVw1ZbAREIY5xXfvJD.VnW4pnL7G0kjj8efditeui3bjrF703O','usuariDefecte.png','2026-02-18 22:59:57'),(11,'admin',NULL,'admin@daw.com','$2a$12$kGQ8lttIcPGktnJh1fByhuVq2TdnwM2CNYm8H.YQfp//dsKA0UQKW','usuariDefecte.png','2026-02-21 19:07:58'),(12,'Saffira','','saffira@alumne.es','$2y$10$VcgIs.HPRlUqZK1SYMq9leE1o1i89XCkKf7qsiV1aer4jg55DlGOm','usuariDefecte.png','2026-03-16 16:46:14'),(13,'Paquita','Paca','paquita@alumne.es','$2y$10$45RpayzMYl/0JSKnr0yAiesJ2ICq02aqOmSMJft6BakbQzPMKWOeW','usuariDefecte.png','2026-03-19 22:48:44'),(14,'Usuari','','us@us.com','$2y$10$6lyLuPAdC2qwNl05wR1nQONznBm5Sbi56a9U.g0tcPQK/chW2W7ce','usuariDefecte.png','2026-06-07 20:59:26');
/*!40000 ALTER TABLE `usuaris` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'usuari_registre'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-06-13 17:00:55

INSERT INTO `animals` (`nom_comu`, `nom_cientific`, `descripcio`, `donacio`) VALUES
('Kakapo','Strigops habroptilus','És famós per ser l''únic lloro no volador del món, el lloro més pesat i l''únic que té un sistema de cria del tipus lek. També és una de les aus més longeves. Malgrat la seua incapacitat per a volar, va sobreviure a la introducció d''espècies invasores i a la desforestació. Els kakapos són considerats una espècie en perill crític d''extinció, amb 249 exemplars vius reconeguts.',33.00),

('Olm','Proteus anguinus','Les coves són hàbitats atípics on la vida és difícil per l''escassetat de llum, l''alta humitat i els pocs recursos. No obstant això, els olms o proteus, també coneguts com a salamandres albines de les coves, s''han adaptat a aquestes condicions. Són els únics vertebrats europeus adaptats a viure en coves i presenten característiques molt singulars.',20.00),

('Quokka','Setonix brachyurus','És un xicotet marsupial de la grandària d''un gat domèstic. Com altres membres de la família Macropodidae, és herbívor i principalment nocturn. Habita en algunes illes de la costa d''Austràlia Occidental, especialment a l''illa de Rottnest. És conegut pel seu alt grau de sociabilitat i per la seua expressió facial, que li ha valgut el sobrenom de l''animal més feliç del món.',40.00),

('Delfí del riu Irrawaddy','Orcaella brevirostris','Aquesta espècie té un cap arredonit i sense bec. L''aleta dorsal és curta, triangular i està situada cap a la part posterior del cos. Les aletes pectorals són llargues i amples. Presenta una coloració grisenca amb la part inferior més clara que la superior.',25.00),

('Gat de Pallas','Otocolobus manul','El gat de Pallas és un felí salvatge que habita a les zones fredes de l''Àsia Central. Fora del seu hàbitat només es pot observar en zoològics. Tot i que no està en perill crític, la UICN el considera una espècie quasi amenaçada. Té un pelatge llarg i dens que el protegeix de les baixes temperatures.',25.00),

('Saiga','Saiga tatarica','L''antílop saiga és un peculiar mamífer que habita les estepes de l''Àsia Central. A principis del segle XXI la seua població va disminuir dràsticament, passant de prop d''un milió d''exemplars a només uns 40.000. Actualment es duen a terme programes de conservació per a recuperar l''espècie.',45.00),

('Llop gris mexicà','Canis lupus baileyi','El llop gris mexicà és un cànid de grandària mitjana, amb un cos esvelt i robust. Té el cap estret, les orelles grans i rectes i una cua coberta de pèl dens. Els mascles solen ser més grans que les femelles i poden arribar als 1,2 metres de longitud.',25.00),

('Capibara','Hydrochoerus hydrochaeris','Té un cos robust en forma de barril i un cap menut, amb un pelatge marró rogenc que es torna més clar a la part inferior. Pot arribar a fer 1,30 metres de llarg i pesar fins a 65 kg. Té els peus lleugerament palmats, no té cua i és el rosegador més gran del món.',100.00);

