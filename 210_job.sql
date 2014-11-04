CREATE TABLE `job` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`user_id` int(10) unsigned NOT NULL, 
	`name` varchar(512) NOT NULL,
	`sub_time` int (10) unsigned, 
	`start`	 int (10) unsigned,
	`wall_time` int (10) unsigned, 
	`exit_code` int (10) unsigned, 
	`status_id` int(10) unsigned DEFAULT 1,
	`create_time` int(10) unsigned NOT NULL,
	`create_usr_id` int(10) unsigned DEFAULT NULL,
	`update_time` int(10) unsigned DEFAULT NULL,
	`update_usr_id` int(10) unsigned DEFAULT NULL,
         primary key (`id`), 
 	 KEY `fk_job_status_id` (`status_id`), 
	CONSTRAINT `fk_job_status_id` FOREIGN KEY (`status_id`) REFERENCES `ref_status` (`id`), 
	CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
	) ENGINE=InnoDB DEFAULT CHARSET=utf8; 
