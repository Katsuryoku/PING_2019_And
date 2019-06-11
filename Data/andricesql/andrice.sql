-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 11 juin 2019 à 07:53
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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `demande`
--

INSERT INTO `demande` (`iddemande`, `idtype`, `idsalaries`, `idRespHier`, `Date_deb`, `demiJournee`, `NbEngage`, `Prevalide`, `Valide`, `MotifRefus`, `idjustif`, `viewByManager`, `viewByRH`, `viewByEmployee`) VALUES
(1, 1, 3, 64, '2019-06-05', NULL, 4, 1, 0, NULL, NULL, 0, 1, 0),
(2, 1, 15, 15, '2019-06-14', NULL, 4, 0, 0, NULL, NULL, 0, 1, 1),
(3, 15, 69, 64, '2019-06-18', NULL, 4, 1, 1, NULL, NULL, 0, 0, 1),
(4, 4, 69, 64, '2019-06-14', NULL, 3, 1, 0, 'Dodo', NULL, 0, 1, 1);

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
(3, 'Test1', 'Test1', 'TET', 'FRANCAISE', '1981-11-19', 'Toulouse', 0, 'Homme', '1 97 11 97 209 830 10', 'Siege', 'ETAM CP', 'RRH', 1402, '2017-04-10', NULL, 5046082, 508700470, 'urufu@me.com', 2.2, 'DDI', '-1', '-1', '2365656fe8873c0f5da14aa496deb33112729378e51ee3c580321dbe5b8b75b9', '', 64, 'Celibataire', NULL),
(64, 'Test1', 'Test2', 'TET', 'FRANCAISE', '1996-12-15', 'Valence', 26, 'Femme', '2 96 12 26 362 158 51', 'Siege', 'ETAM', 'CDR', 1374, '2017-08-28', NULL, 5040907, 508700470, 'urufu@icloud.com', 2.2, 'MANA', '224201415', '-1', '848c5677d5f2041be051e1f6f3adeccb20b23d6e318c8d73a7abe723f4e9cfc6', '', 15, NULL, NULL),
(69, 'Loup', 'Jocelyne', 'RET', 'Française', '1963-06-09', 'Paris', 75, 'Femme', '2 63 75 31 555 463 32', 'Siege', 'ETAM', 'LTT', 1500, '2010-06-25', NULL, 54647654, 76987654, 'jocelyne.loup@andricegroup.com', 0, 'SF', 'ffrzbhocs', 'neknvzmgz', 'SECRET', 'bfezkbl', 64, NULL, NULL);

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
(64, 25, 0, 25, 25, 0, 25, 25, 0, 25),
(28, 25, 25, 0, 20.83, 15, 5.83, 7.59, 0, 7.59),
(46, 0, 0, 0, 14.44, 8.5, 5.94, 0, 0, 0),
(104, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 17, 17, 0, 15.75, 10, 5.75, 5.19, 3, 2.19),
(93, 0, 0, 0, 11.53, 3, 8.53, 4.36, 3, 1.36),
(99, 0, 0, 0, 5.91, 0, 5.91, 2.23, 0, 2.23),
(13, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(105, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(107, 0, 0, 0, 1.94, 1, 0.94, 0.83, 0, 0.83),
(55, 0, 0, 0, 14.39, 6, 8.39, 0, 0, 0),
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
