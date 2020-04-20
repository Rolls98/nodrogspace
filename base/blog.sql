-- phpMyAdmin SQL Dump
-- version 4.9.2deb1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  lun. 20 avr. 2020 à 14:16
-- Version du serveur :  10.3.22-MariaDB-1
-- Version de PHP :  7.3.12-1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `s_titre` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `date_create` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `titre`, `s_titre`, `description`, `image`, `date_create`) VALUES
(1, 'la fois ou j\'ai', 'failli y rester', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum similique quo omnis delectus sequi voluptate minima ullam, aspernatur aut! Ut libero similique inventore doloribus tenetur cum alias, corrupti facere autem. Lorem ipsum dolor sit amet consectetur adipisicing elit. Error nam, esse enim tempora ratione quo in vero corrupti nobis fugit voluptatum temporibus optio quidem? Illum distinctio consequuntur expedita repellat dignissimos. Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt distinctio inventore nostrum? Perspiciatis quisquam est magnam autem porro laborum, tempora, perferendis maiores distinctio totam eaque similique, amet omnis? Assumenda, saepe?.', 'products-02-01.jpg', '2020-04-16 15:05:36'),
(2, 'Les risques d\'overdeuses', 'LE BLACKOUT', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum similique quo omnis delectus sequi voluptate minima ullam, aspernatur aut! Ut libero similique inventore doloribus tenetur cum alias, corrupti facere autem. Lorem ipsum dolor sit amet consectetur adipisicing elit. Error nam, esse enim tempora ratione quo in vero corrupti nobis fugit voluptatum temporibus optio quidem? Illum distinctio consequuntur expedita repellat dignissimos. Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt distinctio inventore nostrum? Perspiciatis quisquam est magnam autem porro laborum, tempora, perferendis maiores distinctio totam eaque similique, amet omnis? Assumenda, saepe?.', 'products-03.jpg', '2020-04-16 23:30:34'),
(3, 'Un test', 'Ajout Article', 'lorem lorem lorem loremlorem lorem lorem loremlorem lorem lorem loremlorem lorem lorem loremlorem lorem lorem loremlorem lorem lorem loremlorem lorem lorem loremlorem lorem lorem loremlorem lorem lorem loremlorem lorem lorem loremlorem lorem lorem loremlorem lorem lorem loremlorem lorem lorem loremlorem lorem lorem loremlorem lorem lorem loremlorem lorem lorem loremlorem lorem lorem loremlorem lorem lorem loremlorem lorem lorem loremlorem lorem lorem loremlorem lorem lorem loremlorem lorem lorem loremlorem lorem lorem loremlorem lorem lorem loremlorem lorem lorem loremlorem lorem lorem loremlorem lorem lorem loremlorem lorem lorem loremlorem lorem lorem loremlorem lorem lorem loremlorem lorem lorem loremlorem lorem lorem loremlorem lorem lorem loremlorem lorem lorem loremlorem lorem lorem loremlorem lorem lorem loremlorem lorem lorem loremlorem lorem lorem loremlorem lorem lorem loremlorem lorem lorem loremlorem lorem lorem loremlorem lorem lorem loremlorem lorem lorem loremlorem lorem lorem loremlorem lorem lorem loremlorem lorem lorem loremlorem lorem lorem loremlorem lorem lorem loremlorem lorem lorem loremlorem lorem lorem loremlorem lorem lorem loremlorem lorem lorem loremlorem lorem lorem loremlorem lorem lorem loremlorem lorem lorem loremlorem lorem lorem loremlorem lorem lorem loremlorem lorem lorem loremlorem lorem lorem loremlorem lorem lorem loremlorem lorem lorem loremlorem lorem lorem loremlorem lorem lorem loremlorem lorem lorem loremlorem lorem lorem lorem', '0.png', '2020-04-17 12:42:59');

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL DEFAULT '',
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `addresse` text NOT NULL DEFAULT '',
  `ville` varchar(255) NOT NULL DEFAULT '',
  `pays` varchar(255) NOT NULL DEFAULT '',
  `description` text NOT NULL DEFAULT '',
  `u_password` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `date_inscription` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id`, `username`, `nom`, `prenom`, `email`, `age`, `addresse`, `ville`, `pays`, `description`, `u_password`, `image`, `date_inscription`) VALUES
(1, 'Rolls98', 'Ouattara', 'Mory', 'Rolls@yopmail.com', 20, 'BP 10 Abj 225', 'Abidjan', 'Côte D\'ivoire', 'je suis timide,curieux,humble.\r\n\r\nj\'aime beaucoup la programmation, j\'adore aussi le travail, et je travail avec serieux', 'e24df920078c3dd4e7e8d2442f00e5c9ab2a231bb3918d65cc50906e49ecaef4', '3 20-04-2020 13-58-05.jpg', '2020-04-16 20:13:29'),
(2, '', 'aniki', '', 'anikileboss@bigboss.com', 28, '', '', '', '', '36f50957f5e0b6ee3ef455674da35a86667f3314209dc1514c510fe95e840831', 'default_icon.jpg', '2020-04-19 01:54:53');

-- --------------------------------------------------------

--
-- Structure de la table `forum`
--

CREATE TABLE `forum` (
  `id` int(11) NOT NULL,
  `sujet` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `date_create` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `service_client`
--

CREATE TABLE `service_client` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pays` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `abonne` tinyint(1) NOT NULL DEFAULT 0,
  `date_envoi` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `service_client`
--
ALTER TABLE `service_client`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `forum`
--
ALTER TABLE `forum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `service_client`
--
ALTER TABLE `service_client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
