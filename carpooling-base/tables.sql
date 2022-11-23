-- Adminer 4.8.1 MySQL 8.0.28 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `cars`;
CREATE TABLE `cars` (
  `id` int NOT NULL AUTO_INCREMENT,
  `brand` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `mineral` varchar(255) NOT NULL,
  `color` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nbrSlots` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `cars` (`id`, `brand`, `model`, `mineral`, `color`, `nbrSlots`) VALUES
(1,	'BMW',	'530d',	'AA-999-ZZ',	'Red',	5),
(2,	'Porsche',	'911',	'WE-465-LK',	'Green',	4);

DROP TABLE IF EXISTS `offer`;
CREATE TABLE `offer` (
  `id` int NOT NULL AUTO_INCREMENT,
  `idCar` int NOT NULL,
  `idPublisher` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int NOT NULL,
  `locationFrom` varchar(255) NOT NULL,
  `locationTo` varchar(255) NOT NULL,
  `dateDepart` date NOT NULL,
  `dateArrival` date NOT NULL,
  `isAvailable` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


DROP TABLE IF EXISTS `reservation`;
CREATE TABLE `reservation` (
  `id` int NOT NULL,
  `idOffer` int NOT NULL,
  `idBuyer` int NOT NULL,
  `isPaid` tinyint(1) NOT NULL,
  KEY `id` (`id`),
  KEY `idBuyer` (`idBuyer`),
  CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`id`) REFERENCES `offer` (`id`),
  CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`idBuyer`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `birthday` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `birthday`) VALUES
(1,	'Jean',	'Valjean',	'jeanvaljean@jvj.fr',	'1982-01-09 01:00:00'),
(2,	'Luc',	'L',	'lucl@test.fr',	'2010-11-08 01:00:00'),
(3,	'Florian',	'H',	'fh@fh.fr',	'2000-09-08 02:00:00');

DROP TABLE IF EXISTS `users_cars`;
CREATE TABLE `users_cars` (
  `user_id` int NOT NULL,
  `car_id` int NOT NULL,
  KEY `user_id` (`user_id`),
  KEY `car_id` (`car_id`),
  CONSTRAINT `users_cars_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `users_cars_ibfk_2` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `users_cars` (`user_id`, `car_id`) VALUES
(1,	1),
(2,	1),
(2,	2);

-- 2022-11-23 17:55:23