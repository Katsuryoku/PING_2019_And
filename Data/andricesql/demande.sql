-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 13 juin 2019 à 07:46
-- Version du serveur :  5.7.26
-- Version de PHP :  7.3.5

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
  `demiJournee` int(11) DEFAULT NULL,
  `NbEngage` int(11) NOT NULL,
  `Prevalide` tinyint(1) NOT NULL DEFAULT '0',
  `Valide` tinyint(1) NOT NULL DEFAULT '0',
  `MotifRefus` text,
  `idjustif` int(11) DEFAULT NULL,
  `viewByManager` tinyint(1) NOT NULL DEFAULT '0',
  `viewByRH` tinyint(1) NOT NULL DEFAULT '0',
  `viewByEmployee` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`iddemande`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `demande`
--

INSERT INTO `demande` (`iddemande`, `idtype`, `idsalaries`, `idRespHier`, `Date_deb`, `demiJournee`, `NbEngage`, `Prevalide`, `Valide`, `MotifRefus`, `idjustif`, `viewByManager`, `viewByRH`, `viewByEmployee`) VALUES
(47, 2, 69, 64, '2019-06-13', 0, 1, 0, 0, NULL, NULL, 1, 0, 0),
(46, 2, 69, 64, '2019-06-13', 0, 1, 0, 0, NULL, NULL, 1, 0, 0),
(45, 2, 69, 64, '2019-06-13', 0, 1, 0, 0, NULL, NULL, 1, 0, 0),
(43, 2, 69, 64, '2019-06-12', 0, 1, 0, 0, NULL, NULL, 1, 0, 0),
(42, 1, 69, 64, '2019-06-25', 0, 30, 0, 0, NULL, NULL, 1, 0, 0),
(41, 2, 69, 64, '2019-06-12', 1, 3, 1, 0, NULL, NULL, 1, 1, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
