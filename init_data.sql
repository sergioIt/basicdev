SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `city`;
CREATE TABLE `city` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

INSERT INTO `city` (`id`, `name`) VALUES
(1,	'Петербург'),
(2,	'Сочи'),
(3,	'Москва'),
(4,	'Красноярск'),
(5,	'Budapest'),
(6,	'Roma'),
(7,	'Элиста');

DROP TABLE IF EXISTS `people`;
CREATE TABLE `people` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

INSERT INTO `people` (`id`, `name`) VALUES
(8,	'Маша'),
(9,	'Ваня'),
(10,	'Оля'),
(11,	'Женя'),
(12,	'Вася'),
(13,	'Коля'),
(14,	'Олег');

DROP TABLE IF EXISTS `people_city`;
CREATE TABLE `people_city` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `people_id` int(10) DEFAULT NULL,
  `city_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_people_to_people` (`people_id`),
  KEY `fk_city_to_city` (`city_id`),
  CONSTRAINT `fk_city_to_city` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`),
  CONSTRAINT `fk_people_to_people` FOREIGN KEY (`people_id`) REFERENCES `people` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

INSERT INTO `people_city` (`id`, `people_id`, `city_id`) VALUES
(1,	8,	1),
(2,	8,	2),
(3,	9,	1),
(4,	9,	2),
(5,	9,	3),
(6,	9,	4),
(7,	9,	5),
(8,	10,	4),
(9,	10,	5),
(10,	11,	2),
(11,	11,	3),
(12,	13,	6),
(13,	14,	3);