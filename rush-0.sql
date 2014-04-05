-- phpMyAdmin SQL Dump
-- version 4.1.9
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Apr 05, 2014 at 10:05 AM
-- Server version: 5.5.36
-- PHP Version: 5.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `rush-0`
--
CREATE DATABASE IF NOT EXISTS `rush-0` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `rush-0`;

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `nom_utilisateur` varchar(255) DEFAULT NULL,
  `prenom_utilisateur` varchar(255) DEFAULT NULL,
  `login_utilisateur` varchar(255) DEFAULT NULL,
  `password_utilisateur` varchar(255) DEFAULT NULL,
  `telephone_utilisateur` varchar(255) DEFAULT NULL,
  `adresse_utilisateur` varchar(255) DEFAULT NULL,
  `email_utilisateur` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_utilisateur`),
  UNIQUE KEY `login_utilisateur` (`login_utilisateur`,`email_utilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `famille`
--

CREATE TABLE IF NOT EXISTS `famille` (
  `id_famille` int(11) NOT NULL AUTO_INCREMENT,
  `nom_famille` varchar(255) NOT NULL,
  PRIMARY KEY (`id_famille`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=54 ;

--
-- Dumping data for table `famille`
--

INSERT INTO `famille` (`id_famille`, `nom_famille`) VALUES
(1, 'Nuisette'),
(2, 'Pyjamas'),
(3, 'Caracos'),
(4, 'Peignoirs, Déshabillés'),
(5, 'Vêtements d''Intérieur'),
(6, 'Soutiens-Gorges'),
(7, 'Magic up'),
(8, 'Double Push up'),
(9, 'Push up'),
(10, 'Ampliformes'),
(11, 'Sans armatures'),
(12, 'Bretelles amovibles'),
(13, 'Strings'),
(14, 'Tangas'),
(15, 'Culottes'),
(26, 'Shortys, boxers'),
(27, 'Les Hauts'),
(28, 'Les Bas'),
(29, 'Les 1 Pièce'),
(30, 'Tenues de plage'),
(31, 'Collants'),
(32, 'Leggings'),
(33, 'Bas'),
(34, 'Chaussettes'),
(53, 'Porte-jarretelles, Guêpières');

-- --------------------------------------------------------

--
-- Table structure for table `panier`
--

CREATE TABLE IF NOT EXISTS `panier` (
  `id_panier` int(11) NOT NULL AUTO_INCREMENT,
  `article_panier` int(11) DEFAULT NULL,
  `quantite_panier` int(11) DEFAULT NULL,
  `utilisateur_panier` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_panier`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `taille`
--

CREATE TABLE IF NOT EXISTS `taille` (
  `id_taille` int(11) NOT NULL AUTO_INCREMENT,
  `nom_taille` varchar(255) DEFAULT NULL,
  `type_taille` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_taille`),
  UNIQUE KEY `nom_taille` (`nom_taille`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `taille`
--

INSERT INTO `taille` (`id_taille`, `nom_taille`, `type_taille`) VALUES
(1, '36', 1),
(2, '40', 1),
(3, 'S', 1),
(4, 'M', 1),
(5, '85B', 2),
(6, '85C', 2),
(7, '90B', 2),
(8, '90C', 2),
(9, '95B', 2),
(15, '44', 1),
(16, '95C', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE IF NOT EXISTS `type` (
  `id_type` int(11) NOT NULL AUTO_INCREMENT,
  `nom_type` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_type`),
  UNIQUE KEY `nom_type` (`nom_type`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id_type`, `nom_type`) VALUES
(3, 'collant'),
(2, 'lingerie'),
(1, 'lingerie de nuit'),
(4, 'maillot de bain');

-- --------------------------------------------------------

--
-- Table structure for table `vetement`
--

CREATE TABLE IF NOT EXISTS `vetement` (
  `ID_vetement` int(11) NOT NULL AUTO_INCREMENT,
  `nom_vetement` varchar(255) DEFAULT NULL,
  `type_vetement` int(11) DEFAULT NULL,
  `famille_vetement` int(11) DEFAULT NULL,
  `prix_vetement` float DEFAULT NULL,
  `taille_vetement` int(11) DEFAULT NULL,
  `image_vetement` varchar(255) DEFAULT NULL COMMENT 'lien de l''image',
  PRIMARY KEY (`ID_vetement`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `vetement`
--

INSERT INTO `vetement` (`ID_vetement`, `nom_vetement`, `type_vetement`, `famille_vetement`, `prix_vetement`, `taille_vetement`, `image_vetement`) VALUES
(1, 'poppy', 1, 1, 34.9, 1, 'img/Nuisettes/644097473_photo2.jpg'),
(3, 'poppy', 1, 1, 35.9, 2, 'img/Nuisettes/644097473_photo2.jpg'),
(4, 'kitty', 1, 1, 29.9, 3, 'img/Nuisettes/643769803_photo2_zoom_1.jpg'),
(5, 'kitty', 1, 1, 30.9, 4, 'img/Nuisettes/643769803_photo2_zoom_1.jpg'),
(6, 'crepuscule', 1, 1, 39.9, 1, 'img/Nuisettes/643835325_photo2.jpg'),
(7, 'crepuscule', 1, 1, 40.9, 2, 'img/Nuisettes/643835325_photo2.jpg'),
(8, 'sarah', 1, 2, 16.9, 3, 'img/Pyjamas/644024505_photoDB1_zoom_1'),
(9, 'sarah', 1, 2, 17.9, 4, 'img/Pyjamas/644024505_photoDB1_zoom_1'),
(10, 'stella', 1, 2, 14.9, 3, 'img/Pyjamas/644024405_photoDB1_zoom_1.jpg'),
(11, 'stella', 1, 2, 15.9, 4, 'img/Pyjamas/644024405_photoDB1_zoom_1.jpg'),
(14, 'lipkiss', 2, 9, 34.9, 5, 'img/Push-up/643810605_photo2.jpg'),
(15, 'lipkiss', 2, 9, 35.9, 6, 'img/Push-up/643810605_photo2.jpg'),
(16, 'lipkiss', 2, 26, 16.9, 2, 'img/Shorty/643811005_photo2_zoom_1'),
(17, 'lipkiss', 2, 26, 17.9, 15, 'img/Shorty/643811005_photo2_zoom_1'),
(18, 'candy', 4, 27, 24.9, 1, 'img/Maillot_de_bain/643831473_photo2_zoom_2.jpg'),
(19, 'brazil', 4, 26, 12.9, 3, 'img/Maillot_de_bain/644181473_photo2.jpg'),
(20, 'lipkiss', 2, 53, 39.9, 16, 'img/Porte_jaretelle/643810805_photoDB1_zoom_1.jpg');