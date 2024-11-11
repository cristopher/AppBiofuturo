CREATE TABLE IF NOT EXISTS `huge`.`items` (
 `item_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
 `item_text` text NOT NULL,
 `item_default` int(11) unsigned NOT NULL DEFAULT '0',
 `user_id` int(11) unsigned NOT NULL,
 PRIMARY KEY (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='user item';