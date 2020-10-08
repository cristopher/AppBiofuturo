CREATE TABLE IF NOT EXISTS `huge`.`config` (
 `config_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
 `config_name` text NOT NULL,
 `config_key` text NOT NULL,
 PRIMARY KEY (`config_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='configuración para crecimientofetal.cl';
