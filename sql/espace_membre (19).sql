-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 12 Juin 2017 à 11:23
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
-- Structure de la table `actu`
--

CREATE TABLE `actu` (
  `id` int(11) NOT NULL,
  `auteur` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contenu` text COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fichier` text COLLATE utf8_unicode_ci NOT NULL,
  `typefichier` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `stockage` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nbLike` int(11) NOT NULL,
  `nbDislike` int(11) NOT NULL,
  `avatarActu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `attributActu` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `actu`
--

INSERT INTO `actu` (`id`, `auteur`, `contenu`, `date`, `type`, `fichier`, `typefichier`, `stockage`, `nbLike`, `nbDislike`, `avatarActu`, `attributActu`) VALUES
(1, '', '', '0000-00-00 00:00:00', '', '', '', '', 5, 3, '', ''),
(2, '', '', '0000-00-00 00:00:00', 'annonce', '', '', '', 1, 5, '', ''),
(3, '', '', '0000-00-00 00:00:00', 'annonce', '', '', '', 1, 5, '', ''),
(4, '', '', '0000-00-00 00:00:00', '', '', '', '', 1, 1, '', '');

-- --------------------------------------------------------

--
-- Structure de la table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `nomExp` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prenomExp` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contenuMes` text COLLATE utf8_unicode_ci NOT NULL,
  `dateMes` datetime NOT NULL,
  `avatarMes` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `attributExp` varchar(255) COLLATE utf8_unicode_ci NOT NULL
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
(33, 'BÃ©nard', 'Antoine', 'Wesh les nazes', '2017-06-09 16:39:52', 'default.jpg', 'Etudiant'),
(35, 'BÃ©nard', 'Antoine', 'Dab\r\n', '2017-06-09 22:56:23', '17.gif', 'Etudiant'),
(36, 'BÃ©nard', 'Antoine', 'Ã§a marche ?', '2017-06-11 10:35:14', '17.gif', 'Etudiant'),
(37, 'Weber', 'Jonathan', 'Bonsoir', '2017-06-11 18:30:47', '14.png', 'Professeur'),
(38, 'Muche', 'Chloé', 'Coucou tout le monde', '2017-06-11 22:02:26', 'default.jpg', 'Etudiant'),
(39, 'Muche', 'Chloé', 'Coucou tout le monde', '2017-06-11 22:03:08', 'default.jpg', 'Etudiant');

-- --------------------------------------------------------

--
-- Structure de la table `clubs`
--

CREATE TABLE `clubs` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `photo` text COLLATE utf8_unicode_ci NOT NULL,
  `membres` int(11) NOT NULL,
  `president` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `realisation` text COLLATE utf8_unicode_ci NOT NULL,
  `evenements` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `clubs`
--

INSERT INTO `clubs` (`id`, `nom`, `description`, `photo`, `membres`, `president`, `realisation`, `evenements`) VALUES
(1, 'XID', 'Club info', '8.png', 1, 'test', 'zrze', 'zrzrtet'),
(2, 'JDR', 'Jeux de rôles', '', 1, 'Georges', 'rzqefqz', 'zefzef'),
(3, 'Rototo', 'uzrghurege', '1.jpg', 10, 'azrt', 'zefz', 'zef');

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

CREATE TABLE `membres` (
  `id` int(11) NOT NULL,
  `mail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `motdepasse` text COLLATE utf8_unicode_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `genre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `specialite` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `attribut` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parcours` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `membres`
--

INSERT INTO `membres` (`id`, `mail`, `motdepasse`, `nom`, `prenom`, `date`, `genre`, `avatar`, `specialite`, `attribut`, `parcours`) VALUES
(14, 'jonathan.weber@uha.fr', '3692bfa45759a67d83aedf0045f6cb635a966abf', 'Weber', 'Jonathan', '2017-04-07', 'Homme', '14.png', 'Autre', 'Professeur', ''),
(15, 'francois@uha.fr', '5187da0b934cc25eb2201a3ec9206c24b13cb23b', 'Straebler', 'FranÃ§ois', '2017-06-01', 'Homme', 'default.jpg', 'Informatique &amp; RÃ©seaux', 'Etudiant', ''),
(16, 'jacky@uha.fr', '64366715a186eea098dd2391f69c1afda4507574', 'Tuning', 'Jacky', '2017-06-02', 'Homme', 'default.jpg', 'Automatiques et SystÃ¨mes embarquÃ©s', 'Etudiant', ''),
(17, 'antoine.benard@uha.fr', '9359a4d812173b65a3a0094cd86363e79731a3c2', 'BÃ©nard', 'Antoine', '2017-06-01', 'Homme', '17.gif', 'Automatiques et SystÃ¨mes embarquÃ©s', 'Etudiant', 'formation'),
(18, 'thomas.perles@uha.fr', '5f50a84c1fa3bcff146405017f36aec1a10a9e38', 'Perles', 'Thomas', '1995-05-28', 'Homme', '18.jpg', 'Informatique &amp; RÃ©seaux', 'Etudiant', 'Oui\r\neuhhhhhhhhh\r\nNon mais c\'est horrible je ne sais pas quoi dire'),
(19, 'maurice@uha.fr', '24277830380c5c09879ce097f55c321e948d995a', 'Test', 'Maurice', '2017-06-07', 'Homme', '19.png', 'Autre', 'Etudiant', ''),
(20, 'chloe@uha.fr', '7785db84585b09fc9bc5e7e763fca1095488c446', 'Muche', 'ChloÃ©', '2017-03-29', 'Femme', '20.png', 'Textile &amp; Fibres', 'Etudiant', '');

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `id_expediteur` int(11) NOT NULL,
  `id_destinataire` int(11) NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `lu` int(11) NOT NULL,
  `dateEnvoi` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Contenu de la table `messages`
--

INSERT INTO `messages` (`id`, `id_expediteur`, `id_destinataire`, `message`, `lu`, `dateEnvoi`) VALUES
(11, 17, 16, 'coucou jacky\r\n', 1, '0000-00-00 00:00:00'),
(12, 17, 16, 'earzarter', 1, '0000-00-00 00:00:00'),
(13, 17, 16, 'prout ahah', 1, '0000-00-00 00:00:00'),
(14, 16, 17, 'prout', 1, '2017-06-10 14:23:44'),
(16, 18, 17, 'Coucou t\'es pas beau !', 1, '2017-06-11 14:05:37'),
(17, 17, 17, 'coucou', 1, '2017-06-11 18:16:13'),
(18, 17, 14, 'Bonsoir monsieur', 0, '2017-06-11 18:27:07'),
(19, 17, 14, 'test 2', 1, '2017-06-11 18:29:48'),
(20, 14, 17, 'Sale gosse !', 1, '2017-06-11 18:30:20'),
(21, 17, 16, 'Cool merci pour le message !', 0, '2017-06-11 18:35:15'),
(22, 20, 16, 'zeifru', 0, '2017-06-11 22:03:31'),
(23, 17, 17, 'rargaeg', 1, '2017-06-11 23:55:05'),
(24, 17, 17, 'zefzef', 1, '2017-06-11 23:55:50'),
(26, 17, 17, 'tezrgerge', 0, '2017-06-12 11:19:39');

-- --------------------------------------------------------

--
-- Structure de la table `recuperation`
--

CREATE TABLE `recuperation` (
  `id` int(11) NOT NULL,
  `mail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` int(11) NOT NULL,
  `confirme` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `recuperation`
--

INSERT INTO `recuperation` (`id`, `mail`, `code`, `confirme`) VALUES
(1, 'antoine.benard@uha.fr', 73432803, 0);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `actu`
--
ALTER TABLE `actu`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `clubs`
--
ALTER TABLE `clubs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `membres`
--
ALTER TABLE `membres`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `recuperation`
--
ALTER TABLE `recuperation`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `actu`
--
ALTER TABLE `actu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT pour la table `clubs`
--
ALTER TABLE `clubs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `membres`
--
ALTER TABLE `membres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT pour la table `recuperation`
--
ALTER TABLE `recuperation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
