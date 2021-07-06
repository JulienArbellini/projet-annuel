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
-- Index pour la table `tr_article`
--
ALTER TABLE `tr_article`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Déchargement des données de la table `tr_article`
--

INSERT INTO `tr_article` (`id`, `title`, `content`, `slug`, `createdAt`) VALUES
(1, 'Test article', 'Ceci est un test pour la création d un article', '/article-test', '2021-04-21 10:56:51');


-- --------------------------------------------------------

--
-- Structure de la table `tr_category`
--

CREATE TABLE `tr_category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour la table `tr_category`
--
ALTER TABLE `tr_category`
  ADD PRIMARY KEY (`id`);

-- --------------------------------------------------------

--
-- Structure de la table `tr_category_has_Article`
--

CREATE TABLE `tr_category_has_Article` (
  `Category_idCategory` int(11) NOT NULL,
  `Article_idArticle` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contraintes pour la table `tr_category_has_Article`
--
ALTER TABLE `tr_category_has_Article`
  ADD CONSTRAINT `fk_Category_has_Article_Article1` FOREIGN KEY (`Article_idArticle`) REFERENCES `tr_article` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Category_has_Article_Category1` FOREIGN KEY (`Category_idCategory`) REFERENCES `tr_category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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

--
-- Contraintes pour la table `tr_comment`
--
ALTER TABLE `tr_comment`
  ADD CONSTRAINT `fk_Comment_Article1` FOREIGN KEY (`Article_idArticle`) REFERENCES `tr_article` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Comment_User1` FOREIGN KEY (`User_idUser`) REFERENCES `tr_user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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

--
-- Contraintes pour la table `tr_media`
--
ALTER TABLE `tr_media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Media_User1_idx` (`User_idUser`);

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
-- Index pour la table `tr_page`
--
ALTER TABLE `tr_page`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Déchargement des données de la table `tr_page`
--

INSERT INTO `tr_page` (`id`, `title`, `content`, `slug`, `page_accueil`, `createdAt`) VALUES
(1, 'Accueil', 'Bienvenue sur la page d accueil', '\accueil', 1, '2021-06-30 07:45:18');

-- --------------------------------------------------------

--
-- Structure de la table `tr_page_has_User`
--

CREATE TABLE `tr_page_has_User` (
  `Page_idPage` int(11) NOT NULL,
  `User_idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour la table `tr_page_has_User`
--
ALTER TABLE `tr_page_has_User`
  ADD PRIMARY KEY (`Page_idPage`,`User_idUser`),
  ADD KEY `fk_Page_has_User_User1_idx` (`User_idUser`),
  ADD KEY `fk_Page_has_User_Page1_idx` (`Page_idPage`);

--
-- Contraintes pour la table `tr_page_has_User`
--
ALTER TABLE `tr_page_has_User`
  ADD CONSTRAINT `fk_Page_has_User_Page1` FOREIGN KEY (`Page_idPage`) REFERENCES `tr_page` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Page_has_User_User1` FOREIGN KEY (`User_idUser`) REFERENCES `tr_user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;


--
-- Déchargement des données de la table `tr_page_has_User`
--

INSERT INTO `tr_page_has_User` (`Page_idPage`, `User_idUser`) VALUES
(1, 1),


-- --------------------------------------------------------

--
-- Structure de la table `tr_role`
--

CREATE TABLE `tr_role` (
  `id` int(11) NOT NULL,
  `status` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour la table `tr_role`
--
ALTER TABLE `tr_role`
  ADD PRIMARY KEY (`id`);

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

--
-- Index pour la table `tr_setting`
--
ALTER TABLE `tr_setting`
  ADD PRIMARY KEY (`id`);

-- --------------------------------------------------------

--
-- Structure de la table `tr_setting_has_User`
--

CREATE TABLE `tr_setting_has_User` (
  `Setting_idSetting` int(11) NOT NULL,
  `User_idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Index pour la table `tr_setting_has_User`
--
ALTER TABLE `tr_setting_has_User`
  ADD PRIMARY KEY (`Setting_idSetting`,`User_idUser`),
  ADD KEY `fk_Setting_has_User_User1_idx` (`User_idUser`),
  ADD KEY `fk_Setting_has_User_Setting1_idx` (`Setting_idSetting`);


--
-- Contraintes pour la table `tr_setting_has_User`
--
ALTER TABLE `tr_setting_has_User`
  ADD CONSTRAINT `fk_Setting_has_User_Setting1` FOREIGN KEY (`Setting_idSetting`) REFERENCES `tr_setting` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Setting_has_User_User1` FOREIGN KEY (`User_idUser`) REFERENCES `tr_user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;


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
-- Index pour la table `tr_user`
--
ALTER TABLE `tr_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `fk_User_Role1_idx` (`Role_idRole`);

--
-- Contraintes pour la table `tr_user`
--
ALTER TABLE `tr_user`
  ADD CONSTRAINT `fk_User_Role1` FOREIGN KEY (`Role_idRole`) REFERENCES `tr_role` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Déchargement des données de la table `tr_user`
--

INSERT INTO `tr_user` (`id`, `lastname`, `firstname`, `email`, `password`, `pseudo`, `createdAtUser`, `Role_idRole`, `confirmkey`, `confirmation`, `code_confirmation_mdp`, `confirmationKeyTmtp`, `connected`) VALUES
(1, 'Rajendran', 'Waruny', 'waruny@hotmail.fr', 'A67Fgv#dg', 'WarunyR', '2021-07-02 18:45:18', 1, '', 0, NULL, NULL, NULL),

-- --------------------------------------------------------

--
-- Structure de la table `tr_user_has_Article`
--

CREATE TABLE `tr_user_has_Article` (
  `User_idUser` int(11) NOT NULL,
  `Article_idArticle` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour la table `tr_user_has_Article`
--
ALTER TABLE `tr_user_has_Article`
  ADD PRIMARY KEY (`User_idUser`,`Article_idArticle`),
  ADD KEY `fk_User_has_Article_Article1_idx` (`Article_idArticle`),
  ADD KEY `fk_User_has_Article_User_idx` (`User_idUser`);

--
-- Contraintes pour la table `tr_user_has_Article`
--
ALTER TABLE `tr_user_has_Article`
  ADD CONSTRAINT `fk_User_has_Article_Article1` FOREIGN KEY (`Article_idArticle`) REFERENCES `tr_article` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_User_has_Article_User` FOREIGN KEY (`User_idUser`) REFERENCES `tr_user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

--
-- Déchargement des données de la table `tr_user_has_Article`
--

INSERT INTO `tr_user_has_Article` (`User_idUser`, `Article_idArticle`) VALUES
(1, 1),

 
--
-- Contraintes pour les tables déchargées
--











/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
