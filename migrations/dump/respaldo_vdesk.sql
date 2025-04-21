/*M!999999\- enable the sandbox mode */ 
-- MariaDB dump 10.19  Distrib 10.11.10-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: vdesk
-- ------------------------------------------------------
-- Server version	10.11.10-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `vdesk`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `vdesk` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `vdesk`;

--
-- Table structure for table `categorias`
--

DROP TABLE IF EXISTS `categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) NOT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias`
--

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` VALUES
(1,'Tecnologías de la Información',1),
(2,'Recursos Humanos',1),
(3,'Educación',1),
(4,'Salud y Bienestar',1),
(5,'Marketing Digital y Analítica',1),
(6,'Comercio Electrónico y Logística',1),
(7,'Energías Renovables y Sostenibilidad',1),
(8,'Inteligencia Artificial y Ciencia de Datos',1),
(9,'Finanzas y Fintech',1),
(10,'Biotecnología y Farmacéutica',1),
(11,'Contenido y Creación Digital',1),
(12,'Atención al Cliente y Experiencia del Cliente',1),
(13,'Ventas y Desarrollo de Negocios',1),
(14,'Ingeniería y Manufactura Avanzada',1),
(15,'Desarrollo de Software y Aplicaciones',1),
(16,'Ciberseguridad',1),
(17,'Realidad Virtual y Aumentada',1),
(18,'Desarrollo de Videojuegos y eSports',1),
(19,'Gestión de Proyectos',1),
(20,'Desarrollo Web y Diseño UX/UI',1),
(21,'Cloud Computing y DevOps',1),
(22,'Internet de las Cosas (IoT)',1),
(23,'Automatización y Robótica',1),
(24,'Consultoría de Negocios y Estrategia',1),
(25,'Derecho y Legaltech',1),
(26,'Bienes Raíces y Proptech',1),
(27,'Turismo y Hostelería Sostenible',1),
(28,'Agricultura y Agrotecnología',1),
(29,'Diseño Gráfico y Multimedia',1),
(30,'Producción Audiovisual',1),
(31,'Periodismo y Comunicación Digital',1),
(32,'Investigación y Desarrollo',1),
(33,'Servicios Sociales y Comunitarios',1),
(34,'Gestión Ambiental',1),
(35,'Cadena de Suministro y Compras',1),
(36,'Comunidad y Gestión de Redes Sociales',1),
(37,'Desarrollo de Negocios Internacionales',1),
(38,'Traducción e Interpretación',1),
(39,'Arquitectura y Construcción Sostenible',1);
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctrine_migration_versions`
--

LOCK TABLES `doctrine_migration_versions` WRITE;
/*!40000 ALTER TABLE `doctrine_migration_versions` DISABLE KEYS */;
INSERT INTO `doctrine_migration_versions` VALUES
('DoctrineMigrations\\Version20250326003339','2025-03-26 00:34:00',50),
('DoctrineMigrations\\Version20250404134048','2025-04-15 22:43:46',45),
('DoctrineMigrations\\Version20250416143515','2025-04-16 14:35:27',67),
('DoctrineMigrations\\Version20250416143607','2025-04-16 14:36:17',34),
('DoctrineMigrations\\Version20250416143707','2025-04-16 14:37:21',68),
('DoctrineMigrations\\Version20250418144619','2025-04-18 14:46:30',81),
('DoctrineMigrations\\Version20250418144903','2025-04-18 14:49:12',158),
('DoctrineMigrations\\Version20250418161542','2025-04-18 16:15:53',69);
/*!40000 ALTER TABLE `doctrine_migration_versions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empresa`
--

DROP TABLE IF EXISTS `empresa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empresa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `roles` longtext NOT NULL,
  `nivel` int(11) NOT NULL,
  `activo` int(11) NOT NULL,
  `contacto` varchar(255) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `telefonocontacto` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empresa`
--

LOCK TABLES `empresa` WRITE;
/*!40000 ALTER TABLE `empresa` DISABLE KEYS */;
INSERT INTO `empresa` VALUES
(1,'prueba@gmail.com','$2y$13$B9M23mZ9Yd3Qotlke9r3quiB4Z/kp1a1hZ0DoLnXrVxugwlM7vPoS','Empresa Prueba','[\"ROLE_USER\"]',50,1,'prueba contacto','04244007720','prueba@gmail.com');
/*!40000 ALTER TABLE `empresa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_offers`
--

DROP TABLE IF EXISTS `job_offers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `job_offers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `empresa_id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descripcion` longtext NOT NULL,
  `fecha_publicacion` date NOT NULL,
  `fecha_finalizacion` date NOT NULL,
  `fecha_atencion` date DEFAULT NULL,
  `estado` int(11) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_8A4229A6521E1991` (`empresa_id`),
  KEY `IDX_8A4229A63397707A` (`categoria_id`),
  CONSTRAINT `FK_8A4229A63397707A` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`),
  CONSTRAINT `FK_8A4229A6521E1991` FOREIGN KEY (`empresa_id`) REFERENCES `empresa` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_offers`
--

LOCK TABLES `job_offers` WRITE;
/*!40000 ALTER TABLE `job_offers` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_offers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messenger_messages`
--

DROP TABLE IF EXISTS `messenger_messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `body` longtext NOT NULL,
  `headers` longtext NOT NULL,
  `queue_name` varchar(190) NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `available_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `delivered_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`id`),
  KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  KEY `IDX_75EA56E016BA31DB` (`delivered_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messenger_messages`
--

LOCK TABLES `messenger_messages` WRITE;
/*!40000 ALTER TABLE `messenger_messages` DISABLE KEYS */;
/*!40000 ALTER TABLE `messenger_messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `metodo_pago`
--

DROP TABLE IF EXISTS `metodo_pago`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `metodo_pago` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) NOT NULL,
  `estado` int(11) NOT NULL,
  `referencia` varchar(255) DEFAULT NULL,
  `descuento` int(11) NOT NULL,
  `porcentaje` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `metodo_pago`
--

LOCK TABLES `metodo_pago` WRITE;
/*!40000 ALTER TABLE `metodo_pago` DISABLE KEYS */;
INSERT INTO `metodo_pago` VALUES
(1,'Binance',1,'Prueba',1,10),
(2,'Paypal',1,'prueba@paypal.com',0,0),
(3,'Pago Movil',1,'Teléfono 0424 4007720   Cédula:10097733 Banco Provincial',0,0);
/*!40000 ALTER TABLE `metodo_pago` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pago`
--

DROP TABLE IF EXISTS `pago`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pago` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `empresa_id` int(11) NOT NULL,
  `metodo_id` int(11) NOT NULL,
  `conciliador_id` int(11) NOT NULL,
  `fecha_pago` date NOT NULL,
  `referencia` varchar(255) DEFAULT NULL,
  `monto` double NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `comprobado` int(11) NOT NULL,
  `observaciones` longtext NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_F4DF5F3E521E1991` (`empresa_id`),
  KEY `IDX_F4DF5F3EA45CBFCF` (`metodo_id`),
  KEY `IDX_F4DF5F3EA520EB5F` (`conciliador_id`),
  CONSTRAINT `FK_F4DF5F3E521E1991` FOREIGN KEY (`empresa_id`) REFERENCES `empresa` (`id`),
  CONSTRAINT `FK_F4DF5F3EA45CBFCF` FOREIGN KEY (`metodo_id`) REFERENCES `metodo_pago` (`id`),
  CONSTRAINT `FK_F4DF5F3EA520EB5F` FOREIGN KEY (`conciliador_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pago`
--

LOCK TABLES `pago` WRITE;
/*!40000 ALTER TABLE `pago` DISABLE KEYS */;
/*!40000 ALTER TABLE `pago` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pagos`
--

DROP TABLE IF EXISTS `pagos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pagos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `empresa_id` int(11) NOT NULL,
  `fecha_pago` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_DA9B0DFF521E1991` (`empresa_id`),
  CONSTRAINT `FK_DA9B0DFF521E1991` FOREIGN KEY (`empresa_id`) REFERENCES `empresa` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pagos`
--

LOCK TABLES `pagos` WRITE;
/*!40000 ALTER TABLE `pagos` DISABLE KEYS */;
/*!40000 ALTER TABLE `pagos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servicios`
--

DROP TABLE IF EXISTS `servicios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `servicios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `estado` int(11) NOT NULL,
  `metodos_pago` longtext NOT NULL COMMENT '(DC2Type:json)',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servicios`
--

LOCK TABLES `servicios` WRITE;
/*!40000 ALTER TABLE `servicios` DISABLE KEYS */;
INSERT INTO `servicios` VALUES
(2,'prueba',1,'[{},{}]'),
(3,'prueba',1,'[{},{}]');
/*!40000 ALTER TABLE `servicios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(180) NOT NULL,
  `roles` longtext NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `nivel` int(11) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `contacto` varchar(150) NOT NULL,
  `telefonocontacto` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_IDENTIFIER_EMAIL` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES
(1,'egonzalez@gmail.com','[\"ROLE_ADMIN\"]','$2y$13$W/GsebDAXw2VU1.fI3LQ4ufrbRd9p40EMe8y4jzxqDKkzCKUXo0Im','eudo gonzalez',100,'04244007720','eudo gonzalez','04244007720'),
(2,'prueba@gmail.com','[\"ROLE_USER\"]','$2y$13$W/GsebDAXw2VU1.fI3LQ4ufrbRd9p40EMe8y4jzxqDKkzCKUXo0Im','eudo gonzalez',50,'04244007720','eudo gonzalez','04244007720');
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

-- Dump completed on 2025-04-20 23:16:58
