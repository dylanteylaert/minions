-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 08 sep. 2022 à 09:50
-- Version du serveur : 5.7.36
-- Version de PHP : 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `minions`
--

-- --------------------------------------------------------

--
-- Structure de la table `dessins`
--

DROP TABLE IF EXISTS `dessins`;
CREATE TABLE IF NOT EXISTS `dessins` (
  `id_dessins` int(11) NOT NULL AUTO_INCREMENT,
  `dessin` varchar(64) NOT NULL,
  `description` varchar(500) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_dessins`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `dessins`
--

INSERT INTO `dessins` (`id_dessins`, `dessin`, `description`, `image`) VALUES
(1, 'bdqfbdfb', 'bfbfdbdfb', 'public/imgs/dessins/rick.jpg'),
(2, 'gergegegrrg', 'geegegerg', 'public/imgs/dessins/1888747.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
