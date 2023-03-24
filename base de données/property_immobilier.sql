-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le : Mar 13 Septembre 2022 à 08:57
-- Version du serveur: 5.5.20
-- Version de PHP: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `property_immobilier`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE IF NOT EXISTS `administrateur` (
  `id_admin` int(250) NOT NULL AUTO_INCREMENT,
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  `email` varchar(250) NOT NULL,
  `motdepasse` varchar(200) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `telephone` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Contenu de la table `administrateur`
--

INSERT INTO `administrateur` (`id_admin`, `nom`, `prenom`, `email`, `motdepasse`, `adresse`, `telephone`, `image`) VALUES
(15, 'la ', 'Dilomatie', 'diplome@gmail.com', 'diplome@', 'bingerville', '09072234409', 'CANON_.jpg'),
(16, 'st basre', 'mamadou', 'stv@gmail.com', 'mama@@', 'cocody', '09072234409', 'encre&jpg.jpg'),
(17, 'devltere ', 'cavia', 'devalter@gmail.com', 'devalter@', 'pays nas', '2222993465', 'images.jpg'),
(18, 'kinvanel', 'Koudoube ', 'kouame@gmail.com', 'kouame@', 'faya', '0708667789', 'english-ebook.jpg'),
(19, 'NGUoran', 'propery', 'property@gmail.com', 'property@', 'cocody angre', '0707070708', 'libre3.jpg'),
(20, 'kkc', 'kks', 'abousss@gmail.com', 'abousss@', 'cocody angre', '09072234409', 'iseesss.jpg'),
(21, 'komenan', 'abou', 'komenan@gmail.com', 'komenan@', 'plateau', '0909876543', 'succes.jpg'),
(22, 'FFFF', 'TTT', 'TTT@gmail.com', 'TTT@', 'dddd', '34455566', 'DYII7018.jpg'),
(23, 'POLYNE', 'POLYNE', 'polyne@gmail.com', 'polyne@', 'YOPOUGON', '0807090097', 'Polyne.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `condition de location`
--

CREATE TABLE IF NOT EXISTS `condition de location` (
  `id_condition` int(250) NOT NULL AUTO_INCREMENT,
  `2 mois de caution` varchar(250) NOT NULL,
  `2 mois d'agence` varchar(250) NOT NULL,
  `frait d'enregistrement` varchar(250) NOT NULL,
  `frait de dossier` varchar(250) NOT NULL,
  PRIMARY KEY (`id_condition`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `locataire_client`
--

CREATE TABLE IF NOT EXISTS `locataire_client` (
  `id_client` int(60) NOT NULL AUTO_INCREMENT,
  `id_admin` int(60) NOT NULL,
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  `fonction` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `Contact_number` int(30) NOT NULL,
  `contrat_de_bail` varchar(250) NOT NULL,
  `type_de_maison_choisi` varchar(250) NOT NULL,
  `prix_de_la_maison` varchar(250) NOT NULL,
  `etat_des_lieux` varchar(250) NOT NULL,
  `date_entrer` date NOT NULL,
  `date_de_sortir` date NOT NULL,
  `date_de_relance` date NOT NULL,
  `situation_geographique_de_la_maison` varchar(250) NOT NULL,
  `image` varchar(100) NOT NULL,
  PRIMARY KEY (`id_client`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Contenu de la table `locataire_client`
--

INSERT INTO `locataire_client` (`id_client`, `id_admin`, `nom`, `prenom`, `fonction`, `email`, `Contact_number`, `contrat_de_bail`, `type_de_maison_choisi`, `prix_de_la_maison`, `etat_des_lieux`, `date_entrer`, `date_de_sortir`, `date_de_relance`, `situation_geographique_de_la_maison`, `image`) VALUES
(15, 0, 'kouakou', 'anicette', 'developeur et ministre', 'koudou@gmail.com', 2147483647, 'abcenter', 'quintuplex ouf', '500000000F', 'BON ETAT', '2022-07-23', '0000-00-00', '2022-07-30', 'MARCORY', 'JlrxS2BO.jpg'),
(16, 0, 'kouame ', 'jean charles', 'PROGRAMMEur', 'kouame@gmail.com', 708090602, 'abcenter', 'DUPLEX13', '5000000000f', 'BON ETAT', '2022-07-23', '0000-00-00', '2022-07-29', 'Abidjan Angre', 'chris-brown.jpg'),
(17, 0, 'devalter', 'cavia', 'developpeuse', 'aa@gmail.com', 2147483647, 'toujour ajour', 'SSSSdd', '224000000000', 'Propre', '2022-08-31', '2022-09-01', '2022-08-27', 'Usa ci', 'isee.jpg'),
(18, 0, 'plyne', 'polyne', 'secretaire', 'polyne@gmauil.com', 2147483647, 'ddf', 'VGGG', 'OLOOO', 'WSSS', '2022-09-15', '2022-09-21', '2022-09-30', 'Cocody', 'FFFF.jpg'),
(19, 0, 'CUCI', 'CUCI', 'SECRETAIRE', 'cuci@gmail.com', 2147483647, 'acd', '3PIECES', '200000', 'FGKMOIDHH', '2022-09-12', '2022-09-12', '2022-09-12', 'KOUMASSI', 'HGAB4441.jpg'),
(20, 0, 'INTERPOL', 'INTERPOL', 'POLICE', 'interpol@hotmail.fr', 2147483647, 'ACD', 'DUPLEX', '20000000', 'BON', '2022-09-12', '2025-10-12', '2022-09-12', 'COCODY RIVIERA 2', '136203354_249965326478594_8730241680487621518_o.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `proprietaire`
--

CREATE TABLE IF NOT EXISTS `proprietaire` (
  `id_proprietaire` int(100) NOT NULL AUTO_INCREMENT,
  `nom` text NOT NULL,
  `penom` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `telephone` int(100) NOT NULL,
  `mandat_de_gestion` varchar(250) NOT NULL,
  `titre_de_propriete` varchar(250) NOT NULL,
  `date_echeance` date NOT NULL,
  `attestation` varchar(250) NOT NULL,
  `ACD` varchar(250) NOT NULL,
  `CPF` varchar(250) NOT NULL,
  `prix` varchar(250) NOT NULL,
  `message` varchar(120) NOT NULL,
  `image` varchar(100) NOT NULL,
  PRIMARY KEY (`id_proprietaire`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Contenu de la table `proprietaire`
--

INSERT INTO `proprietaire` (`id_proprietaire`, `nom`, `penom`, `email`, `telephone`, `mandat_de_gestion`, `titre_de_propriete`, `date_echeance`, `attestation`, `ACD`, `CPF`, `prix`, `message`, `image`) VALUES
(1, 'kouakou', 'kouame charles', 'etudchaless1@gmail.com', 708540667, 'juste one', 'duplex', '2022-05-11', '708540667', 'KKP 12', 'CCPF 222555', '150000000', '               ', ''),
(2, 'kouakou', 'kouame charles', 'etudchaless1@gmail.com', 708540667, 'juste one', 'duplex', '2022-05-11', 'tres a jour', 'KKP 12', 'CCPF 222555', '150000000', '', ''),
(3, 'kouakou', 'kouame charles', 'etudchaless1@gmail.com', 708540667, 'juste one', 'duplex', '2022-05-11', 'tres a jour', 'KKP 12', 'CCPF 222555', '150000000', '', ''),
(5, ' N''guoran', 'Miss ADJOUA', 'kouamecharleskouakou17@gmail.com', 708540668, 'juste two', 'ab home', '2022-05-12', 'authentique', 'vg accent', 'hg vergogne', '250000000', '', ''),
(6, 'KOUAKOU ', 'kouame charles', 'etudchaless1@gmail.com', 708540668, 'juste one', 'DR', '2022-08-18', '708540668', 'ghki', 'URGENT', '112329990000', '', ''),
(9, 'MANI', 'EVE', 'mani@gmail.com', 7699000, 'mani@gmail.com', 'ADR', '2022-08-18', 'TGVR', 'ACDR', 'CPRM', '134000000', '', 'XXX.jpg'),
(11, 'x man', 'web', 'web@gmail.com', 2147483647, 'xbade', 'er-u', '2022-08-25', 'a jour', 'KKP 12', 'URGENT', '25000000000', '            elles font partie du mÃªme train logistique et de la mÃªme chaÃ®ne de valeur.\r\nComme lâ€™industrie des hydro', 'flyers.jpg'),
(12, 'kkc', 'k', 'k@gmail.com', 2147483647, 'ddd', 'frrrss', '2022-08-31', 'adffff', 'fffrrghjj', 'dddvvv', '2000000000', '                  COLL', 'Lac06.jpg'),
(13, 'xone ', 'ZADI', 'zadi@gmail.com', 2147483647, 'ddd', 'DDDDFF', '2022-09-15', '2147483647', 'BBBB', 'IOOAZAZ', '20000000', '               ', '');

-- --------------------------------------------------------

--
-- Structure de la table `type de propriete`
--

CREATE TABLE IF NOT EXISTS `type de propriete` (
  `id_propriete` int(250) NOT NULL AUTO_INCREMENT,
  `immeubles` varchar(250) NOT NULL,
  `terrains` varchar(250) NOT NULL,
  `villas` varchar(250) NOT NULL,
  `autres` varchar(250) NOT NULL,
  `id_propretaire` int(250) NOT NULL,
  PRIMARY KEY (`id_propriete`),
  KEY `id_propretairePrimaire` (`id_propretaire`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
