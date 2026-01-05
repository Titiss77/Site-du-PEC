-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 05 jan. 2026 à 12:54
-- Version du serveur : 8.0.39
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `pec_database`
--

-- --------------------------------------------------------

--
-- Structure de la table `coaches`
--

CREATE TABLE `coaches` (
  `id` int NOT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `photo` varchar(255) DEFAULT NULL,
  `numTel` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `mail` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `coaches`
--

INSERT INTO `coaches` (`id`, `nom`, `description`, `photo`, `numTel`, `mail`) VALUES
(1, 'Thierry Henri', 'Coach principal pour les jeunes et espoirs.', 'thierry_henri.jpg', NULL, NULL),
(2, 'Martin L\'espagnol', 'Coach des jeunes le samedi et section.', 'martin_lespagnol.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `disciplines`
--

CREATE TABLE `disciplines` (
  `id` int NOT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `description` text,
  `image` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `disciplines`
--

INSERT INTO `disciplines` (`id`, `nom`, `description`, `image`) VALUES
(1, 'Monopalme', 'Vitesse et ondulations.', 'monopalme.jpg'),
(2, 'Bi-palmes', 'Technique et cardio.', 'bipalmes.jpg'),
(4, 'Apnée', 'Maîtrise et relaxation.', 'monopalme.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `general`
--

CREATE TABLE `general` (
  `id` int NOT NULL,
  `image` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `nomClub` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `philosophie` text NOT NULL,
  `nombreNageurs` int NOT NULL,
  `nombreHommes` int NOT NULL,
  `nombreFemmes` int NOT NULL,
  `projetSportif` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `general`
--

INSERT INTO `general` (`id`, `image`, `nomClub`, `description`, `philosophie`, `nombreNageurs`, `nombreHommes`, `nombreFemmes`, `projetSportif`) VALUES
(1, 'logo.jpg', 'Palmes en Cornouailles (PEC)', 'Nous sommes ravis de vous accueillir sur le site officiel de notre club de natation basé à Quimper. Que vous soyez un nageur débutant ou expérimenté, notre club offre une variété de disciplines et d\'activités pour tous les âges et niveaux.', 'La nage avec palmes apporte un gainage naturel, une puissance cardiaque accrue et une sensation de glisse incomparable. Au PEC, nous cultivons cet esprit de performance dans une ambiance conviviale.', 100, 45, 55, 'Compétitions régionales et nationales, championnats de france');

-- --------------------------------------------------------

--
-- Structure de la table `piscines`
--

CREATE TABLE `piscines` (
  `id` int NOT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `type_bassin` enum('25m','50m') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `piscines`
--

INSERT INTO `piscines` (`id`, `nom`, `adresse`, `type_bassin`, `photo`) VALUES
(1, 'Kerlan vian', '47 avenue des oiseaux, 29000, Quimper', '25m', 'kerlan_vian.jpg'),
(2, 'Aquarive', NULL, '25m', 'aquarive.png');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `coaches`
--
ALTER TABLE `coaches`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `disciplines`
--
ALTER TABLE `disciplines`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `general`
--
ALTER TABLE `general`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `piscines`
--
ALTER TABLE `piscines`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `coaches`
--
ALTER TABLE `coaches`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `disciplines`
--
ALTER TABLE `disciplines`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `general`
--
ALTER TABLE `general`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `piscines`
--
ALTER TABLE `piscines`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
