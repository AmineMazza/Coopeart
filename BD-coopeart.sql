-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 20 mai 2023 à 17:15
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `coopeart`
--

-- --------------------------------------------------------

--
-- Structure de la table `artisan`
--

CREATE TABLE `artisan` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `image_profil` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `artisan`
--

INSERT INTO `artisan` (`id`, `nom`, `prenom`, `email`, `telephone`, `ville`, `image_profil`) VALUES
(1, 'Mazza', 'Amine', 'aminemazza6@gmail.com', '0693399476', 'Marrakech', 'test.png'),
(2, 'yassmin', 'amine', 'chrimrta7e@gmail.com', '0620792270', 'Marrakech', 'test.png');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `id_product` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `nom`, `description`, `image`, `id_product`) VALUES
(1, 'Chaussures', 'Chaussures', '3-275x275-64546eae60fff.jpg', 0),
(2, 'Bijoux', 'Bijoux', 'Bijoux2-64546f2e158b1.avif', 0),
(3, 'Accessoires', 'Les Hommes et Femmes', '18-2-600x600.jpg', 0),
(4, 'Tapis', 'Tapis traditionnelle', 'tapis-645470b546d72.jpg', 0),
(5, 'Décoration', 'Maison et décoration', 'maison.jpg', 0),
(9, 'Vêtements', 'Vêtements', 'Vetement-et-habille-traditionnel-600x600-645df9971c8d8.jpg', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `checkout`
--

CREATE TABLE `checkout` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `ville` varchar(255) NOT NULL,
  `pays` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `checkout`
--

INSERT INTO `checkout` (`id`, `user_name`, `last_name`, `phone`, `adresse`, `ville`, `pays`, `email`) VALUES
(11, 'amine', 'mazza', '0693399476', 'CMN BLOC 23 NO 20 MARRAKECH', 'Marrakech', 'maroc', 'aminemazza6@gmail.com'),
(12, 'test', 'test', 'test', 'test', 'Mohammedia', 'Maroc', 'aaaaaa'),
(13, 'test', 'test', 'test', 'test', 'Meknes', 'Maroc', 'test'),
(14, 'amine', 'mazza', '0693399476', 'CMN BLOC 23 NO 20 MARRAKECH', 'Marrakech', 'Maroc', 'aminemazza6@gmail.com'),
(15, 'amine', 'mazza', '54654646', 'amlkazmkza', 'salé', 'Maroc', 'alkjalzalkj'),
(16, 'test', 'test', 'test', 'test', 'Casablanca', 'Maroc', 'test'),
(17, 'amine', 'mazza', '0620732132', 'marrakech', 'Casablanca', 'Maroc', 'chrimrta7e@gmail.com'),
(18, 'amine', 'mazza', '0620732132', 'marrakech', 'Rabat', 'Maroc', 'chrimrta7e@gmail.com'),
(19, 'amine', 'mazza', '0620732132', 'marrakech', 'Oujda', 'Maroc', 'chrimrta7e@gmail.com'),
(20, 'amine', 'maza', '0620732132', 'marrakech', 'Rabat', 'Maroc', 'chrimrta7e@gmail.com'),
(21, 'amine', 'mazza', '0620732132', 'marrakech', 'Marrakech', 'Maroc', 'chrimrta7e@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id` int(11) NOT NULL,
  `prix` double NOT NULL,
  `date_commande` date NOT NULL,
  `etat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `cooperatif`
--

CREATE TABLE `cooperatif` (
  `id` int(11) NOT NULL,
  `nom_cooperatif` varchar(255) NOT NULL,
  `nom_gerant` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image_profil` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `cooperatif`
--

INSERT INTO `cooperatif` (`id`, `nom_cooperatif`, `nom_gerant`, `telephone`, `ville`, `email`, `image_profil`) VALUES
(1, 'CoopeArt', 'amine', '0693399476', 'Marrakech', 'Coopeart@gmail.com', 'test.png');

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL,
  `body` longtext NOT NULL,
  `headers` longtext NOT NULL,
  `queue_name` varchar(190) NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `categorie_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `categorie_id`, `title`, `image`, `price`, `description`) VALUES
(1, 1, 'Chaussures', '2-275x275-64546ee6d6d8a.jpg', 150, 'Chaussure femme'),
(2, 4, 'tapis', 'WhatsApp-Image-2021-03-06-at-16-01-32-7-600x600-64547b3811f8f.jpg', 1000, 'tapis traditionnelle marocaine'),
(3, 2, 'Bijoux', 'Bijoux2-645498f5db0a4.avif', 1500, 'Pack des Bijoux'),
(4, 3, 'cartable', '18-2-600x600-64547b961cb33.jpg', 300, 'cartable de cuire'),
(6, 5, 'lumière', '41-7-275x275-64547bf5ed52f.jpg', 300, 'décore de la lumière'),
(7, 5, 'Thèiére', 'Theiere-64547c2f3bd16.jpg', 450, 'pack de Thèiére'),
(8, 5, 'tebsil', '4-8-275x275-64547c53e0d08.jpg', 150, 'tapis traditionnelle marocaine'),
(9, 2, 'Bijoux', 'Bijoux-6456a4182babf.jpg', 500, 'Pack des Bijoux'),
(11, 9, 'Vetements T9lidi', '84-2-600x600-645df9dd6fccc.jpg', 500, 'Vetements T9lidi marocaine');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(180) NOT NULL,
  `roles` longtext NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `user_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `ville` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `image`, `user_name`, `last_name`, `phone`, `adresse`, `ville`) VALUES
(3, 'admin@gmail.com', '[\"ROLE_ADMIN\"]', '$2y$13$ofFaYnUDakGppMmUBWmBDete3jzPK08kw99.EgtRrQOu8kA4pXAmC', NULL, 'amine', 'mazza', '0693399476', 'CMN BLOC 23 NO 20 MARRAKECH', 'Marrakech'),
(4, 'client@gmail.com', '[\"ROLE_CLIENT\"]', '$2y$13$XFERZpih6m.NqFmjsVRGSuhYe/nxtz8bk29CcvYcfhiaXbaa/qt4G', NULL, 'client', 'client', '0612457885', 'maroc,marrakech', 'Marrakech'),
(5, 'coop@gmail.com', '[\"ROLE_COOP\"]', '$2y$13$LoHh5.z0xqXUqQq3TRUVfONIxGwGCBYI0xMY1pAm8RfjU.v5SUicu', NULL, 'coopeart', 'coop', '0612131415', 'maroc,marrakech', 'casablanca'),
(6, 'artisan@gmail.com', '[\"ROLE_ARTISAN\"]', '$2y$13$hxl/ViLTjLb1sfbralMTZ.MSjtn9qrccVkWvAUtdRPsk.4pUl6xz2', NULL, 'artisan', 'artisan', '0623457874', 'agadir', 'agadir');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `artisan`
--
ALTER TABLE `artisan`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `cooperatif`
--
ALTER TABLE `cooperatif`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_B3BA5A5ABCF5E72D` (`categorie_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `artisan`
--
ALTER TABLE `artisan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `cooperatif`
--
ALTER TABLE `cooperatif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `FK_B3BA5A5ABCF5E72D` FOREIGN KEY (`categorie_id`) REFERENCES `categorie` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
