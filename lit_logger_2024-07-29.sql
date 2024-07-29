# ************************************************************
# Sequel Ace SQL dump
# Version 20067
#
# https://sequel-ace.com/
# https://github.com/Sequel-Ace/Sequel-Ace
#
# Host: 127.0.0.1 (MySQL 11.4.2-MariaDB-ubu2404)
# Database: lit_logger
# Generation Time: 2024-07-29 14:42:42 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE='NO_AUTO_VALUE_ON_ZERO', SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table authors
# ------------------------------------------------------------

DROP TABLE IF EXISTS `authors`;

CREATE TABLE `authors` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `forename` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `nationality` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

LOCK TABLES `authors` WRITE;
/*!40000 ALTER TABLE `authors` DISABLE KEYS */;

INSERT INTO `authors` (`id`, `forename`, `surname`, `nationality`, `gender`)
VALUES
	(1,'Ann','Leckie','American','Female'),
	(2,'Nicholas','Eames','American','Male'),
	(3,'Jemisin','N.K.','American','Female'),
	(4,'Islington','James','Australian','Male'),
	(5,'Swan','Richard','English','Male'),
	(6,'Chakraborty','Shannon','American','Female'),
	(7,'Butler','Nickolas','American','Male'),
	(8,'Harkaway','Nick','English','Male'),
	(9,'VanderMeer','Jeff','American','Male');

/*!40000 ALTER TABLE `authors` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
