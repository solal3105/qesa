-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Sam 27 Mai 2017 à 14:54
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `keza`
--

-- --------------------------------------------------------

--
-- Structure de la table `phone`
--

CREATE TABLE `phone` (
  `refPhone` int(10) NOT NULL,
  `marquePhone` varchar(100) NOT NULL,
  `modelePhone` varchar(100) NOT NULL,
  `perfsPhone` int(2) NOT NULL,
  `photoPhone` int(2) NOT NULL,
  `batteriePhone` int(2) NOT NULL,
  `prix` int(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `phone`
--

INSERT INTO `phone` (`refPhone`, `marquePhone`, `modelePhone`, `perfsPhone`, `photoPhone`, `batteriePhone`, `prix`) VALUES
(1, 'Samsung', 'Galaxy s8', 8, 9, 7, 900),
(2, 'Huawei', 'P10', 7, 8, 6, 620),
(3, 'Huawei', 'Mate 9', 7, 7, 9, 700),
(4, 'LG', 'G6', 7, 8, 6, 750),
(5, 'Xiaomi', 'mi note 2', 8, 7, 9, 400),
(6, 'Xiaomi', 'redmi pro', 6, 5, 9, 170),
(7, 'Samsung', 'J7', 5, 6, 7, 220),
(8, 'OnePlus', '3', 7, 8, 7, 400),
(9, 'Apple', 'Iphone 7', 8, 9, 7, 850),
(10, 'Apple', 'Iphone 7 plus', 8, 9, 9, 1000),
(11, 'Xiaomi', 'mi6', 9, 7, 8, 480);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `phone`
--
ALTER TABLE `phone`
  ADD PRIMARY KEY (`refPhone`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `phone`
--
ALTER TABLE `phone`
  MODIFY `refPhone` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
