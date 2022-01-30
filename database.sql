-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1:3306
-- Timp de generare: ian. 30, 2022 la 04:14 PM
-- Versiune server: 5.7.31
-- Versiune PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `health`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_username` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `token` varchar(30) CHARACTER SET utf8mb4 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Eliminarea datelor din tabel `admins`
--

INSERT INTO `admins` (`id`, `admin_username`, `token`) VALUES
(9, '21232f297a57a5a743894a0e4a801fc3', 'rh3ye0oakciw51tvs76pl9xq4jm8n2'),
(10, 'd41d8cd98f00b204e9800998ecf8427e', 'bshn2wmp0lgcfea46tvdyjo91z8kq3'),
(13, '52857288552a4eea4c3216684a8095ea', 'l9g53xecfh60a8r1bs24jnvztmwpkq'),
(14, 'eef27c35519196ed94baa4e884575d88', '3hbrpaxf1vsglyo06497zdjt2in5ek'),
(15, 'eeafbf4d9b3957b139da7b7f2e7f2d4a', 'j85ozf2r197dlytbse4wvan6qgmcih');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `appointments`
--

DROP TABLE IF EXISTS `appointments`;
CREATE TABLE IF NOT EXISTS `appointments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cnp` int(13) NOT NULL,
  `room_number` int(3) NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `room_number` (`room_number`),
  KEY `CNP` (`cnp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `programmes`
--

DROP TABLE IF EXISTS `programmes`;
CREATE TABLE IF NOT EXISTS `programmes` (
  `id_progr` int(11) NOT NULL AUTO_INCREMENT,
  `progr_type_id` int(11) NOT NULL,
  `maximum` int(2) NOT NULL,
  `rooms_id` int(3) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  PRIMARY KEY (`id_progr`),
  KEY `room` (`rooms_id`),
  KEY `progr_id` (`progr_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Eliminarea datelor din tabel `programmes`
--

INSERT INTO `programmes` (`id_progr`, `progr_type_id`, `maximum`, `rooms_id`, `start_time`, `end_time`) VALUES
(1, 1, 3, 1, '2022-01-29 08:53:00', '2022-01-29 14:53:00'),
(2, 2, 4, 2, '2022-01-28 10:54:00', '2022-01-28 18:54:00'),
(3, 3, 2, 3, '2022-01-30 08:00:00', '2022-01-30 20:00:00'),
(6, 4, 10, 3, '2022-01-30 08:53:00', '2022-01-30 14:53:00'),
(7, 3, 6, 1, '2022-01-30 08:53:00', '2022-01-30 14:53:00'),
(8, 4, 5, 3, '2022-01-30 08:53:00', '2022-01-30 14:53:00'),
(10, 4, 10, 3, '2022-01-30 08:53:00', '2022-01-30 14:53:00'),
(11, 4, 10, 3, '2022-01-30 08:53:00', '2022-01-30 14:53:00'),
(12, 4, 10, 3, '2022-01-30 08:53:00', '2022-01-30 14:53:00');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `progr_types`
--

DROP TABLE IF EXISTS `progr_types`;
CREATE TABLE IF NOT EXISTS `progr_types` (
  `id_type` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  PRIMARY KEY (`id_type`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Eliminarea datelor din tabel `progr_types`
--

INSERT INTO `progr_types` (`id_type`, `type`) VALUES
(1, 'pilates'),
(2, 'kangoo jumps'),
(3, 'box'),
(4, 'yoga'),
(5, 'dance');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `rooms`
--

DROP TABLE IF EXISTS `rooms`;
CREATE TABLE IF NOT EXISTS `rooms` (
  `id_room` int(11) NOT NULL AUTO_INCREMENT,
  `room_number` int(3) NOT NULL,
  `progr_type` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  PRIMARY KEY (`id_room`),
  UNIQUE KEY `room_number_5` (`room_number`),
  KEY `room_number` (`room_number`),
  KEY `room_number_2` (`room_number`),
  KEY `type` (`progr_type`),
  KEY `room_number_3` (`room_number`),
  KEY `room_number_4` (`room_number`),
  KEY `room_number_6` (`room_number`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Eliminarea datelor din tabel `rooms`
--

INSERT INTO `rooms` (`id_room`, `room_number`, `progr_type`) VALUES
(1, 111, '1'),
(2, 222, '2'),
(3, 333, '3'),
(4, 444, '4');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cnp` int(13) NOT NULL,
  `progr_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `CNP` (`cnp`),
  UNIQUE KEY `cnp_2` (`cnp`),
  KEY `progr_id` (`progr_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Eliminarea datelor din tabel `users`
--

INSERT INTO `users` (`id`, `cnp`, `progr_id`) VALUES
(8, 1849657230, NULL),
(9, 3865659, NULL),
(10, 7736201, NULL),
(11, 1299580, NULL),
(12, 7735114, NULL),
(13, 7647695, NULL),
(16, 164379652, NULL),
(17, 653372780, NULL),
(18, 3015971, NULL),
(21, 1760461, NULL);

--
-- Constrângeri pentru tabele eliminate
--

--
-- Constrângeri pentru tabele `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_ibfk_1` FOREIGN KEY (`cnp`) REFERENCES `users` (`cnp`),
  ADD CONSTRAINT `appointments_ibfk_2` FOREIGN KEY (`room_number`) REFERENCES `rooms` (`room_number`);

--
-- Constrângeri pentru tabele `programmes`
--
ALTER TABLE `programmes`
  ADD CONSTRAINT `programmes_ibfk_1` FOREIGN KEY (`progr_type_id`) REFERENCES `progr_types` (`id_type`),
  ADD CONSTRAINT `programmes_ibfk_2` FOREIGN KEY (`rooms_id`) REFERENCES `rooms` (`id_room`),
  ADD CONSTRAINT `programmes_ibfk_3` FOREIGN KEY (`progr_type_id`) REFERENCES `progr_types` (`id_type`),
  ADD CONSTRAINT `programmes_ibfk_4` FOREIGN KEY (`rooms_id`) REFERENCES `rooms` (`id_room`);

--
-- Constrângeri pentru tabele `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`progr_id`) REFERENCES `progr_types` (`id_type`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
