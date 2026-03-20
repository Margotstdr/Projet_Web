-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : ven. 20 mars 2026 à 16:39
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
-- Déchargement des données de la table `Enseignants`
--

INSERT INTO `Enseignants` (`id_ens`, `nom_ens`, `prenom_ens`, `login_ens`, `mdp_ens`, `mail_ens`) VALUES
(1, 'Alhammada', 'Elias', 'elias.alhammada', 'abc', 'elias.alhammada@efrei.net'),
(2, 'Badra', 'Riham', '2', '', 'riham.badra@efrei.net'),
(3, 'Ben Khelil', 'Cherifa', '3', '', 'cherifa.benkhelil@efrei.net'),
(4, 'Conteville', 'Laurie', '4', '', 'laurie.conteville@efrei.net'),
(5, 'Gabis', 'Asma', '5', '', 'asma.gabis@efrei.net'),
(6, 'Guifo Fodjo', 'Yvan', '6', '', 'yvan.guifo-fodjo@efrei.net'),
(7, 'Hamidi', 'Mohamed', 'mohamed.hamidi', 'abc', 'mohamed.amidi@efrei.net'),
(8, 'Klai', 'Kaïs', '8', '', 'kais.klai@efrei.net'),
(9, 'Kmimech', 'Mourad', '9', '', 'mourad.kmimech@efrei.net'),
(10, 'Rakotonarivo', 'Rado', '10', '', 'rado.rakotonarivo@efrei.net'),
(11, 'Ta', 'Michaël', '11', '', 'michael.ta@efrei.net'),
(12, 'Trebaul', 'Lena', '12', '', 'lena.trebaul@efrei.net'),
(13, 'Chabchoub', 'Kamel', '13', '', 'kamel.chabchoub@efrei.net'),
(14, 'Soglo', 'Yaovi', '14', '', 'yaovi.soglo@efrei.net');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Enseignants`
--
ALTER TABLE `Enseignants`
  ADD PRIMARY KEY (`id_ens`),
  ADD UNIQUE KEY `login_ens` (`login_ens`),
  ADD UNIQUE KEY `mail_ens` (`mail_ens`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Enseignants`
--
ALTER TABLE `Enseignants`
  MODIFY `id_ens` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
