CREATE TABLE IF NOT EXISTS `huge`.`inspecciones` (
 `inspeccion_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
 `cliente_id` int(11) unsigned NOT NULL,
 `campos_id` int(11) unsigned NOT NULL,
 `inspeccion_fecha` text NOT NULL,
 `tecnico_id` int(11) unsigned NOT NULL,
 PRIMARY KEY (`inspeccion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='user inspeccion';

/*!40101 SET character_set_client = utf8 */;
INSERT INTO `huge`.`modules` (`module_name`, `module_icon`, `module_menu`, `module_url`, `user_account_type`) VALUES
  ("Inspecciones", '<path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>', "Inspecciones", "inspeccion", 2);