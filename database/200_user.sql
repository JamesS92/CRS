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
	
	
INSERT INTO `user` VALUES (1,'jim','System','User','',3,1415713173,NULL,NULL,NULL),(2,'ocf','ocf','OCF',NULL,2,1415713177,1,NULL,NULL),(3,'saphj1','Hilmar','Jay',NULL,2,1415713177,1,NULL,NULL),(4,'sapjbs','Jenni','Swettenham',NULL,2,1415713177,1,NULL,NULL),(5,'sappmf','Phillip','Fayers',NULL,2,1415713177,1,NULL,NULL),(6,'sapkds','Krish','Singh',NULL,2,1415713177,1,NULL,NULL),(7,'sapdj1','Derek','Jones',NULL,2,1415713177,1,NULL,NULL),(8,'sapsm7','Suresh','Muthukumaraswamy',NULL,2,1415713177,1,NULL,NULL),(9,'saprgw','Richard','Wise',NULL,2,1415713177,1,NULL,NULL),(10,'sagld1','Lisa','Kennedy',NULL,2,1415713177,1,NULL,NULL),(11,'sapeh1','Elanor','Hinton',NULL,2,1415713177,1,NULL,NULL),(12,'saplw1','Ley','Woolley',NULL,2,1415713177,1,NULL,NULL),(13,'fmrib','fmrib','User',NULL,2,1415713177,1,NULL,NULL),(14,'sapal2','Alex','Leemans',NULL,2,1415713177,1,NULL,NULL),(15,'sapnj','Nicole','Bridson',NULL,2,1415713177,1,NULL,NULL),(16,'sapms5','Martin','Stuart',NULL,2,1415713177,1,NULL,NULL),(17,'saprn','Rami','Niazy',NULL,2,1415713177,1,NULL,NULL),(18,'sapfb2','Frederic','Boy',NULL,2,1415713177,1,NULL,NULL),(19,'sapmm4','Matthew','Mundy',NULL,2,1415713177,1,NULL,NULL),(20,'sapmbl','Michael','Lewis',NULL,2,1415713177,1,NULL,NULL),(21,'sapdmd','Dominic','Dwyer',NULL,2,1415713177,1,NULL,NULL),(22,'sapnw1','Nicola','Weston',NULL,2,1415713177,1,NULL,NULL),(23,'sopap','Ankush','Prashar',NULL,2,1415713177,1,NULL,NULL),(24,'sapje1','John','Evans',NULL,2,1415713177,1,NULL,NULL),(25,'sop4ng','Nicola','Goodall',NULL,2,1415713177,1,NULL,NULL),(26,'sgl0drd','David','Davies',NULL,2,1415713177,1,NULL,NULL),(27,'sacim','Ian','Merrick',NULL,2,1415713177,1,NULL,NULL),(28,'sapak','Andrew','Kolarik',NULL,2,1415713177,1,NULL,NULL),(29,'sdc','sdc','Internal',NULL,2,1415713177,1,NULL,NULL),(30,'sgljhd','Huw','Davies',NULL,2,1415713177,1,NULL,NULL),(31,'sapskr','Simon','Rushton',NULL,2,1415713177,1,NULL,NULL),(32,'sapktp','Kyle','Pattinson',NULL,2,1415713177,1,NULL,NULL),(33,'sgl1mw','Martin','Wolstencroft',NULL,2,1415713177,1,NULL,NULL),(34,'sapps','Petroc','Sumner',NULL,2,1415713177,1,NULL,NULL),(35,'meg','meg','MEG',NULL,2,1415713177,1,NULL,NULL),(36,'sacrae','Richard','Edden',NULL,2,1415713177,1,NULL,NULL),(37,'sapjeh1','Jane','Herron',NULL,2,1415713177,1,NULL,NULL),(38,'eeg','eeg','EEG',NULL,2,1415713177,1,NULL,NULL),(39,'sapfd','Fahimeh','Dargi',NULL,2,1415713177,1,NULL,NULL),(40,'sismfg','Martyn','Guest',NULL,2,1415713177,1,NULL,NULL),(41,'siscak','Christine','Kitchen',NULL,2,1415713177,1,NULL,NULL),(42,'sapif','Ian','Fawcett',NULL,2,1415713177,1,NULL,NULL),(43,'sap2jps','Jonathan','Shine',NULL,2,1415713177,1,NULL,NULL),(44,'sapdjg','David','Griffiths',NULL,2,1415713177,1,NULL,NULL),(45,'sapcsf','Carina','Fraser',NULL,2,1415713177,1,NULL,NULL),(46,'sapcv3','Visitor','Cubric',NULL,2,1415713177,1,NULL,NULL),(47,'sapksg','Kim','Graham',NULL,2,1415713177,1,NULL,NULL),(48,'sapadl','Andrew','Lawrence',NULL,2,1415713177,1,NULL,NULL),(49,'saptf','Tom','Freeman',NULL,2,1415713177,1,NULL,NULL),(50,'saplv','Louise','Venables',NULL,2,1415713177,1,NULL,NULL),(51,'sappaw1','Paul','Warren',NULL,2,1415713177,1,NULL,NULL),(52,'sapab6','Aline','Bompas',NULL,2,1415713177,1,NULL,NULL),(53,'scmhl2','Huw','Lynes',NULL,2,1415713177,1,NULL,NULL),(54,'saplhe','Lisa','Evans',NULL,2,1415713177,1,NULL,NULL),(55,'sapjcs','Justin','Savage',NULL,2,1415713177,1,NULL,NULL),(56,'sapjc','John','Culling',NULL,2,1415713177,1,NULL,NULL),(57,'sapmnl','Mathieu','Lavandier',NULL,2,1415713177,1,NULL,NULL),(58,'sapms','Mia','Schmidt-Hansen',NULL,2,1415713177,1,NULL,NULL),(59,'sapag1','Andrea','Greve',NULL,2,1415713177,1,NULL,NULL),(60,'sapdm2','David','McGonigle',NULL,2,1415713177,1,NULL,NULL),(61,'sapnsl','Natalia','Lawrence',NULL,2,1415713177,1,NULL,NULL),(62,'wmdkh','Khalid','Hamandi',NULL,2,1415713177,1,NULL,NULL),(63,'sac4lje','Lisa','Evans',NULL,2,1415713177,1,NULL,NULL),(64,'sapav','Alice','Varnava',NULL,2,1415713177,1,NULL,NULL),(65,'sbisjp','Stephen','Paisey',NULL,2,1415713177,1,NULL,NULL),(66,'sbi4gas','Gaynor','Smith',NULL,2,1415713177,1,NULL,NULL),(67,'sac4dc','Dominic','Caswell',NULL,2,1415713178,1,NULL,NULL),(68,'saphm3','Helen','Morgan',NULL,2,1415713178,1,NULL,NULL),(69,'wphjmc','James','Coulson',NULL,2,1415713178,1,NULL,NULL),(70,'sapcc','Christopher','Chambers',NULL,2,1415713178,1,NULL,NULL),(71,'sapss10','Steve','Smith',NULL,2,1415713178,1,NULL,NULL),(72,'sap2rle','Rachael','Elward',NULL,2,1415713178,1,NULL,NULL),(73,'sisjao','James','Osborne',NULL,2,1415713178,1,NULL,NULL),(74,'sapzf','Zhao','Fan',NULL,2,1415713178,1,NULL,NULL),(75,'sapjsk','Jonathan','Kennedy',NULL,2,1415713178,1,NULL,NULL),(76,'sapgp1','Guillaume','Poirier',NULL,2,1415713178,1,NULL,NULL),(77,'sapjk','Jane','Klemen',NULL,2,1415713178,1,NULL,NULL),(78,'sapsdv','Seralynne','Vann',NULL,2,1415713178,1,NULL,NULL),(79,'soptz','Tetyana','Zayats',NULL,2,1415713178,1,NULL,NULL),(80,'sopjg','Jez','Guggenheim',NULL,2,1415713178,1,NULL,NULL),(81,'wpmalj','Anna','Jolly',NULL,2,1415713178,1,NULL,NULL),(82,'sbiajs','Andrew','Stewart',NULL,2,1415713178,1,NULL,NULL),(83,'sapss8','Spiro','Stathakis',NULL,2,1415713178,1,NULL,NULL),(84,'saphcw','Hilary','Watson',NULL,2,1415713178,1,NULL,NULL),(85,'sapjem','John','Marsh',NULL,2,1415713178,1,NULL,NULL),(86,'wpmjmc','James','Coulson',NULL,2,1415713178,1,NULL,NULL),(87,'wpcxc','Xavier','Caseras',NULL,2,1415713178,1,NULL,NULL),(88,'sapew','Edward','Wilding',NULL,2,1415713178,1,NULL,NULL),(89,'sapkm2','Kevin','Murphy',NULL,2,1415713178,1,NULL,NULL),(90,'saphm2','Hamid','Mohseni',NULL,2,1415713178,1,NULL,NULL),(91,'sbinap1','Nicolaas','Puts',NULL,2,1415713178,1,NULL,NULL),(92,'sapbtd','Benjamin','Dunkley',NULL,2,1415713178,1,NULL,NULL),(93,'dvcam','dvcam','Drop',NULL,2,1415713178,1,NULL,NULL),(94,'sapwjm','William','Macken',NULL,2,1415713178,1,NULL,NULL),(95,'scm4jem','James','Mullineux',NULL,2,1415713178,1,NULL,NULL),(96,'fsl','fsl','user',NULL,2,1415713178,1,NULL,NULL),(97,'sapad5','Ana','Diukova',NULL,2,1415713178,1,NULL,NULL),(98,'wmdmo1','Michael','O\'sullivan',NULL,2,1415713178,1,NULL,NULL),(99,'sapig','Iain','Gilchrist',NULL,2,1415713178,1,NULL,NULL),(100,'sapcpa','Christopher','Allen',NULL,2,1415713178,1,NULL,NULL),(101,'sapvk','Veldri','Kurniawan',NULL,2,1415713178,1,NULL,NULL),(102,'sapwz','Wen','Zhang',NULL,2,1415713178,1,NULL,NULL),(103,'sapjes','Jessica','Smith',NULL,2,1415713178,1,NULL,NULL),(104,'sapsb7','Sonya','Bells',NULL,2,1415713178,1,NULL,NULL),(105,'sapah3','Ashley','Harris',NULL,2,1415713178,1,NULL,NULL),(106,'sapgp4','Gavin','Perry',NULL,2,1415713178,1,NULL,NULL),(107,'sac5cp','Christian','Page',NULL,2,1415713178,1,NULL,NULL),(108,'waans','Neeraj','Saxena',NULL,2,1415713178,1,NULL,NULL),(109,'wpmas28','Anurag','Saxena',NULL,2,1415713178,1,NULL,NULL),(110,'sapsa7','Sabina','Aziz',NULL,2,1415713178,1,NULL,NULL),(111,'sapld4','Luke','Dustan',NULL,2,1415713178,1,NULL,NULL),(112,'sapsd2','Sean','Deoni',NULL,2,1415713178,1,NULL,NULL),(113,'wpmcyp','Chuen','Poon',NULL,2,1415713178,1,NULL,NULL),(114,'sap7ad','Amie','Doidge',NULL,2,1415713178,1,NULL,NULL),(115,'sbiamp2','Alice','Palmer',NULL,2,1415713178,1,NULL,NULL),(116,'sap3jjw','Jennifer','Ware',NULL,2,1415713178,1,NULL,NULL),(117,'sbijrd','Julie','Dumont',NULL,2,1415713178,1,NULL,NULL),(118,'wpcpak','Paul','Keedwell',NULL,2,1415713178,1,NULL,NULL),(119,'sbidjk1','Deborah','Knight',NULL,2,1415713178,1,NULL,NULL),(120,'saptg','Tommaso','Gili',NULL,2,1415713178,1,NULL,NULL),(121,'sapsak','Sophie','Keeley',NULL,2,1415713178,1,NULL,NULL),(122,'matlab','matlab','user',NULL,2,1415713178,1,NULL,NULL),(123,'sbiea','Emmanuel','Asante-Asamani',NULL,2,1415713178,1,NULL,NULL),(124,'sarsj','Sam','Jelfs',NULL,2,1415713178,1,NULL,NULL),(125,'sapmd2','Mickael','Deroche',NULL,2,1415713178,1,NULL,NULL),(126,'sapmm6','Marcel','Meyer',NULL,2,1415713178,1,NULL,NULL),(127,'ftpuser','ftpuser','user',NULL,2,1415713178,1,NULL,NULL),(128,'saplk1','Loes','Koelewijn',NULL,2,1415713178,1,NULL,NULL),(129,'sapsd4','Sharon','Dirckx',NULL,2,1415713178,1,NULL,NULL),(130,'sapgi','Giandomenico','Iannetti',NULL,2,1415713178,1,NULL,NULL),(131,'sap7md','Martynas','Dervinis',NULL,2,1415713178,1,NULL,NULL),(132,'sapcm6','Claudia','Metzler-Baddeley',NULL,2,1415713178,1,NULL,NULL),(133,'sapkel1','Karen','Lythe',NULL,2,1415713178,1,NULL,NULL),(134,'scm6gp','Greg','Parker',NULL,2,1415713178,1,NULL,NULL),(135,'sbi6bkc','Bonni','Crawford',NULL,2,1415713178,1,NULL,NULL),(136,'sapmm7','Mareike','Menz',NULL,2,1415713178,1,NULL,NULL),(137,'jzm8bas','Brett','Salmons',NULL,2,1415713178,1,NULL,NULL),(138,'sbi6me','Martin','Engel',NULL,2,1415713178,1,NULL,NULL),(139,'sbi7lmk','Lisa','Kluen',NULL,2,1415713178,1,NULL,NULL),(140,'jzm6pr','Priya','Rajyaguru',NULL,2,1415713178,1,NULL,NULL),(141,'jzm8mw','Michael','Wild',NULL,2,1415713178,1,NULL,NULL),(142,'sapseg','Sian','Robson',NULL,2,1415713178,1,NULL,NULL),(143,'sappt2','Periklis','Trigkas',NULL,2,1415713178,1,NULL,NULL),(144,'scmadm','Andrew','Marshall',NULL,2,1415713178,1,NULL,NULL),(145,'waaamt','Ann','Taylor',NULL,2,1415713178,1,NULL,NULL),(146,'jzm4cwp','Ceri','Price',NULL,2,1415713178,1,NULL,NULL),(147,'sapkk1','Kris','Kinsey',NULL,2,1415713178,1,NULL,NULL),(148,'sbialp2','Anna','Powell',NULL,2,1415713178,1,NULL,NULL),(149,'sapnlg','Nathalia','Gjersoe',NULL,2,1415713178,1,NULL,NULL),(150,'saptev','Timothy','Vivian-Griffiths',NULL,2,1415713178,1,NULL,NULL),(151,'sap5jw','Jessica','Watts',NULL,2,1415713178,1,NULL,NULL),(152,'sapewi','Edward','Ingamells',NULL,2,1415713178,1,NULL,NULL),(153,'sapljh1','Laura','Hanley',NULL,2,1415713178,1,NULL,NULL),(154,'sapja2','Joe','Andersen',NULL,2,1415713178,1,NULL,NULL),(155,'sapab8','Andreas','Bungert',NULL,2,1415713178,1,NULL,NULL),(156,'sapsjc1','Sarah','Carrington',NULL,2,1415713178,1,NULL,NULL),(157,'sapsd5','sylvia','de',NULL,2,1415713178,1,NULL,NULL),(158,'sap7nc1','Natasha','Clarke',NULL,2,1415713178,1,NULL,NULL),(159,'jzm4ab','Alexandra','Berditchevskaia',NULL,2,1415713178,1,NULL,NULL),(160,'sap5mk','Michail','Kozlov',NULL,2,1415713178,1,NULL,NULL),(161,'sbikb1','Kathryn','Bowles',NULL,2,1415713178,1,NULL,NULL),(162,'sbimf','Marija','Fjodorova',NULL,2,1415713178,1,NULL,NULL),(163,'sbivhr1','Victoria','Roberton',NULL,2,1415713178,1,NULL,NULL),(164,'sapps2','Paul','Snell',NULL,2,1415713178,1,NULL,NULL),(165,'sapcah2','Charles','Hounsell',NULL,2,1415713178,1,NULL,NULL),(166,'sapec4','Emma','Cheetham',NULL,2,1415713178,1,NULL,NULL),(167,'saprc7','Robin','Carhart-Harris',NULL,2,1415713178,1,NULL,NULL),(168,'wpmdh2','Danielle','Huckle',NULL,2,1415713178,1,NULL,NULL),(169,'sap4agj','Andreas','Jarvstad',NULL,2,1415713178,1,NULL,NULL),(170,'sap8gab','Gemma','Budge',NULL,2,1415713178,1,NULL,NULL),(171,'saplmj','Leah','Juliff',NULL,2,1415713178,1,NULL,NULL),(172,'waaarw','Antony','Wilkes',NULL,2,1415713178,1,NULL,NULL),(173,'c1043874','Panagiotis','Kovanis',NULL,2,1415713178,1,NULL,NULL),(174,'sap8hr','Heather','Richardson',NULL,2,1415713178,1,NULL,NULL),(175,'saplb4','Lisa','Brindley',NULL,2,1415713178,1,NULL,NULL),(176,'sbi5cwl','Christopher','Laurie',NULL,2,1415713178,1,NULL,NULL),(177,'c0954825','Haakon','Engen',NULL,2,1415713178,1,NULL,NULL),(178,'sbiakh1','Ann','Harvey',NULL,2,1415713178,1,NULL,NULL),(179,'sapph1','Peter','Hobden',NULL,2,1415713178,1,NULL,NULL),(180,'c1043972','Alan','Stone',NULL,2,1415713178,1,NULL,NULL),(181,'sapea1','Elaine','Anderson',NULL,2,1415713178,1,NULL,NULL),(182,'wchcj','Christine','Jones',NULL,2,1415713178,1,NULL,NULL),(183,'wpcmlc','Miriam','Cooper',NULL,2,1415713178,1,NULL,NULL),(184,'sceaj2','Amirhossein','Jafarian',NULL,2,1415713179,1,NULL,NULL),(185,'jzm7jd','James','Dalton',NULL,2,1415713179,1,NULL,NULL),(186,'c1005692','Gráinne','Mc',NULL,2,1415713179,1,NULL,NULL),(187,'c1041263','Alexander','Shaw',NULL,2,1415713179,1,NULL,NULL),(188,'wpcdl','David','Linden',NULL,2,1415713179,1,NULL,NULL),(189,'jzm6mhj','Matthew','Jones',NULL,2,1415713179,1,NULL,NULL),(190,'c0505167','Jessica','Steventon',NULL,2,1415713179,1,NULL,NULL),(191,'c1025972','Marcello','Venzi',NULL,2,1415713179,1,NULL,NULL),(192,'c1008401','Claris','Diaz',NULL,2,1415713179,1,NULL,NULL),(193,'c1029742','Brittany','Davis',NULL,2,1415713179,1,NULL,NULL),(194,'sapmj2','Marloes','Janssen',NULL,2,1415713179,1,NULL,NULL),(195,'sapsk2','Sarah','Krall',NULL,2,1415713179,1,NULL,NULL),(196,'sapjl5','Jonas','Louisse',NULL,2,1415713179,1,NULL,NULL),(197,'sap3cjh','Carl','Hodgetts',NULL,2,1415713179,1,NULL,NULL),(198,'c1058797','Isabelle','Habes',NULL,2,1415713179,1,NULL,NULL),(199,'jzm8sf','Sophie','Fitzsimmons',NULL,2,1415713179,1,NULL,NULL),(200,'sapwf','Wilson','Fung',NULL,2,1415713179,1,NULL,NULL),(201,'scmcc2','Cyril','Charron',NULL,2,1415713179,1,NULL,NULL),(202,'sapmp3','Mark','Postans',NULL,2,1415713179,1,NULL,NULL),(203,'sapmgb','Molly','Bright',NULL,2,1415713179,1,NULL,NULL),(204,'sapsd6','Simon','Dymond',NULL,2,1415713179,1,NULL,NULL),(205,'wpmhp4','Howell','William',NULL,2,1415713179,1,NULL,NULL),(206,'sap8kc','Kathleen','Christiansen',NULL,2,1415713179,1,NULL,NULL),(207,'sap7rjc','Rosanna','Chapman',NULL,2,1415713179,1,NULL,NULL),(208,'sap7ljw','Laura','Westacott',NULL,2,1415713179,1,NULL,NULL),(209,'sap9ls2','Laura','Stockwell',NULL,2,1415713179,1,NULL,NULL),(210,'sapjm5','Jim','Myers',NULL,2,1415713179,1,NULL,NULL),(211,'sapul','Ute','Leonards',NULL,2,1415713179,1,NULL,NULL),(212,'sappee','PSYCH','External',NULL,2,1415713179,1,NULL,NULL),(213,'c1158268','Jennifer','Brealy',NULL,2,1415713179,1,NULL,NULL),(214,'c1145739','Esther','Warnert',NULL,2,1415713179,1,NULL,NULL),(215,'c1055416','Ilona','Lipp',NULL,2,1415713179,1,NULL,NULL),(216,'wmdvt2','Valentina','Tomassini',NULL,2,1415713179,1,NULL,NULL),(217,'c1157409','Matthieu','Berjon',NULL,2,1415713179,1,NULL,NULL),(218,'sma4ng','Neil','Goulding',NULL,2,1415713179,1,NULL,NULL),(219,'wpmnt3','Neeta','Tailor',NULL,2,1415713179,1,NULL,NULL),(220,'jzm8slr','Sarah','Rollason',NULL,2,1415713179,1,NULL,NULL),(221,'git','git','Git',NULL,2,1415713179,1,NULL,NULL),(222,'sapeh4','Emma','Hart',NULL,2,1415713179,1,NULL,NULL),(223,'sapmd5','Mark','Drakesmith',NULL,2,1415713179,1,NULL,NULL),(224,'wpcbk','Bakir','Karim',NULL,2,1415713179,1,NULL,NULL),(225,'sapam8','Alison','McQueen',NULL,2,1415713179,1,NULL,NULL),(226,'c1159667','Maneesh','Udiawar',NULL,2,1415713179,1,NULL,NULL),(227,'wmdsl8','Sebastian','Luppe',NULL,2,1415713179,1,NULL,NULL),(228,'sapku','Katja','Umla-Runge',NULL,2,1415713179,1,NULL,NULL),(229,'sapelw1','Edward','Wilding',NULL,2,1415713179,1,NULL,NULL),(230,'sapad7','Anirban','Dutt',NULL,2,1415713179,1,NULL,NULL),(231,'whcper','Paulien','Roos',NULL,2,1415713179,1,NULL,NULL),(232,'sapgk3','Gaya','Kedia',NULL,2,1415713179,1,NULL,NULL),(233,'sapko3','Kimberley','O\'Connor',NULL,2,1415713179,1,NULL,NULL),(234,'sce6dw1','Daniel','Watling',NULL,2,1415713179,1,NULL,NULL),(235,'c0804500','Bethan','Hopkin',NULL,2,1415713179,1,NULL,NULL),(236,'jzm6se','jzm6se','',NULL,2,1415713179,1,NULL,NULL),(237,'c1125097','Clara','Erice',NULL,2,1415713179,1,NULL,NULL),(238,'wpcnf','Neil','Fowler',NULL,2,1415713179,1,NULL,NULL),(239,'wpcls4','Leena','Subramanian',NULL,2,1415713179,1,NULL,NULL),(240,'wpcmos','Moses','Sokunbi',NULL,2,1415713179,1,NULL,NULL),(241,'jzm4mh','Michael','Heneghan',NULL,2,1415713179,1,NULL,NULL),(242,'c1034488','Aura','Frizzati',NULL,2,1415713179,1,NULL,NULL),(243,'c1128494','Kacper','Wieczorek',NULL,2,1415713179,1,NULL,NULL),(244,'c1119630','Hannah','Robinson',NULL,2,1415713179,1,NULL,NULL),(245,'selps','Peng','Sun',NULL,2,1415713179,1,NULL,NULL),(246,'c1160035','Brano','Telgarsky',NULL,2,1415713179,1,NULL,NULL),(247,'sap9nw','Naomi','Warne',NULL,2,1415713179,1,NULL,NULL),(248,'sapap4','Andreas','Papadopoulos',NULL,2,1415713179,1,NULL,NULL),(249,'sap7lw','Laura','Whitlow',NULL,2,1415713179,1,NULL,NULL),(250,'sapzf1','Zao','Fan',NULL,2,1415713179,1,NULL,NULL),(251,'sapni','Niklas','Ihssen',NULL,2,1415713179,1,NULL,NULL),(252,'saphm6','Helen','Morgan',NULL,2,1415713179,1,NULL,NULL),(253,'c1231996','Claire','Barnes',NULL,2,1415713179,1,NULL,NULL),(254,'wpmhek','Hannah','Khirwadkar',NULL,2,1415713179,1,NULL,NULL),(255,'wpcjld','Joanne','Doherty',NULL,2,1415713179,1,NULL,NULL),(256,'sapmd6','Markus','Damian',NULL,2,1415713179,1,NULL,NULL),(257,'sapnp5','Nikolaos','Petsas',NULL,2,1415713179,1,NULL,NULL),(258,'sapsh1','Susanne','Hindenach',NULL,2,1415713179,1,NULL,NULL),(259,'sapib1','Imke','Bewersdorf',NULL,2,1415713179,1,NULL,NULL),(260,'c1220465','Caroline','Lewis',NULL,2,1415713179,1,NULL,NULL),(261,'c1159710','Jessica','Morris',NULL,2,1415713179,1,NULL,NULL),(262,'c1241942','Catherine','Foster',NULL,2,1415713179,1,NULL,NULL),(263,'c1154727','Danielle','Wilks',NULL,2,1415713179,1,NULL,NULL),(264,'c1240390','Bethany','Routley',NULL,2,1415713179,1,NULL,NULL),(265,'c1215763','Charlotte','Powell',NULL,2,1415713179,1,NULL,NULL),(266,'c1245734','Amy','Holderness',NULL,2,1415713179,1,NULL,NULL),(267,'c1252726','James','Randle',NULL,2,1415713179,1,NULL,NULL),(268,'spx9jap','Jonathan','Patrick',NULL,2,1415713179,1,NULL,NULL),(269,'c0406258','Claire','Hanley',NULL,2,1415713179,1,NULL,NULL),(270,'c1210219','Marek','Allen',NULL,2,1415713179,1,NULL,NULL),(271,'c1243047','Mark','Mikkelsen',NULL,2,1415713179,1,NULL,NULL),(272,'mdntml','Thomas','Lancaster',NULL,2,1415713179,1,NULL,NULL),(273,'sapkc2','Karen','Caeyenberghs',NULL,2,1415713179,1,NULL,NULL),(274,'wmdbt','Benny','Thomas',NULL,2,1415713179,1,NULL,NULL),(275,'jzm9cw2','Christopher','Wilcox',NULL,2,1415713179,1,NULL,NULL),(276,'sap9ni','Niamh','Ingram',NULL,2,1415713179,1,NULL,NULL),(277,'sap9ss2','Sara','Sayce',NULL,2,1415713179,1,NULL,NULL),(278,'jzm9alf','Amy','Findlay',NULL,2,1415713179,1,NULL,NULL),(279,'mdnsf','Sonya','Foley',NULL,2,1415713179,1,NULL,NULL),(280,'c0721168','Hayley','Giles',NULL,2,1415713179,1,NULL,NULL),(281,'c990228398','Andrew','Lansdown',NULL,2,1415713179,1,NULL,NULL),(282,'mpnpf','Paola','Fuentes',NULL,2,1415713179,1,NULL,NULL),(283,'sapjo1','Jon','Onslow',NULL,2,1415713179,1,NULL,NULL),(284,'wpckl3','Katie','Swaden',NULL,2,1415713179,1,NULL,NULL),(285,'c1261858','Alberto','Merola',NULL,2,1415713179,1,NULL,NULL),(286,'sapes6','Emilia','Sbardella',NULL,2,1415713179,1,NULL,NULL),(287,'sap9nb','Nora','Butkute',NULL,2,1415713179,1,NULL,NULL),(288,'wpmnj1','Nigel','Jenkins',NULL,2,1415713179,1,NULL,NULL),(289,'wmdsmr1','Shuja','Reagu',NULL,2,1415713179,1,NULL,NULL),(290,'c1249036','Anne','Campbell',NULL,2,1415713179,1,NULL,NULL),(291,'sapnm','Nils','Muhlert',NULL,2,1415713179,1,NULL,NULL),(292,'saptb2','Tobias','Bracht',NULL,2,1415713179,1,NULL,NULL),(293,'sapdk','Daniel','Kidger',NULL,2,1415713179,1,NULL,NULL),(294,'sapcb4','Carl','Brunning',NULL,2,1415713179,1,NULL,NULL),(295,'sapkm3','Kaelen','Mendel',NULL,2,1415713179,1,NULL,NULL),(296,'sceyah','Yulia','Hicks',NULL,2,1415713179,1,NULL,NULL),(297,'scmskd','Susan','Doshi',NULL,2,1415713179,1,NULL,NULL),(298,'sso7lhs','Lucy','Sykes',NULL,2,1415713179,1,NULL,NULL),(299,'c0808508','Nicholas','Clifton',NULL,2,1415713179,1,NULL,NULL),(300,'c1134496','Laura','Smith',NULL,2,1415713180,1,NULL,NULL),(301,'sapjs12','Jemma','Sedgmond',NULL,2,1415713180,1,NULL,NULL),(302,'c0514714','Hannah','Furby',NULL,2,1415713180,1,NULL,NULL),(303,'c0705312','Alison','Costigan',NULL,2,1415713180,1,NULL,NULL),(304,'c1255246','Madhukar','Shetty',NULL,2,1415713180,1,NULL,NULL),(305,'saplm8','Lorenzo','Magazzini',NULL,2,1415713180,1,NULL,NULL),(306,'sbipar','Paul','Rimmer',NULL,2,1415713180,1,NULL,NULL),(307,'jzm1lj','Laura','Jackson',NULL,2,1415713180,1,NULL,NULL),(308,'c1150531','Nicolas','Economides',NULL,2,1415713180,1,NULL,NULL),(309,'sap8jmh','Jonathan','Hailwood',NULL,2,1415713180,1,NULL,NULL),(310,'c0928065','Iona','Hartshorn',NULL,2,1415713180,1,NULL,NULL),(311,'c0802436','Deian','Jones',NULL,2,1415713180,1,NULL,NULL),(312,'c1348157','Catalina','Lawrence',NULL,2,1415713180,1,NULL,NULL),(313,'c1150524','Sarah','Mann',NULL,2,1415713180,1,NULL,NULL),(314,'c1025117','Adam','Partridge',NULL,2,1415713180,1,NULL,NULL),(315,'c1360219','Mario','Perez',NULL,2,1415713180,1,NULL,NULL),(316,'c1325124','Loukia','Tzavella',NULL,2,1415713180,1,NULL,NULL),(317,'c1354007','Su','Ye',NULL,2,1415713180,1,NULL,NULL),(318,'c1017129','William','Baker',NULL,2,1415713180,1,NULL,NULL),(319,'jzm5wkf','Wilson','Fung',NULL,2,1415713180,1,NULL,NULL),(320,'sap9shh','Sarah','Hounsell',NULL,2,1415713180,1,NULL,NULL),(321,'c1356468','Alison','Davidson',NULL,2,1415713180,1,NULL,NULL),(322,'sapel3','Emilia','Leszkowicz',NULL,2,1415713180,1,NULL,NULL),(323,'c1008156','Katherine','Fillingham',NULL,2,1415713180,1,NULL,NULL),(324,'c1002449','Alison','Hare',NULL,2,1415713180,1,NULL,NULL),(325,'sapid1','Ian','Driver',NULL,2,1415713180,1,NULL,NULL),(326,'c1003270','Phoebe','Hall',NULL,2,1415713180,1,NULL,NULL),(327,'sapmg6','Michael','Germuska',NULL,2,1415713180,1,NULL,NULL),(328,'sap9rdc','Rory','Cutler',NULL,2,1415713180,1,NULL,NULL),(329,'c1003502','Silas','Fuller',NULL,2,1415713180,1,NULL,NULL),(330,'sapsm9','Sinead','Morrison',NULL,2,1415713180,1,NULL,NULL),(331,'c1354862','Matthew','Jones',NULL,2,1415713180,1,NULL,NULL),(332,'c1022638','Erika','Leonaviciute',NULL,2,1415713180,1,NULL,NULL),(333,'jzm9rw2','Rebecca','Woolf',NULL,2,1415713180,1,NULL,NULL),(334,'sapsrd','Sita','Deeg',NULL,2,1415713180,1,NULL,NULL),(335,'c1345393','George','Zacharopoulos',NULL,2,1415713180,1,NULL,NULL),(336,'sapmb7','Meadhbh','Brosnan',NULL,2,1415713180,1,NULL,NULL),(337,'sapjw12','Joseph','Whittaker',NULL,2,1415713180,1,NULL,NULL),(338,'c1356674','Lorenzo','Magazzini',NULL,2,1415713180,1,NULL,NULL),(339,'c1001026','Ashley','Yarrow-Jenkins',NULL,2,1415713180,1,NULL,NULL),(340,'c1306570','Laura','Baker',NULL,2,1415713180,1,NULL,NULL),(341,'sapech','Elanor','Hinton',NULL,2,1415713180,1,NULL,NULL),(342,'c1367427','Martina','Stefani',NULL,2,1415713180,1,NULL,NULL),(343,'saphc1','Heidi','Castle',NULL,2,1415713180,1,NULL,NULL),(344,'sapbmc1','Bethany','Coad',NULL,2,1415713180,1,NULL,NULL),(345,'c1330468','Thomas','Monfeuga',NULL,2,1415713180,1,NULL,NULL),(346,'c1412440','Tabea','Kamp',NULL,2,1415713180,1,NULL,NULL),(347,'c1212570','Jilu','Mole',NULL,2,1415713180,1,NULL,NULL),(348,'sapjmd','Jose','Miguel',NULL,2,1415713180,1,NULL,NULL),(349,'sapcb5','Clare','Baker',NULL,2,1415713180,1,NULL,NULL),(350,'sapmr4','Maxence','Range',NULL,2,1415713180,1,NULL,NULL),(351,'mpnkb','Kali','Barawi',NULL,2,1415713180,1,NULL,NULL),(352,'mpngw','Gemma','Williams',NULL,2,1415713180,1,NULL,NULL),(353,'c1448723','Wouter','Droog',NULL,2,1415713180,1,NULL,NULL),(354,'saplf2','Leon','Fonville',NULL,2,1415713180,1,NULL,NULL),(355,'c1363621','Adam','Cunningham',NULL,2,1415713180,1,NULL,NULL),(356,'c1228229','Rebecca','Cavill',NULL,2,1415713180,1,NULL,NULL),(357,'c1401735','Sujoy','Saikia',NULL,2,1415713180,1,NULL,NULL),(358,'waask1','Sharmila','Khot',NULL,2,1415713180,1,NULL,NULL),(359,'jzm2gam','Gauhar','Malik',NULL,2,1415713180,1,NULL,NULL),(360,'c1203780','Jack','Butler',NULL,2,1415713180,1,NULL,NULL),(361,'jzm6tb1','Thomas','Baumer',NULL,2,1415713180,1,NULL,NULL),(362,'c1325604','Hannah','Chandler',NULL,2,1415713180,1,NULL,NULL),(363,'c1248317','Geoffrey','Megardon',NULL,2,1415713180,1,NULL,NULL),(364,'wpmnt8','Nikolaos','Tsarouchas',NULL,2,1415713180,1,NULL,NULL),(365,'c1134962','Christopher','Allen',NULL,2,1415713180,1,NULL,NULL),(366,'c1465333','Diana','Dima',NULL,2,1415713180,1,NULL,NULL),(367,'c1410177','Sophie','Georgiou',NULL,2,1415713180,1,NULL,NULL),(368,'c1456340','Eirini','Messaritaki',NULL,2,1415713180,1,NULL,NULL),(369,'c0802850','Robert','Morgan',NULL,2,1415713180,1,NULL,NULL),(370,'c1400442','Hannah','Riskin-Jones',NULL,2,1415713180,1,NULL,NULL),(371,'c1452445','Ryan','Whyte',NULL,2,1415713180,1,NULL,NULL),(372,'c1117447','Huw','Williams',NULL,2,1415713180,1,NULL,NULL),(373,'c1472493','Dita','Yustisia',NULL,2,1415713180,1,NULL,NULL),(374,'c1451732','Clara','Humpston',NULL,2,1415713180,1,NULL,NULL),(375,'sapdh1','Daniel','Hucker',NULL,2,1415713180,1,NULL,NULL),(376,'c1103147','Harriet','Smith',NULL,2,1415713180,1,NULL,NULL),(377,'sapcl4','Ching-Po','Lin',NULL,2,1415713180,1,NULL,NULL),(378,'saplk3','li-Wei','Kuo',NULL,2,1415713180,1,NULL,NULL),(379,'sapad8','Alessandro','D\'Ambrosio',NULL,2,1415713180,1,NULL,NULL),(380,'sapwe','Work','experience',NULL,2,1415713180,1,NULL,NULL);
  

UPDATE user SET email='' WHERE id=1;

# SELECT * FROM user; 

