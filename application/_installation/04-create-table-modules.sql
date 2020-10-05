CREATE TABLE IF NOT EXISTS `huge`.`modules` (
 `module_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
 `module_name` text NOT NULL,
 `module_menu` text NOT NULL,
 `module_url` text NOT NULL,
 `user_account_type` int(11) unsigned NOT NULL,
 PRIMARY KEY (`module_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='modules app';
