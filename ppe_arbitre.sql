-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 06 Mars 2018 à 08:51
-- Version du serveur :  5.6.15-log
-- Version de PHP :  5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `ppe_arbitre`
--

-- --------------------------------------------------------

--
-- Structure de la table `arbitre`
--

CREATE TABLE IF NOT EXISTS `arbitre` (
  `NUM_ARBITRE` int(2) NOT NULL AUTO_INCREMENT,
  `NUM_CLUB` int(2) DEFAULT NULL,
  `NUM_EQUIPE` int(2) DEFAULT NULL,
  `NOM_ARBITRE` char(32) DEFAULT NULL,
  `PRENOM_ARBITRE` char(32) DEFAULT NULL,
  `ADRESSE_ARBITRE` char(32) DEFAULT NULL,
  `CP_ARBITRE` char(32) DEFAULT NULL,
  `VILLE_ARBITRE` char(32) DEFAULT NULL,
  `DATE_NAISS_ARBITRE` date DEFAULT NULL,
  `TEL_FIXE_ARBITRE` int(2) DEFAULT NULL,
  `TEL_PORT_ARBITRE` int(2) DEFAULT NULL,
  `MAIL_ARBITRE` char(32) DEFAULT NULL,
  PRIMARY KEY (`NUM_ARBITRE`),
  KEY `I_FK_ARBITRE_CLUB` (`NUM_CLUB`),
  KEY `I_FK_ARBITRE_EQUIPE` (`NUM_EQUIPE`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
  `NUM_CATEGORIE` int(2) NOT NULL AUTO_INCREMENT,
  `NOM_CATEGORIE` char(32) DEFAULT NULL,
  `MONTANT_INDEMNITE` decimal(13,2) DEFAULT NULL,
  PRIMARY KEY (`NUM_CATEGORIE`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `championnat`
--

CREATE TABLE IF NOT EXISTS `championnat` (
  `NUM_CHAMPIONNAT` int(2) NOT NULL AUTO_INCREMENT,
  `NUM_CATEGORIE` int(2) NOT NULL,
  `NUM_TYPE_CHAMPIONNAT` int(2) NOT NULL,
  `NUM_DIVISION` int(2) NOT NULL,
  `NOM_CHAMPIONNAT` char(32) DEFAULT NULL,
  PRIMARY KEY (`NUM_CHAMPIONNAT`),
  KEY `I_FK_CHAMPIONNAT_CATEGORIE` (`NUM_CATEGORIE`),
  KEY `I_FK_CHAMPIONNAT_TYPE_CHAMPIONNAT` (`NUM_TYPE_CHAMPIONNAT`),
  KEY `I_FK_CHAMPIONNAT_DIVISION` (`NUM_DIVISION`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `club`
--

CREATE TABLE IF NOT EXISTS `club` (
  `NUM_CLUB` int(2) NOT NULL AUTO_INCREMENT,
  `NOM_CLUB` char(32) DEFAULT NULL,
  PRIMARY KEY (`NUM_CLUB`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `deplacement`
--

CREATE TABLE IF NOT EXISTS `deplacement` (
  `NUM_ARBITRE` int(2) NOT NULL,
  `NUM_SALLE` int(2) NOT NULL,
  `DISTANCE` int(2) DEFAULT NULL,
  PRIMARY KEY (`NUM_ARBITRE`,`NUM_SALLE`),
  KEY `I_FK_DEPLACEMENT_ARBITRE` (`NUM_ARBITRE`),
  KEY `I_FK_DEPLACEMENT_SALLE` (`NUM_SALLE`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `division`
--

CREATE TABLE IF NOT EXISTS `division` (
  `NUM_DIVISION` int(2) NOT NULL AUTO_INCREMENT,
  `NOM_DIVISION` char(32) DEFAULT NULL,
  PRIMARY KEY (`NUM_DIVISION`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `equipe`
--

CREATE TABLE IF NOT EXISTS `equipe` (
  `NUM_EQUIPE` int(2) NOT NULL AUTO_INCREMENT,
  `NUM_CHAMPIONNAT_CIF2` int(2) NOT NULL,
  `NUM_CLUB_CIF5` int(2) NOT NULL,
  `NUM_CLUB` int(2) DEFAULT NULL,
  `NOM_EQUIPE` char(32) DEFAULT NULL,
  `NUM_CHAMPIONNAT` int(2) DEFAULT NULL,
  PRIMARY KEY (`NUM_EQUIPE`),
  KEY `I_FK_EQUIPE_CHAMPIONNAT` (`NUM_CHAMPIONNAT_CIF2`),
  KEY `I_FK_EQUIPE_CLUB` (`NUM_CLUB_CIF5`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `indisponibilite`
--

CREATE TABLE IF NOT EXISTS `indisponibilite` (
  `CODE_DEMI_JOURNEE` char(1) NOT NULL,
  `DATE_JOUR` date NOT NULL,
  `NUM_ARBITRE` int(2) NOT NULL,
  PRIMARY KEY (`CODE_DEMI_JOURNEE`,`DATE_JOUR`,`NUM_ARBITRE`),
  KEY `I_FK_INDISPONIBILITE_ARBITRE` (`NUM_ARBITRE`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `matchs`
--

CREATE TABLE IF NOT EXISTS `matchs` (
  `NUM_MATCH` int(2) NOT NULL AUTO_INCREMENT,
  `NUM_SALLE` int(2) DEFAULT NULL,
  `DATE_MATCH` date DEFAULT NULL,
  `HEURE_MATCH` time DEFAULT NULL,
  `MONTANT_DEPLT_P` decimal(13,2) DEFAULT NULL,
  `MONTANT_DEPLT_S` decimal(13,2) DEFAULT NULL,
  `NUM_ARBITRE_P` int(2) DEFAULT NULL,
  `NUM_ARBITRE_S` int(2) DEFAULT NULL,
  `NUM_EQUIPE1` int(2) DEFAULT NULL,
  `NUM_EQUIPE_2` int(2) DEFAULT NULL,
  PRIMARY KEY (`NUM_MATCH`),
  KEY `I_FK_MATCHS_SALLE` (`NUM_SALLE`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `parametre`
--

CREATE TABLE IF NOT EXISTS `parametre` (
  `NUMERO_PARAM` int(2) NOT NULL,
  `MONTANT_KM` int(2) DEFAULT NULL,
  `MAIL_RESPONSABLE` char(32) DEFAULT NULL,
  PRIMARY KEY (`NUMERO_PARAM`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `salle`
--

CREATE TABLE IF NOT EXISTS `salle` (
  `NUM_SALLE` int(2) NOT NULL AUTO_INCREMENT,
  `ADRESSE_SALLE` char(32) DEFAULT NULL,
  PRIMARY KEY (`NUM_SALLE`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `type_championnat`
--

CREATE TABLE IF NOT EXISTS `type_championnat` (
  `NUM_TYPE_CHAMPIONNAT` int(2) NOT NULL AUTO_INCREMENT,
  `NOM_TYPE_CHAMPIONNAT` char(32) DEFAULT NULL,
  PRIMARY KEY (`NUM_TYPE_CHAMPIONNAT`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
