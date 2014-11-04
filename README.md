CRS
===

DATABASE CREATION
Log into the database as a root user: mysql -u root -p [then enter password]
To create the database:  create database crs; 
To create a user that can access the database:  grant all privileges on crs.* to 'crs'@'localhost' identified by 'crs';
To reload the privileges within the DBMS: flush privileges; 

ON the commandline: 

for i in ~/CRS/*.sql ; do mysql -u crs -pcrs crs < $i ; done 



