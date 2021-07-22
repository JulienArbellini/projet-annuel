-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : database
-- Généré le : mar. 06 juil. 2021 à 15:37
-- Version du serveur :  5.7.32
-- Version de PHP : 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `teachr`
--

-- --------------------------------------------------------

--
-- Structure de la table `tr_article`
--

CREATE TABLE `tr_article` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` longtext,
  `slug` varchar(100) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tr_article`
--

INSERT INTO `tr_article` (`id`, `title`, `content`, `slug`, `createdAt`) VALUES
(1, 'SQL', '<h2 style=\"font-style:italic\"><big>Le SQL&nbsp;</big></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><big><strong>I- Qu&#39;est-ce que le SQL ?&nbsp;</strong></big></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Le&nbsp;<span class=\"marker\"><strong>SQL</strong></span>&nbsp;(Structured Query Language) est un langage permettant de communiquer avec une base de donn&eacute;es. Ce langage informatique est notamment tr&egrave;s utilis&eacute; par les d&eacute;veloppeurs web pour communiquer avec les donn&eacute;es d&rsquo;un site web. SQL.sh recense des cours de SQL et des explications sur les principales commandes pour lire, ins&eacute;rer, modifier et supprimer des donn&eacute;es dans une base.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong><big>II- SGBD</big></strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Chaque SGBD poss&egrave;de ses propres sp&eacute;cificit&eacute;s et caract&eacute;ristiques. Pour pr&eacute;senter ces diff&eacute;rences, les logiciels de gestion de bases de donn&eacute;es sont cit&eacute;s, tels que : MySQL, PostgreSQL, SQLite, Microsoft SQL Server&nbsp;ou encore&nbsp;Oracle.</p>\r\n\r\n<p>Des SGBD de type NoSQL sont &eacute;galement pr&eacute;sent&eacute;s, tel que Cassandra, Redis ou MongoDB.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong><big>III- A quoi sert le SQL ?&nbsp;</big></strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Comme dans la vie, pour que des personnes puissent se comprendre, elles doivent parler le m&ecirc;me langage et bien en informatique, c&rsquo;est pareil.</p>\r\n\r\n<p>Pour que les diff&eacute;rents logiciels et le moteur de base de donn&eacute;es puissent se comprendre, ils utilisent un langage appel&eacute; SQL.</p>\r\n\r\n<p>Ce langage est complet. Il va &ecirc;tre utilis&eacute; pour :</p>\r\n\r\n<ul>\r\n	<li>Lire les donn&eacute;es,</li>\r\n	<li>Ecrire les donn&eacute;es,</li>\r\n	<li>Modifier les donn&eacute;es,</li>\r\n	<li>Supprimer les donn&eacute;es</li>\r\n	<li>Il permettra aussi de modifier la structure de la base de donn&eacute;es :</li>\r\n	<li>Ajouter des tables,</li>\r\n	<li>Modifier les tables,</li>\r\n	<li>les supprimer</li>\r\n	<li>Ajouter, ou supprimer des utilisateurs,</li>\r\n	<li>G&eacute;rer les droits des utilisateurs,</li>\r\n	<li>G&eacute;rer les bases de donn&eacute;es&nbsp; : en cr&eacute;er de nouvelles, les modifier, etc &hellip;</li>\r\n</ul>\r\n\r\n<p>Comme vous pouvez le voir, les possibilit&eacute;s sont nombreuses.</p>\r\n\r\n<p>Ce langage est structur&eacute; (comme son nom l&rsquo;indique), c&rsquo;est &agrave; dire que la syntaxe est toujours la m&ecirc;me et respecte des normes tr&egrave;s pr&eacute;cises.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><big><strong>IV- Optimisation&nbsp;</strong></big></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Savoir effectuer des requ&ecirc;tes n&rsquo;est pas trop difficile, mais il convient de v&eacute;ritablement comprendre comment fonctionne le stockage des donn&eacute;es et la fa&ccedil;on dont elles sont lues pour optimiser les performances. Les optimisations sont bas&eacute;es dans 2 cat&eacute;gories: les bons choix &agrave; faire lorsqu&rsquo;il faut d&eacute;finir la structure de la base de donn&eacute;es et les m&eacute;thodes les plus adapt&eacute;es pour lire les donn&eacute;es.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:500px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>test</td>\r\n			<td>test</td>\r\n		</tr>\r\n		<tr>\r\n			<td>test</td>\r\n			<td>test</td>\r\n		</tr>\r\n		<tr>\r\n			<td>tesr</td>\r\n			<td>test</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n', '/sql', '2021-05-12 15:46:33');

--
-- Déclencheurs `tr_article`
--
-- DELIMITER $$
CREATE TRIGGER `after_insert_article` AFTER INSERT ON `tr_article` FOR EACH ROW INSERT INTO tr_user_has_Article (User_idUser, Article_idArticle)
VALUES (1,NEW.id);
-- $$
-- DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `tr_category`
--

CREATE TABLE `tr_category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `tr_category_has_Article`
--

CREATE TABLE `tr_category_has_Article` (
  `Category_idCategory` int(11) NOT NULL,
  `Article_idArticle` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `tr_comment`
--

CREATE TABLE `tr_comment` (
  `id` int(11) NOT NULL,
  `content` longtext,
  `date` timestamp(3) NULL DEFAULT NULL,
  `User_idUser` int(11) NOT NULL,
  `Article_idArticle` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `tr_media`
--

CREATE TABLE `tr_media` (
  `id` int(11) NOT NULL,
  `media_name` varchar(120) DEFAULT NULL,
  `link` varchar(2083) DEFAULT NULL,
  `createdAt` timestamp(3) NULL DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `User_idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `tr_page`
--

CREATE TABLE `tr_page` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` longtext,
  `slug` varchar(50) NOT NULL,
  `page_accueil` tinyint(1) DEFAULT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tr_page`
--

INSERT INTO `tr_page` (`id`, `title`, `content`, `slug`, `page_accueil`, `createdAt`) VALUES
(1, 'Accueil', '<div id=\"wysiwyg\"><div id=\"wysiwyg\"><div id=\"wysiwyg\"><p id=\"div\"></p><div id=\"div\"><div id=\"div\"><div id=\"div\"><ul class=\"navbar-horizontale\">\r\n                    <li class=\"li-horizontale-nav\"><a href=\"#\">Accueil</a></li>\r\n<li class=\"li-horizontale-nav\"><a href=\"#\">Item 2</a></li>\r\n<li class=\"li-horizontale-nav\"><a href=\"#\">Item plus long</a></li>\r\n</ul><p style=\"text-align: center;\"><br></p><p style=\"text-align: center;\"><br></p><h1 style=\"text-align: center;\"><span style=\"color: rgb(128, 100, 162);\">Bienvenue sur la page d\accueil</span> ðŸ–¤</h1></div><a href=\"#\" class=\"link\" style=\"color: rgb(250, 192, 143);\">Un Lien</a></div><div id=\"div\"><br></div></div><p>coucou</p><p></p><br>BONJOUR</div></div></div>', '/Accueil', 1, '2021-07-06 15:11:50');

--
-- Déclencheurs `tr_page`
--
-- DELIMITER $$
CREATE TRIGGER `after_insert_page` AFTER INSERT ON `tr_page` FOR EACH ROW INSERT INTO tr_page_has_User
(User_idUser, Page_idPage)
VALUES (1,NEW.id);
-- $$
-- DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `tr_page_has_User`
--

CREATE TABLE `tr_page_has_User` (
  `Page_idPage` int(11) NOT NULL,
  `User_idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tr_page_has_User`
--

INSERT INTO `tr_page_has_User` (`Page_idPage`, `User_idUser`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `tr_role`
--

CREATE TABLE `tr_role` (
  `id` int(11) NOT NULL,
  `status` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tr_role`
--

INSERT INTO `tr_role` (`id`, `status`) VALUES
(1, 'Administrateur'),
(2, 'Contributeur'),
(3, 'Spectateur');

-- --------------------------------------------------------

--
-- Structure de la table `tr_setting`
--

CREATE TABLE `tr_setting` (
  `id` int(11) NOT NULL,
  `site_url` varchar(2083) DEFAULT NULL,
  `site_name` varchar(255) DEFAULT NULL,
  `visibility` tinyint(4) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `tr_setting_has_User`
--

CREATE TABLE `tr_setting_has_User` (
  `Setting_idSetting` int(11) NOT NULL,
  `User_idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `tr_user`
--

CREATE TABLE `tr_user` (
  `id` int(11) NOT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `firstname` varchar(120) DEFAULT NULL,
  `email` varchar(320) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `pseudo` varchar(120) DEFAULT NULL,
  `createdAtUser` timestamp NULL DEFAULT NULL,
  `Role_idRole` int(11) DEFAULT NULL,
  `confirmkey` varchar(255) DEFAULT NULL,
  `confirmation` tinyint(4) NOT NULL DEFAULT '0',
  `code_confirmation_mdp` varchar(60) DEFAULT NULL,
  `confirmationKeyTmtp` datetime DEFAULT NULL,
  `connected` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Déchargement des données de la table `tr_user`
--

INSERT INTO `tr_user` (`id`, `lastname`, `firstname`, `email`, `password`, `pseudo`, `createdAtUser`, `Role_idRole`, `confirmkey`, `confirmation`, `code_confirmation_mdp`, `confirmationKeyTmtp`, `connected`) VALUES
(1, 'Doe', 'John', 'johndoe@gmail.com', 'gt67aphgj', 'johndoe', NULL, 1, '', 0, NULL, '2021-07-06 15:08:49', 1);
-- --------------------------------------------------------

--
-- Structure de la table `tr_user_has_Article`
--

CREATE TABLE `tr_user_has_Article` (
  `User_idUser` int(11) NOT NULL,
  `Article_idArticle` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tr_user_has_Article`
--

INSERT INTO `tr_user_has_Article` (`User_idUser`, `Article_idArticle`) VALUES
(1, 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `tr_article`
--
ALTER TABLE `tr_article`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Index pour la table `tr_category`
--
ALTER TABLE `tr_category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tr_category_has_Article`
--
ALTER TABLE `tr_category_has_Article`
  ADD PRIMARY KEY (`Category_idCategory`,`Article_idArticle`),
  ADD KEY `fk_Category_has_Article_Article1_idx` (`Article_idArticle`),
  ADD KEY `fk_Category_has_Article_Category1_idx` (`Category_idCategory`);

--
-- Index pour la table `tr_comment`
--
ALTER TABLE `tr_comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Comment_User1_idx` (`User_idUser`),
  ADD KEY `fk_Comment_Article1_idx` (`Article_idArticle`);

--
-- Index pour la table `tr_media`
--
ALTER TABLE `tr_media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Media_User1_idx` (`User_idUser`);

--
-- Index pour la table `tr_page`
--
ALTER TABLE `tr_page`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Index pour la table `tr_page_has_User`
--
ALTER TABLE `tr_page_has_User`
  ADD PRIMARY KEY (`Page_idPage`,`User_idUser`),
  ADD KEY `fk_Page_has_User_User1_idx` (`User_idUser`),
  ADD KEY `fk_Page_has_User_Page1_idx` (`Page_idPage`);

--
-- Index pour la table `tr_role`
--
ALTER TABLE `tr_role`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tr_setting`
--
ALTER TABLE `tr_setting`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tr_setting_has_User`
--
ALTER TABLE `tr_setting_has_User`
  ADD PRIMARY KEY (`Setting_idSetting`,`User_idUser`),
  ADD KEY `fk_Setting_has_User_User1_idx` (`User_idUser`),
  ADD KEY `fk_Setting_has_User_Setting1_idx` (`Setting_idSetting`);

--
-- Index pour la table `tr_user`
--
ALTER TABLE `tr_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `fk_User_Role1_idx` (`Role_idRole`);

--
-- Index pour la table `tr_user_has_Article`
--
ALTER TABLE `tr_user_has_Article`
  ADD PRIMARY KEY (`User_idUser`,`Article_idArticle`),
  ADD KEY `fk_User_has_Article_Article1_idx` (`Article_idArticle`),
  ADD KEY `fk_User_has_Article_User_idx` (`User_idUser`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `tr_article`
--
ALTER TABLE `tr_article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `tr_category`
--
ALTER TABLE `tr_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tr_comment`
--
ALTER TABLE `tr_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tr_media`
--
ALTER TABLE `tr_media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tr_page`
--
ALTER TABLE `tr_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT pour la table `tr_role`
--
ALTER TABLE `tr_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `tr_setting`
--
ALTER TABLE `tr_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tr_user`
--
ALTER TABLE `tr_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `tr_category_has_Article`
--
ALTER TABLE `tr_category_has_Article`
  ADD CONSTRAINT `fk_Category_has_Article_Article1` FOREIGN KEY (`Article_idArticle`) REFERENCES `tr_article` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Category_has_Article_Category1` FOREIGN KEY (`Category_idCategory`) REFERENCES `tr_category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `tr_comment`
--
ALTER TABLE `tr_comment`
  ADD CONSTRAINT `fk_Comment_Article1` FOREIGN KEY (`Article_idArticle`) REFERENCES `tr_article` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Comment_User1` FOREIGN KEY (`User_idUser`) REFERENCES `tr_user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `tr_media`
--
ALTER TABLE `tr_media`
  ADD CONSTRAINT `fk_Media_User1` FOREIGN KEY (`User_idUser`) REFERENCES `tr_user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `tr_page_has_User`
--
ALTER TABLE `tr_page_has_User`
  ADD CONSTRAINT `fk_Page_has_User_Page1` FOREIGN KEY (`Page_idPage`) REFERENCES `tr_page` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Page_has_User_User1` FOREIGN KEY (`User_idUser`) REFERENCES `tr_user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `tr_setting_has_User`
--
ALTER TABLE `tr_setting_has_User`
  ADD CONSTRAINT `fk_Setting_has_User_Setting1` FOREIGN KEY (`Setting_idSetting`) REFERENCES `tr_setting` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Setting_has_User_User1` FOREIGN KEY (`User_idUser`) REFERENCES `tr_user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `tr_user`
--
ALTER TABLE `tr_user`
  ADD CONSTRAINT `fk_User_Role1` FOREIGN KEY (`Role_idRole`) REFERENCES `tr_role` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `tr_user_has_Article`
--
ALTER TABLE `tr_user_has_Article`
  ADD CONSTRAINT `fk_User_has_Article_Article1` FOREIGN KEY (`Article_idArticle`) REFERENCES `tr_article` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_User_has_Article_User` FOREIGN KEY (`User_idUser`) REFERENCES `tr_user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
