CREATE TABLE IF NOT EXISTS `huge`.`trampas` (
 `trampa_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
 `cliente_id` int(11) unsigned NOT NULL,
 `campos_id` int(11) unsigned NOT NULL,
 `trampa_codigo` text NOT NULL,
 `trampa_x` text NOT NULL,
 `trampa_y` text NOT NULL,
 `trampa_activa` int(11) unsigned NOT NULL DEFAULT '0',
 PRIMARY KEY (`trampa_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='user trampa';

/*!40101 SET character_set_client = utf8 */;
INSERT INTO `huge`.`modules` (`module_name`, `module_icon`, `module_menu`, `module_url`, `user_account_type`) VALUES
  ("Trampas", '<path d="M14 3a.7.7 0 0 1-.037.225l-1.684 10.104A2 2 0 0 1 10.305 15H5.694a2 2 0 0 1-1.973-1.671L2.037 3.225A.7.7 0 0 1 2 3c0-1.105 2.686-2 6-2s6 .895 6 2M3.215 4.207l1.493 8.957a1 1 0 0 0 .986.836h4.612a1 1 0 0 0 .986-.836l1.493-8.957C11.69 4.689 9.954 5 8 5s-3.69-.311-4.785-.793"/>', "Trampas", "trampa", 2);

/*!40101 SET character_set_client = utf8 */;
INSERT INTO `huge`.`administrator` (`admin_name`, `admin_icon`, `admin_menu`, `admin_url`) VALUES
  ("Trampas", '<path d="M14 3a.7.7 0 0 1-.037.225l-1.684 10.104A2 2 0 0 1 10.305 15H5.694a2 2 0 0 1-1.973-1.671L2.037 3.225A.7.7 0 0 1 2 3c0-1.105 2.686-2 6-2s6 .895 6 2M3.215 4.207l1.493 8.957a1 1 0 0 0 .986.836h4.612a1 1 0 0 0 .986-.836l1.493-8.957C11.69 4.689 9.954 5 8 5s-3.69-.311-4.785-.793"/>', "Trampas", "trampa/admin");