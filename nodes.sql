CREATE TABLE 'job' (
	'id' int(10) unsigned NOT NULL AUTO_INCREMENT,
	'hostname' varchar(512) NOT NULL,
	'status_id' int(10) unsigned DEFAULT '1',
	'create_time' int(10) unsigned NOT NULL,
	'create_usr_id' int(10) unsigned DEFAULT NULL,
	'update_time' int(10) unsigned DEFAULT NULL,
	'update_usr_id' int(10) unsigned DEFAULT NULL,
	)
