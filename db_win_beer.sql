-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : jeu. 08 avr. 2021 à 09:21
-- Version du serveur :  5.7.24
-- Version de PHP : 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `db_win_beer`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `name` varchar(150) COLLATE utf8_bin NOT NULL,
  `degre` float NOT NULL,
  `price` float NOT NULL,
  `photo` varchar(150) COLLATE utf8_bin NOT NULL,
  `id_type_products` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `articles_vs_features`
--

CREATE TABLE `articles_vs_features` (
  `id` int(11) NOT NULL,
  `id_articles` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `article_vs_commande`
--

CREATE TABLE `article_vs_commande` (
  `id` int(11) NOT NULL,
  `id_Commande` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `id_customer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) COLLATE utf8_bin NOT NULL,
  `last_name` varchar(50) COLLATE utf8_bin NOT NULL,
  `mail` varchar(50) COLLATE utf8_bin NOT NULL,
  `passwd` varchar(250) COLLATE utf8_bin NOT NULL,
  `address_street` varchar(50) COLLATE utf8_bin NOT NULL,
  `address_zip_code` varchar(50) COLLATE utf8_bin NOT NULL,
  `address_city` varchar(50) COLLATE utf8_bin NOT NULL,
  `phone_number` varchar(50) COLLATE utf8_bin NOT NULL,
  `date_of_birth` date NOT NULL,
  `role_user` varchar(50) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `customer`
--

INSERT INTO `customer` (`id`, `first_name`, `last_name`, `mail`, `passwd`, `address_street`, `address_zip_code`, `address_city`, `phone_number`, `date_of_birth`, `role_user`) VALUES
(1, 'Bruno', 'Dubief', 'bruno.dubief@hotmail.fr', '$2y$10$vc6WUqALN72zG8yq0b65IOY5lphugQrU7O3KTwlfLRvAKqA02HnAO', '12 rue du château', '29200', 'BREST', '0637227614', '1987-11-10', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `customer_recovery`
--

CREATE TABLE `customer_recovery` (
  `id` int(11) NOT NULL,
  `mail` varchar(50) COLLATE utf8_bin NOT NULL,
  `code_recovery` varchar(50) COLLATE utf8_bin NOT NULL,
  `date_time` varchar(50) COLLATE utf8_bin NOT NULL,
  `id_customer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `features`
--

CREATE TABLE `features` (
  `id` int(11) NOT NULL,
  `wording` varchar(150) COLLATE utf8_bin NOT NULL,
  `id_type_features` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `type_features`
--

CREATE TABLE `type_features` (
  `id` int(11) NOT NULL,
  `wording` varchar(150) COLLATE utf8_bin NOT NULL,
  `id_type_products` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `type_products`
--

CREATE TABLE `type_products` (
  `id` int(11) NOT NULL,
  `wording` varchar(150) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `articles_type_products_FK` (`id_type_products`);

--
-- Index pour la table `articles_vs_features`
--
ALTER TABLE `articles_vs_features`
  ADD PRIMARY KEY (`id`,`id_articles`),
  ADD KEY `articles_vs_features_articles0_FK` (`id_articles`);

--
-- Index pour la table `article_vs_commande`
--
ALTER TABLE `article_vs_commande`
  ADD PRIMARY KEY (`id`,`id_Commande`),
  ADD KEY `Article_VS_Commande_Commande0_FK` (`id_Commande`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Commande_customer_FK` (`id_customer`);

--
-- Index pour la table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `customer_recovery`
--
ALTER TABLE `customer_recovery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_recovery_customer_FK` (`id_customer`);

--
-- Index pour la table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`),
  ADD KEY `features_type_features_FK` (`id_type_features`);

--
-- Index pour la table `type_features`
--
ALTER TABLE `type_features`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_features_type_products_FK` (`id_type_products`);

--
-- Index pour la table `type_products`
--
ALTER TABLE `type_products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `customer_recovery`
--
ALTER TABLE `customer_recovery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `features`
--
ALTER TABLE `features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `type_features`
--
ALTER TABLE `type_features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `type_products`
--
ALTER TABLE `type_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
-- Contraintes pour la table `article_vs_commande`
--
ALTER TABLE `article_vs_commande`
  ADD CONSTRAINT `Article_VS_Commande_Commande0_FK` FOREIGN KEY (`id_Commande`) REFERENCES `commande` (`id`),
  ADD CONSTRAINT `Article_VS_Commande_articles_FK` FOREIGN KEY (`id`) REFERENCES `articles` (`id`);

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `Commande_customer_FK` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id`);

--
-- Contraintes pour la table `customer_recovery`
--
ALTER TABLE `customer_recovery`
  ADD CONSTRAINT `customer_recovery_customer_FK` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id`);

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
