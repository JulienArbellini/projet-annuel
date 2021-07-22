TYPE=TRIGGERS
triggers='CREATE DEFINER=`root`@`%` TRIGGER `after_insert_article` AFTER INSERT ON `tr_article` FOR EACH ROW INSERT INTO tr_user_has_Article (User_idUser, Article_idArticle)\nVALUES (1,NEW.id);'
sql_modes=524288
definers='root@%'
client_cs_names='utf8mb4'
connection_cl_names='utf8mb4_general_ci'
db_cl_names='latin1_swedish_ci'
created=162638887255
