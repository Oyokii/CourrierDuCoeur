-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 07 jan. 2024 à 04:59
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
-- Base de données : `courrier`
--

-- --------------------------------------------------------

--
-- Structure de la table `adminuser`
--

DROP TABLE IF EXISTS `adminuser`;
CREATE TABLE IF NOT EXISTS `adminuser` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `prenom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mdp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `adminuser`
--

INSERT INTO `adminuser` (`id`, `nom`, `prenom`, `email`, `mdp`) VALUES
(1, 'test', 'test', 'test@gmail.com', '$5$qued#love$u4SEVqCHxbs5H8//a9JUI.dFYkCvHV0diAeLlYjhoN5');

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

DROP TABLE IF EXISTS `etudiant`;
CREATE TABLE IF NOT EXISTS `etudiant` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `prenom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `classe` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`id`, `nom`, `prenom`, `email`, `classe`) VALUES
(7, 'Nom7', 'Prenom7', 'email7@example.com', 'premiere'),
(6, 'Nom6', 'Prenom6', 'email6@example.com', 'seconde'),
(5, 'Nom5', 'Prenom5', 'email5@example.com', 'prepa'),
(4, 'Nom4', 'Prenom4', 'email4@example.com', 'bts'),
(3, 'Nom3', 'Prenom3', 'email3@example.com', 'terminale'),
(2, 'Nom2', 'Prenom2', 'email2@example.com', 'premiere'),
(1, 'Nom1', 'Prenom1', 'email1@example.com', 'seconde'),
(8, 'Nom8', 'Prenom8', 'email8@example.com', 'terminale'),
(9, 'Nom9', 'Prenom9', 'email9@example.com', 'bts'),
(10, 'Nom10', 'Prenom10', 'email10@example.com', 'bts');

-- --------------------------------------------------------

--
-- Structure de la table `etudiants`
--

DROP TABLE IF EXISTS `etudiants`;
CREATE TABLE IF NOT EXISTS `etudiants` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `classe` varchar(255) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `etudiants`
--

INSERT INTO `etudiants` (`id_user`, `email`, `mdp`, `nom`, `prenom`, `classe`) VALUES
(7, 'tomy@hotmail.com', '$2y$12$3czMV6roNOCHOjpX61WvguyTKpRpJCDdn/YFZpJTyPWGt/CWyLddO', 'DACALOR', 'Tomy', 'terminale');

-- --------------------------------------------------------

--
-- Structure de la table `gestionmessage`
--

DROP TABLE IF EXISTS `gestionmessage`;
CREATE TABLE IF NOT EXISTS `gestionmessage` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(3000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `prenom` varchar(3000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `classe` varchar(3000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(3000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `message` varchar(3000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `statuts` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `gestionmessage`
--

INSERT INTO `gestionmessage` (`id`, `nom`, `prenom`, `classe`, `email`, `message`, `statuts`) VALUES
(1, 'jean', 'bom', 'Terminal', 'jeanbom@gmail.com', 'Sed si ille hac tam eximia fortuna propter utilitatem rei publicae frui non properat, ut omnia illa conficiat, quid ego, senator, facere debeo, quem, etiamsi ille aliud vellet, rei publicae consulere oporteret?', 'controleMoi'),
(2, 'lolo', 'miel', 'Seconde', 'lolomiel@gmail.com', 'Cognitis enim pilatorum caesorumque funeribus nemo deinde ad has stationes appulit navem, sed ut Scironis praerupta letalia declinantes litoribus Cypriis contigui navigabant, quae Isauriae scopulis sunt controversa.', 'controleMoi'),
(3, 'fezfe', 'fezfez', 'fezfez', 'fezfez@gmail.com', 'fpejaiifeoinoezinieezbvieozhvu rzvifpejaiifeoinoezinieezbvieozhvu rzvifpejaiifeoinoezinieezbvieozhvurzvifpejaiife oinoezinieezbvieozhvurzvifpejaiifeoinoezinieezbvieozhvurzvifpejaiifeo inoezinieezbvieozhvurzvifpejaiifeoinoezinieezbvieozh vurzvi', 'quarantaine');

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_user` int NOT NULL,
  `id_receiver` int NOT NULL,
  `send_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `message` text NOT NULL,
  `anonyme` binary(1) NOT NULL,
  `statuts` varchar(255) NOT NULL,
  `id_controler` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `id_user`, `id_receiver`, `send_date`, `message`, `anonyme`, `statuts`, `id_controler`) VALUES
(9, 7, 5, '2023-12-17 03:16:10', 'rrrrr', 0x30, 'controleMoi', NULL),
(8, 7, 1, '2023-12-17 03:15:37', 'saluuut', 0x30, 'controleMoi', NULL),
(7, 7, 1, '2023-12-17 02:55:16', 'Bonjour', 0x30, 'controleMoi', NULL),
(10, 7, 10, '2023-12-17 03:16:32', 'ffffff', 0x30, 'controleMoi', NULL),
(11, 7, 6, '2023-12-17 03:18:10', 'test ano', 0x30, 'controleMoi', NULL),
(12, 7, 6, '2023-12-17 03:19:44', 'ffffrzshgdfhgd', 0x30, 'controleMoi', NULL),
(13, 7, 5, '2023-12-17 03:59:06', 'rfffffffffffffffrtrrrrrrrrrrrrrr', 0x30, 'controleMoi', NULL),
(14, 7, 7, '2023-12-17 04:12:58', 'Coucou', 0x30, 'controleMoi', NULL),
(15, 7, 7, '2023-12-17 04:13:42', 'Yooo', 0x30, 'controleMoi', NULL),
(16, 7, 7, '2023-12-17 04:15:37', 'fezkjzjjgbozg', 0x30, 'controleMoi', NULL),
(17, 7, 7, '2023-12-17 06:01:35', 'fizoueuog', 0x31, 'controleMoi', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
