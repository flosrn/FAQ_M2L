-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 07 Mai 2015 à 01:15
-- Version du serveur :  5.6.15-log
-- Version de PHP :  5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `m2l v2.0`
--

-- --------------------------------------------------------

--
-- Structure de la table `faq`
--

CREATE TABLE IF NOT EXISTS `faq` (
  `id_faq` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(400) NOT NULL,
  `reponse` varchar(400) NOT NULL,
  `dat_question` datetime NOT NULL,
  `dat_reponse` datetime NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_faq`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Contenu de la table `faq`
--

INSERT INTO `faq` (`id_faq`, `question`, `reponse`, `dat_question`, `dat_reponse`, `id_user`) VALUES
(1, 'Bonjour !', 'Bonsoir', '2015-05-06 18:59:13', '0000-00-00 00:00:00', 1),
(2, 'Pourquoi ?', 'Parce que.', '2015-05-06 19:22:14', '0000-00-00 00:00:00', 1),
(3, 'Tu es sur ?', 'Certain.', '2015-05-06 19:40:18', '0000-00-00 00:00:00', 1),
(4, 'Tu n''as pas peur ?', 'Non.', '2015-05-06 19:40:41', '0000-00-00 00:00:00', 1),
(5, 'Tu devrais !', 'Pourquoi ?', '2015-05-06 19:43:28', '0000-00-00 00:00:00', 1),
(6, 'Parce que.', 'Ok.', '2015-05-06 19:43:38', '0000-00-00 00:00:00', 1),
(7, 'Pilule rouge ou pilule bleu ?', 'Je ne sais pas.', '2015-05-06 19:44:13', '0000-00-00 00:00:00', 1),
(8, 'Tu prends la pilule bleue, l’histoire s’arrête là, tu te réveilles dans ton lit, et tu crois ce que tu veux. Tu prends la pilule rouge, tu restes au Pays des Merveilles et je te montre jusqu’où va le terrier.', 'Pilule rouge !', '2015-05-06 19:44:41', '0000-00-00 00:00:00', 1),
(9, 'Pourquoi j''ai mal aux yeux ?', 'Tu vois clair pour la première fois.', '2015-05-06 19:46:34', '0000-00-00 00:00:00', 1),
(10, 'Cool, et maintenant ?', 'Maintenant, rêve.', '2015-05-06 19:50:53', '0000-00-00 00:00:00', 1),
(11, 'Quel est le parasite le plus résistant : une bactérie, un virus, un ver intestinal ?', ' ... Une idée.', '2015-05-06 19:51:10', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Structure de la table `ligue`
--

CREATE TABLE IF NOT EXISTS `ligue` (
  `id_ligue` int(11) NOT NULL AUTO_INCREMENT,
  `lib_ligue` varchar(50) NOT NULL,
  PRIMARY KEY (`id_ligue`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `ligue`
--

INSERT INTO `ligue` (`id_ligue`, `lib_ligue`) VALUES
(1, 'ligue d''escrime'),
(2, 'ligue de badminton'),
(3, 'ligue de volley-ball'),
(4, 'ligue de snowboard');

-- --------------------------------------------------------

--
-- Structure de la table `statistiques`
--

CREATE TABLE IF NOT EXISTS `statistiques` (
  `id` int(250) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `page` varchar(250) NOT NULL,
  `ip` varchar(15) NOT NULL,
  `host` varchar(60) NOT NULL,
  `navigateur` varchar(100) NOT NULL,
  `location` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Contenu de la table `statistiques`
--

INSERT INTO `statistiques` (`id`, `date`, `page`, `ip`, `host`, `navigateur`, `location`) VALUES
(1, '2015-05-06 18:21:14', '/Projets/m2l v2.0 - Copie/index.php', '127.0.0.1', 'PC-Flo', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.135 Safa', 'http://127.0.0.1/Projets/'),
(2, '2015-05-06 18:21:48', '/Projets/m2l v2.0 - Copie/index.php', '127.0.0.1', 'PC-Flo', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.135 Safa', 'http://127.0.0.1/Projets/'),
(3, '2015-05-06 18:25:39', '/Projets/m2l v2.0 - Copie/index.php', '127.0.0.1', 'PC-Flo', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.135 Safa', 'http://127.0.0.1/Projets/'),
(4, '2015-05-06 18:26:05', '/Projets/m2l v2.0 - Copie/index.php', '127.0.0.1', 'PC-Flo', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.135 Safa', 'http://127.0.0.1/Projets/'),
(5, '2015-05-06 18:27:06', '/Projets/m2l v2.0 - Copie/index.php', '127.0.0.1', 'PC-Flo', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.135 Safa', 'http://127.0.0.1/Projets/'),
(6, '2015-05-06 18:27:46', '/Projets/m2l v2.0 - Copie/index.php', '127.0.0.1', 'PC-Flo', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.135 Safa', 'http://127.0.0.1/Projets/'),
(7, '2015-05-06 18:27:53', '/Projets/m2l v2.0 - Copie/index.php', '127.0.0.1', 'PC-Flo', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.135 Safa', 'http://127.0.0.1/Projets/'),
(8, '2015-05-06 18:29:08', '/Projets/m2l v2.0 - Copie/index.php', '127.0.0.1', 'PC-Flo', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.135 Safa', 'http://127.0.0.1/Projets/'),
(9, '2015-05-06 18:29:16', '/Projets/m2l v2.0 - Copie/index.php', '127.0.0.1', 'PC-Flo', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.135 Safa', 'http://127.0.0.1/Projets/m2l%20v2.0%20-%20Copie/'),
(10, '2015-05-06 18:29:18', '/Projets/m2l v2.0 - Copie/index.php', '127.0.0.1', 'PC-Flo', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.135 Safa', 'http://127.0.0.1/Projets/m2l%20v2.0%20-%20Copie/'),
(11, '2015-05-07 01:05:13', '/Projets/M2L/m2l_v2.1_debut_stats/index.php', '127.0.0.1', 'PC-Flo', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.135 Safa', 'http://127.0.0.1/Projets/M2L/');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mail` varchar(75) NOT NULL,
  `id_ligue` int(11) DEFAULT NULL,
  `id_usertype` int(11) NOT NULL,
  PRIMARY KEY (`id_user`),
  KEY `id_spe` (`id_ligue`,`id_usertype`),
  KEY `id_usertype` (`id_usertype`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id_user`, `pseudo`, `password`, `mail`, `id_ligue`, `id_usertype`) VALUES
(1, 'Keyser Soze', 'floflo', 'florian.seran@gmail.com', 1, 2),
(6, 'Maver1ck31', 'stssio!', 'william.henry@me.com', 1, 2),
(13, 'test', 'test', 'test@m2l.com', 1, 1),
(14, 'Frodon', '$2y$10$UZ83rtobOgEPAXIdTBDzHOXcgimEnsPysYYCJqe96b2qaheipdByi', '@m2l.com', 3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `usertype`
--

CREATE TABLE IF NOT EXISTS `usertype` (
  `id_usertype` int(11) NOT NULL AUTO_INCREMENT,
  `lib_usertype` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  PRIMARY KEY (`id_usertype`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `usertype`
--

INSERT INTO `usertype` (`id_usertype`, `lib_usertype`, `description`) VALUES
(1, 'utilisateur', 'Utilisateur de la base'),
(2, 'admin', 'Administrateur de la ligue'),
(3, 'superadmin ', 'Administrateur de toutes les ligues');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_ligue` FOREIGN KEY (`id_ligue`) REFERENCES `ligue` (`id_ligue`),
  ADD CONSTRAINT `FK_usertype` FOREIGN KEY (`id_usertype`) REFERENCES `usertype` (`id_usertype`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
