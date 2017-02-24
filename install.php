<?php
function	create_table_users($bdd) {

$query = "CREATE TABLE em_users (
		id int NOT NULL AUTO_INCREMENT,
		nom varchar(100) NOT NULL,
	    prenom varchar(100) NOT NULL,
	    mail varchar(100) NOT NULL,
	    pwd varchar(200) NOT NULL,
		comite_id int,
		date DATETIME NOT NULL,
		droits ENUM('admin', 'al', 'membre') NOT NULL,
		PRIMARY KEY (id)
		)";

if (($r = mysqli_query($bdd, $query)))
	echo "em_users table created successfully\n";

}
function	create_table_comites($bdd) {

$query = "CREATE TABLE em_comites (
		id int NOT NULL AUTO_INCREMENT,
		name varchar(100) NOT NULL,
	    animateur varchar(100) NOT NULL,
	    animateur_mail varchar(100),
		PRIMARY KEY (id)
		)";

if (($r = mysqli_query($bdd, $query)))
	echo "em_comites table created successfully\n";

}


function	create_table_events($bdd) {

$query = "CREATE TABLE em_events (
		id	int NOT NULL AUTO_INCREMENT,
		titre varchar(100) NOT NULL,
		lieu varchar(100) NOT NULL,
		comite_id int NOT NULL,
		date DATETIME NOT NULL,
	    description varchar(1000) NOT NULL DEFAULT 'Description de l\'évènement',
		categorie varchar(100) NOT NULL,
		publique boolean NOT NULL DEFAULT FALSE,
		PRIMARY KEY (id)
		)";

if (($r = mysqli_query($bdd, $query)))
	echo "em_events table created successfully\n";
}

function	create_database($db_name, $sql) {

$query = "CREATE DATABASE ".$db_name;
$r = mysqli_query($sql, $query);
}

function	put_bdd_in_french($bdd) {

$query = "SET GLOBAL lc_time_names = 'fr_FR";
if (($r = mysqli_query($bdd, $query)))
	echo "bdd set in french";
}
