-- MySQL dump 10.13  Distrib 5.7.19, for Linux (x86_64)
--
-- Host: localhost    Database: javaquest
-- ------------------------------------------------------
-- Server version	5.7.19-0ubuntu0.16.04.1

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
-- Table structure for table `respostas`
--

DROP TABLE IF EXISTS `respostas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `respostas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `resposta` varchar(255) NOT NULL,
  `correta` tinyint(1) DEFAULT '0',
  `pergunta_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pergunta_id` (`pergunta_id`),
  CONSTRAINT `respostas_ibfk_1` FOREIGN KEY (`pergunta_id`) REFERENCES `perguntas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `respostas`
--

LOCK TABLES `respostas` WRITE;
/*!40000 ALTER TABLE `respostas` DISABLE KEYS */;
INSERT INTO `respostas` VALUES (1,'System.out.println()',1,1),(2,'println()',0,1),(3,'imprimir()',0,1),(4,'System.out.line()',0,1),(5,'public static void main(String[]args)',1,2),(6,'private static void main(String[]args)',0,2),(7,'private static executar(String[]args)',0,2),(8,'public class MinhaClass()',0,2),(9,'6',0,3),(10,'3',0,3),(11,'1',1,3),(13,'O comando não funcionará',0,3),(18,'Uma linguagem leve.',0,10),(19,'Uma linguagem de baixo-nível.',0,10),(20,'Ótima para invasão de sistemas.',0,10),(21,'Uma linguagem multiplataforma',1,10),(22,'O comando não funcionará.',0,11),(23,'true',0,11),(24,'10',0,11),(25,'false',1,11),(26,'Atom',0,12),(27,'Sublime Text',0,12),(28,'Notepad ++',0,12),(29,'Eclipse',1,12),(30,'java.utils',0,13),(31,'java.sockets',0,13),(32,'java.text',0,13),(33,'java.lang',1,13),(34,'Computador',0,14),(35,'Copo',0,14),(36,'Garfo',0,14),(37,'Xícara',1,14),(38,'String',0,15),(39,'args',0,15),(40,'Main',0,15),(41,'Object',1,15),(42,'Um método abstrato.',0,16),(43,'Um array modificado.',0,16),(44,'Uma variável mais pesada.',0,16),(45,'Uma instância de uma classe.',1,16),(46,'Frederich Taylor',0,17),(47,'John Night',0,17),(48,'Richard Stallman',0,17),(49,'James Gosling',1,17),(50,'Interpretada',0,18),(51,'Compilada',0,18),(52,'Script',0,18),(53,'Compilada e Interpretada',1,18),(54,'Google',0,19),(55,'Sun',0,19),(56,'Amazon',0,19),(57,'Oracle',1,19),(58,'compare(...)',0,20),(59,'equals(...)',0,20),(60,'comport(...)',0,20),(61,'compareTo(...)',1,20),(62,'Queue,Set,ArrayList',0,21),(63,'ArrayList,HashList,SortedList',0,21),(64,'ArrayList,LinkedList,Collection',0,21),(65,'ArrayList,LinkedList,Vector',1,21);
/*!40000 ALTER TABLE `respostas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-09-23 10:16:35
