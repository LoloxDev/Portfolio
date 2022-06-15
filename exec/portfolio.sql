-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mer. 15 juin 2022 à 14:56
-- Version du serveur : 5.7.33
-- Version de PHP : 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `portfolio`
--

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

CREATE TABLE `images` (
  `id_img` int(10) NOT NULL,
  `id_projet` int(10) DEFAULT NULL,
  `src` varchar(255) NOT NULL,
  `alt` varchar(255) NOT NULL,
  `titre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `images`
--

INSERT INTO `images` (`id_img`, `id_projet`, `src`, `alt`, `titre`) VALUES
(1, 7, 'reservia_logo.svg', 'Le logo de Reservia', 'Reservia'),
(2, 6, 'logo_pisserotte.png', 'Le logo de Pisserotte', 'Les gîtes de Montigny'),
(3, 4, 'logoblanc.png', 'Le logo de Enolo', 'Enolo'),
(4, 5, 'logo_jadoo_1.svg', 'Le logo de Jadoo', 'Jadoo'),
(5, 3, 'hommer.png', 'Une photo de Springfield.', 'Springfield'),
(6, 0, '                        <span\r\n                            class=\"iconify\"\r\n                            data-icon=\"akar-icons:html-fill\"\r\n                            style=\"color: #27a3c2; font-size: 100px\"\r\n                        ></span>', 'Le logo HTML', 'HTML'),
(7, 0, '                        <span\r\n                            class=\"iconify\"\r\n                            data-icon=\"akar-icons:css-fill\"\r\n                            style=\"color: #27a3c2; font-size: 100px\"\r\n                        ></span>', 'Le logo de CSS', 'CSS'),
(8, 0, '                        <span\r\n                            class=\"iconify\"\r\n                            data-icon=\"akar-icons:javascript-fill\"\r\n                            style=\"color: #27a3c2; font-size: 100px\"\r\n                        ></span>', 'Le logo de JavaScript', 'JavaScrpit'),
(9, 0, '                        <span\r\n                            class=\"iconify\"\r\n                            data-icon=\"cib:mysql\"\r\n                            style=\"color: #27a3c2; font-size: 100px\"\r\n                        ></span>', 'Le logo de MySQL', 'MySQL'),
(10, 0, '                        <span\r\n                            class=\"iconify\"\r\n                            data-icon=\"akar-icons:php-fill\"\r\n                            style=\"color: #27a3c2; font-size: 100px\"\r\n                        ></span>', 'Le logo de PHP', 'PHP'),
(11, 0, '                        <span\r\n                            class=\"iconify\"\r\n                            data-icon=\"akar-icons:bootstrap-fill\"\r\n                            style=\"color: #27a3c2; font-size: 100px\"\r\n                        ></span>', 'Le logo de Bootstrap', 'Bootstrap'),
(12, 0, '                        <span\r\n                            class=\"iconify\"\r\n                            data-icon=\"cib:adobe-photoshop\"\r\n                            style=\"color: #27a3c2; font-size: 100px\"\r\n                        ></span>', 'Le logo de Photoshop', 'Photoshop'),
(13, 0, '                        <span\r\n                            class=\"iconify\"\r\n                            data-icon=\"cib:adobe-illustrator\"\r\n                            style=\"color: #27a3c2; font-size: 100px\"\r\n                        ></span>', 'Le logo de Adobe Illustrator', 'Adobe Illustrator'),
(14, 0, '                        <span\r\n                            class=\"iconify\"\r\n                            data-icon=\"file-icons:gravit-designer\"\r\n                            style=\"color: #27a3c2; font-size: 100px\"\r\n                        ></span>', 'Le logo de Gravit Designer', 'Gravit Designer'),
(15, 0, '                        <span\r\n                            class=\"iconify\"\r\n                            data-icon=\"bi:wordpress\"\r\n                            style=\"color: #27a3c2; font-size: 100px\"\r\n                        ></span>', 'Le logo de Wordpress', 'Wordpress'),
(16, 0, '                        <span\r\n                            class=\"iconify\"\r\n                            data-icon=\"akar-icons:sass-fill\"\r\n                            style=\"color: #27a3c2; font-size: 100px\"\r\n                        ></span>', 'Le logo de Sass', 'Sass'),
(17, 0, '                        <span\r\n                            class=\"iconify\"\r\n                            data-icon=\"ci:adobe-xd\"\r\n                            style=\"color: #27a3c2; font-size: 100px\"\r\n                        ></span>', 'Le logo de Adobe XDesign', 'Adobe XDesign'),
(18, 0, 'bitmoji.png', 'Une photo de test.', 'test'),
(19, 0, 'bitmojiWork.png', 'Une photo de .', ''),
(20, 0, 'cv.png', 'Une photo de test.', 'test'),
(21, 0, 'hommer.png', 'Une photo de test.', 'test'),
(22, 0, 'refuser.png', 'Une photo de test.', 'test'),
(23, 0, 'refuser.png', 'Une photo de test.', 'test'),
(24, 0, 'icons8-double-bas-64.png', 'Une photo de test.', 'test'),
(25, 0, 'valider.png', 'Une photo de test.', 'test');

-- --------------------------------------------------------

--
-- Structure de la table `langages`
--

CREATE TABLE `langages` (
  `id_langage` int(10) NOT NULL,
  `id_img` int(10) NOT NULL,
  `type` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `langages`
--

INSERT INTO `langages` (`id_langage`, `id_img`, `type`, `nom`) VALUES
(1, 6, 'Programmation', 'HTML'),
(2, 7, 'Programmation', 'CSS'),
(3, 8, 'Programmation', 'JavaScript'),
(4, 9, 'Programmation', 'MySQL'),
(5, 10, 'Programmation', 'PHP'),
(6, 11, 'Programmation', 'Bootstrap'),
(7, 12, 'Design', 'Photoshop'),
(8, 13, 'Design', 'Adobe Illustrator'),
(9, 14, 'Design', 'Gravit Designer'),
(10, 15, 'Design', 'Wordpress'),
(11, 16, 'Design', 'Sass'),
(12, 17, 'Design', 'Adobe XDesign');

-- --------------------------------------------------------

--
-- Structure de la table `langages_projets`
--

CREATE TABLE `langages_projets` (
  `id_langage_projet` int(10) NOT NULL,
  `id_langage` int(10) NOT NULL,
  `id_projet` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `langages_projets`
--

INSERT INTO `langages_projets` (`id_langage_projet`, `id_langage`, `id_projet`) VALUES
(1, 1, 3),
(2, 2, 3),
(3, 3, 3),
(4, 4, 3),
(5, 5, 3),
(6, 6, 3),
(7, 1, 7),
(8, 2, 7),
(9, 1, 4),
(10, 2, 4),
(11, 1, 6),
(12, 2, 6),
(13, 3, 6),
(14, 2, 5),
(15, 1, 5),
(16, 4, 6),
(17, 5, 6);

-- --------------------------------------------------------

--
-- Structure de la table `projets`
--

CREATE TABLE `projets` (
  `id_projet` int(10) NOT NULL,
  `id_img` int(10) NOT NULL,
  `objectif` varchar(255) NOT NULL,
  `statut` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `projets`
--

INSERT INTO `projets` (`id_projet`, `id_img`, `objectif`, `statut`, `nom`) VALUES
(3, 5, 'Office de tourisme de Springfield, on y trouve des informations sur plusieurs lieux, bâtiments et personnages de la ville. Un back office très complet système de connexion possible.', 'Online', 'Springfield'),
(4, 3, 'Agence de voyage permettant aux visiteurs d\'avoir une liste d\'hôtels et d\'activités en rapport avec leur recherche.', 'En cours de développement', 'Eno&Lo'),
(5, 4, 'La plateforme du restaurant asiatique Jadoo, on y trouve quelques plats, des belles photos, un formulaire de contact ...', 'En cours de développement', 'Jadoo'),
(6, 2, 'La plateforme des Gites de Montigny, on y trouve des belles photos, des informations sur les gites, activités, tarifs, contact ...', 'En cours de développement', 'Les gites de Montigny'),
(7, 1, 'Agence de voyage, cartes des différents hôtels et activités', 'En cours de développement', 'Reservia'),
(25, 19, 'test', 'En cours de développement', '');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id_user` tinyint(2) NOT NULL,
  `nom_utilisateur` varchar(255) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id_user`, `nom_utilisateur`, `mot_de_passe`, `prenom`, `nom`, `mail`) VALUES
(1, 'LoloxDev', 'secret', 'Loris', 'Labarre', 'loris_labarre@outlook.fr');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id_img`);

--
-- Index pour la table `langages`
--
ALTER TABLE `langages`
  ADD PRIMARY KEY (`id_langage`),
  ADD KEY `key_images_langages` (`id_img`);

--
-- Index pour la table `langages_projets`
--
ALTER TABLE `langages_projets`
  ADD PRIMARY KEY (`id_langage_projet`),
  ADD KEY `key_lang` (`id_langage`),
  ADD KEY `key_proj` (`id_projet`);

--
-- Index pour la table `projets`
--
ALTER TABLE `projets`
  ADD PRIMARY KEY (`id_projet`),
  ADD KEY `key_projets_images` (`id_img`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `images`
--
ALTER TABLE `images`
  MODIFY `id_img` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `langages`
--
ALTER TABLE `langages`
  MODIFY `id_langage` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `langages_projets`
--
ALTER TABLE `langages_projets`
  MODIFY `id_langage_projet` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `projets`
--
ALTER TABLE `projets`
  MODIFY `id_projet` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id_user` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `langages`
--
ALTER TABLE `langages`
  ADD CONSTRAINT `key_images_langages` FOREIGN KEY (`id_img`) REFERENCES `images` (`id_img`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `langages_projets`
--
ALTER TABLE `langages_projets`
  ADD CONSTRAINT `key_lang` FOREIGN KEY (`id_langage`) REFERENCES `langages` (`id_langage`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `key_proj` FOREIGN KEY (`id_projet`) REFERENCES `projets` (`id_projet`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `projets`
--
ALTER TABLE `projets`
  ADD CONSTRAINT `key_projets_images` FOREIGN KEY (`id_img`) REFERENCES `images` (`id_img`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
