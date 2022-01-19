-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Ven 10 Mars 2017 à 18:55
-- Version du serveur: 5.6.12-log
-- Version de PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `cinedechdimitrio`
--
CREATE DATABASE IF NOT EXISTS `cinedechdimitrio` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `cinedechdimitrio`;

-- --------------------------------------------------------

--
-- Structure de la table `concerner`
--

CREATE TABLE IF NOT EXISTS `concerner` (
  `nofilm` int(11) NOT NULL,
  `nogenre` int(11) NOT NULL,
  PRIMARY KEY (`nofilm`,`nogenre`),
  KEY `nogenre` (`nogenre`),
  KEY `nofilm` (`nofilm`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `concerner`
--

INSERT INTO `concerner` (`nofilm`, `nogenre`) VALUES
(6, 51),
(6, 56),
(7, 57),
(5, 72),
(7, 72),
(6, 78),
(7, 83),
(5, 90),
(1, 91),
(1, 104),
(2, 104),
(3, 104);

-- --------------------------------------------------------

--
-- Structure de la table `film`
--

CREATE TABLE IF NOT EXISTS `film` (
  `nofilm` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(100) NOT NULL,
  `realisateurs` varchar(255) NOT NULL,
  `acteurs` varchar(255) NOT NULL,
  `duree` varchar(10) NOT NULL,
  `synopsis` text NOT NULL,
  `infofilm` text NOT NULL,
  `imgaffiche` varchar(100) NOT NULL,
  `nopublic` int(11) NOT NULL,
  PRIMARY KEY (`nofilm`),
  KEY `nopublic` (`nopublic`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `film`
--

INSERT INTO `film` (`nofilm`, `titre`, `realisateurs`, `acteurs`, `duree`, `synopsis`, `infofilm`, `imgaffiche`, `nopublic`) VALUES
(1, 'Les Griffes de la nuit', 'Wes Craven', 'John Saxon', '1h31', 'Nancy est une jeune adolescente qui fait régulièrement des cauchemars sur un homme au visage brûlé, avec un vieux pull déchiré et cinq lames tranchantes à la place des doigts. Elle constate d''ailleurs que parmi ses amis, elle n''est pas la seule à faire ces mauvais rêves. Mais bientôt, l''un d''entre eux est sauvagement assassiné pendant son sommeil. C''est ainsi que le groupe fait la connaissance de l''ignoble Freddy Krueger, qui se sert des cauchemars pour assassiner les gens qui rêvent de lui. Nancy comprend qu''elle n''a plus qu''une seule solution : si elle veut rester en vie, elle doit rester éveillée...', 'Aucune information spécifique.', 'http://fr.web.img6.acsta.net/medias/nmedia/18/36/12/86/18454850.jpg', 12),
(2, 'Vendredi 13', 'Sean S. Cunningham', 'Betsy Palmer', '1h36', 'En 1957, un jeune garçon, prénommé Jason, meurt noyé au camp de Crystal Lake. L''année suivante, les deux responsables du camp sont tués. Crystal Lake ferme. Mais en 1980, Steve Christy décide de le rouvrir un vendredi 13, jour anniversaire des décès survenus vingt-trois ans auparavant. Lors de la préparation du camp pour son ouverture, les moniteurs du centre disparaissent les uns après les autres pendant la nuit…', 'Aucune information spécifique.', 'http://fr.web.img5.acsta.net/medias/nmedia/18/65/68/05/18956937.jpg', 15),
(3, 'L''exorciste', 'William Friedkin', 'Linda Blair', '2h02', 'En Irak, le Père Merrin est profondément troublé par la découverte d''une figurine du démon Pazuzu et les visions macabres qui s''ensuivent.\r\nParallèlement, à Washington, la maison de l''actrice Chris MacNeil est troublée par des phénomènes étranges : celle-ci est réveillée par des grattements mystérieux provenant du grenier, tandis que sa fille Regan se plaint que son lit bouge.\r\nQuelques jours plus tard, une réception organisée par Chris est troublée par l''arrivée de Regan, qui profère des menaces de mort à l''encontre du réalisateur Burke Dennings. Les crises se font de plus en plus fréquentes. En proie à des spasmes violents, l''adolescente devient méconnaissable.\r\nChris fait appel à un exorciste. L''Eglise autorise le Père Damien Karras à officier en compagnie du Père Merrin. Une dramatique épreuve de force s''engage alors pour libérer Regan.', 'Version intégrale.', 'http://fr.web.img5.acsta.net/medias/nmedia/18/65/19/82/18835952.jpg', 12),
(5, 'Titanic', 'James Cameron', 'Leonardo DiCaprio', '3h14', 'Southampton, 10 avril 1912. Le paquebot le plus grand et le plus moderne du monde, réputé pour son insubmersibilité, le "Titanic", appareille pour son premier voyage. Quatre jours plus tard, il heurte un iceberg. A son bord, un artiste pauvre et une grande bourgeoise tombent amoureux.', 'Aucune information spécifique.', 'http://art.and.facts.site.free.fr/Site/coursimg/images/titanic.jpg', 10),
(6, 'Le seigneur des anneaux : Le retour du roi', 'Peter Jackson', 'Elijah Wood', '3h20', 'Les armées de Sauron ont attaqué Minas Tirith, la capitale de Gondor. Jamais ce royaume autrefois puissant n''a eu autant besoin de son roi. Mais Aragorn trouvera-t-il en lui la volonté d''accomplir sa destinée ?\r\nTandis que Gandalf s''efforce de soutenir les forces brisées de Gondor, Théoden exhorte les guerriers de Rohan à se joindre au combat. Mais malgré leur courage et leur loyauté, les forces des Hommes ne sont pas de taille à lutter contre les innombrables légions d''ennemis qui s''abattent sur le royaume...\r\nChaque victoire se paye d''immenses sacrifices. Malgré ses pertes, la Communauté se jette dans la bataille pour la vie, ses membres faisant tout pour détourner l''attention de Sauron afin de donner à Frodon une chance d''accomplir sa quête.\r\nVoyageant à travers les terres ennemies, ce dernier doit se reposer sur Sam et Gollum, tandis que l''Anneau continue de le tenter...', 'Aucune information spécifique.', 'http://fr.web.img6.acsta.net/medias/nmedia/00/02/54/95/affiche2.jpg', 10),
(7, 'Invictus', 'Clint Eastwood', 'Morgan Freeman', '2h12', 'En 1994, l''élection de Nelson Mandela consacre la fin de l''Apartheid, mais l''Afrique du Sud reste une nation profondément divisée sur le plan racial et économique. Pour unifier le pays et donner à chaque citoyen un motif de fierté, Mandela mise sur le sport, et fait cause commune avec le capitaine de la modeste équipe de rugby sud-africaine. Leur pari : se présenter au Championnat du Monde 1995...', 'Aucune information spécifique.', 'http://fr.web.img3.acsta.net/medias/nmedia/18/72/82/16/19187639.jpg', 10);

-- --------------------------------------------------------

--
-- Structure de la table `genre`
--

CREATE TABLE IF NOT EXISTS `genre` (
  `nogenre` int(11) NOT NULL AUTO_INCREMENT,
  `libgenre` varchar(30) NOT NULL,
  PRIMARY KEY (`nogenre`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=105 ;

--
-- Contenu de la table `genre`
--

INSERT INTO `genre` (`nogenre`, `libgenre`) VALUES
(51, 'Action'),
(52, 'Animation'),
(53, 'Arts Martiaux'),
(56, 'Aventure'),
(57, 'Biopic'),
(58, 'Bollywood'),
(59, 'Classique'),
(60, 'Comédie'),
(61, 'Comédie dramatique'),
(62, 'Comédie musicale'),
(63, 'Concert'),
(64, 'Dessin animé'),
(65, 'Divers'),
(70, 'Documentaire'),
(71, 'Drama'),
(72, 'Drame'),
(73, 'Epouvante-horreur'),
(74, 'Erotique'),
(75, 'Espionnage'),
(76, 'Expérimental'),
(77, 'Famille'),
(78, 'Fantastique'),
(79, 'Guerre'),
(83, 'Historique'),
(84, 'Judiciaire'),
(85, 'Movie night'),
(86, 'Musical'),
(87, 'Opera'),
(88, 'Péplum'),
(89, 'Policier'),
(90, 'Romance'),
(91, 'Science fiction'),
(92, 'Show'),
(99, 'Sport event'),
(100, 'Thriller'),
(102, 'Western'),
(104, 'Horreur');

-- --------------------------------------------------------

--
-- Structure de la table `projection`
--

CREATE TABLE IF NOT EXISTS `projection` (
  `noproj` int(11) NOT NULL AUTO_INCREMENT,
  `dateproj` date NOT NULL,
  `heureproj` time DEFAULT NULL,
  `infoproj` varchar(50) DEFAULT NULL,
  `nosalle` varchar(1) NOT NULL,
  `nofilm` int(11) NOT NULL,
  PRIMARY KEY (`noproj`),
  KEY `nosalle` (`nosalle`),
  KEY `nofilm` (`nofilm`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `projection`
--

INSERT INTO `projection` (`noproj`, `dateproj`, `heureproj`, `infoproj`, `nosalle`, `nofilm`) VALUES
(2, '2017-03-10', '15:30:00', 'Aucune information spécifique.', 'B', 1),
(4, '2017-03-10', '20:00:00', 'Aucune information spécifique.', 'J', 3),
(5, '2017-03-10', '18:00:00', 'Aucune information spécifique', 'N', 2),
(6, '2017-01-23', '21:00:00', 'Aucune information spécifique.', 'G', 5),
(7, '2017-03-14', '20:00:00', 'Aucune information spécifique.', 'K', 5),
(8, '2017-03-11', '12:00:00', 'Aucune information spécifique.', 'A', 7),
(9, '2017-03-12', '15:00:00', 'Aucune information spécifique.', 'M', 6);

-- --------------------------------------------------------

--
-- Structure de la table `public`
--

CREATE TABLE IF NOT EXISTS `public` (
  `nopublic` int(11) NOT NULL AUTO_INCREMENT,
  `libpublic` varchar(50) NOT NULL,
  PRIMARY KEY (`nopublic`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Contenu de la table `public`
--

INSERT INTO `public` (`nopublic`, `libpublic`) VALUES
(10, 'Tous publics'),
(11, 'Tous publics avec Avertissement'),
(12, 'Interdit au moins de 12 ans'),
(13, 'Interdit aux moins de 12 ans avec Avertissement'),
(15, 'Interdit aux moins de 16 ans'),
(16, 'Interdit aux moins de 16 ans avec Avertissement'),
(20, 'Interdit aux moins de 18 ans');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE IF NOT EXISTS `reservation` (
  `noresa` int(11) NOT NULL AUTO_INCREMENT,
  `mdpresa` varchar(30) NOT NULL,
  `dateresa` date NOT NULL,
  `nomclient` varchar(30) NOT NULL,
  `nbplacesresa` int(3) DEFAULT NULL,
  `noproj` int(11) NOT NULL,
  PRIMARY KEY (`noresa`),
  KEY `noproj` (`noproj`),
  KEY `noproj_2` (`noproj`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `salle`
--

CREATE TABLE IF NOT EXISTS `salle` (
  `nosalle` varchar(1) NOT NULL,
  `nbplaces` int(11) NOT NULL,
  PRIMARY KEY (`nosalle`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `salle`
--

INSERT INTO `salle` (`nosalle`, `nbplaces`) VALUES
('A', 400),
('B', 400),
('C', 400),
('D', 300),
('E', 300),
('F', 300),
('G', 200),
('H', 200),
('I', 100),
('J', 100),
('K', 100),
('L', 400),
('M', 400),
('N', 450);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `concerner`
--
ALTER TABLE `concerner`
  ADD CONSTRAINT `film_numero_3` FOREIGN KEY (`nofilm`) REFERENCES `film` (`nofilm`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `genre_numero_1` FOREIGN KEY (`nogenre`) REFERENCES `genre` (`nogenre`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `film`
--
ALTER TABLE `film`
  ADD CONSTRAINT `adapter` FOREIGN KEY (`nopublic`) REFERENCES `public` (`nopublic`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `projection`
--
ALTER TABLE `projection`
  ADD CONSTRAINT `avoirlieu` FOREIGN KEY (`nosalle`) REFERENCES `salle` (`nosalle`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `projeter` FOREIGN KEY (`nofilm`) REFERENCES `film` (`nofilm`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reserver` FOREIGN KEY (`noproj`) REFERENCES `projection` (`noproj`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
