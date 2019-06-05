-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 05 juin 2019 à 07:30
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
-- Structure de la table `demande`
--

DROP TABLE IF EXISTS `demande`;
CREATE TABLE IF NOT EXISTS `demande` (
  `iddemande` int(11) NOT NULL AUTO_INCREMENT,
  `idtype` int(11) NOT NULL,
  `idsalaries` int(11) NOT NULL,
  `idRespHier` int(11) NOT NULL,
  `Date_deb` date NOT NULL,
  `NbEngage` int(11) NOT NULL,
  `Prevalide` tinyint(1) NOT NULL DEFAULT '0',
  `Valide` tinyint(1) NOT NULL DEFAULT '0',
  `MotifRefus` text,
  `idjustif` int(11) DEFAULT NULL,
  `viewByManager` tinyint(1) NOT NULL DEFAULT '0',
  `viewByRH` tinyint(1) NOT NULL DEFAULT '0',
  `viewByEmployee` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`iddemande`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `demande`
--

INSERT INTO `demande` (`iddemande`, `idtype`, `idsalaries`, `idRespHier`, `Date_deb`, `NbEngage`, `Prevalide`, `Valide`, `MotifRefus`, `idjustif`, `viewByManager`, `viewByRH`, `viewByEmployee`) VALUES
(1, 1, 46, 20, '2019-06-05', 4, 1, 0, NULL, NULL, 1, 0, 0),
(2, 1, 15, 15, '2019-06-14', 4, 0, 0, NULL, NULL, 1, 0, 0),
(3, 15, 64, 15, '2019-06-18', 4, 1, 1, NULL, NULL, 1, 1, 1),
(4, 4, 64, 15, '2019-06-14', 3, 1, 0, 'Dodo', NULL, 1, 1, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
