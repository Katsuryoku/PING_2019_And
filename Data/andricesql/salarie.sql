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
-- Structure de la table `salarie`
--

DROP TABLE IF EXISTS `salarie`;
CREATE TABLE IF NOT EXISTS `salarie` (
  `idsalaries` int(11) NOT NULL,
  `Nom` text NOT NULL,
  `Prenom` text NOT NULL,
  `Trigramme` text NOT NULL,
  `Nationalite` text NOT NULL,
  `Date_Naissance` date NOT NULL,
  `Lieu_Naissance` text NOT NULL,
  `Dept_Naissance` int(11) NOT NULL,
  `Sexe` text NOT NULL,
  `N_SS` text NOT NULL,
  `Famille` text NOT NULL,
  `Statut` text NOT NULL,
  `Categorie` text NOT NULL,
  `SalFixe` int(11) NOT NULL,
  `Date_Entre` date NOT NULL,
  `Date_Sortie` date DEFAULT NULL,
  `NumTelPerso` int(11) NOT NULL,
  `NumTelPro` int(11) NOT NULL,
  `MailPro` text NOT NULL,
  `Position` float NOT NULL,
  `login` text NOT NULL,
  `mdp` text NOT NULL,
  `mdpTmp` text NOT NULL,
  `mdpIntra` text NOT NULL,
  `mdpTmpIntra` text NOT NULL,
  `idRespHier` int(11) NOT NULL,
  `SituationMarital` text,
  `EnfantAcharge` int(11) DEFAULT NULL,
  PRIMARY KEY (`idsalaries`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `salarie`
--

INSERT INTO `salarie` (`idsalaries`, `Nom`, `Prenom`, `Trigramme`, `Nationalite`, `Date_Naissance`, `Lieu_Naissance`, `Dept_Naissance`, `Sexe`, `N_SS`, `Famille`, `Statut`, `Categorie`, `SalFixe`, `Date_Entre`, `Date_Sortie`, `NumTelPerso`, `NumTelPro`, `MailPro`, `Position`, `login`, `mdp`, `mdpTmp`, `mdpIntra`, `mdpTmpIntra`, `idRespHier`, `SituationMarital`, `EnfantAcharge`) VALUES
(15, 'Test', 'Test', 'TET', 'FRANCAISE', '1981-11-19', 'Toulouse', 31, 'Homme', '1 81 11 31 555 463 32', 'Business', 'Cadre', 'BM', 2500, '2014-09-01', NULL, 101010101, 508700470, 'urufu.mion@gmail.com', 0, 'JBR', '1035148889', '-1', '9b79621498a545fdb1a522f149e62bde0de466e93574db19972e38570495c91b', '', 15, NULL, NULL),
(46, 'Test1', 'Test1', 'TET', 'FRANCAISE', '1981-11-19', 'Toulouse', 0, 'Homme', '1 97 11 97 209 830 10', 'Siege', 'ETAM CP', 'RRH', 1402, '2017-04-10', NULL, 5046082, 508700470, 'urufu@me.com', 2.2, 'DDI', '-1', '-1', '2365656fe8873c0f5da14aa496deb33112729378e51ee3c580321dbe5b8b75b9', '', 15, 'Celibataire', NULL),
(55, 'Test1', 'Test2', 'TET', 'FRANCAISE', '1996-12-15', 'Valence', 26, 'Femme', '2 96 12 26 362 158 51', 'Siege', 'ETAM', 'CDR', 1374, '2017-08-28', NULL, 5040907, 508700470, 'urufu@icloud.com', 2.2, '', '224201415', '-1', '848c5677d5f2041be051e1f6f3adeccb20b23d6e318c8d73a7abe723f4e9cfc6', '', 15, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
