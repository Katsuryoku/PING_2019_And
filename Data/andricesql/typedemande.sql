-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 11 juin 2019 à 09:03
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

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
) ENGINE=MyISAM AUTO_INCREMENT=405 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `typedemande`
--

INSERT INTO `typedemande` (`idtype`, `Nom`, `Descriptif`) VALUES
(1, 'RCR', 'RCR'),
(2, 'CP', 'CP'),
(3, 'ABS', 'ABS'),
(301, 'ABSDeces', 'En cas de décès d\'un proche, vous pouvez faire une demande d\'absence de 2 jours ouvrés s\'il s\'agit du conjoint, enfant ou ascendant et d\'un jour ouvré s\'il s\'agit d\'un collatéral jusqu\'au 2e degré ou d\'un beau-parent.'),
(302, 'ABSMariage', 'S\'il s\'agit de votre propre mariage, vous pouvez faire une demande de 4 jours ouvrés. S\'il s\'agit du mariage d\'un de vos enfants, vous pouvez faire une demande d\'un jour ouvré. L\'envoi d\'un justificatif au service RH est obligatoire après validation.'),
(303, 'ABSNaissance', 'En cas de naissance ou d\'adoption, vous pouvez faire une demande de 3 jours ouvrés. Vous pouvez fractionner ces 3 jours. L\'envoi d\'un justificatif au service RH est obligatoire après validation.'),
(304, 'ABSExamGross', 'Vous pouvez faire une demande d\'au moins 0,5 jour.'),
(307, 'ABSEnfantMal', 'Enfant malade'),
(305, 'ABSCongePat', 'Congé paternité'),
(306, 'ABSCongeMat', 'Conge maternite'),
(401, 'ABSDeces2j', 'Attention, vous ne pouvez prendre que 2 jours ouvrés.'),
(402, 'ABSDeces1j', 'Attention, vous ne pouvez prendre qu\'un jour ouvré.'),
(403, 'ABSMaraige4j', 'Vous pouvez faire une demande de 4 jours ouvrés.'),
(404, 'ABSMariage1j', 'Vous pouvez faire une demande d\'un jour ouvré.');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
