-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 08 juin 2024 à 12:48
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `signal`
--

-- --------------------------------------------------------

--
-- Structure de la table `complaint`
--

DROP TABLE IF EXISTS `complaint`;
CREATE TABLE IF NOT EXISTS `complaint` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `harceleur` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `typee` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `datee` date NOT NULL,
  `descriptionn` text NOT NULL,
  `witnesses` text NOT NULL,
  `locationn` varchar(100) NOT NULL,
  `actionn` text,
  `date_submit` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `nom_fichier` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `complaint`
--

INSERT INTO `complaint` (`id`, `nom`, `harceleur`, `email`, `typee`, `phone`, `datee`, `descriptionn`, `witnesses`, `locationn`, `actionn`, `date_submit`, `nom_fichier`) VALUES
(23, 'Marc Marc', 'joe dito', 'marc32994@gmail.com', 'physique', '0780024942', '2024-06-03', 'Il a essayer de m\'intimider car je l\'ai supprit entrain de devalise un commerce', 'peter ball', '3 rue paracetamole', ';:gjkjll:hlkh', '2024-06-07 22:46:44', NULL),
(24, 'Marc Marc', 'Jean pico', 'marc32994@gmail.com', 'verbal', '0780024942', '2024-05-06', 'il a fait de la diffamation plus menace car je l\'ai suppris entrain de fouiller le sac de nos camarades de classe', 'Matis Fuseau', '3 rue paracetamole', 'Prisen en contact avec le centre d\'aide aux hacelement', '2024-06-08 00:16:15', NULL),
(25, 'Marc Marc', 'Tibo coffi', 'marc32994@gmail.com', 'verbal', '0780024942', '2024-06-03', 'il a essayer de me frapper et ma menacer car je l\'ai surprit entrain de voler dans les secs des camarades', 'Matis Fuseau', '3 rue paracetamole', 'Prisen en contact avec le centre d\'aide aux hacelement', '2024-06-08 00:43:41', NULL),
(26, 'Marc Marc', 'Tibo coffi', 'marc32994@gmail.com', 'verbal', '0780024942', '2024-06-03', 'il a essayer de me frapper et ma menacer car je l\'ai surprit entrain de voler dans les secs des camarades', 'Matis Fuseau', '3 rue paracetamole', 'Prisen en contact avec le centre d\'aide aux hacelement', '2024-06-08 00:48:03', NULL),
(27, 'Marc Marc', 'Tibo coffi', 'marc32994@gmail.com', 'verbal', '0780024942', '2024-06-03', 'il a essayer de me frapper et ma menacer car je l\'ai surprit entrain de voler dans les secs des camarades', 'Matis Fuseau', '3 rue paracetamole', 'Prisen en contact avec le centre d\'aide aux hacelement', '2024-06-08 00:52:27', NULL),
(28, 'Marc Marc', 'Tibo coffi', 'marc32994@gmail.com', 'verbal', '0780024942', '2024-06-03', 'il a essayer de me frapper et ma menacer car je l\'ai surprit entrain de voler dans les secs des camarades', 'Matis Fuseau', '3 rue paracetamole', 'Prisen en contact avec le centre d\'aide aux hacelement', '2024-06-08 00:53:09', NULL),
(29, 'Marc Marc', 'Tibo coffi', 'marc32994@gmail.com', 'verbal', '0780024942', '2024-06-03', 'il a essayer de me frapper et ma menacer car je l\'ai surprit entrain de voler dans les secs des camarades', 'Matis Fuseau', '3 rue paracetamole', 'Prisen en contact avec le centre d\'aide aux hacelement', '2024-06-08 01:02:59', NULL),
(30, 'Marc Marc', 'Tibo coffi', 'marc32994@gmail.com', 'verbal', '0780024942', '2024-06-03', 'il a essayer de me frapper et ma menacer car je l\'ai surprit entrain de voler dans les secs des camarades', 'Matis Fuseau', '3 rue paracetamole', 'Prisen en contact avec le centre d\'aide aux hacelement', '2024-06-08 01:30:06', NULL),
(31, 'Marc Marc', 'Marc Marc', 'marc32994@gmail.com', 'cyber', '0780024942', '2024-06-03', 'jv::goj', 'peter ball', '3 rue paracetamole', ';:gjkjll:hlkh', '2024-06-08 11:31:51', NULL),
(32, 'Marc Marc', 'Marc Marc', 'marc32994@gmail.com', 'intimidation', '0780024942', '2024-04-19', 'scqvdqv ', 'sqsqvvsq', '3 rue paracetamole', 'qvvgqeedg', '2024-06-08 12:10:35', 'et (5).png'),
(33, 'Marc Marc', 'Marc Marc', 'marc32994@gmail.com', 'cyber', '0780024942', '2024-06-01', 'sdgrdsr', 'rrrrgr', '3 rue paracetamole', 'rgrrhsrh', '2024-06-08 12:21:33', 'sheet8 (4).png'),
(34, 'Marc Marc', 'Marc Marc', 'marc32994@gmail.com', 'cyber', '0780024942', '2024-06-01', 'sdgrdsr', 'rrrrgr', '3 rue paracetamole', 'rgrrhsrh', '2024-06-08 12:22:30', 'sheet8 (4).png');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
