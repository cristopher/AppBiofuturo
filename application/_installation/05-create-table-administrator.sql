CREATE TABLE IF NOT EXISTS `huge`.`administrator` (
 `admin_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
 `admin_name` text NOT NULL,
 `admin_icon` text NOT NULL,
 `admin_menu` text NOT NULL,
 `admin_url` text NOT NULL,
 PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='modules admin app';

/*!40101 SET character_set_client = utf8 */;
INSERT INTO `huge`.`administrator` (`admin_name`, `admin_icon`, `admin_menu`, `admin_url`) VALUES
  ("Administración de usuarios", '<path fill-rule="evenodd" d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"></path>', "Usuarios", "admin/usuarios");