-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Jeu 01 Décembre 2022 à 21:26
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `grpb5`
--
CREATE DATABASE IF NOT EXISTS `grpb5` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `grpb5`;

-- --------------------------------------------------------

--
-- Structure de la table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `img_carousel` varchar(100) CHARACTER SET utf8 NOT NULL,
  `img_pres` varchar(100) CHARACTER SET utf8 NOT NULL,
  `title` varchar(50) CHARACTER SET utf8 NOT NULL,
  `description` varchar(1000) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `projects`
--

INSERT INTO `projects` (`id`, `id_user`, `img_carousel`, `img_pres`, `title`, `description`) VALUES
(1, 4, 'upload/pacman-01.jpg', 'upload/pacman-02.jpg', 'Projet Pac Man', 'Ce projet était un travail en solo, où l\'objectif était de créer un jeu vidéo en 2D en LUA à partir de l\'interpréteur TIC-80, en moins de 2 jours.'),
(2, 4, 'upload/rocket-league-01.jpg', 'upload/rocket-league-02.jpg', 'Rocket League', 'Ce projet était un travail en binôme, où l\'objectif était de créer un site en html & css pour présenter son jeu préférer.'),
(3, 5, 'upload/gang-beasts-01.jpg', 'upload/gang-beasts-02.jpg', 'Gang Beast', 'Ce projet était un travail en binôme, où l\'objectif était de créer un site en html & css pour présenter sont jeu préférer.'),
(4, 5, 'upload/a_mazing-01.jpg', 'upload/a_mazing-02.jpg', 'A_Mazing', 'Ce projet était un projet personel. L\'objectif était de faire un jeu multijoueurs asyncrone sans pouvoir relier les appareils.');

-- --------------------------------------------------------

--
-- Structure de la table `skills`
--

CREATE TABLE `skills` (
  `id` int(11) NOT NULL,
  `title` varchar(500) CHARACTER SET utf8 NOT NULL,
  `icone` varchar(500) CHARACTER SET utf8 NOT NULL,
  `soft` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `skills`
--

INSERT INTO `skills` (`id`, `title`, `icone`, `soft`) VALUES
(1, 'Génération de labyrinthe parfait', 'fa-solid fa-arrows-turn-to-dots', 1),
(2, 'Utiliser un système de seed', 'fa-solid fa-seedling', 1),
(3, 'Nombre de ligne limité', 'fa-solid fa-align-justify', 1),
(4, 'Fonctionne sur une calculatrice', 'fa-solid fa-calculator', 1),
(5, 'Phython', 'fa-brands fa-python', 0),
(6, 'HTML', 'fa-brands fa-html5', 0),
(7, 'CSS', 'fa-brands fa-css3-alt', 0),
(8, 'SEO', 'fa-solid fa-filter', 0),
(9, 'Travail en équipe', 'fa-solid fa-people-group', 1),
(10, 'Création d\'une page web', 'fa-brands fa-html5', 1),
(11, 'Design page web', 'fa-solid fa-pen-nib', 1),
(12, 'LUA', 'fa-solid fa-terminal', 0),
(13, 'TIC-80', 'fa-solid fa-robot', 0),
(14, 'JAM', 'fa-solid fa-gears', 1),
(15, 'Travail en solo', 'fa-solid fa-user', 1),
(16, 'Création d\'un jeu de A-Z', 'fa-solid fa-ghost', 1);

-- --------------------------------------------------------

--
-- Structure de la table `skills_projects`
--

CREATE TABLE `skills_projects` (
  `id_projects` int(11) NOT NULL,
  `id_skills` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `skills_projects`
--

INSERT INTO `skills_projects` (`id_projects`, `id_skills`) VALUES
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 16),
(2, 6),
(2, 7),
(2, 8),
(2, 9),
(2, 10),
(2, 11),
(3, 6),
(3, 7),
(3, 8),
(3, 9),
(3, 10),
(3, 11),
(4, 1),
(4, 2),
(4, 3),
(4, 4),
(4, 5);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(30) CHARACTER SET utf8 NOT NULL,
  `password` varchar(60) CHARACTER SET utf8 NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 NOT NULL,
  `img` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `as_portfolio` tinyint(1) NOT NULL DEFAULT '0',
  `description` varchar(1000) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `email`, `img`, `admin`, `as_portfolio`, `description`) VALUES
(4, 'BEAUFILS Ewen', 'a3c028dee169390b8084d1b704a4b9051b6293f1', 'ewen.beaufils09@gmail.com', 'upload/ewen.jpg', 1, 1, 'Je développe depuis la première (au Lycée). Je suis aujourd\'hui dans une école de programmation dans le jeu vidéo très prestigieuse nommée Gaming Campus. J\'ai déjà eu l\'occasion de finir des projets tels qu\'un site pour présenter un jeu, ou encore, un jeu que tout le monde connait du nom de PacMan.'),
(5, 'ACQUART--REYLANS Gwendal', 'c948a9b8609c1d868249f3b3fe666c067a6abd2f', 'gwenitora.gardu74@gmail.com', 'upload/gwendal.jpg', 1, 1, 'Développeur depuis la 5ème, je suis aujourd\'hui dans une école de programmation dans le jeu vidéo très prestigieuse. j\'ai déjà eu l\'occasion de finir des projets tels qu\'un site pour présenter un jeu, ou encore, un jeu assyncrone fonctionnant sur une calculette.'),
(6, 'Beney Dylan', '4cf193060bc3eaf3e70a500dd001718de4770eca', 'legamerdu8971@gmail.com', 'upload/hastley-rick.gif', 0, 0, '');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `skills_projects`
--
ALTER TABLE `skills_projects`
  ADD PRIMARY KEY (`id_projects`,`id_skills`),
  ADD KEY `id_projects` (`id_projects`,`id_skills`),
  ADD KEY `id_projects_2` (`id_projects`,`id_skills`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
