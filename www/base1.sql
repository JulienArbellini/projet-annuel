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

-- --------------------------------------------------------

--
-- Structure de la table `tr_user_has_Article`
--

CREATE TABLE `tr_user_has_Article` (
  `User_idUser` int(11) NOT NULL,
  `Article_idArticle` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  MODIFY `idArticle` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `idRole` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tr_setting`
--
ALTER TABLE `tr_setting`
  MODIFY `idSetting` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tr_user`
--
ALTER TABLE `tr_user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT;

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
