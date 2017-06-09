-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 09 Juin 2017 à 16:29
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `espace_membre`
--

-- --------------------------------------------------------

--
-- Structure de la table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomExp` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prenomExp` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contenuMes` text COLLATE utf8_unicode_ci NOT NULL,
  `dateMes` datetime NOT NULL,
  `avatarMes` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `attributExp` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `chat`
--

INSERT INTO `chat` (`id`, `nomExp`, `prenomExp`, `contenuMes`, `dateMes`, `avatarMes`, `attributExp`) VALUES
(24, 'Weber', 'Jonathan', 'ergerzgrg', '2017-06-09 14:32:35', '14.png', 'Professeur'),
(25, 'BÃ©nard', 'Antoine', 'coucou tout le monde\r\n', '2017-06-09 15:05:13', 'default.jpg', 'Etudiant'),
(26, 'BÃ©nard', 'Antoine', 'efzfze\r\n', '2017-06-09 15:20:14', 'default.jpg', 'Etudiant'),
(27, 'BÃ©nard', 'Antoine', 'azdadza', '2017-06-09 15:20:20', 'default.jpg', 'Etudiant'),
(28, 'BÃ©nard', 'Antoine', 'dadazd', '2017-06-09 15:20:25', 'default.jpg', 'Etudiant'),
(29, 'BÃ©nard', 'Antoine', 'dazda', '2017-06-09 15:20:34', 'default.jpg', 'Etudiant'),
(30, 'Perles', 'Thomas', 'Bandes de salauds', '2017-06-09 15:56:40', 'default.jpg', 'Etudiant'),
(31, 'Perles', 'Thomas', 'Bandes de putes', '2017-06-09 15:58:23', '18.jpg', 'Etudiant'),
(32, 'BÃ©nard', 'Antoine', 'Wesh les nazes', '2017-06-09 16:21:35', 'default.jpg', 'Etudiant');

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

CREATE TABLE `membres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `motdepasse` text COLLATE utf8_unicode_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `genre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `specialite` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `attribut` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parcours` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `membres`
--

INSERT INTO `membres` (`id`, `mail`, `motdepasse`, `nom`, `prenom`, `date`, `genre`, `avatar`, `specialite`, `attribut`, `parcours`) VALUES
(14, 'jonathan.weber@uha.fr', '3692bfa45759a67d83aedf0045f6cb635a966abf', 'Weber', 'Jonathan', '2017-04-07', 'Homme', '14.png', 'Autre', 'Professeur', ''),
(15, 'francois@uha.fr', '5187da0b934cc25eb2201a3ec9206c24b13cb23b', 'Straebler', 'FranÃ§ois', '2017-06-01', 'Homme', 'default.jpg', 'Informatique &amp; RÃ©seaux', 'Etudiant', ''),
(16, 'jacky@uha.fr', '64366715a186eea098dd2391f69c1afda4507574', 'Tuning', 'Jacky', '2017-06-02', 'Homme', 'default.jpg', 'Automatiques et SystÃ¨mes embarquÃ©s', 'Etudiant', ''),
(17, 'antoine.benard@uha.fr', '9359a4d812173b65a3a0094cd86363e79731a3c2', 'BÃ©nard', 'Antoine', '2017-06-01', 'Homme', '17.gif', 'Automatiques et SystÃ¨mes embarquÃ©s', 'Etudiant', 'formation'),
(18, 'thomas.perles@uha.fr', '5f50a84c1fa3bcff146405017f36aec1a10a9e38', 'Perles', 'Thomas', '1995-05-28', 'Homme', '18.jpg', 'Informatique &amp; RÃ©seaux', 'Etudiant', 'Oui\r\neuhhhhhhhhh\r\nNon mais c\'est horrible je ne sais pas quoi dire');

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_expediteur` int(11) NOT NULL,
  `id_destinataire` int(11) NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `lu` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Contenu de la table `messages`
--

INSERT INTO `messages` (`id`, `id_expediteur`, `id_destinataire`, `message`, `lu`) VALUES
(11, 17, 16, 'coucou jacky\r\n', 0),
(12, 17, 16, 'earzarter', 0);

-- --------------------------------------------------------

--
-- Structure de la table `recuperation`
--

CREATE TABLE `recuperation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` int(11) NOT NULL,
  `confirme` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `recuperation`
--

INSERT INTO `recuperation` (`id`, `mail`, `code`, `confirme`) VALUES
(1, 'antoine.benard@uha.fr', 94992485, 0);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `chat`
--

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
