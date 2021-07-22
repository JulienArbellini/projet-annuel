TYPE=TRIGGERS
triggers='CREATE DEFINER=`root`@`%` TRIGGER `after_insert_page` AFTER INSERT ON `tr_page` FOR EACH ROW INSERT INTO tr_page_has_User\n(User_idUser, Page_idPage)\nVALUES (1,NEW.id);'
sql_modes=524288
definers='root@%'
client_cs_names='utf8mb4'
connection_cl_names='utf8mb4_general_ci'
db_cl_names='latin1_swedish_ci'
created=162611438278
