-- Adminer 4.8.1 MySQL 5.5.5-10.5.13-MariaDB-0ubuntu0.21.10.1 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `Articles`;
CREATE TABLE `Articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(150) NOT NULL,
  `content` longtext NOT NULL,
  `date_start` datetime NOT NULL,
  `date_end` datetime NOT NULL,
  `importance` int(1) DEFAULT 0,
  `Authors_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Articles_Authors_idx` (`Authors_id`),
  CONSTRAINT `fk_Articles_Authors` FOREIGN KEY (`Authors_id`) REFERENCES `Authors` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `Articles_has_Categories`;
CREATE TABLE `Articles_has_Categories` (
  `Articles_id` int(11) NOT NULL,
  `Categories_id` int(11) NOT NULL,
  PRIMARY KEY (`Articles_id`,`Categories_id`),
  KEY `fk_Articles_has_Categories_Categories1_idx` (`Categories_id`),
  KEY `fk_Articles_has_Categories_Articles1_idx` (`Articles_id`),
  CONSTRAINT `Articles_has_Categories_ibfk_2` FOREIGN KEY (`Categories_id`) REFERENCES `Categories` (`id`),
  CONSTRAINT `Articles_has_Categories_ibfk_3` FOREIGN KEY (`Articles_id`) REFERENCES `Articles` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `Authors`;
CREATE TABLE `Authors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `Pseudo_UNIQUE` (`pseudo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `Categories`;
CREATE TABLE `Categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `Comments`;
CREATE TABLE `Comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Content` char(150) DEFAULT 'Sans Avis',
  `Authors_id` int(11) NOT NULL,
  `Articles_id` int(11) NOT NULL,
  `Date` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `Authors_id` (`Authors_id`),
  KEY `Articles_id` (`Articles_id`),
  CONSTRAINT `Comments_ibfk_1` FOREIGN KEY (`Authors_id`) REFERENCES `Authors` (`id`),
  CONSTRAINT `Comments_ibfk_2` FOREIGN KEY (`Articles_id`) REFERENCES `Articles` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `Comments` (`id`, `Content`, `Authors_id`, `Articles_id`, `Date`) VALUES
(1,	'C\'est fantastique !',	1,	3,	'2022-02-02 13:39:30'),
(2,	'Bravo !',	2,	1,	'2022-02-02 13:39:42'),
(3,	'Sans avis',	2,	2,	'2022-02-02 13:39:45');

-- 2022-02-03 09:04:02
