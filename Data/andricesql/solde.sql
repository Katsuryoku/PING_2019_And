-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 28 mai 2019 à 14:46
-- Version du serveur :  5.7.21
-- Version de PHP :  7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `andrice`
--

-- --------------------------------------------------------

--
-- Structure de la table `solde`
--

DROP TABLE IF EXISTS `solde`;
CREATE TABLE IF NOT EXISTS `solde` (
  `idsalaries` int(11) NOT NULL,
  `ACQUISCPN-1` float NOT NULL,
  `PRISCPN-1` float NOT NULL,
  `SOLDECPN-1` float NOT NULL,
  `ACQUISCPN` float NOT NULL,
  `PRISCPN` float NOT NULL,
  `SOLDECPN` float NOT NULL,
  `ACQUISJRRCR` float NOT NULL,
  `PRISJRRCR` float NOT NULL,
  `SOLDEJRRCR` float NOT NULL,
  PRIMARY KEY (`idsalaries`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `solde`
--

INSERT INTO `solde` (`idsalaries`, `ACQUISCPN-1`, `PRISCPN-1`, `SOLDECPN-1`, `ACQUISCPN`, `PRISCPN`, `SOLDECPN`, `ACQUISJRRCR`, `PRISJRRCR`, `SOLDEJRRCR`) VALUES
(15, 25, 25, 0, 20.82, 9, 11.82, 4.37, 0, 4.37),
(46, 0, 0, 0, 14.44, 8.5, 5.94, 0, 0, 0),
(55, 0, 0, 0, 14.39, 6, 8.39, 0, 0, 0),
(28, 25, 25, 0, 20.83, 15, 5.83, 7.59, 0, 7.59),
(87, 0, 0, 0, 14.44, 8.5, 5.94, 0, 0, 0),
(104, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 17, 17, 0, 15.75, 10, 5.75, 5.19, 3, 2.19),
(93, 0, 0, 0, 11.53, 3, 8.53, 4.36, 3, 1.36),
(99, 0, 0, 0, 5.91, 0, 5.91, 2.23, 0, 2.23),
(13, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(105, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(107, 0, 0, 0, 1.94, 1, 0.94, 0.83, 0, 0.83),
(85, 0, 0, 0, 14.39, 6, 8.39, 0, 0, 0),
(71, 4, 4, 0, 20.83, 20.5, 0.33, 5.29, 5, 0.29),
(42, 16, 16, 0, 20.83, 16, 4.83, 0, 0, 0),
(69, 3.96, 3.96, 0, 20.83, 12.04, 8.79, 0, 0, 0),
(30, 20, 20, 0, 20.83, 13.5, 7.33, 0, 0, 0),
(106, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(102, 0, 0, 0, 0, 0, 0, 1.46, 1.5, -0.04),
(45, 25, 25, 0, 20.83, 2, 18.83, 5.68, 4, 1.68),
(60, 16.04, 16.04, 0, 20.83, 0.96, 19.88, 6.36, 6, 0.36),
(108, 0, 0, 0, 0.49, 0, 0.49, 0.21, 0, 0.21),
(94, 0, 0, 0, 11.04, 4.5, 6.54, 2.41, 1, 1.41),
(41, 25, 25, 0, 20.83, 5.5, 15.33, 4.34, 2.5, 1.84),
(7, 25, 25, 0, 20.83, 12.5, 8.33, 9.43, 2, 7.43),
(63, 11.88, 11.88, 0, 20.83, 11.62, 9.21, 0, 0, 0),
(51, 19.03, 19.03, 0, 20.83, 12.47, 8.36, 0, 0, 0),
(103, 0, 0, 0, 4.45, 0, 4.45, 1.66, 1, 0.66),
(65, 9.51, 9.51, 0, 20.83, 12.99, 7.85, 2.76, 0.5, 2.26),
(95, 0, 0, 0, 12.5, 2, 10.5, 4.98, 1.5, 3.48),
(91, 0, 0, 0, 14.31, 7, 7.31, 5.94, 0, 5.94),
(50, 19.03, 19.03, 0, 20.83, 12.97, 7.86, 0, 0, 0),
(72, 4.02, 4.02, 0, 20.28, 16.48, 3.8, 2.47, 1, 1.47),
(86, 0, 0, 0, 14.44, 6, 8.44, 0, 0, 0),
(9, 26, 25, 1, 4.1, 0, 4.1, -0.26, 0, -0.26),
(12, 25, 25, 0, 20.83, 1, 19.83, 2.32, 0, 2.32),
(88, 0, 0, 0, 13.96, 5.5, 8.46, 0, 0, 0),
(48, 18, 18, 0, 20.83, 1.5, 19.33, 2.15, 1, 1.15),
(98, 0, 0, 0, 9.38, 3, 6.38, 0, 0, 0),
(83, 0, 0, 0, 16.47, 11.5, 4.97, 3.93, 2, 1.93),
(101, 0, 0, 0, 4.93, 0.5, 4.43, 0, 0, 0),
(89, 0, 0, 0, 13.47, 9.5, 3.97, 5.19, 0, 5.19),
(84, 0, 0, 0, 15.41, 8, 7.41, 0, 0, 0),
(66, 9, 9, 0, 20.83, 16, 4.83, 6.12, 2, 4.12);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
