-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Dim 21 Janvier 2018 à 16:14
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `qeza_tests`
--

-- --------------------------------------------------------

--
-- Structure de la table `notes`
--

CREATE TABLE `notes` (
  `id` int(3) NOT NULL,
  `note_performance` int(11) NOT NULL,
  `note_photo` int(11) NOT NULL,
  `note_autonomie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `telephones`
--

CREATE TABLE `telephones` (
  `ID` int(3) NOT NULL,
  `Fabricant` varchar(10) DEFAULT NULL,
  `modele` varchar(28) DEFAULT NULL,
  `annee_sortie` int(4) DEFAULT NULL,
  `mois_sortie` tinyint(9) DEFAULT NULL,
  `masse` varchar(4) DEFAULT NULL,
  `epaisseur` varchar(3) DEFAULT NULL,
  `taille_ecran` decimal(3,2) DEFAULT NULL,
  `largeur_ecran` int(4) DEFAULT NULL,
  `hauteure_ecran` int(4) DEFAULT NULL,
  `Ratio` varchar(11) DEFAULT NULL,
  `OS` varchar(20) DEFAULT NULL,
  `version_OS` varchar(20) DEFAULT NULL,
  `cpu` varchar(19) DEFAULT NULL,
  `ram` varchar(5) DEFAULT NULL,
  `camera` varchar(5) DEFAULT NULL,
  `capacite_batterie` varchar(4) DEFAULT NULL,
  `type_batterie` varchar(6) DEFAULT NULL,
  `memoire` varchar(12) DEFAULT NULL,
  `carte_SD` varchar(34) DEFAULT NULL,
  `pertinence` tinyint(1) NOT NULL,
  `note` int(1) NOT NULL DEFAULT '0',
  `newTel` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `userName` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `userPassword` varchar(255) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`userId`, `userName`, `userPassword`) VALUES
(1, 'dicoju', 'e192f70105c1791c1fe5722a07ef0690'),
(2, 'lexskiies', 'ba8068ee65f8b7e7015686abb3664464'),
(3, 'solal3105', '5e5f9189654ea6bd7cdf6554ab22c600'),
(4, 'Hugoqeza23', 'ecc6c3a128d8ae3ebe530cb2e61bdfa3');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Index pour la table `telephones`
--
ALTER TABLE `telephones`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `telephones`
--
ALTER TABLE `telephones`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1049;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `fk_idtel` FOREIGN KEY (`id`) REFERENCES `telephones` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
