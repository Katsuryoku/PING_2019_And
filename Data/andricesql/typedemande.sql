-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 05 juin 2019 à 07:37
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
-- Structure de la table `typedemande`
--

DROP TABLE IF EXISTS `typedemande`;
CREATE TABLE IF NOT EXISTS `typedemande` (
  `idtype` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` text NOT NULL,
  `Descriptif` text NOT NULL,
  PRIMARY KEY (`idtype`)
) ENGINE=MyISAM AUTO_INCREMENT=142 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `typedemande`
--

INSERT INTO `typedemande` (`idtype`, `Nom`, `Descriptif`) VALUES
(2, '2', '2'),
(1, '1', '1'),
(141, '1', '1441'),
(3, '3', '3'),
(4, '4', '4'),
(5, '5', '5'),
(6, '6', '6'),
(14, '2', '2'),
(10, '21', '12'),
(16, '1', '25');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
