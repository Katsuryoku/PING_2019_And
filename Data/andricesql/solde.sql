-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 28 mai 2019 à 05:46
-- Version du serveur :  5.7.21
-- Version de PHP :  5.6.35

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
(15, 25, 25, 0, 20.83, 15, 5.83, 7.59, 0, 7.59),
(46, 15, 15, 0, 10, 0, 10, 0, 0, 0),
(55, 10, 0, 10, 10, 0, 10, 0, 0, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
