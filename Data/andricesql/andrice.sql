-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 06 juin 2019 à 08:54
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
(1, 1, 3, 20, '2019-06-05', 4, 1, 0, NULL, NULL, 0, 0, 0),
(2, 1, 15, 15, '2019-06-14', 4, 0, 0, NULL, NULL, 0, 0, 0),
(3, 15, 64, 15, '2019-06-18', 4, 1, 1, NULL, NULL, 0, 0, 0),
(4, 4, 64, 15, '2019-06-14', 3, 1, 0, 'Dodo', NULL, 0, 0, 0);

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
(3, 'Test1', 'Test1', 'TET', 'FRANCAISE', '1981-11-19', 'Toulouse', 0, 'Homme', '1 97 11 97 209 830 10', 'Siege', 'ETAM CP', 'RRH', 1402, '2017-04-10', NULL, 5046082, 508700470, 'urufu@me.com', 2.2, 'DDI', '-1', '-1', '2365656fe8873c0f5da14aa496deb33112729378e51ee3c580321dbe5b8b75b9', '', 15, 'Celibataire', NULL),
(64, 'Test1', 'Test2', 'TET', 'FRANCAISE', '1996-12-15', 'Valence', 26, 'Femme', '2 96 12 26 362 158 51', 'Siege', 'ETAM', 'CDR', 1374, '2017-08-28', NULL, 5040907, 508700470, 'urufu@icloud.com', 2.2, '', '224201415', '-1', '848c5677d5f2041be051e1f6f3adeccb20b23d6e318c8d73a7abe723f4e9cfc6', '', 15, NULL, NULL);

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
(3, 10, 10, 0, 26, 16, 10, 10, 10, 0),
(64, 25, 0, 25, 25, 0, 25, 25, 0, 25);

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
(2, 'RCR', '2'),
(1, 'CP', '1'),
(141, '1', '1441'),
(3, 'ABS', '3'),
(4, 'ABS2', '4'),
(5, '5', '5'),
(6, '6', '6'),
(15, 'ABS15', '2'),
(10, '21', '12'),
(16, '1', '25');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
