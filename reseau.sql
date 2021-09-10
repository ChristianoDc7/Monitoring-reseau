-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le : Lun 06 Septembre 2021 à 11:56
-- Version du serveur: 5.5.16
-- Version de PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `reseau`
--

-- --------------------------------------------------------

--
-- Structure de la table `agenda`
--

CREATE TABLE IF NOT EXISTS `agenda` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `dt` date NOT NULL,
  `lieu` varchar(100) NOT NULL,
  `event` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `t_log`
--

CREATE TABLE IF NOT EXISTS `t_log` (
  `id_log` int(255) NOT NULL AUTO_INCREMENT,
  `ip` varchar(255) NOT NULL,
  `utilisateur` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `heure` time NOT NULL,
  `methode` varchar(255) NOT NULL,
  `adresse` varchar(500) NOT NULL,
  `e1` varchar(255) NOT NULL,
  `e2` int(255) NOT NULL,
  `e3` int(255) NOT NULL,
  `protocole` varchar(255) NOT NULL,
  `observation` varchar(255) NOT NULL,
  PRIMARY KEY (`id_log`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `t_log`
--

INSERT INTO `t_log` (`id_log`, `ip`, `utilisateur`, `date`, `heure`, `methode`, `adresse`, `e1`, `e2`, `e3`, `protocole`, `observation`) VALUES
(1, '192.168.2.3', 'WINXP1', '2021-08-16', '15:10:49', 'GET', 'http://192.168.2.6:88/account/jkdjkfhkdf/djfkhjhjdf/dfjkfhjdhfj/jdfjkhjdf/dfjkjkjkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk', 'HTTP/1.1', 200, 160, 'HTTP', 'nb'),
(2, '192.168.2.3', 'WINXP1', '2021-08-16', '15:10:53', 'GET', 'http://192.168.2.6:88/account', 'HTTP/1.1', 200, 10157, 'HTTP', '06'),
(3, '192.168.2.3', 'WINXP1', '2021-08-16', '15:10:53', 'GET', 'http://192.168.2.6:88/account', 'HTTP/1.1', 200, 10157, 'HTTP', 'merci');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
