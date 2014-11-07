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


