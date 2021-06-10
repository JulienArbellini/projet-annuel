-- 
-- Structure de la table `tuto`
-- 

CREATE TABLE IF NOT EXISTS `tuto` (
  `id` tinyint(4) NOT NULL auto_increment,
  `nom` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- 
-- Contenu de la table `tuto`
-- 

INSERT INTO `tuto` VALUES (1, 'Je suis un Zéro !');