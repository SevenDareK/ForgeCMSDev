-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 09 Décembre 2014 à 19:42
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `forgecms`
--

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `subject` varchar(50) NOT NULL,
  `content` varchar(255) NOT NULL,
  `news_id` int(4) NOT NULL,
  `hours` varchar(255) NOT NULL,
  `datec` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `stat` int(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `content` varchar(8000) NOT NULL,
  `author` varchar(255) NOT NULL,
  `hours` varchar(5) NOT NULL,
  `daten` varchar(255) NOT NULL,
  `feat_img` varchar(255) NOT NULL,
  `stat` int(11) NOT NULL DEFAULT '1',
  `com` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `page`
--

CREATE TABLE IF NOT EXISTS `page` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;


INSERT INTO `page` (`id`, `content`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam blandit turpis nec diam porta scelerisque. Duis ac urna ut nunc mollis malesuada in et massa. Nam in finibus mi. Morbi ornare et lorem ut faucibus. Pellentesque suscipit eleifend massa, nec ultricies mauris ullamcorper id. Nulla lobortis imperdiet purus, non aliquet tortor hendrerit nec. Proin tempus et libero nec malesuada. Sed vel lorem sollicitudin, sagittis nisi tempor, placerat dolor. Mauris laoreet dapibus metus, vitae molestie urna lacinia sit amet. Ut eleifend dui nec massa vehicula, eget rutrum purus pulvinar. Quisque commodo dignissim porttitor. Quisque bibendum at justo ac laoreet. Fusce nulla diam, lobortis vitae placerat non, ullamcorper viverra ipsum. Suspendisse blandit pellentesque tellus, sit amet feugiat purus dictum nec.');

-- --------------------------------------------------------

--
-- Structure de la table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `site_name` varchar(50) NOT NULL,
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `slogan` varchar(255) NOT NULL,
  `descr` varchar(400) NOT NULL,
  `url` varchar(255) NOT NULL,
  `fav` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) CHARACTER SET utf8 NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `sexe` varchar(1) NOT NULL,
  `birth_d` varchar(2) NOT NULL,
  `birth_m` varchar(2) NOT NULL,
  `birth_y` varchar(4) NOT NULL,
  `bio` varchar(255) NOT NULL,
  `rang` int(11) NOT NULL DEFAULT '1',
  `date` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `googleplus` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `profil` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `widget`
--

CREATE TABLE IF NOT EXISTS `widget` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
