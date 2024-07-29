# ************************************************************
# Sequel Ace SQL dump
# Version 20067
#
# https://sequel-ace.com/
# https://github.com/Sequel-Ace/Sequel-Ace
#
# Host: 127.0.0.1 (MySQL 11.4.2-MariaDB-ubu2404)
# Database: lit_logger
# Generation Time: 2024-07-29 13:41:07 +0000
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


# Dump of table books
# ------------------------------------------------------------

DROP TABLE IF EXISTS `books`;

CREATE TABLE `books` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `author_id` int(11) NOT NULL,
  `isbn` varchar(255) NOT NULL,
  `format` varchar(255) DEFAULT NULL,
  `publisher` varchar(255) DEFAULT NULL,
  `publication_date` date DEFAULT NULL,
  `genre_1` varchar(255) NOT NULL,
  `genre_2` varchar(255) DEFAULT NULL,
  `genre_3` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `rating` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

LOCK TABLES `books` WRITE;
/*!40000 ALTER TABLE `books` DISABLE KEYS */;

INSERT INTO `books` (`id`, `title`, `author_id`, `isbn`, `format`, `publisher`, `publication_date`, `genre_1`, `genre_2`, `genre_3`, `image`, `rating`)
VALUES
	(1,'Translation State',1,'9780356517933','paperback','Little, Brown Book Group','2024-05-09','Science Fiction','Space Opera','Identity','https://jackets.dmmserver.com/media/356/97803565/9780356517933.jpg',5),
	(2,'Kings of the Wyld',2,'9780356509020','paperback','Little, Brown Book Group','2017-02-23','Fantasy','High Fantasy','Action','https://jackets.dmmserver.com/media/356/97803565/9780356509020.jpg',5),
	(3,'Fifth Season',3,'9780356508191','paperback','Little, Brown Book Group','2016-07-28','Fantasy','Dystopia','Apocalypse','https://jackets.dmmserver.com/media/356/97803565/9780356508191.jpg',5),
	(4,'The Will of the Many',4,'9781982141172','hardback','Simon & Schuster','2023-06-22','Fantasy','Espionage','Academy','https://jackets.dmmserver.com/media/356/97819821/9781982141172.jpg',5),
	(5,'The Justice of Kings',5,'9780356516400','paperback','Little, Brown Book Group','2022-08-25','Fantasy','Grimdark',NULL,'https://jackets.dmmserver.com/media/356/97803565/9780356516400.jpg',4),
	(6,'The Tyranny of Faith',5,'9780356516462','paperback','Little, Brown Book Group\n','2023-08-10','Fantasy','Grimdark',NULL,'https://jackets.dmmserver.com/media/356/97803565/9780356516462.jpg',4.5),
	(7,'The Trials of Empire',5,'9780356516509','paperback','Little, Brown Book Group','2024-08-08','Fantasy','Grimdark',NULL,'https://jackets.dmmserver.com/media/356/97803565/9780356516509.jpg',3.5),
	(8,'The Adventures of Amina Al-Sirafi',6,'9780008381387','paperback','HarperCollins Publishers','2024-02-29','Fantasy','Pirate','Middle East','https://jackets.dmmserver.com/media/356/97800083/9780008381387.jpg',4.5),
	(9,'The Hearts of Men',7,'9781509827909','paperback','Pan Macmillan','2018-03-22','Contemporary','Coming of Age','Sense of Place','https://jackets.dmmserver.com/media/356/97815098/9781509827909.jpg',5),
	(10,'Titanium Noir',8,'9781472156907','paperback','Little, Brown Book Group','2024-02-01','Science Fiction','Noir','Crime','https://jackets.dmmserver.com/media/356/97814721/9781472156907.jpg',5),
	(11,'Annihilation',9,'9780008139100','paperback','HarperCollins Publishers','2015-07-30','Science Fiction','Weird','Horror','https://jackets.dmmserver.com/media/356/97800081/9780008139100.jpg',4.5),
	(12,'Authority',9,'9780008139117','paperback','HarperCollins Publishers','2025-07-30','Science Fiction','Weird','Horror','https://jackets.dmmserver.com/media/356/97800081/9780008139117.jpg',4.8);

/*!40000 ALTER TABLE `books` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
