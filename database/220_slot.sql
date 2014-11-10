
DROP TABLE IF  EXISTS `slot`; 
CREATE TABLE `slot` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`job_no` int (10) unsigned NOT NULL, 
	`machine_id` int (10) unsigned NOT NULL, 
	`wallclock` int (10) unsigned,
	`memory` DECIMAL (4,3), 
	`cpu_time` int (10) unsigned,
	`io` DECIMAL (4,3),
	`slots` int (10) unsigned, 
	`maxvmem` DECIMAL (4,3),
	`status_id` int(10) unsigned DEFAULT 1,
	`create_time` int(10) unsigned NOT NULL,
	`create_usr_id` int(10) unsigned DEFAULT NULL,
	`update_time` int(10) unsigned DEFAULT NULL,
	`update_usr_id` int(10) unsigned DEFAULT NULL,
	primary key (`id`), 
	KEY `fk_slot_status_id` (`status_id`),
	# KEY `fk_job_no` (`job_no`),
	KEY `fk_machine_id` (`machine_id`),
	CONSTRAINT `fk_slot_status_id` FOREIGN KEY (`status_id`) REFERENCES `ref_status` (`id`),
	# CONSTRAINT `fk_slot_job_no` FOREIGN KEY (`job_no`) REFERENCES `job` (`job_no`),
	CONSTRAINT `fk_slot_machine_id` FOREIGN KEY (`machine_id`) REFERENCES `ref_machine` (`id`)
	) ENGINE=InnoDB DEFAULT CHARSET=utf8;
