DROP DATABASE IF EXISTS crs; 
CREATE DATABASE crs; 
USE crs;
CREATE TABLE `ref_status` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`name` varchar(512) NOT NULL,
	`description` varchar(4096), 
	`status_id` int(10) unsigned,
	`create_time` int(10) unsigned NOT NULL,
	`create_usr_id` int(10) unsigned DEFAULT NULL,
	`update_time` int(10) unsigned DEFAULT NULL,
	`update_usr_id` int(10) unsigned DEFAULT NULL, 
 	 primary key (`id`), 
	KEY `fk_ref_status_status_id` (`status_id`), 
	CONSTRAINT `fk_ref_status_status_id` FOREIGN KEY (`status_id`) REFERENCES `ref_status` (`id`) 
	) ENGINE=InnoDB DEFAULT CHARSET=utf8; 
	
INSERT INTO `ref_status` (`name`,`description`,`status_id`,`create_time`)  VALUES ('null' ,'No value' , 1, UNIX_TIMESTAMP()); 
INSERT INTO `ref_status` (`name`,`description`,`status_id`,`create_time`)  VALUES ('active' ,'Active' , 1, UNIX_TIMESTAMP()); 
INSERT INTO `ref_status` (`name`,`description`,`status_id`,`create_time`)  VALUES ('inactive' ,'Not active' , 1, UNIX_TIMESTAMP()); 
INSERT INTO `ref_status` (`name`,`description`,`status_id`,`create_time`)  VALUES ('pending' ,'Pending' , 1, UNIX_TIMESTAMP());

UPDATE ref_status SET status_id =2 WHERE id > 1; 


CREATE TABLE `ref_queue` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`name` varchar(512) NOT NULL,
	`description` varchar(4096), 
	`status_id` int(10) unsigned DEFAULT 1,
	`create_time` int(10) unsigned NOT NULL,
	`create_usr_id` int(10) unsigned DEFAULT NULL,
	`update_time` int(10) unsigned DEFAULT NULL,
	`update_usr_id` int(10) unsigned DEFAULT NULL, 
 	 primary key (`id`), 
	KEY `fk_ref_queue_status_id` (`status_id`), 
	CONSTRAINT `fk_ref_queue_status_id` FOREIGN KEY (`status_id`) REFERENCES `ref_status` (`id`) 
	) ENGINE=InnoDB DEFAULT CHARSET=utf8; 
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
DROP TABLE IF EXISTS `user`; 
CREATE TABLE `user` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`username` varchar(512) NOT NULL,
	`firstname` varchar(512) NOT NULL,
	`lastname` varchar(512) NOT NULL,
	`email` varchar(128) DEFAULT NULL,
	`status_id` int(10) unsigned DEFAULT 1,
	`create_time` int(10) unsigned NOT NULL,
	`create_usr_id` int(10) unsigned DEFAULT NULL,
	`update_time` int(10) unsigned DEFAULT NULL,
	`update_usr_id` int(10) unsigned DEFAULT NULL,
	PRIMARY KEY (`id`),
	KEY `fk_user_status_id` (`status_id`),
	CONSTRAINT `fk_user_status_id` FOREIGN KEY (`status_id`) REFERENCES `ref_status` (`id`)
	)ENGINE=InnoDB DEFAULT CHARSET=utf8;
	
	
INSERT INTO `user` (`username`, `firstname`, `lastname`, `email`, `status_id`,`create_time`) VALUES ('jim','System','User','',2,UNIX_TIMESTAMP());  

UPDATE user SET email='' WHERE id=1;

# SELECT * FROM user; 

CREATE TABLE `job` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`job_no` int(10) unsigned NOT NULL, 
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

DROP TABLE IF  EXISTS `slot`; 
CREATE TABLE `slot` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`job_no` int (10) unsigned NOT NULL, 
	`machine_id` int (10) unsigned NOT NULL, 
	`memory` int (10) unsigned, 
	`cpu_time` int (10) unsigned,
	`io` int (10) unsigned,
	`slots` int (10) unsigned, 
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
