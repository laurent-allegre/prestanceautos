-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : Dim 10 oct. 2021 à 18:51
-- Version du serveur :  5.7.31
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `prestance`
--

-- --------------------------------------------------------

--
-- Structure de la table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `vehicules`
--

DROP TABLE IF EXISTS `vehicules`;
CREATE TABLE IF NOT EXISTS `vehicules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `prix` varchar(50) NOT NULL,
  `images` varchar(255) NOT NULL,
  `marque` varchar(100) NOT NULL,
  `modele` varchar(100) NOT NULL,
  `btv` varchar(50) NOT NULL,
  `kilometre` varchar(50) NOT NULL,
  `datemisecirculation` varchar(50) NOT NULL,
  `cylindree` varchar(50) NOT NULL,
  `nbcylindre` varchar(10) NOT NULL,
  `pfiscale` varchar(10) NOT NULL,
  `pdin` varchar(25) NOT NULL,
  `temission` varchar(50) NOT NULL,
  `cexterieur` varchar(100) NOT NULL,
  `cinterieur` varchar(100) NOT NULL,
  `nsieges` varchar(25) NOT NULL,
  `nportes` varchar(25) NOT NULL,
  `transmission` varchar(50) NOT NULL,
  `carosserie` varchar(50) NOT NULL,
  `energie` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `vehicules`
--

INSERT INTO `vehicules` (`id`, `title`, `prix`, `images`, `marque`, `modele`, `btv`, `kilometre`, `datemisecirculation`, `cylindree`, `nbcylindre`, `pfiscale`, `pdin`, `temission`, `cexterieur`, `cinterieur`, `nsieges`, `nportes`, `transmission`, `carosserie`, `energie`) VALUES
(1, 'BMW M5 V8 Bi turbo 560 Ch', '54900', 'bmw-m5_33.jpg', 'BMW', 'M5', 'Automatique', '49800 ', '15/08/2012', '4395 ', '8', '47', '560', '232', 'Azurit noir métalisé', 'noir', '5', '4', 'Propulsion', 'berline', 'Essence'),
(2, 'PORSCHE 911 TYPE 992 COUPE 3.8 650 TURBO S', '244400', 'Porsche-992.jpg', 'PORSCHE', '992 COUPE 3.8 650 TURBO S', 'Automatique', '3900', '10/11/2020', '5000', '6', '49', '650', '271', 'rouge', 'cuir noir', '4', '2', 'Propulsion', 'berline', 'Essence'),
(3, 'MERCEDES-AMG GT 4.0 V8 510 GT S SPEEDSHIFT 7', '86500', 'mercedes-gt.jpg', 'MERCEDES', 'MERCEDES-AMG GT', 'Automatique', '45070', '20/07/2016', '3982', '8', '41', '510', '219', 'noir métal', 'cuir noir', '2', '3', 'Propulsion', 'berline', 'Essence'),
(4, 'AUDI R8 (2) COUPE 4.2 V8 FSI 430 STRONIC', '76700', 'audi-r8.jpg', 'AUDI', 'R8', 'Automatique', '60622', '01/10/2014', '4163', '8', '34', '430', '289', 'Bleu Caleum', 'Cuir noir', '2', '2', 'Propulsion', 'Berline', 'essence');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
