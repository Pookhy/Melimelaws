-- phpMyAdmin SQL Dump
-- version 3.1.5
-- http://www.phpmyadmin.net
--
-- Serveur: lesmelimelaws.sql.free.fr
-- Généré le : Ven 29 Mai 2015 à 15:59
-- Version du serveur: 5.0.83
-- Version de PHP: 5.3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Base de données: `lesmelimelaws`
--

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `id_Message` int(11) NOT NULL auto_increment,
  `date_Message` date NOT NULL,
  `contenu_Message` varchar(200) character set utf8 collate utf8_bin NOT NULL,
  `id_Personne` int(11) NOT NULL,
  PRIMARY KEY  (`id_Message`),
  KEY `id_Personne` (`id_Personne`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

--
-- Contenu de la table `message`
--


-- --------------------------------------------------------

--
-- Structure de la table `participe`
--

CREATE TABLE IF NOT EXISTS `participe` (
  `id_Participe` int(11) NOT NULL auto_increment,
  `id_Personne` int(11) NOT NULL,
  `id_Video` int(11) NOT NULL,
  PRIMARY KEY  (`id_Participe`),
  KEY `id_Personne` (`id_Personne`,`id_Video`),
  KEY `FK_IDVIDEO` (`id_Video`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

--
-- Contenu de la table `participe`
--


-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

CREATE TABLE IF NOT EXISTS `personne` (
  `id_Personne` int(11) NOT NULL auto_increment,
  `nom_Personne` varchar(255) character set utf8 collate utf8_bin NOT NULL,
  `prenom_Personne` varchar(255) character set utf8 collate utf8_bin NOT NULL,
  `bio_Personne` text character set utf8 collate utf8_bin,
  `photo_Personne` varchar(255) character set utf8 collate utf8_bin default NULL,
  `id_Connexion` varchar(10) character set utf8 collate utf8_bin default NULL,
  `mdp_Connexion` varchar(15) character set utf8 collate utf8_bin default NULL,
  PRIMARY KEY  (`id_Personne`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

--
-- Contenu de la table `personne`
--


-- --------------------------------------------------------

--
-- Structure de la table `saison`
--

CREATE TABLE IF NOT EXISTS `saison` (
  `id_Saison` int(11) NOT NULL auto_increment,
  `num_Saison` int(11) default NULL,
  `photo_Saison` varchar(255) character set utf8 collate utf8_bin default NULL,
  PRIMARY KEY  (`id_Saison`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

--
-- Contenu de la table `saison`
--


-- --------------------------------------------------------

--
-- Structure de la table `video`
--

CREATE TABLE IF NOT EXISTS `video` (
  `id_Video` int(11) NOT NULL auto_increment,
  `num_Video` int(11) default NULL,
  `titre_Video` varchar(255) collate latin1_general_ci NOT NULL,
  `description_Video` text collate latin1_general_ci NOT NULL,
  `adresse_Video` varchar(255) collate latin1_general_ci NOT NULL,
  `type_Video` enum('episode','bonus') collate latin1_general_ci NOT NULL,
  `accueil_Video` tinyint(1) NOT NULL,
  `id_Saison` int(11) NOT NULL,
  PRIMARY KEY  (`id_Video`),
  KEY `id_Saison` (`id_Saison`),
  KEY `id_Saison_2` (`id_Saison`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

--
-- Contenu de la table `video`
--

