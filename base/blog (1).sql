-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  Dim 26 avr. 2020 à 21:09
-- Version du serveur :  10.1.37-MariaDB
-- Version de PHP :  7.2.12

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
-- Structure de la table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL DEFAULT '',
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL,
  `addresse` varchar(255) NOT NULL DEFAULT '',
  `ville` varchar(255) NOT NULL DEFAULT '',
  `pays` varchar(255) NOT NULL DEFAULT '',
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'default_icon.jpg',
  `a_password` varchar(255) NOT NULL,
  `update_psd` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admins`
--

INSERT INTO `admins` (`id`, `username`, `nom`, `prenom`, `email`, `addresse`, `ville`, `pays`, `description`, `image`, `a_password`, `update_psd`, `created_date`) VALUES
(1, 'anleboss2.19', 'Aniki', 'leBoss', 'Aniki@leboss.com', 'BP KS 105', 'Abidjan', 'Côte D\'ivoire', 'Description\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus unde quos velit optio eius rerum quia perspiciatis et voluptatum, voluptates quod impedit neque quisquam delectus similique repellat in blanditiis officia!.', 'default_icon.jpg', 'f600fdf5deebf577267fdaa9e54df05a417c6da0444e124f0aa84fa5aaf721ba', '2020-04-22 23:45:18', '2020-04-22 23:45:18');

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
(4, 'Le bon', 'Garba', 'la meilleure nourriture des ivoirien,\r\nchampion, tu es un abidjanais, tu n\'as jamais mang&amp;eacute; garba, c\'est que t\'es mazo', 'Le_garba.jpg', '2020-04-20 18:02:49');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Pertubateurs'),
(4, 'hallucinogènes'),
(5, 'Dépresseurs'),
(6, 'Stimulant'),
(7, 'Autres');

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
  `addresse` text NOT NULL,
  `ville` varchar(255) NOT NULL DEFAULT '',
  `pays` varchar(255) NOT NULL DEFAULT '',
  `description` text NOT NULL,
  `u_password` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `date_inscription` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id`, `username`, `nom`, `prenom`, `email`, `age`, `addresse`, `ville`, `pays`, `description`, `u_password`, `image`, `date_inscription`) VALUES
(1, 'Rolls98', 'Mory', 'Ouattara', 'Rolls@yopmail.com', 20, 'Abj 435 bp ks', 'Abidjan', 'Côte D\'ivoire', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus unde quos velit optio eius rerum quia perspiciatis et voluptatum, voluptates quod impedit neque quisquam delectus similique repellat in blanditiis officia!.', 'e24df920078c3dd4e7e8d2442f00e5c9ab2a231bb3918d65cc50906e49ecaef4', 'IMG-20200416-WA0057.jpg', '2020-04-16 20:13:29'),
(2, '', 'aniki', '', 'anikileboss@bigboss.com', 28, '', '', '', '', '36f50957f5e0b6ee3ef455674da35a86667f3314209dc1514c510fe95e840831', 'default_icon.jpg', '2020-04-19 01:54:53'),
(3, '', 'Rolls', '', 'Rolls@leboss.com', 26, '', '', '', '', '9781741d8394b0640330cd16861cc79d32f72f4fca6f4cfe07808dd93a6cd225', 'default_icon.jpg', '2020-04-26 16:32:00');

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE `commentaires` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sujet_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `date_create` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `user_id`, `sujet_id`, `comment`, `date_create`) VALUES
(2, 1, 2, 'Depuis quand Utilisez-vous la drogue??', '2020-04-26 15:49:20'),
(3, 1, 2, 'Repondez-moi', '2020-04-26 16:10:19'),
(4, 1, 2, 'lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem', '2020-04-26 16:20:22'),
(5, 3, 2, 'Vous avez abus&amp;eacute; Monsieur, c\'est pourquoi!', '2020-04-26 16:32:47');

-- --------------------------------------------------------

--
-- Structure de la table `forum`
--

CREATE TABLE `forum` (
  `id` int(11) NOT NULL,
  `sujet` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `cat` int(11) NOT NULL,
  `date_create` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `forum`
--

INSERT INTO `forum` (`id`, `sujet`, `user_id`, `description`, `cat`, `date_create`) VALUES
(1, 'Adhésion à la drogue ', 1, 'j\'ai été initié à la drogue par mon meilleur ami', 6, '2020-04-25 23:12:01'),
(2, 'La drogue a ruiné ma vie', 1, 'je suis pertubé par la drogue', 1, '2020-04-26 15:00:02');

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
  `abonne` tinyint(1) NOT NULL DEFAULT '0',
  `date_envoi` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `sujet_id` (`sujet_id`);

--
-- Index pour la table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `cat` (`cat`);

--
-- Index pour la table `service_client`
--
ALTER TABLE `service_client`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `forum`
--
ALTER TABLE `forum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `service_client`
--
ALTER TABLE `service_client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `forum`
--
ALTER TABLE `forum`
  ADD CONSTRAINT `forum_ibfk_1` FOREIGN KEY (`cat`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `forum_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `clients` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
