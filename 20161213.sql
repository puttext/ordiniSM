-- MySQL dump 10.16  Distrib 10.1.19-MariaDB, for Linux (x86_64)
--
-- Host: melchior    Database: melchior
-- ------------------------------------------------------
-- Server version	5.1.67

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `associazione_fornai`
--

DROP TABLE IF EXISTS `associazione_fornai`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `associazione_fornai` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `stagione` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `fornaio_id` int(11) NOT NULL,
  `gas_id` int(11) NOT NULL,
  `giorno` int(11) NOT NULL,
  `valido_dal` date DEFAULT NULL,
  `valido_al` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `associazione_fornai`
--

LOCK TABLES `associazione_fornai` WRITE;
/*!40000 ALTER TABLE `associazione_fornai` DISABLE KEYS */;
INSERT INTO `associazione_fornai` VALUES (1,'2016-2017',1,4,3,'2016-09-01','2017-07-31',NULL,NULL),(2,'2016-2017',3,5,3,'2016-09-01','2017-07-31',NULL,NULL),(3,'2016-2017',1,4,3,'2016-09-01','2017-07-31',NULL,NULL),(4,'2016-2017',3,5,3,'2016-09-01','2017-07-31',NULL,NULL),(5,'2016-2017',3,6,5,'2016-09-01','2017-07-31',NULL,NULL),(6,'2016-2017',0,7,3,'2016-09-01','2017-07-31',NULL,NULL),(7,'2016-2017',2,8,3,'2016-09-01','2017-07-31',NULL,NULL),(8,'2016-2017',45,9,3,'2016-09-01','2017-07-31',NULL,NULL),(9,'2016-2017',3,10,3,'2016-09-01','2017-07-31',NULL,NULL),(10,'2016-2017',0,11,3,'2016-09-01','2017-07-31',NULL,NULL),(11,'2016-2017',3,12,3,'2016-09-01','2017-07-31',NULL,NULL),(12,'2016-2017',3,13,5,'2016-09-01','2017-07-31',NULL,NULL),(13,'2016-2017',0,14,3,'2016-09-01','2017-07-31',NULL,NULL),(14,'2016-2017',2,15,3,'2016-09-01','2017-07-31',NULL,NULL),(15,'2016-2017',0,16,3,'2016-09-01','2017-07-31',NULL,NULL),(16,'2016-2017',2,17,3,'2016-09-01','2017-07-31',NULL,NULL),(17,'2016-2017',0,18,3,'2016-09-01','2017-07-31',NULL,NULL),(18,'2016-2017',0,19,3,'2016-09-01','2017-07-31',NULL,NULL),(19,'2016-2017',2,20,3,'2016-09-01','2017-07-31',NULL,NULL),(20,'2016-2017',1,21,3,'2016-09-01','2017-07-31',NULL,NULL),(21,'2016-2017',0,22,3,'2016-09-01','2017-07-31',NULL,NULL),(22,'2016-2017',0,23,3,'2016-09-01','2017-07-31',NULL,NULL),(23,'2016-2017',0,24,3,'2016-09-01','2017-07-31',NULL,NULL),(24,'2016-2017',0,25,3,'2016-09-01','2017-07-31',NULL,NULL),(25,'2016-2017',3,26,5,'2016-09-01','2017-07-31',NULL,NULL),(26,'2016-2017',0,27,3,'2016-09-01','2017-07-31',NULL,NULL),(27,'2016-2017',0,28,3,'2016-09-01','2017-07-31',NULL,NULL),(28,'2016-2017',0,29,3,'2016-09-01','2017-07-31',NULL,NULL),(29,'2016-2017',0,30,3,'2016-09-01','2017-07-31',NULL,NULL),(30,'2016-2017',0,31,3,'2016-09-01','2017-07-31',NULL,NULL),(31,'2016-2017',45,32,3,'2016-09-01','2017-07-31',NULL,NULL),(32,'2016-2017',45,33,3,'2016-09-01','2017-07-31',NULL,NULL),(33,'2016-2017',0,34,3,'2016-09-01','2017-07-31',NULL,NULL),(34,'2016-2017',45,35,3,'2016-09-01','2017-07-31',NULL,NULL),(35,'2016-2017',1,36,3,'2016-09-01','2017-07-31',NULL,NULL),(36,'2016-2017',2,37,3,'2016-09-01','2017-07-31',NULL,NULL),(37,'2016-2017',2,38,3,'2016-09-01','2017-07-31',NULL,NULL),(38,'2016-2017',3,39,3,'2016-09-01','2017-07-31',NULL,NULL),(39,'2016-2017',0,40,3,'2016-09-01','2017-07-31',NULL,NULL),(40,'2016-2017',3,41,3,'2016-09-01','2017-07-31',NULL,NULL),(41,'2016-2017',3,42,3,'2016-09-01','2017-07-31',NULL,NULL),(42,'2016-2017',45,43,3,'2016-09-01','2017-07-31',NULL,NULL),(43,'2016-2017',3,44,5,'2016-09-01','2017-07-31',NULL,NULL);
/*!40000 ALTER TABLE `associazione_fornai` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `attori`
--

DROP TABLE IF EXISTS `attori`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `attori` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `referente_id` int(11) DEFAULT NULL,
  `tipo` enum('gas','fornaio','mugnaio','contadino') COLLATE utf8_unicode_ci NOT NULL,
  `nome` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `comune` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `ragione_sociale` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `indirizzo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attori`
--

LOCK TABLES `attori` WRITE;
/*!40000 ALTER TABLE `attori` DISABLE KEYS */;
INSERT INTO `attori` VALUES (1,NULL,'fornaio','Massimo','Cesano Maderno','Il Piccolo Forno','via Monte Rosa',NULL,NULL),(2,NULL,'fornaio','Colombo','Bellinzago Lombardo','F.lli Colombo','',NULL,NULL),(3,NULL,'fornaio','Franca','Seregno','Il Pane di Franca','via Tenca',NULL,NULL),(4,NULL,'gas','GAS ConSenso','Cesano Maderno','Associazione Consenso','',NULL,NULL),(5,NULL,'gas','GAS Cent Co\' Cent Cr','Brugherio','','',NULL,NULL),(6,NULL,'gas','','Agrate B.za','','',NULL,NULL),(7,NULL,'gas','Gas Vitale','Arcore','','',NULL,NULL),(8,NULL,'gas','','Basiano','','',NULL,NULL),(9,NULL,'gas','','Bernareggio','','',NULL,NULL),(10,NULL,'gas','','Biassono','','',NULL,NULL),(11,NULL,'gas','Cent coo cent crap','Brugherio','','',NULL,NULL),(12,NULL,'gas','','Carate lambro  B.','','',NULL,NULL),(13,NULL,'gas','','Carate lambro A.','','',NULL,NULL),(14,NULL,'gas','','Carugate','','',NULL,NULL),(15,NULL,'gas','','Cassina de pecchi','','',NULL,NULL),(16,NULL,'gas','','Cernusco S/N','','',NULL,NULL),(17,NULL,'gas','Gasosa','Cernusco S/N','','',NULL,NULL),(18,NULL,'gas','','Cesano Maderno','','',NULL,NULL),(19,NULL,'gas','Pane e rose','Concorezzo/Vimercate','','',NULL,NULL),(20,NULL,'gas','','Cornate','','',NULL,NULL),(21,NULL,'gas','Lumachina','Desio','','',NULL,NULL),(22,NULL,'gas','','Gorgonzola','','',NULL,NULL),(23,NULL,'gas','','Imbersago','','',NULL,NULL),(24,NULL,'gas','','Lissone','','',NULL,NULL),(25,NULL,'gas','','Macherio','','',NULL,NULL),(26,NULL,'gas','','Mezzago','','',NULL,NULL),(27,NULL,'gas','S.Fruttuoso','Monza','','',NULL,NULL),(28,NULL,'gas','Triante','Monza','','',NULL,NULL),(29,NULL,'gas','Altrazione','Monza','','',NULL,NULL),(30,NULL,'gas','Soldo di cacio','Monza','','',NULL,NULL),(31,NULL,'gas','Agorà','Muggiò','','',NULL,NULL),(32,NULL,'gas','','Olgiate M.','','',NULL,NULL),(33,NULL,'gas','La locomotiva','Osnago','','',NULL,NULL),(34,NULL,'gas','','Pessano','','',NULL,NULL),(35,NULL,'gas','','Ronco B.','','',NULL,NULL),(36,NULL,'gas','','Seveso','','',NULL,NULL),(37,NULL,'gas','','Sulbiate','','',NULL,NULL),(38,NULL,'gas','','Trezzo','','',NULL,NULL),(39,NULL,'gas','','Triuggio','','',NULL,NULL),(40,NULL,'gas','','Vaprio ','','',NULL,NULL),(41,NULL,'gas','Pachamama','Vedano','','',NULL,NULL),(42,NULL,'gas','Casita','Vedano','','',NULL,NULL),(43,NULL,'gas','La canna del GAS','Verderio','','',NULL,NULL),(44,NULL,'gas','F.Motta','Villasanta','','',NULL,NULL),(45,NULL,'fornaio','Giona','Rovagnate','Bagaggera','',NULL,NULL),(46,NULL,'fornaio','Emilio','','','',NULL,NULL);
/*!40000 ALTER TABLE `attori` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `casse`
--

DROP TABLE IF EXISTS `casse`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `casse` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `casse`
--

LOCK TABLES `casse` WRITE;
/*!40000 ALTER TABLE `casse` DISABLE KEYS */;
/*!40000 ALTER TABLE `casse` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=64 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (55,'2016_10_12_113124_create_associazione_fornai_table',1),(56,'2016_10_12_113124_create_attori_table',1),(57,'2016_10_12_113124_create_ordini_dettagli_table',1),(58,'2016_10_12_113124_create_ordini_table',1),(59,'2016_10_12_113124_create_password_resets_table',1),(60,'2016_10_12_113124_create_prodotti_table',1),(61,'2016_10_12_113124_create_users_table',1),(62,'2016_10_12_113124_create_versamenti_table',1),(63,'2016_10_12_114017_create_casse_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ordini`
--

DROP TABLE IF EXISTS `ordini`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ordini` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `stagione` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `codice_gruppo` varchar(15) CHARACTER SET utf8 NOT NULL,
  `descrizione` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `consegna` date NOT NULL,
  `apertura` date NOT NULL,
  `chiusura` date NOT NULL,
  `fornitore_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=69 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ordini`
--

LOCK TABLES `ordini` WRITE;
/*!40000 ALTER TABLE `ordini` DISABLE KEYS */;
/*!40000 ALTER TABLE `ordini` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ordini_dettagli`
--

DROP TABLE IF EXISTS `ordini_dettagli`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ordini_dettagli` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `prodotto_id` int(11) NOT NULL,
  `gas_id` int(11) NOT NULL,
  `quantita` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ordini_dettagli`
--

LOCK TABLES `ordini_dettagli` WRITE;
/*!40000 ALTER TABLE `ordini_dettagli` DISABLE KEYS */;
INSERT INTO `ordini_dettagli` VALUES (36,100,4,0,'2016-12-13 18:26:43','2016-12-13 18:26:43'),(35,101,4,1,'2016-12-13 18:26:43','2016-12-13 18:26:43'),(34,102,4,0,'2016-12-13 18:26:43','2016-12-13 18:26:43'),(33,103,4,0,'2016-12-13 18:26:43','2016-12-13 18:26:43'),(32,104,4,0,'2016-12-13 18:26:43','2016-12-13 18:26:43'),(31,105,4,0,'2016-12-13 18:26:43','2016-12-13 18:26:43'),(30,106,4,0,'2016-12-13 18:26:43','2016-12-13 18:26:43'),(29,107,4,0,'2016-12-13 18:26:43','2016-12-13 18:26:43'),(28,108,4,0,'2016-12-13 18:26:43','2016-12-13 18:26:43'),(27,109,4,0,'2016-12-13 18:26:43','2016-12-13 18:26:43'),(26,110,4,1,'2016-12-13 18:26:43','2016-12-13 18:26:43'),(25,111,4,0,'2016-12-13 18:26:43','2016-12-13 18:26:43');
/*!40000 ALTER TABLE `ordini_dettagli` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prodotti`
--

DROP TABLE IF EXISTS `prodotti`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prodotti` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ordine_id` int(11) NOT NULL,
  `fornitore_id` int(11) NOT NULL,
  `tipo` enum('pane','farina','granella','altro') COLLATE utf8_unicode_ci NOT NULL,
  `sottotipo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descrizione` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantita` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prezzo_fornitore` double(8,2) NOT NULL,
  `contributo_des` double(8,2) NOT NULL,
  `contributo_sm` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=220 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prodotti`
--

LOCK TABLES `prodotti` WRITE;
/*!40000 ALTER TABLE `prodotti` DISABLE KEYS */;
INSERT INTO `prodotti` VALUES (1,0,1,'pane','tipo1','Tipo 1','pagnotta',3.68,0.07,0.25,NULL,NULL),(2,0,1,'pane','integrale','Integrale','pagnotta',3.68,0.07,0.25,NULL,NULL),(3,0,1,'pane','segale','Segale','pagnotta',3.68,0.07,0.25,NULL,NULL),(4,0,3,'pane','tipo1','Tipo 1','pagnotta',4.16,0.08,0.16,NULL,NULL),(5,0,3,'pane','integrale','Integrale','pagnotta',4.16,0.08,0.16,NULL,NULL),(6,0,3,'pane','segale','Segale','pagnotta',4.16,0.08,0.16,NULL,NULL),(27,0,46,'pane','segale','Segale','pagnotta',0.00,0.00,0.00,NULL,NULL),(26,0,46,'pane','integrale','Integrale','pagnotta',0.00,0.00,0.00,NULL,NULL),(25,0,46,'pane','tipo1','Tipo 1','pagnotta',0.00,0.00,0.00,NULL,NULL),(24,0,45,'pane','segale','Segale','pagnotta',0.00,0.00,0.00,NULL,NULL),(23,0,45,'pane','integrale','Integrale','pagnotta',0.00,0.00,0.00,NULL,NULL),(22,0,45,'pane','tipo1','Tipo 1','pagnotta',0.00,0.00,0.00,NULL,NULL),(21,0,2,'pane','segale','Segale','pagnotta',0.00,0.00,0.00,NULL,NULL),(20,0,2,'pane','integrale','Integrale','pagnotta',0.00,0.00,0.00,NULL,NULL),(19,0,2,'pane','tipo1','Tipo 1','pagnotta',0.00,0.00,0.00,NULL,NULL);
/*!40000 ALTER TABLE `prodotti` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ruolo` enum('referente','fornitore','coordinatore','admin') COLLATE utf8_unicode_ci NOT NULL,
  `attore_id` int(11) DEFAULT NULL,
  `gas_id` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=68 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (3,'Massimo Bertin','bertinforno@gmail.com','$2y$10$9DVhfAhAF4cMBibRgs4x/eMtr1pnJK9tSqujKcba1EVkyTV90jNy6','',1,NULL,NULL,NULL,NULL),(4,'Stefano Radaelli','stradael@livecom.it','$2y$10$KByDI8fCZx3vqN76dONM6u00/bsG4gHnZNGAH21zy.rzwmniFAIMq','coordinatore',1,4,'xm0EuU86Os8UODPN6B906qXXbmP1c6tGLkZ2GstTZiHcsJAvTuXrNqvmLGIs',NULL,'2016-12-13 18:32:37'),(5,'Giovanna Mattavelli','vgiuseppe@libero.it','$2y$10$Tfq300eWDj.ZL9jcd9qMOujcYAOOGoYXHaMr04gfRiqrgwnVpPTQa','referente',NULL,6,NULL,NULL,'2016-12-13 17:26:44'),(6,'Roberto Bossi','roberto.bossi@cemambiente.it','$2y$10$Tfq300eWDj.ZL9jcd9qMOujcYAOOGoYXHaMr04gfRiqrgwnVpPTQa','referente',NULL,6,NULL,NULL,'2016-12-13 17:26:44'),(7,'Alfonso Orsi','orsi.alfonso@gmail.com','$2y$10$Tfq300eWDj.ZL9jcd9qMOujcYAOOGoYXHaMr04gfRiqrgwnVpPTQa','referente',NULL,6,NULL,NULL,'2016-12-13 17:26:44'),(8,'Rosella Frigo','marco.vismara@fastwebnet.it','$2y$10$Tfq300eWDj.ZL9jcd9qMOujcYAOOGoYXHaMr04gfRiqrgwnVpPTQa','referente',NULL,6,NULL,NULL,'2016-12-13 17:26:44'),(9,'Paola bosetti','paulab94@gmail.com','$2y$10$Tfq300eWDj.ZL9jcd9qMOujcYAOOGoYXHaMr04gfRiqrgwnVpPTQa','referente',NULL,7,NULL,NULL,'2016-12-13 17:26:44'),(10,'Francesco','franalda@livecom.it','$2y$10$Tfq300eWDj.ZL9jcd9qMOujcYAOOGoYXHaMr04gfRiqrgwnVpPTQa','referente',NULL,8,NULL,NULL,'2016-12-13 17:26:44'),(11,'Stefania Pirovano','glicine@livecom.it','$2y$10$Tfq300eWDj.ZL9jcd9qMOujcYAOOGoYXHaMr04gfRiqrgwnVpPTQa','referente',NULL,8,NULL,NULL,'2016-12-13 17:26:44'),(12,'Massimo Corbetta ','max.corb@tin.it','$2y$10$Tfq300eWDj.ZL9jcd9qMOujcYAOOGoYXHaMr04gfRiqrgwnVpPTQa','referente',NULL,8,NULL,NULL,'2016-12-13 17:26:44'),(13,'Susanna panizza','susypanizza@yahoo.it','$2y$10$Tfq300eWDj.ZL9jcd9qMOujcYAOOGoYXHaMr04gfRiqrgwnVpPTQa','referente',NULL,9,NULL,NULL,'2016-12-13 17:26:44'),(14,'Daniele','daniele_bidinotto@hotmail.it','$2y$10$Tfq300eWDj.ZL9jcd9qMOujcYAOOGoYXHaMr04gfRiqrgwnVpPTQa','referente',NULL,9,NULL,NULL,'2016-12-13 17:26:44'),(15,'Ruggero Gariboldi','bidonedelru@libero.it','$2y$10$Tfq300eWDj.ZL9jcd9qMOujcYAOOGoYXHaMr04gfRiqrgwnVpPTQa','referente',NULL,10,NULL,NULL,'2016-12-13 17:26:44'),(16,'Angerlo Mornata','angelo.mornata@hotmail.it','$2y$10$Tfq300eWDj.ZL9jcd9qMOujcYAOOGoYXHaMr04gfRiqrgwnVpPTQa','referente',NULL,10,NULL,NULL,'2016-12-13 17:26:44'),(17,'Monica Bonalumi','m.bonalumi@tiscali.it','$2y$10$Tfq300eWDj.ZL9jcd9qMOujcYAOOGoYXHaMr04gfRiqrgwnVpPTQa','referente',NULL,5,NULL,NULL,'2016-12-13 17:26:44'),(18,'Giuseppe vergani','giuseppevergani@fastwebnet.it','$2y$10$Tfq300eWDj.ZL9jcd9qMOujcYAOOGoYXHaMr04gfRiqrgwnVpPTQa','admin',NULL,5,NULL,NULL,'2016-12-13 17:26:44'),(19,'Nicola','favuzzi.nicola@alice.it','$2y$10$Tfq300eWDj.ZL9jcd9qMOujcYAOOGoYXHaMr04gfRiqrgwnVpPTQa','referente',NULL,12,NULL,NULL,'2016-12-13 17:26:44'),(20,'Stefania Pizzoloruss','stefi08@alice.it','$2y$10$Tfq300eWDj.ZL9jcd9qMOujcYAOOGoYXHaMr04gfRiqrgwnVpPTQa','referente',NULL,12,NULL,NULL,'2016-12-13 17:26:44'),(21,'Metella Paterlini','metella@email.it','$2y$10$Tfq300eWDj.ZL9jcd9qMOujcYAOOGoYXHaMr04gfRiqrgwnVpPTQa','referente',NULL,13,NULL,NULL,'2016-12-13 17:26:44'),(22,'Marco Balconi','marco.balconi@livecom.it','$2y$10$Tfq300eWDj.ZL9jcd9qMOujcYAOOGoYXHaMr04gfRiqrgwnVpPTQa','referente',NULL,14,NULL,NULL,'2016-12-13 17:26:44'),(24,'Rossella','rossella.chiarella@gmail.com','$2y$10$Tfq300eWDj.ZL9jcd9qMOujcYAOOGoYXHaMr04gfRiqrgwnVpPTQa','referente',NULL,15,NULL,NULL,'2016-12-13 17:26:44'),(25,'Roberta Campanella','roberta.roberto@teletu.it','$2y$10$Tfq300eWDj.ZL9jcd9qMOujcYAOOGoYXHaMr04gfRiqrgwnVpPTQa','referente',NULL,17,NULL,NULL,'2016-12-13 17:26:44'),(26,'Pippo Drago','pippodrago53@gmail.com','$2y$10$Tfq300eWDj.ZL9jcd9qMOujcYAOOGoYXHaMr04gfRiqrgwnVpPTQa','coordinatore',NULL,20,NULL,NULL,'2016-12-13 17:26:44'),(27,'Rocco Cicchetti','desiogaslumachina@gmail.com','$2y$10$Tfq300eWDj.ZL9jcd9qMOujcYAOOGoYXHaMr04gfRiqrgwnVpPTQa','referente',NULL,21,NULL,NULL,'2016-12-13 17:26:44'),(28,'Mario Argentoni','m.argentoni@tiscali.it','$2y$10$Tfq300eWDj.ZL9jcd9qMOujcYAOOGoYXHaMr04gfRiqrgwnVpPTQa','referente',NULL,21,NULL,NULL,'2016-12-13 17:26:44'),(29,'Valter Salmaso',' valter.salmaso@fastwebnet.it','$2y$10$Tfq300eWDj.ZL9jcd9qMOujcYAOOGoYXHaMr04gfRiqrgwnVpPTQa','referente',NULL,21,NULL,NULL,'2016-12-13 17:26:44'),(30,'Paolo Corno','paoloementa@hotmail.com','$2y$10$Tfq300eWDj.ZL9jcd9qMOujcYAOOGoYXHaMr04gfRiqrgwnVpPTQa','referente',NULL,22,NULL,NULL,'2016-12-13 17:26:44'),(31,'Paolo Zucchi','paolo.zucchi999@gmail.com','$2y$10$Tfq300eWDj.ZL9jcd9qMOujcYAOOGoYXHaMr04gfRiqrgwnVpPTQa','referente',NULL,22,NULL,NULL,'2016-12-13 17:26:44'),(32,'Anna Spinelli','arredamentispinelli@tiscali.it','$2y$10$Tfq300eWDj.ZL9jcd9qMOujcYAOOGoYXHaMr04gfRiqrgwnVpPTQa','referente',NULL,24,NULL,NULL,'2016-12-13 17:26:44'),(33,'Silvia Vitagliani','stafanosilvia@alice.it','$2y$10$Tfq300eWDj.ZL9jcd9qMOujcYAOOGoYXHaMr04gfRiqrgwnVpPTQa','referente',NULL,25,NULL,NULL,'2016-12-13 17:26:44'),(34,'Mirella ','per.mirella@infinito.it','$2y$10$Tfq300eWDj.ZL9jcd9qMOujcYAOOGoYXHaMr04gfRiqrgwnVpPTQa','referente',NULL,25,NULL,NULL,'2016-12-13 17:26:44'),(35,'Antonia De Giuli','angelo_casiraghi@libero.it','$2y$10$Tfq300eWDj.ZL9jcd9qMOujcYAOOGoYXHaMr04gfRiqrgwnVpPTQa','coordinatore',NULL,26,NULL,NULL,'2016-12-13 17:26:44'),(36,'Pasquale Scalambrino','pasqualeavv.scalambrino@livecom.it','$2y$10$Tfq300eWDj.ZL9jcd9qMOujcYAOOGoYXHaMr04gfRiqrgwnVpPTQa','referente',NULL,27,NULL,NULL,'2016-12-13 17:26:44'),(37,'Sabina Pavarini','spavarini@gmail.com','$2y$10$Tfq300eWDj.ZL9jcd9qMOujcYAOOGoYXHaMr04gfRiqrgwnVpPTQa','referente',NULL,27,NULL,NULL,'2016-12-13 17:26:44'),(38,'Roberto Montrasio ','rmontrasio@googlemail.com','$2y$10$Tfq300eWDj.ZL9jcd9qMOujcYAOOGoYXHaMr04gfRiqrgwnVpPTQa','referente',NULL,27,NULL,NULL,'2016-12-13 17:26:44'),(39,'Elisabetta Vallania','evallania@gmail.com','$2y$10$Tfq300eWDj.ZL9jcd9qMOujcYAOOGoYXHaMr04gfRiqrgwnVpPTQa','referente',NULL,28,NULL,NULL,'2016-12-13 17:26:44'),(40,'Claudio Ciabattini','CCIABATTINI@scor.com','$2y$10$Tfq300eWDj.ZL9jcd9qMOujcYAOOGoYXHaMr04gfRiqrgwnVpPTQa','referente',NULL,29,NULL,NULL,'2016-12-13 17:26:44'),(41,'Serena Cazzaniga','serena.cazzaniga@fastwebnet.it','$2y$10$Tfq300eWDj.ZL9jcd9qMOujcYAOOGoYXHaMr04gfRiqrgwnVpPTQa','referente',NULL,30,NULL,NULL,'2016-12-13 17:26:44'),(42,'Fulvio Mauriello','fulvioraffaele@gmail.com','$2y$10$Tfq300eWDj.ZL9jcd9qMOujcYAOOGoYXHaMr04gfRiqrgwnVpPTQa','referente',NULL,31,NULL,NULL,'2016-12-13 17:26:44'),(43,'Alberto Venturini','alberto-venturini@libero.it','$2y$10$Tfq300eWDj.ZL9jcd9qMOujcYAOOGoYXHaMr04gfRiqrgwnVpPTQa','referente',NULL,32,NULL,NULL,'2016-12-13 17:26:44'),(44,'Giuliana Pirotta','pirogi@libero.it','$2y$10$Tfq300eWDj.ZL9jcd9qMOujcYAOOGoYXHaMr04gfRiqrgwnVpPTQa','referente',NULL,33,NULL,NULL,'2016-12-13 17:26:44'),(45,'Andrea Dagna ','perkeo@hotmail.it','$2y$10$Tfq300eWDj.ZL9jcd9qMOujcYAOOGoYXHaMr04gfRiqrgwnVpPTQa','referente',NULL,33,NULL,NULL,'2016-12-13 17:26:44'),(46,'Ilaria','agliani.gas@alice.it','$2y$10$Tfq300eWDj.ZL9jcd9qMOujcYAOOGoYXHaMr04gfRiqrgwnVpPTQa','referente',NULL,34,NULL,NULL,'2016-12-13 17:26:44'),(47,'Isabella Vergani','isabellavergani@hotmail.com','$2y$10$Tfq300eWDj.ZL9jcd9qMOujcYAOOGoYXHaMr04gfRiqrgwnVpPTQa','referente',NULL,34,NULL,NULL,'2016-12-13 17:26:44'),(48,'Luca Tedone','lucatedone@libero.it','$2y$10$Tfq300eWDj.ZL9jcd9qMOujcYAOOGoYXHaMr04gfRiqrgwnVpPTQa','referente',NULL,34,NULL,NULL,'2016-12-13 17:26:44'),(49,'Lorella Sala','lellina.sala1970@hotmail.it','$2y$10$Tfq300eWDj.ZL9jcd9qMOujcYAOOGoYXHaMr04gfRiqrgwnVpPTQa','referente',NULL,35,NULL,NULL,'2016-12-13 17:26:44'),(50,'Stefania Longari','Stefania.longari@hotmail.it','$2y$10$Tfq300eWDj.ZL9jcd9qMOujcYAOOGoYXHaMr04gfRiqrgwnVpPTQa','referente',NULL,35,NULL,NULL,'2016-12-13 17:26:44'),(51,'Monica Lopatriello','monichee@libero.it','$2y$10$Tfq300eWDj.ZL9jcd9qMOujcYAOOGoYXHaMr04gfRiqrgwnVpPTQa','referente',NULL,36,NULL,NULL,'2016-12-13 17:26:44'),(52,'Paolo Formenti','paoloformenti3@gmail.com','$2y$10$Tfq300eWDj.ZL9jcd9qMOujcYAOOGoYXHaMr04gfRiqrgwnVpPTQa','referente',NULL,36,NULL,NULL,'2016-12-13 17:26:44'),(53,'Ferruccio Brigatti','brigattif@yahoo.it','$2y$10$Tfq300eWDj.ZL9jcd9qMOujcYAOOGoYXHaMr04gfRiqrgwnVpPTQa','referente',NULL,37,NULL,NULL,'2016-12-13 17:26:44'),(54,'Graziana Covini','g.covini@libero.it','$2y$10$Tfq300eWDj.ZL9jcd9qMOujcYAOOGoYXHaMr04gfRiqrgwnVpPTQa','referente',NULL,38,NULL,NULL,'2016-12-13 17:26:44'),(55,'Emanuela Pesenti','emanuelapesenti@yahoo.it','$2y$10$Tfq300eWDj.ZL9jcd9qMOujcYAOOGoYXHaMr04gfRiqrgwnVpPTQa','referente',NULL,38,NULL,NULL,'2016-12-13 17:26:44'),(56,'Martina Muller ','gufiperpassione@gmail.com','$2y$10$Tfq300eWDj.ZL9jcd9qMOujcYAOOGoYXHaMr04gfRiqrgwnVpPTQa','referente',NULL,39,NULL,NULL,'2016-12-13 17:26:44'),(57,'Fratantonio Davide ','davidefratantonio@libero.it','$2y$10$Tfq300eWDj.ZL9jcd9qMOujcYAOOGoYXHaMr04gfRiqrgwnVpPTQa','referente',NULL,39,NULL,NULL,'2016-12-13 17:26:44'),(58,'Mirko Mutti','mircodany@teletu.it','$2y$10$Tfq300eWDj.ZL9jcd9qMOujcYAOOGoYXHaMr04gfRiqrgwnVpPTQa','referente',NULL,39,NULL,NULL,'2016-12-13 17:26:44'),(59,'Fabio Albani','fabio.albani@gmail.com','$2y$10$Tfq300eWDj.ZL9jcd9qMOujcYAOOGoYXHaMr04gfRiqrgwnVpPTQa','referente',NULL,40,NULL,NULL,'2016-12-13 17:26:44'),(60,'Chiara Monti','chimontiara@gmail.com','$2y$10$Tfq300eWDj.ZL9jcd9qMOujcYAOOGoYXHaMr04gfRiqrgwnVpPTQa','referente',NULL,41,NULL,NULL,'2016-12-13 17:26:44'),(61,'Edoardo Gnocchi','egnocchi@livecom.it','$2y$10$Tfq300eWDj.ZL9jcd9qMOujcYAOOGoYXHaMr04gfRiqrgwnVpPTQa','referente',NULL,41,NULL,NULL,'2016-12-13 17:26:44'),(62,'Chiara Monti','claraturris@livecom.it','$2y$10$Tfq300eWDj.ZL9jcd9qMOujcYAOOGoYXHaMr04gfRiqrgwnVpPTQa','referente',NULL,42,NULL,NULL,'2016-12-13 17:26:44'),(63,'Simone Todaro ','simone_todaro@yahoo.it','$2y$10$Tfq300eWDj.ZL9jcd9qMOujcYAOOGoYXHaMr04gfRiqrgwnVpPTQa','referente',NULL,43,NULL,NULL,'2016-12-13 17:26:44'),(64,'Lucia Fossati','viola.sgarbi@fastwebnet.it','$2y$10$Tfq300eWDj.ZL9jcd9qMOujcYAOOGoYXHaMr04gfRiqrgwnVpPTQa','referente',NULL,44,NULL,NULL,'2016-12-13 17:26:44'),(65,'Venetia Villani','venetia.villani@tecnichenuove.com','$2y$10$Tfq300eWDj.ZL9jcd9qMOujcYAOOGoYXHaMr04gfRiqrgwnVpPTQa','referente',NULL,44,NULL,NULL,'2016-12-13 17:26:44'),(66,'Rosella Caccia','girolete@yahoo.it','$2y$10$Tfq300eWDj.ZL9jcd9qMOujcYAOOGoYXHaMr04gfRiqrgwnVpPTQa','referente',NULL,0,NULL,NULL,'2016-12-13 17:26:44'),(67,'Margherita Motta','segreteria@desbri.org','$2y$10$Tfq300eWDj.ZL9jcd9qMOujcYAOOGoYXHaMr04gfRiqrgwnVpPTQa','admin',NULL,0,'hsELZtC24cDxhiSVL0KAGUhDlyTQW55cDyMGFbYdDnLChIPgb3GYGiRwTcMf',NULL,'2016-12-13 18:26:24');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `versamenti`
--

DROP TABLE IF EXISTS `versamenti`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `versamenti` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `stagione` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `data` date NOT NULL,
  `importo` double(8,2) NOT NULL,
  `gas_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `versamenti`
--

LOCK TABLES `versamenti` WRITE;
/*!40000 ALTER TABLE `versamenti` DISABLE KEYS */;
/*!40000 ALTER TABLE `versamenti` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-12-13 19:36:32
