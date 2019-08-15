-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 12, 2019 at 05:30 PM
-- Server version: 5.7.21
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `panel_concept`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `country` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=119 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `country`, `role`) VALUES
(11, 'testacc', 'testacc@mail.com', '$2y$10$YnqT6AAPOTPqN.4sCM.b8Ozs4g72yEUYl3Xz4RCGtAbo5s7i9ZDH.', '2019-08-11 15:32:25', 'Serbia', 'tester'),
(12, 'admin', 'admin@mail.com', '$2y$10$wXOcWowc1YJlIDSTreB1XeKE0vDtYnkXmT8h93qzQONzhmkifaeJC', '2019-08-11 15:32:55', 'Serbia', 'admin'),
(13, 'Kevin Malone', 'kevin@mail.com', '$2y$10$F6/1EhrLLTmCJhCO3osLhuGzvoV9BCYb/lmWBXptBbGJn1WpQH8SG', '2019-08-11 16:41:23', 'USA', 'user'),
(14, 'Aleksandar', 'alek@mail.com', '$2y$10$jL6V8Gy.q0Luk.huvKI3nOBGJIjNVISNEc8XfyCEJUw7mliJbJtiu', '2019-08-11 16:53:05', 'Serbia', 'admin'),
(15, 'asd', 'asd@mail.com', '$2y$10$OLP0TslNK4VbSvgSnqepo.KOpUGZPQLl2.T6fUkeMqx9RAmFt8QFO', '2019-08-11 16:54:19', 'Germany', 'user'),
(16, 'sanja', 'sanja@mail.com', '$2y$10$YcVpcsOTLcVU9LaJcRJPq.kvadtryrUadOOxSQ47nOOL2xHMJeqqe', '2019-08-11 18:23:45', 'Serbia', 'user'),
(17, 'Java', 'java@mail.com', '$2y$10$.IK8zitVyNQopIPG8QVlP.SnWyFa636GsfA.M7J9GwT1082RlOI56', '2019-08-11 21:53:05', 'France', 'user'),
(18, 'Nicholas', 'nec.quam.Curabitur@Integervitaenibh.edu', '16611113 5734', '2018-08-21 10:04:56', 'Isle of Man', 'admin'),
(21, 'Wade', 'facilisis@nibhdolor.co.uk', '16860601 7575', '2018-12-21 06:51:02', 'Nauru', 'admin'),
(25, 'Honorato', 'dolor@Aliquamerat.edu', '16640910 5662', '2018-11-20 07:35:30', 'Saint Martin', 'admin'),
(29, 'Kieran', 'nunc.id@condimentumDonecat.com', '16860420 7400', '2018-11-14 13:10:46', 'Kuwait', 'tester'),
(118, 'Aleksandar', 'office@mail.com', '$2y$10$8zsXuBuGUIfOBpEH2q0kce4sLHqbPsDC/85/UeVZbcQ9B88vQTtu.', '2019-08-12 17:08:28', 'Serbia', 'head_admin');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
