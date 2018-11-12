-- MySQL dump 10.13  Distrib 5.7.20, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: portifolio
-- ------------------------------------------------------
-- Server version	5.7.24-0ubuntu0.16.04.1

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
-- Table structure for table `projetos`
--

DROP TABLE IF EXISTS `projetos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `projetos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(120) NOT NULL,
  `descricao` text NOT NULL,
  `link` varchar(255) NOT NULL,
  `user` int(11) NOT NULL,
  `data` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_projetos_user_idx` (`user`),
  CONSTRAINT `fk_projetos_user` FOREIGN KEY (`user`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projetos`
--

LOCK TABLES `projetos` WRITE;
/*!40000 ALTER TABLE `projetos` DISABLE KEYS */;
INSERT INTO `projetos` VALUES (2,'ta5ks','This is an app that allows you to create and manage tasks. It was built using Android Studio. \r\nFor each task you can associate with a project (or tag). The project represents what the task is about, for example, the task \r\n\"Study to the test tomorrow\" can has the project \"University\" or \"School\". Each task has a title, a description and a tag.','https://github.com/Levysantiago/ta5ks',1,'2018-11-11'),(3,'Math Kids','Um jogo educativo para ajudar as crianças no aprendizado de contagem de elementos. \r\nUm jogo implementa uma interface de drag and drop que contribui para a cordenação motora da criança.','https://github.com/Levysantiago/MathKids',1,'2018-11-11');
/*!40000 ALTER TABLE `projetos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `publicacoes`
--

DROP TABLE IF EXISTS `publicacoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `publicacoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(200) NOT NULL,
  `evento` varchar(200) NOT NULL,
  `cidade` varchar(72) NOT NULL,
  `anais` varchar(200) DEFAULT NULL,
  `paginas` varchar(12) DEFAULT NULL,
  `ano` varchar(4) NOT NULL,
  `link` varchar(255) NOT NULL,
  `user` int(11) NOT NULL,
  `data` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_publicacoes_user_idx` (`user`),
  CONSTRAINT `fk_publicacoes_user` FOREIGN KEY (`user`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `publicacoes`
--

LOCK TABLES `publicacoes` WRITE;
/*!40000 ALTER TABLE `publicacoes` DISABLE KEYS */;
INSERT INTO `publicacoes` VALUES (4,'Avaliação de linguagens visuais de programação no ensino médio a partir da utilização do conceito de Robótica Pedagógica.','VI Congresso Brasileiro de Informática na Educação','Recife','Anais dos Workshops do Congresso Brasileiro de Informática na Educação (CBIE)','p. 962-971','2017','http://br-ie.org/pub/index.php/wcbie/article/view/7485',1,'2018-11-11'),(5,'Redes Sociais na educação - Revisão de softwares de Redes Sociais como ferramentas educaionais.','XVII ESCOLA REGIONAL DE COMPUTAÇÃO BAHIA - ALAGOAS - SERGIPE','Cruz das Almas','Anais Workshop de Educação e Informática Bahia-Alagoas-Sergipe (WEIBASE)','p. 36-45','2017','https://drive.google.com/file/d/1m7rEnwgkHGoOUowkV6Vdm-x7T02h8TRI/view?usp=sharing',1,'2018-11-11'),(6,'Analise de softwares de virtualização de objetos eletrônicos para utilização em projetos de ensino que utilizem o conceito de Internet das Coisas: Protoboard Virtual e Plataforma Arduíno.','XVII ESCOLA REGIONAL DE COMPUTAÇÃO BAHIA - ALAGOAS - SERGIPE','Cruz das Almas','Anais Workshop de Educação e Informática Bahia-Alagoas-Sergipe (WEIBASE)','p. 46-55','2017','https://drive.google.com/file/d/1m7rEnwgkHGoOUowkV6Vdm-x7T02h8TRI/view?usp=sharing',1,'2018-11-11');
/*!40000 ALTER TABLE `publicacoes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(40) NOT NULL,
  `senha` varchar(40) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'60448e02f7fa22c4ab55eb33ae7383e22667a7c2','9edadfd11a546ac0703b41ca6f502c0cf2406697');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-11-12 13:02:24
