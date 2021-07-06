-- 
-- Contrainte de la bdd `teachr`
-- 

ALTER TABLE `tr_article`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

ALTER TABLE `tr_category`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `tr_category_has_Article`
  ADD CONSTRAINT `fk_Category_has_Article_Article1` FOREIGN KEY (`Article_idArticle`) REFERENCES `tr_article` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Category_has_Article_Category1` FOREIGN KEY (`Category_idCategory`) REFERENCES `tr_category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `tr_comment`
  ADD CONSTRAINT `fk_Comment_Article1` FOREIGN KEY (`Article_idArticle`) REFERENCES `tr_article` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Comment_User1` FOREIGN KEY (`User_idUser`) REFERENCES `tr_user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `tr_media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Media_User1_idx` (`User_idUser`);

ALTER TABLE `tr_page`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

ALTER TABLE `tr_page_has_User`
  ADD PRIMARY KEY (`Page_idPage`,`User_idUser`),
  ADD KEY `fk_Page_has_User_User1_idx` (`User_idUser`),
  ADD KEY `fk_Page_has_User_Page1_idx` (`Page_idPage`);
  ADD CONSTRAINT `fk_Page_has_User_Page1` FOREIGN KEY (`Page_idPage`) REFERENCES `tr_page` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Page_has_User_User1` FOREIGN KEY (`User_idUser`) REFERENCES `tr_user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;


ALTER TABLE `tr_role`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `tr_setting`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `tr_setting_has_User`
  ADD PRIMARY KEY (`Setting_idSetting`,`User_idUser`),
  ADD KEY `fk_Setting_has_User_User1_idx` (`User_idUser`),
  ADD KEY `fk_Setting_has_User_Setting1_idx` (`Setting_idSetting`);
  ADD CONSTRAINT `fk_Setting_has_User_Setting1` FOREIGN KEY (`Setting_idSetting`) REFERENCES `tr_setting` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Setting_has_User_User1` FOREIGN KEY (`User_idUser`) REFERENCES `tr_user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;


ALTER TABLE `tr_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `fk_User_Role1_idx` (`Role_idRole`);
  ADD CONSTRAINT `fk_User_Role1` FOREIGN KEY (`Role_idRole`) REFERENCES `tr_role` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;