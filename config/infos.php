<?php
$DB_TYPE ='mysql:';
$DB_HOST= $DB_TYPE.'host=localhost';
$DB_NAME = 'em_db';
$DB_HOSTNAME = $DB_HOST.';dbname='.$DB_NAME;
$DB_USER = 'root';
$DB_PWD = 'root';
$DB_TABLES = array('em_comites', 'em_events', 'em_users');
$SET_TABLES =
	"CREATE TABLE em_users (
		id int NOT NULL AUTO_INCREMENT,
		nom varchar(100) NOT NULL,
	    prenom varchar(100) NOT NULL,
	    mail varchar(100) NOT NULL,
	    pwd varchar(200) NOT NULL,
		comite_id int,
		date DATETIME NOT NULL,
		droits ENUM('admin', 'al', 'membre') NOT NULL,
		PRIMARY KEY (id)
		);
	CREATE TABLE em_comites (
		id int NOT NULL AUTO_INCREMENT,
		name varchar(100) NOT NULL,
	    animateur varchar(100) NOT NULL,
	    animateur_mail varchar(100),
		PRIMARY KEY (id)
		);
	CREATE TABLE em_events (
		id	int NOT NULL AUTO_INCREMENT,
		titre varchar(100) NOT NULL,
		lieu varchar(100) NOT NULL,
		comite_id int NOT NULL,
		date DATETIME NOT NULL,
	    description varchar(1000) NOT NULL DEFAULT 'Description de l\'évènement',
		categorie varchar(100) NOT NULL,
		publique boolean NOT NULL DEFAULT FALSE,
		PRIMARY KEY (id)
		);";
$DB_OPTIONS = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
