CREATE TABLE IF NOT EXISTS `huge`.`tecnicos` (
 `tecnico_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
 `tecnico_nombre` text NOT NULL,
 `tecnico_apellido` text NOT NULL,
 `tecnico_usuario` text NOT NULL,
 `tecnico_password` text NOT NULL,
 PRIMARY KEY (`tecnico_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='user tecnico';

/*!40101 SET character_set_client = utf8 */;
INSERT INTO `huge`.`modules` (`module_name`, `module_icon`, `module_menu`, `module_url`, `user_account_type`) VALUES
  ("Tecnicos", '<path d="M8 9.05a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5"/><path d="M1 1a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h.5a.5.5 0 0 0 .5-.5.5.5 0 0 1 1 0 .5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5.5.5 0 0 1 1 0 .5.5 0 0 0 .5.5h.5a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H6.707L6 1.293A1 1 0 0 0 5.293 1zm0 1h4.293L6 2.707A1 1 0 0 0 6.707 3H15v10h-.085a1.5 1.5 0 0 0-2.4-.63C11.885 11.223 10.554 10 8 10c-2.555 0-3.886 1.224-4.514 2.37a1.5 1.5 0 0 0-2.4.63H1z"/>', "Tecnicos", "tecnico", 2);

/*!40101 SET character_set_client = utf8 */;
INSERT INTO `huge`.`administrator` (`admin_name`, `admin_icon`, `admin_menu`, `admin_url`) VALUES
  ("Tecnicos", '<path d="M8 9.05a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5"/><path d="M1 1a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h.5a.5.5 0 0 0 .5-.5.5.5 0 0 1 1 0 .5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5.5.5 0 0 1 1 0 .5.5 0 0 0 .5.5h.5a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H6.707L6 1.293A1 1 0 0 0 5.293 1zm0 1h4.293L6 2.707A1 1 0 0 0 6.707 3H15v10h-.085a1.5 1.5 0 0 0-2.4-.63C11.885 11.223 10.554 10 8 10c-2.555 0-3.886 1.224-4.514 2.37a1.5 1.5 0 0 0-2.4.63H1z"/>', "Tecnicos", "tecnico/admin");