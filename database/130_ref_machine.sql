CREATE TABLE `ref_machine` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`name` varchar(512) NOT NULL,
	`description` varchar(4096), 
	`status_id` int(10) unsigned DEFAULT 1,
	`create_time` int(10) unsigned NOT NULL,
	`create_usr_id` int(10) unsigned DEFAULT NULL,
	`update_time` int(10) unsigned DEFAULT NULL,
	`update_usr_id` int(10) unsigned DEFAULT NULL, 
 	 primary key (`id`), 
	KEY `fk_ref_machine_status_id` (`status_id`), 
	CONSTRAINT `fk_ref_machine_status_id` FOREIGN KEY (`status_id`) REFERENCES `ref_status` (`id`) 
	) ENGINE=InnoDB DEFAULT CHARSET=utf8; 
