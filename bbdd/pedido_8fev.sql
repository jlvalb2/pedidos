-- MySQL dump 10.13  Distrib 5.7.32, for Linux (x86_64)
--
-- Host: localhost    Database: pedidos
-- ------------------------------------------------------
-- Server version	5.7.32-0ubuntu0.18.04.1

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
-- Table structure for table `pedido`
--

DROP TABLE IF EXISTS `pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pedido` (
  `idpedido` int(11) NOT NULL AUTO_INCREMENT,
  `horaPedido` datetime NOT NULL,
  `horaEntrega` datetime NOT NULL,
  `valor` double NOT NULL,
  `taxaentrega` double NOT NULL,
  `entregador` varchar(45) DEFAULT NULL,
  `recolhedor` varchar(45) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `nomecliente` varchar(45) NOT NULL,
  `sobrenomecliente` varchar(45) DEFAULT NULL,
  `formapgto` int(11) DEFAULT NULL,
  `CEP` char(8) NOT NULL,
  `numero` varchar(45) DEFAULT NULL,
  `complemento` varchar(45) DEFAULT NULL,
  `referencia` varchar(128) DEFAULT NULL,
  `obs` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`idpedido`),
  KEY `ref_status` (`status`),
  KEY `ref_cep` (`CEP`),
  KEY `ref_formapgto` (`formapgto`),
  CONSTRAINT `ref_cep` FOREIGN KEY (`CEP`) REFERENCES `logradouro` (`cep`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `ref_formapgto` FOREIGN KEY (`formapgto`) REFERENCES `meiopgto` (`idmeiopgto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `ref_status` FOREIGN KEY (`status`) REFERENCES `status` (`idstatus`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedido`
--

LOCK TABLES `pedido` WRITE;
/*!40000 ALTER TABLE `pedido` DISABLE KEYS */;
INSERT INTO `pedido` VALUES (1,'2021-01-02 00:00:00','2021-01-03 13:00:00',90,10,'Jose Luis','',4,'Diego','',6,'41810425','466','Edf Mansão Jardim Imperial, apto 502','Loteamento Aquarius',''),(2,'2021-01-01 00:00:00','2021-01-09 14:00:00',180,0,'Jose Luis','',4,'Denise','Ferraz',NULL,'99999001','3','Rua Praia do Condê, 3, qd c, 22. Vilas do Atl','',''),(3,'2021-01-01 00:00:00','2021-01-10 13:30:00',180,0,'Vitor','',4,'Cintia','',NULL,'99999001','','Encontro das Águas, Qd D, Casa 6','',''),(4,'2021-01-01 00:00:00','2021-01-10 12:00:00',360,0,'Vitor','Jose Luis',4,'Valdeci/Alzira','',1,'41770840','73','802A','',''),(5,'2021-01-01 00:00:00','2021-01-15 20:30:00',270,15,'Vitor','Jose Luis',4,'Cintia','',NULL,'99999001','0','Encontro das Águas, Qd D, Casa 6','',''),(6,'2021-01-01 00:00:00','2021-01-21 17:00:00',450,0,'Vitor','Vitor',4,'Olivia','Ravazzano Fontes',NULL,'99999001','0','R do Cascalho, 39 Cond Parque do Sol, Casa 15','Pituaçu (Escola Creche Tia Lu)',''),(7,'2021-01-01 00:00:00','2021-02-03 19:00:00',570,0,'Jose Luis','Jose Luis',4,'Raquel','',NULL,'99999001','0','Rua Viviane Vieira Pedreira, Qd E Lt 12','Ipitanga, Lauro de Freitas',''),(8,'2021-01-01 00:00:00','2021-02-06 13:00:00',410,0,'Jose Luis','',4,'Isabel','Reis',NULL,'41830380','1019','Residencial Baia do Sueste, apto 902','',''),(9,'2021-01-01 00:00:00','2021-02-07 12:00:00',240,0,'Vitor','',4,'Denis','Falcão',NULL,'41830451','832','Ed Mansão Felix II, Apto 804','Lado colegio N.S. da Luz',''),(10,'2021-01-01 00:00:00','2021-02-04 19:30:00',510,0,'Jose Luis','Jose Luis',4,'Normando','Cerqueira',NULL,'99999001','1516','R Guaraçaima, 1516, Piatã','',''),(11,'2021-01-01 00:00:00','2021-02-06 14:00:00',360,0,'Jose Luis','Jose Luis',4,'Fernando','González',1,'99999001','0','Le Parc, Ed Eden Torre 11, apto 1201','','');
/*!40000 ALTER TABLE `pedido` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-02-08 20:24:20
