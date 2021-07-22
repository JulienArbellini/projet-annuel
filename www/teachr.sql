-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : database
-- Généré le : mar. 20 juil. 2021 à 13:54
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
  `id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `content` longtext,
  `slug` varchar(100) NOT NULL,
  `id_user` int(15) DEFAULT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tr_article`
--

INSERT INTO `tr_article` (`id`, `title`, `content`, `slug`, `id_user`, `createdAt`) VALUES
(1, 'Example', '<h2 style=\"text-align: center; font-style: italic;\"><big>Le SQL&nbsp;</big></h2><p>&nbsp;</p><p><big><strong style=\"background-color: rgb(255, 255, 0);\">I- Qu\est-ce que le SQL ?&nbsp;</strong></big></p><p>&nbsp;</p><p>Le&nbsp;<span class=\"marker\"><strong>SQL</strong></span>&nbsp;(Structured Query Language) est un langage permettant de communiquer avec une base de données. Ce langage informatique est notamment très utilisé par les développeurs web pour communiquer avec les données d’un site web. SQL.sh recense des cours de SQL et des explications sur les principales commandes pour lire, insérer, modifier et supprimer des données dans une base.</p><p>&nbsp;</p><p><strong><big style=\"background-color: rgb(255, 255, 0);\">II- SGBD</big></strong></p><p>&nbsp;</p><p>Chaque SGBD possède ses propres spécificités et caractéristiques. Pour présenter ces différences, les logiciels de gestion de bases de données sont cités, tels que : MySQL, PostgreSQL, SQLite, Microsoft SQL Server&nbsp;ou encore&nbsp;Oracle.</p><p>Des SGBD de type NoSQL sont également présentés, tel que Cassandra, Redis ou MongoDB.</p><p><span style=\"background-color: rgb(255, 255, 255);\">&nbsp;</span></p><p><strong><big style=\"background-color: rgb(255, 255, 0);\">III- A quoi sert le SQL ?&nbsp;</big></strong></p><p>&nbsp;</p><p>&nbsp;</p><p>Comme dans la vie, pour que des personnes puissent se comprendre, elles doivent parler le même langage et bien en informatique, c’est pareil.</p><p>Pour que les différents logiciels et le moteur de base de données puissent se comprendre, ils utilisent un langage appelé SQL.</p><p>Ce langage est complet. Il va être utilisé pour :</p><ul><li>Lire les données,</li><li>Ecrire les données,</li><li>Modifier les données,</li><li>Supprimer les données</li><li>Il permettra aussi de modifier la structure de la base de données :</li><li>Ajouter des tables,</li><li>Modifier les tables,</li><li>les supprimer</li><li>Ajouter, ou supprimer des utilisateurs,</li><li>Gérer les droits des utilisateurs,</li><li>Gérer les bases de données&nbsp; : en créer de nouvelles, les modifier, etc …</li></ul><p>Comme vous pouvez le voir, les possibilités sont nombreuses.</p><p>Ce langage est structuré (comme son nom l’indique), c’est à dire que la syntaxe est toujours la même et respecte des normes très précises.&nbsp;</p><p>&nbsp;</p><p><big><strong><span style=\"background-color: rgb(255, 255, 0);\">IV- Optimisation</span>&nbsp;</strong></big></p><p>&nbsp;</p><p>Savoir effectuer des requêtes n’est pas trop difficile, mais il convient de véritablement comprendre comment fonctionne le stockage des données et la façon dont elles sont lues pour optimiser les performances. Les optimisations sont basées dans 2 catégories: les bons choix à faire lorsqu’il faut définir la structure de la base de données et les méthodes les plus adaptées pour lire les données.</p><p>&nbsp;</p><p><strong><span style=\"background-color: rgb(255, 255, 0);\">V- Exemple de code SQL</span>&nbsp;</strong></p><p><strong><br></strong></p><p><img src=\"https://lh3.googleusercontent.com/-S5HFFerJ0L8/Vq7-wsdZGhI/AAAAAAAAEBg/SK5zIdqWkiQ/insert-row5.png?imgmax=800\" alt=\"\" style=\"width: 100%; max-width: 359px; height: auto; max-height: 289px;\"><strong><br></strong></p><p><strong><br></strong></p><p>&nbsp;</p><div id=\"wysiwyg\"></div>', '/example-article', 1, '2021-07-08 15:45:13');

-- --------------------------------------------------------

--
-- Structure de la table `tr_category`
--

CREATE TABLE `tr_category` (
  `id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
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
  `id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
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
  `id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
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
  `id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `content` longtext,
  `slug` varchar(50) NOT NULL,
  `page_accueil` tinyint(1) DEFAULT NULL,
  `id_user` int(15) DEFAULT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tr_page`
--

INSERT INTO `tr_page` (`id`, `title`, `content`, `slug`, `page_accueil`, `id_user`, `createdAt`) VALUES
(1, 'Example', '<div id=\"wysiwyg\"><nav class=\"nav-dropdown\">\r\n                    <ul class=\"ul-menu-dropdown\">\r\n                        <li class=\"li-menu-dropdown deroulant\"><a class=\"a-menu-dropdown\" href=\"#\">Accueil</a></li>\r\n                        <li class=\"li-menu-dropdown\"><a class=\"a-menu-dropdown\" href=\"#\">A propos</a>\r\n                            <ul class=\"sous-dropdown\">\r\n                                <li><a href=\"#\">Item 1</a></li>\r\n                                <li><a href=\"#\">Item 2</a></li>\r\n                                <li><a href=\"#\">Item 3</a></li>\r\n                            </ul>\r\n                        </li>\r\n                        <li class=\"li-menu-dropdown\"><a class=\"a-menu-dropdown\" href=\"#\">Nos offres</a>\r\n                            <ul class=\"sous-dropdown\">\r\n                                <li><a href=\"#\">Item 1</a></li>\r\n                                <li><a href=\"#\">Item 2</a></li>\r\n                                <li><a href=\"#\">Item 3</a></li>\r\n                            </ul>\r\n                        </li>\r\n                        <li class=\"li-menu-dropdown\"><a class=\"a-menu-dropdown\" href=\"#\">Contact</a></li>\r\n                    </ul>\r\n                </nav>\r\n                \r\n                <h1 class=\"h1-tpl2\">Bienvenue sur Teachr !&nbsp;</h1>\r\n                <p>\r\n                    </p><div class=\"zone-texte-tpl2\">\r\n                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin feugiat nulla eu ex sodales, at lobortis eros semper.\r\n                        Curabitur quis felis sit amet lectus tempus egestas. Proin sodales enim at metus accumsan, non vestibulum augue pharetra. \r\n                        Donec maximus lorem lectus, eget congue sem efficitur eu. Pellentesque habitant morbi tristique senectus et netus et \r\n                        malesuada fames ac turpis egestas. Mauris a mi nunc. Aliquam erat volutpat. Curabitur ac sodales justo. \r\n                        Suspendisse et elit rutrum, efficitur mauris eu, tristique odio. In finibus sit amet arcu vitae accumsan. \r\n                        Praesent tincidunt dignissim nulla, in porta velit sagittis at. Vestibulum hendrerit nulla ac nibh sodales vehicula. \r\n                        Sed ac congue lectus, sit amet convallis eros.\r\n                        Phasellus vulputate nisl a posuere pulvinar. In ac velit augue. Aenean velit sem, facilisis eu volutpat et, semper \r\n                        at elit. Sed ut feugiat eros. Nam sed ultrices nulla. Proin accumsan interdum mi id ornare. \r\n                        In gravida ex vitae odio ornare congue.\r\n                        </p>\r\n                    </div>\r\n                <p></p>\r\n\r\n                <p class=\"div-darkBlue-button button-tpl2\">\r\n                    <a href=\"#\" class=\"darkBlue-button-apparence\">En savoir plus</a>\r\n                </p>\r\n\r\n                \r\n                \r\n                </div>', '/example', 1, 1, '2021-07-11 18:58:51');

-- --------------------------------------------------------

--
-- Structure de la table `tr_role`
--

CREATE TABLE `tr_role` (
  `id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
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
  `id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `site_url` varchar(2083) DEFAULT NULL,
  `site_name` varchar(255) DEFAULT NULL,
  `visibility` tinyint(4) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Structure de la table `tr_user`
--

CREATE TABLE `tr_user` (
  `id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `lastname` varchar(255) DEFAULT NULL,
  `firstname` varchar(120) DEFAULT NULL,
  `email` varchar(320) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `pseudo` varchar(120) DEFAULT NULL,
  `createdAtUser` timestamp NULL DEFAULT NULL,
  `Role_idRole` int(11) DEFAULT NULL,
  `confirmkey` varchar(255) DEFAULT NULL,
  `confirmation` tinyint(4) DEFAULT '0',
  `code_confirmation_mdp` varchar(60) DEFAULT NULL,
  `confirmationKeyTmtp` datetime DEFAULT NULL,
  `connected` tinyint(1) DEFAULT NULL,
  `description` varchar(300) DEFAULT NULL,
  `avatar` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Déchargement des données de la table `tr_user`
--

INSERT INTO `tr_user` (`id`, `lastname`, `firstname`, `email`, `password`, `pseudo`, `createdAtUser`, `Role_idRole`, `confirmkey`, `confirmation`, `code_confirmation_mdp`, `confirmationKeyTmtp`, `connected`, `description`, `avatar`) VALUES
(1, 'Doe', 'John', 'john@gmail.com', '$2y$10$LZ9R/74p2VTK2ygitBhACeNABkNCqAfGFFfgjEVN6ti4VdA3gjSe.', 'JohnD', '2021-07-20 15:41:42', 1, '7435646', 1, NULL, NULL, 1, NULL, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `tr_article`
--
ALTER TABLE `tr_article`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `fk_id_user` (`id_user`);

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
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `fk_Page_iduser` (`id_user`);

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
  ADD PRIMARY KEY (`id`) ,
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `fk_User_Role1_idx` (`Role_idRole`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `tr_article`
--
ALTER TABLE `tr_article`
  MODIFY `id` int(11);

--
-- AUTO_INCREMENT pour la table `tr_category`
--
ALTER TABLE `tr_category`
  MODIFY `id` int(11);

--
-- AUTO_INCREMENT pour la table `tr_comment`
--
ALTER TABLE `tr_comment`
  MODIFY `id` int(11);

--
-- AUTO_INCREMENT pour la table `tr_media`
--
ALTER TABLE `tr_media`
  MODIFY `id` int(11);

--
-- AUTO_INCREMENT pour la table `tr_page`
--
ALTER TABLE `tr_page`
  MODIFY `id` int(11);

--
-- AUTO_INCREMENT pour la table `tr_role`
--
ALTER TABLE `tr_role`
  MODIFY `id` int(11);

--
-- AUTO_INCREMENT pour la table `tr_setting`
--
ALTER TABLE `tr_setting`
  MODIFY `id` int(11);

--
-- AUTO_INCREMENT pour la table `tr_user`
--
ALTER TABLE `tr_user`
  MODIFY `id` int(11);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `tr_article`
--
ALTER TABLE `tr_article`
  ADD CONSTRAINT `fk_id_user` FOREIGN KEY (`id_user`) REFERENCES `tr_user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
-- Contraintes pour la table `tr_page`
--
ALTER TABLE `tr_page`
  ADD CONSTRAINT `fk_Page_iduser` FOREIGN KEY (`id_user`) REFERENCES `tr_user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
