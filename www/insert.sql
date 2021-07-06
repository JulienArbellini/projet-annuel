--
-- Structure insert de la base de données `teachr`
--

INSERT INTO `tr_article` (`id`, `title`, `content`, `slug`, `createdAt`) VALUES
(1, 'Test article', 'Ceci est un test pour la création d un article', '/article-test', '2021-04-21 10:56:51');


INSERT INTO `tr_page` (`id`, `title`, `content`, `slug`, `page_accueil`, `createdAt`) VALUES
(1, 'Accueil', 'Bienvenue sur la page d accueil', '\accueil', 1, '2021-06-30 07:45:18');


INSERT INTO `tr_page_has_User` (`Page_idPage`, `User_idUser`) VALUES
(1, 1),

INSERT INTO `tr_role` (`id`, `status`) VALUES
(1, 'Administrateur'),
(2, 'Contributeur'),
(3, 'Spectateur');

INSERT INTO `tr_user` (`id`, `lastname`, `firstname`, `email`, `password`, `pseudo`, `createdAtUser`, `Role_idRole`, `confirmkey`, `confirmation`, `code_confirmation_mdp`, `confirmationKeyTmtp`, `connected`) VALUES
(1, 'Rajendran', 'Waruny', 'waruny@hotmail.fr', 'A67Fgv#dg', 'WarunyR', '2021-07-02 18:45:18', 1, '', 0, NULL, NULL, NULL),

INSERT INTO `tr_user_has_Article` (`User_idUser`, `Article_idArticle`) VALUES
(1, 1),