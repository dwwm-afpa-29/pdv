-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 17 mars 2021 à 07:40
-- Version du serveur :  5.7.19
-- Version de PHP :  7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `db_win_beer`
--
DROP DATABASE IF EXISTS `db_win_beer`;
CREATE DATABASE IF NOT EXISTS `db_win_beer` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `db_win_beer`;

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) COLLATE utf8_bin NOT NULL,
  `price` float NOT NULL,
  `photo` varchar(150) COLLATE utf8_bin NOT NULL,
  `id_type_products` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `articles_type_products_FK` (`id_type_products`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `name`, `price`, `photo`, `id_type_products`) VALUES
(12, 'testFinal', 456, 'qsdf', 1),
(13, 'test2Biere', 500, 'qsdf', 2),
(14, 'test_tudwal', 5000, 'qsdf.img', 1),
(15, 'test bruno 2', 550000, 'qsdfqdfs.123', 1),
(16, 'test3', 456, 'sdfg', 1),
(17, 'test transaction', 456, 'sdfg', 1),
(18, 'test transaction 2', 654, 'sdfg', 1),
(19, 'test', 16, '', 1),
(20, 'testromu', 55, '', 1),
(21, 'testencore', 250, '', 3);

-- --------------------------------------------------------

--
-- Structure de la table `articles_vs_features`
--

DROP TABLE IF EXISTS `articles_vs_features`;
CREATE TABLE IF NOT EXISTS `articles_vs_features` (
  `id` int(11) NOT NULL,
  `id_articles` int(11) NOT NULL,
  PRIMARY KEY (`id`,`id_articles`),
  KEY `articles_vs_features_articles0_FK` (`id_articles`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `articles_vs_features`
--

INSERT INTO `articles_vs_features` (`id`, `id_articles`) VALUES
(1, 12),
(3, 12),
(9, 12),
(11, 12),
(36, 12),
(7, 13),
(13, 13),
(3, 14),
(20, 14),
(33, 14),
(38, 14),
(4, 15),
(22, 15),
(32, 15),
(39, 15),
(1, 16),
(3, 16),
(9, 16),
(36, 16),
(1, 17),
(3, 17),
(9, 17),
(36, 17),
(4, 18),
(17, 18),
(31, 18),
(37, 18),
(1, 19),
(3, 19),
(9, 19),
(36, 19),
(1, 20),
(3, 20),
(9, 20),
(36, 20);

-- --------------------------------------------------------

--
-- Structure de la table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `passwd` varchar(250) NOT NULL,
  `address_street` varchar(100) NOT NULL,
  `address_zip_code` varchar(10) NOT NULL,
  `address_city` varchar(50) NOT NULL,
  `phone_number` varchar(100) NOT NULL,
  `date_of_birth` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `customer`
--

INSERT INTO `customer` (`id`, `first_name`, `last_name`, `mail`, `passwd`, `address_street`, `address_zip_code`, `address_city`, `phone_number`, `date_of_birth`) VALUES
(1, 'Pied', 'De Vigne', 'dwwm29@gmail.com', '$2y$10$NFDXNmWVpdRTVPKXcPjMYuou.VkaDOr2wELrbXm8RzknInDqF7rhW', '4 rue du test', '29200', 'Brest', '0205040605', '2020-02-13'),
(3, 'Tudwal', 'Prigent', 'tprigent@hotmail.fr', '$2y$10$iK09RdaH8QJIBe245neBue6RbaQnxQPK6NFbtU2U5sE8FDCWAV2be', '4 rue du test', '29800', 'Saint-Urbain', '0205040605', '2020-02-15'),
(4, 'Bruno', 'Dubief', 'bruno.dubief@hotmail.fr', '$2y$10$zt.v9x0WMQZj2.dgLla2z.C2SaJ8oZZaw96H7WapIUZWU0mj3XFTK', '4 rue du test', '29200', 'Brest', '0205040605', '2020-02-15');

-- --------------------------------------------------------

--
-- Structure de la table `customer_recovery`
--

DROP TABLE IF EXISTS `customer_recovery`;
CREATE TABLE IF NOT EXISTS `customer_recovery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mail` varchar(50) NOT NULL,
  `code_recovery` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `customer_recovery`
--

INSERT INTO `customer_recovery` (`id`, `mail`, `code_recovery`) VALUES
(1, 'tprigent@hotmail.fr', '1975952709'),
(2, 'dwwm29@gmail.com', '1983380198'),
(3, 'dwwm29@gmail.com', '1886607719'),
(4, 'dwwm29@gmail.com', '1084791438'),
(5, 'dwwm29@gmail.com', '0'),
(6, 'dwwm29@gmail.com', '0'),
(7, 'dwwm29@gmail.com', '0'),
(8, 'dwwm29@gmail.com', '?+?'),
(9, 'dwwm29@gmail.com', '???-??_&ɯ[L??_\ZsqbA????P;??[CO?g?'),
(10, 'dwwm29@gmail.com', 'c54483792fdb25873e4d543c6f0b8e'),
(12, 'dwwm29@gmail.com', '563922354097694277225b601800ef'),
(13, 'dwwm29@gmail.com', '4a68f09e6dbba4cfa79e95f1091bb1'),
(14, 'dwwm29@gmail.com', 'c898c395286b04c96adf568ed33050'),
(15, 'dwwm29@gmail.com', '019e8ca6675b2b9a65d8d923ade53b'),
(16, 'dwwm29@gmail.com', '37874938deef4da4c4c572880cf295'),
(17, 'dwwm29@gmail.com', 'aa524c6ca9c8dce338feb72240e5d7'),
(18, 'dwwm29@gmail.com', '29c0035eac7bc675d807fe592ae436'),
(19, 'dwwm29@gmail.com', 'f01fbeed3c843202039c70989dd14d'),
(20, 'dwwm29@gmail.com', '657467a639f0b866530faf7d5d6ec1'),
(21, 'dwwm29@gmail.com', '6855a0d9a68d74077e0f8097dbc442'),
(22, 'dwwm29@gmail.com', '13dcd82c9b3a1eca69030dfa197b49'),
(23, 'dwwm29@gmail.com', '351589f1c9ce1dd59f03a455a3f185'),
(24, 'dwwm29@gmail.com', 'dd064c57a57ac93ee2ed43cd9bd4d3'),
(25, 'dwwm29@gmail.com', '6b751f7c019b433b8438632193ab14'),
(26, 'dwwm29@gmail.com', 'dab647478d1995d4940bc57b22addd'),
(27, 'dwwm29@gmail.com', '2a3fe4bf70efbc635b2f8b4e0f2ccf'),
(28, 'dwwm29@gmail.com', '0152c110cb8695894b7a1bf6486a2e'),
(29, 'dwwm29@gmail.com', '50c19725007e658343252dc788c196'),
(30, 'dwwm29@gmail.com', '12ad754ca09eb1860c488478c0d78c'),
(31, 'dwwm29@gmail.com', '72cedbafaf1493498f18dce2e6473f'),
(32, 'dwwm29@gmail.com', 'ceff7f7cdb99aef16020ff95362559'),
(33, 'dwwm29@gmail.com', '6b8f310a437d4434602dbca21a26c3'),
(34, 'dwwm29@gmail.com', 'd676f38e5050a2236cfce783c401ca'),
(35, 'dwwm29@gmail.com', '0a7851e479a8b65ce3a80e637fae4e'),
(36, 'dwwm29@gmail.com', '12f0562ddc9fab304c74a372472135'),
(37, 'dwwm29@gmail.com', '151cda9d64a50687d76f9ac27260bf'),
(38, 'dwwm29@gmail.com', '8a8e3bb982ffbfec2f0eac1c93a040'),
(39, 'dwwm29@gmail.com', 'f3c87415a8b5a2e0b4fc832dc67cdc'),
(40, 'dwwm29@gmail.com', '0f0c51677e7df3ac0b9ef2243e4d7c'),
(41, 'dwwm29@gmail.com', 'eac3b9d0ce78d356d246fb0a72d1eb'),
(42, 'dwwm29@gmail.com', '30a2c71d0f42c8571d03310d6c1454'),
(43, 'tprigent@hotmail.fr', '44ccd142b37684c4484b325448aa7b'),
(44, 'tprigent@hotmail.fr', '4e0e8af2d5b52b2a95e351d34f373b'),
(45, 'bruno.dubief@hotmail.fr', 'c25a3b6da6e27997fbca6e0f28016f'),
(46, 'bruno.dubief@hotmail.fr', '8442daa8d139b6fc362c005a27f6f8');

-- --------------------------------------------------------

--
-- Structure de la table `features`
--

DROP TABLE IF EXISTS `features`;
CREATE TABLE IF NOT EXISTS `features` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `wording` varchar(150) COLLATE utf8_bin NOT NULL,
  `id_type_features` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `features_type_features_FK` (`id_type_features`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `features`
--

INSERT INTO `features` (`id`, `wording`, `id_type_features`) VALUES
(1, 'merlot', 4),
(3, 'rouge', 2),
(4, 'blanc', 2),
(5, 'brune', 1),
(6, 'blonde', 1),
(7, 'rousse', 1),
(8, 'ipa', 1),
(9, '2014', 6),
(10, '2000', 6),
(11, '2001', 6),
(12, '2002', 6),
(13, '2003', 6),
(14, '2004', 6),
(15, '2005', 6),
(16, '2006', 6),
(17, '2007', 6),
(18, '2008', 6),
(19, '2009', 6),
(20, '2010', 6),
(21, '2011', 6),
(22, '2012', 6),
(23, '2013', 6),
(30, 'Cabernet-Franc noir', 4),
(31, 'Cabernet-Sauvignon noir', 4),
(32, 'Carignan noir', 4),
(33, 'Chardonnay blanc', 4),
(34, 'Chenin blanc', 4),
(35, 'Gamay noir', 4),
(36, 'Alsace', 3),
(37, 'Beaujolais et Lyonnais', 3),
(38, 'Bourgogne', 3),
(39, 'Corse', 3),
(40, 'Languedoc', 3),
(41, 'Poitou-Charentes', 3),
(42, 'Roussillon', 3),
(43, '1999', 6);

-- --------------------------------------------------------

--
-- Structure de la table `type_features`
--

DROP TABLE IF EXISTS `type_features`;
CREATE TABLE IF NOT EXISTS `type_features` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `wording` varchar(150) COLLATE utf8_bin NOT NULL,
  `id_type_products` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `type_features_type_products_FK` (`id_type_products`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `type_features`
--

INSERT INTO `type_features` (`id`, `wording`, `id_type_products`) VALUES
(1, 'couleur_biere', 2),
(2, 'couleur_vin', 1),
(3, 'region', 1),
(4, 'cepage', 1),
(6, 'millesime', 1);

-- --------------------------------------------------------

--
-- Structure de la table `type_products`
--

DROP TABLE IF EXISTS `type_products`;
CREATE TABLE IF NOT EXISTS `type_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `wording` varchar(150) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `type_products`
--

INSERT INTO `type_products` (`id`, `wording`) VALUES
(1, 'vin'),
(2, 'biere'),
(3, 'nourriture');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_type_products_FK` FOREIGN KEY (`id_type_products`) REFERENCES `type_products` (`id`);

--
-- Contraintes pour la table `articles_vs_features`
--
ALTER TABLE `articles_vs_features`
  ADD CONSTRAINT `articles_vs_features_articles0_FK` FOREIGN KEY (`id_articles`) REFERENCES `articles` (`id`),
  ADD CONSTRAINT `articles_vs_features_features_FK` FOREIGN KEY (`id`) REFERENCES `features` (`id`);

--
-- Contraintes pour la table `features`
--
ALTER TABLE `features`
  ADD CONSTRAINT `features_type_features_FK` FOREIGN KEY (`id_type_features`) REFERENCES `type_features` (`id`);

--
-- Contraintes pour la table `type_features`
--
ALTER TABLE `type_features`
  ADD CONSTRAINT `type_features_type_products_FK` FOREIGN KEY (`id_type_products`) REFERENCES `type_products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
