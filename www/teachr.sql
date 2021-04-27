-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : database
-- Généré le : ven. 23 avr. 2021 à 08:54
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
  `idArticle` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` longtext,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tr_article`
--

INSERT INTO `tr_article` (`idArticle`, `title`, `content`, `createdAt`) VALUES
(1, 'PHP7', '<p>&quot;PHP 7 est plus rapide.&quot; C&#39;est la principale promesse faite par Zend et les contributeurs principaux du projet PHP. Cette nouvelle version est bas&eacute;e sur PHPNG (pour PHP Next-Generation). Une initiative qui a &eacute;t&eacute; lanc&eacute;e par Zend en r&eacute;ponse &agrave; la technologie HHVM de Facebook, qui avait pour but de proposer une version de PHP qui se voulait plus performante.</p>\r\n\r\n<p>Selon Zend, la mise &agrave; jour des applications vers PHP 7 pourrait engendrer un surcro&icirc;t de performance de 25% &agrave; 70%. L&#39;&eacute;diteur a publi&eacute; quelques indicateurs qu&#39;il a r&eacute;sum&eacute; en&nbsp;<a href=\"https://pages.zend.com/rs/zendtechnologies/images/PHP7-Performance%20Infographic.pdf\" target=\"_blank\">une infographie publi&eacute;e en mai 2015</a>. Ces comparatifs montrent que&nbsp;<a href=\"https://www.journaldunet.com/solutions/dsi/1169219-wordpress-cms-gratuit-open-source-2/\">WordPress</a>&nbsp;(en version&nbsp;4.1) serait deux fois plus rapide avec PHP&nbsp;7 qu&#39;avec PHP&nbsp;5.6, et Drupal (7) 70% plus rapide. A travers son&nbsp;<a href=\"https://www.journaldunet.fr/business/dictionnaire-economique-et-financier/1199349-benchmark-definition-traduction/\">benchmark</a>, le projet PHP met aussi en avant un niveau d&#39;optimisation qui se veut &ecirc;tre au m&ecirc;me niveau que celui de HHVM, voire l&eacute;g&egrave;rement au dessus (cf. infographie ci-dessous).</p>\r\n', '2021-04-21 10:56:51'),
(2, 'SQL', '<h1>LE SQL TEST</h1>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><big><strong>I- Qu&#39;est-ce que le SQL ?&nbsp;</strong></big></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Le&nbsp;<span class=\"marker\"><strong>SQL</strong></span>&nbsp;(Structured Query Language) est un langage permettant de communiquer avec une base de donn&eacute;es. Ce langage informatique est notamment tr&egrave;s utilis&eacute; par les d&eacute;veloppeurs web pour communiquer avec les donn&eacute;es d&rsquo;un site web. SQL.sh recense des cours de SQL et des explications sur les principales commandes pour lire, ins&eacute;rer, modifier et supprimer des donn&eacute;es dans une base.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong><big>II- SGBD</big></strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Chaque SGBD poss&egrave;de ses propres sp&eacute;cificit&eacute;s et caract&eacute;ristiques. Pour pr&eacute;senter ces diff&eacute;rences, les logiciels de gestion de bases de donn&eacute;es sont cit&eacute;s, tels que : MySQL, PostgreSQL, SQLite, Microsoft SQL Server&nbsp;ou encore&nbsp;Oracle.</p>\r\n\r\n<p>Des SGBD de type NoSQL sont &eacute;galement pr&eacute;sent&eacute;s, tel que Cassandra, Redis ou MongoDB.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong><big>III- A quoi sert le SQL ?&nbsp;</big></strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Comme dans la vie, pour que des personnes puissent se comprendre, elles doivent parler le m&ecirc;me langage et bien en informatique, c&rsquo;est pareil.</p>\r\n\r\n<p>Pour que les diff&eacute;rents logiciels et le moteur de base de donn&eacute;es puissent se comprendre, ils utilisent un langage appel&eacute; SQL.</p>\r\n\r\n<p>Ce langage est complet. Il va &ecirc;tre utilis&eacute; pour :</p>\r\n\r\n<ul>\r\n	<li>Lire les donn&eacute;es,</li>\r\n	<li>Ecrire les donn&eacute;es,</li>\r\n	<li>Modifier les donn&eacute;es,</li>\r\n	<li>Supprimer les donn&eacute;es</li>\r\n	<li>Il permettra aussi de modifier la structure de la base de donn&eacute;es :</li>\r\n	<li>Ajouter des tables,</li>\r\n	<li>Modifier les tables,</li>\r\n	<li>les supprimer</li>\r\n	<li>Ajouter, ou supprimer des utilisateurs,</li>\r\n	<li>G&eacute;rer les droits des utilisateurs,</li>\r\n	<li>G&eacute;rer les bases de donn&eacute;es&nbsp; : en cr&eacute;er de nouvelles, les modifier, etc &hellip;</li>\r\n</ul>\r\n\r\n<p>Comme vous pouvez le voir, les possibilit&eacute;s sont nombreuses.</p>\r\n\r\n<p>Ce langage est structur&eacute; (comme son nom l&rsquo;indique), c&rsquo;est &agrave; dire que la syntaxe est toujours la m&ecirc;me et respecte des normes tr&egrave;s pr&eacute;cises.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><big><strong>IV- Optimisation&nbsp;</strong></big></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Savoir effectuer des requ&ecirc;tes n&rsquo;est pas trop difficile, mais il convient de v&eacute;ritablement comprendre comment fonctionne le stockage des donn&eacute;es et la fa&ccedil;on dont elles sont lues pour optimiser les performances. Les optimisations sont bas&eacute;es dans 2 cat&eacute;gories: les bons choix &agrave; faire lorsqu&rsquo;il faut d&eacute;finir la structure de la base de donn&eacute;es et les m&eacute;thodes les plus adapt&eacute;es pour lire les donn&eacute;es.</p>\r\n', '2021-04-22 17:07:43'),
(3, 'HTML', '<h1>HTML&nbsp;</h1>\r\n\r\n<h3><strong>I- Qu&#39;est-ce que c&#39;est ?&nbsp;</strong></h3>\r\n\r\n<p><strong>HTML</strong>&nbsp;signifie &laquo;&nbsp;<em>HyperText Markup Language</em>&nbsp;&raquo; qu&#39;on peut traduire par &laquo; langage de balises pour l&#39;hypertexte &raquo;. Il est utilis&eacute; afin de cr&eacute;er et de repr&eacute;senter le contenu d&#39;une page web et sa structure. D&#39;autres technologies sont utilis&eacute;es avec HTML pour d&eacute;crire la pr&eacute;sentation d&#39;une page (<a href=\"https://developer.mozilla.org/fr/docs/Web/CSS\">CSS</a>) et/ou ses fonctionnalit&eacute;s interactives (<a href=\"https://developer.mozilla.org/fr/docs/Web/JavaScript\">JavaScript</a>).</p>\r\n\r\n<p>L&#39;&laquo; hypertexte &raquo; d&eacute;signe les liens qui relient les pages web entre elles, que ce soit au sein d&#39;un m&ecirc;me site web ou entre diff&eacute;rents sites web. Les liens sont un aspect fondamental du Web. Ce sont eux qui forment cette &laquo; toile &raquo; (ce mot est traduit par&nbsp;<em>web</em>&nbsp;en anglais). En t&eacute;l&eacute;chargeant du contenu sur l&#39;Internet et en le reliant &agrave; des pages cr&eacute;&eacute;es par d&#39;autres personnes, vous devenez un participant actif du World Wide Web.</p>\r\n\r\n<p>Le langage HTML utilise des &laquo; balises &raquo; pour annoter du texte, des images et d&#39;autres contenus afin de les afficher dans un navigateur web. Le balisage HTML comprend des &laquo; &eacute;l&eacute;ments &raquo; sp&eacute;ciaux tels que&nbsp;</p>\r\n\r\n<ul>\r\n	<li>&nbsp;\r\n	<ol>\r\n		<li>&nbsp;et bien d&#39;autres.\r\n		<p>&nbsp;</p>\r\n		</li>\r\n	</ol>\r\n	</li>\r\n</ul>\r\n', '2021-04-21 15:47:47'),
(5, 'test editor', '<p><span class=\"marker\">Lorem ipsum</span> dolor sit amet, consectetur adipiscing elit. Nam nulla leo, venenatis non odio quis, euismod pellentesque justo. Praesent at tempus orci. Phasellus viverra ultrices erat, in faucibus sapien maximus sit amet. Pellentesque imperdiet fermentum dui commodo bibendum. Aliquam ut vestibulum ante, ut luctus odio. Phasellus porttitor orci ac nisi consequat, sagittis condimentum nisi varius. Aliquam turpis mauris, tincidunt quis nunc et, tincidunt rhoncus nisi. Nullam elit lectus, iaculis ac erat a, ultricies feugiat sapien. Integer eget augue consequat, posuere odio sed, consectetur tellus. Suspendisse scelerisque turpis vel arcu sodales, vitae tincidunt enim tempor. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Fusce in tortor a leo cursus molestie ut vitae quam. Curabitur congue ex ut nibh aliquam, blandit tempor libero ultricies. Aliquam erat volutpat.<img alt=\"\" src=\"https://img-0.journaldunet.com/qK2CKjLJrCDXC7q43xEsAbvf3hY=/1280x/smart/a89db90b29474e538572a1d9a5b1123d/ccmcms-jdn/10977912.jpg\" style=\"border-style:solid; border-width:0px; float:left; height:120px; width:180px\" /></p>\r\n', '2021-04-21 13:10:30'),
(6, 'JavaScript', '<p><s>lorem ipsum&nbsp;</s></p>\r\n\r\n<blockquote>\r\n<p>Ceci est une citation</p>\r\n</blockquote>\r\n\r\n<p><code>test police computer code</code></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<pre>\r\n<code>test pr&eacute;format&eacute;</code></pre>\r\n\r\n<h1><code>Titre 1</code></h1>\r\n\r\n<h2><code>Titre 2</code></h2>\r\n\r\n<h3><code>Titre 3</code></h3>\r\n\r\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:500px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>test</td>\r\n			<td>test</td>\r\n		</tr>\r\n		<tr>\r\n			<td>test</td>\r\n			<td>test</td>\r\n		</tr>\r\n		<tr>\r\n			<td>test</td>\r\n			<td>test</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ol>\r\n	<li>item 1</li>\r\n	<li>item 2</li>\r\n	<li>item 3</li>\r\n</ol>\r\n\r\n<div style=\"background:#eeeeee;border:1px solid #cccccc;padding:5px 10px;\">special container test</div>\r\n\r\n<p>&nbsp;</p>\r\n', '2021-04-21 14:04:12');

--
-- Déclencheurs `tr_article`
--
DELIMITER $$
CREATE TRIGGER `after_insert_article` AFTER INSERT ON `tr_article` FOR EACH ROW INSERT INTO tr_user_has_Article (User_idUser, Article_idArticle)
VALUES (1,NEW.idArticle)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `tr_category`
--

CREATE TABLE `tr_category` (
  `idCategory` int(11) NOT NULL,
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
  `idComment` int(11) NOT NULL,
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
  `idMedia` int(11) NOT NULL,
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
  `idPage` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `tr_page_has_User`
--

CREATE TABLE `tr_page_has_User` (
  `Page_idPage` int(11) NOT NULL,
  `User_idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `tr_role`
--

CREATE TABLE `tr_role` (
  `idRole` int(11) NOT NULL,
  `status` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tr_role`
--

INSERT INTO `tr_role` (`idRole`, `status`) VALUES
(1, 'Administrator'),
(2, 'Contributor'),
(3, 'Spectator');

-- --------------------------------------------------------

--
-- Structure de la table `tr_setting`
--

CREATE TABLE `tr_setting` (
  `idSetting` int(11) NOT NULL,
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
  `idUser` int(11) NOT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `firstname` varchar(120) DEFAULT NULL,
  `email` varchar(320) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `pseudo` varchar(120) DEFAULT NULL,
  `Role_idRole` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Déchargement des données de la table `tr_user`
--

INSERT INTO `tr_user` (`idUser`, `lastname`, `firstname`, `email`, `password`, `pseudo`, `Role_idRole`) VALUES
(1, 'Brindeau', 'Kelig', 'keligbrindeau@gmail.com', 'testtest', NULL, NULL),
(2, 'Brindeau', 'Kelig', 'keligbrindeau@gmail.com', 'testtest', NULL, NULL),
(3, 'brd', 'Marie', 'kelig@gmail.com', 'password', NULL, NULL),
(4, 'Rajendran', 'Waruny', 'Waruny@gmail.com', 'testtest', NULL, NULL),
(5, 'Arbelleni', 'Julien', 'test@gmail.com', 'testtest', NULL, NULL),
(6, 'Doe', 'John', 'est2@gmail.com', 'testtest', NULL, NULL),
(7, 'Ifergan', 'Lea', 'lea@gmail.com', 'testtest', NULL, NULL);

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
(1, 1),
(1, 2),
(1, 3),
(1, 5),
(1, 6);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `tr_article`
--
ALTER TABLE `tr_article`
  ADD PRIMARY KEY (`idArticle`);

--
-- Index pour la table `tr_category`
--
ALTER TABLE `tr_category`
  ADD PRIMARY KEY (`idCategory`);

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
  ADD PRIMARY KEY (`idComment`),
  ADD KEY `fk_Comment_User1_idx` (`User_idUser`),
  ADD KEY `fk_Comment_Article1_idx` (`Article_idArticle`);

--
-- Index pour la table `tr_media`
--
ALTER TABLE `tr_media`
  ADD PRIMARY KEY (`idMedia`),
  ADD KEY `fk_Media_User1_idx` (`User_idUser`);

--
-- Index pour la table `tr_page`
--
ALTER TABLE `tr_page`
  ADD PRIMARY KEY (`idPage`);

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
  ADD PRIMARY KEY (`idRole`);

--
-- Index pour la table `tr_setting`
--
ALTER TABLE `tr_setting`
  ADD PRIMARY KEY (`idSetting`);

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
  ADD PRIMARY KEY (`idUser`),
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
  MODIFY `idArticle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `tr_category`
--
ALTER TABLE `tr_category`
  MODIFY `idCategory` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tr_comment`
--
ALTER TABLE `tr_comment`
  MODIFY `idComment` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tr_media`
--
ALTER TABLE `tr_media`
  MODIFY `idMedia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tr_page`
--
ALTER TABLE `tr_page`
  MODIFY `idPage` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tr_role`
--
ALTER TABLE `tr_role`
  MODIFY `idRole` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `tr_setting`
--
ALTER TABLE `tr_setting`
  MODIFY `idSetting` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tr_user`
--
ALTER TABLE `tr_user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `tr_category_has_Article`
--
ALTER TABLE `tr_category_has_Article`
  ADD CONSTRAINT `fk_Category_has_Article_Article1` FOREIGN KEY (`Article_idArticle`) REFERENCES `tr_article` (`idArticle`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Category_has_Article_Category1` FOREIGN KEY (`Category_idCategory`) REFERENCES `tr_category` (`idCategory`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `tr_comment`
--
ALTER TABLE `tr_comment`
  ADD CONSTRAINT `fk_Comment_Article1` FOREIGN KEY (`Article_idArticle`) REFERENCES `tr_article` (`idArticle`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Comment_User1` FOREIGN KEY (`User_idUser`) REFERENCES `tr_user` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `tr_media`
--
ALTER TABLE `tr_media`
  ADD CONSTRAINT `fk_Media_User1` FOREIGN KEY (`User_idUser`) REFERENCES `tr_user` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `tr_page_has_User`
--
ALTER TABLE `tr_page_has_User`
  ADD CONSTRAINT `fk_Page_has_User_Page1` FOREIGN KEY (`Page_idPage`) REFERENCES `tr_page` (`idPage`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Page_has_User_User1` FOREIGN KEY (`User_idUser`) REFERENCES `tr_user` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `tr_setting_has_User`
--
ALTER TABLE `tr_setting_has_User`
  ADD CONSTRAINT `fk_Setting_has_User_Setting1` FOREIGN KEY (`Setting_idSetting`) REFERENCES `tr_setting` (`idSetting`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Setting_has_User_User1` FOREIGN KEY (`User_idUser`) REFERENCES `tr_user` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `tr_user`
--
ALTER TABLE `tr_user`
  ADD CONSTRAINT `fk_User_Role1` FOREIGN KEY (`Role_idRole`) REFERENCES `tr_role` (`idRole`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `tr_user_has_Article`
--
ALTER TABLE `tr_user_has_Article`
  ADD CONSTRAINT `fk_User_has_Article_Article1` FOREIGN KEY (`Article_idArticle`) REFERENCES `tr_article` (`idArticle`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_User_has_Article_User` FOREIGN KEY (`User_idUser`) REFERENCES `tr_user` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
