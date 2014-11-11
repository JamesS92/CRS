DROP TABLE IF EXISTS `user`; 
CREATE TABLE `user` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`username` varchar(512) NOT NULL,
	`firstname` varchar(512) NOT NULL,
	`lastname` varchar(512),
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

