-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : ven. 20 mars 2026 à 17:33
-- Version du serveur : 8.0.44
-- Version de PHP : 8.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `compte_utilisateur`
--

-- --------------------------------------------------------

--
-- Déchargement des données de la table `Presenter`
--

INSERT INTO `Presenter` (`id_ens`, `id_perm`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10),
(11, 11),
(12, 12),
(13, 13),
(14, 14),
(1, 15),
(2, 16),
(3, 17),
(4, 18),
(5, 19),
(6, 20),
(7, 21),
(8, 22),
(9, 23),
(10, 24),
(11, 25),
(12, 26),
(13, 27),
(14, 28),
(1, 29),
(2, 30);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Presenter`
--
ALTER TABLE `Presenter`
  ADD PRIMARY KEY (`id_ens`,`id_perm`),
  ADD KEY `id_perm` (`id_perm`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Presenter`
--
ALTER TABLE `Presenter`
  ADD CONSTRAINT `presenter_ibfk_1` FOREIGN KEY (`id_ens`) REFERENCES `Enseignants` (`id_ens`) ON DELETE CASCADE,
  ADD CONSTRAINT `presenter_ibfk_2` FOREIGN KEY (`id_perm`) REFERENCES `Permanence` (`id_perm`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
