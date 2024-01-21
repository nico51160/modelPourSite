-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 14 jan. 2020 à 17:00
-- Version du serveur :  5.7.17
-- Version de PHP :  7.1.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `apirest`
--

-- --------------------------------------------------------

--
-- Structure de la table `tuto`
--

CREATE TABLE `tuto` (
  `tutoID` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tuto`
--

INSERT INTO `tuto` (`tutoID`, `titre`, `description`, `url`) VALUES
(1, 'Bundle : J\'apprends à utiliser Flexbox', 'Ce bundle de plus de 4 heures va vous donner l\'intégralité des connaissances des Flexbox.<br /><br />Flexbox est une technique officielle du CSS3 dont le rôle principale est de permettre de réaliser des mises en page de site internet de façon extrêmement simple, rapide et surtout très efficace ! Terminé le temps où l\'on s\'arracher les cheveux en utilisant des propriétés CSS telles que les FLOAT pour effectuer des miss en pages parfois hasardeuses.', 'https://fr.tuto.com/css/bundle-tout-sur-flexbox-css-css,102611.html'),
(2, 'Bundle : J\'apprends l\'architecture MVC', 'Dans ce bundle de formations, je vous propose d\'apprendre le Graal du développeur PHP : la maîtrise de l\'architecture MVC en programmation orientée objet.<br /><br />Il s\'agit ici dune formation vidéo de haut niveau !<br /><br />113 vidéos pour plus de 8 heures de formation intensive sont au programme.', 'https://fr.tuto.com/php/bundle-apprendre-a-monter-une-architecture-mvc-complete-en-php-oriente-objet-php,134181.html'),
(3, 'Bundle : J\'apprends à programmer en PHP', 'Ce Bundle réunit les 10 formations réalisées en exclusivité sur Tuto.com et qui s\'intitulent \"J\'apprends à programmer en PHP\" du niveau 1 au niveau 10.<br /><br />Cette formation 100% en ligne s\'étale donc sur 10 niveaux. Elle vous permettra d\'apprendre le PHP progressivement et à votre rythme.<br /><br />Au total la formation réunit plus de 16h00 de cours en vidéo !', 'https://fr.tuto.com/php/bundle-j-apprends-a-programmer-en-php-php,116841.html'),
(4, 'Bundle : J\'apprends la POO avec MySQL', 'Ce bundle constitué de 3 tutos est entièrement dédiés à l\'apprentissage de la Programmation Orientée Objet en PHP côté dynamique et interactif.<br /><br />C\'est à dire la POO en lien avec un base de données (ici la base de données sera MySQL)', 'https://fr.tuto.com/php/bundle-poo-programmation-orientee-objet-en-php-avec-mysql-php,124671.html'),
(5, 'Bundle : J\'apprends la POO en Php', 'Bienvenue sur ce bundle d\'une durée de 17h30 et plus de 180 vidéos consacrées à l\'apprentissage de la Programmation Orientée Objet en PHP !<br /><br />Ce Bundle s\'adresse à celles et ceux qui souhaitent apprendre à coder en POO. Je précise que la Programmation Orientée Objet n\'est pas un nouveau langage de programmation, mais uniquement un concept de programmation.', 'https://fr.tuto.com/php/bundle-poo-programmation-orientee-objet-en-php-php,122311.html'),
(6, 'Bundle : J\'apprends les expressions régulières', 'Ce bundle très complet sur les \"REGEX\" vous donnera les compétences nécessaires et indispensables pour la recherche et l\'identification certaine de morceaux de chaîne au sein d\'une chaîne de caractères.<br /><br />Enfin, je précise que le langage utilisé pour accompagner les démos sur les différentes techniques des REGEX sera le langage PHP.', 'https://fr.tuto.com/php/bundle-tout-savoir-sur-les-expressions-regulieres-php,107231.html');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `tuto`
--
ALTER TABLE `tuto`
  ADD PRIMARY KEY (`tutoID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `tuto`
--
ALTER TABLE `tuto`
  MODIFY `tutoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
