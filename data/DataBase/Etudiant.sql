-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : ven. 20 mars 2026 à 15:39
-- Version du serveur : 8.0.44
-- Version de PHP : 8.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de données : `compte_utilisateur`
--

-- --------------------------------------------------------

--
-- Déchargement des données de la table `Etudiant`
--

INSERT INTO `Etudiant` (`id_etu`, `nom_etu`, `prenom_etu`, `login_etu`, `mdp_etu`, `mail_etu`) VALUES
(1, 'Studer', 'Margot', 'margot.studer', 'abc', 'margot.studer@efrei.net'),
(2, 'Ratsimbazafy', 'Armence', 'armence.ratsimbazafy', 'abc', 'armence.ratsimbazafy@efrei.net'),
(3, 'Siktalsi', 'Defne', 'defne.siktalsi', 'abc', 'defne.siktalsi@efrei.net');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Etudiant`
--
ALTER TABLE `Etudiant`
  ADD PRIMARY KEY (`id_etu`),
  ADD UNIQUE KEY `login_etu` (`login_etu`),
  ADD UNIQUE KEY `mail_etu` (`mail_etu`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Etudiant`
--
ALTER TABLE `Etudiant`
  MODIFY `id_etu` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
