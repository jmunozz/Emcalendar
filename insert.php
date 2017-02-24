<?php

function insert_user($nom, $pre, $mail, $pwd, $co, $dr) {

$bdd = bdd_connexion::get_bdd();

$co = ($co) ? "', '".$co : "";
$co_n = ($co) ? ", comite_id" : "";
$query = "INSERT into em_users (nom, prenom, mail, pwd".$co_n.", droits, date)
VALUES ('".$nom."', '".$pre."', '".$mail."', '".$pwd.$co."', '".$dr."', NOW())";
file_put_contents('logs_user', $query);
if (mysqli_query($bdd, $query) == FALSE)
	return (FALSE);
return (TRUE);
}

function insert_event($ti, $ca, $co, $li, $da, $de, $pu) {

$bdd = bdd_connexion::get_bdd();

$query = "INSERT into em_events (titre, lieu, categorie, comite_id, date, description, publique)
VALUES ('".$ti."', '".$li."', '".$ca."', '".$co."', '".$da."', '".$de."', '".$pu."')";
file_put_contents('logs', $query);
if (mysqli_query($bdd, $query) == FALSE)
	return (FALSE);
return (TRUE);
}

function get_table_field($table, ...$fields) {

	$bdd = bdd_connexion::get_bdd();
	
	$field_nb = count($fields);
	for ($i = 0; $i < $field_nb - 1; $i++)
		$field_str = $field_str.$fields[$i].", ";
	$field_str = $field_str.$fields[$i];

	$query = "SELECT ".$field_str." FROM ".$table;
	$result = mysqli_query($bdd, $query);
	if (!$result)
		echo "there is no result";
	return $result;
}

function get_events() {

	$bdd = bdd_connexion::get_bdd();

	$query =
"SELECT titre, lieu, categorie, em_comites.name AS comite, DAY(date) AS jour, 
MONTHNAME(date) AS mois, DATE_FORMAT(date, '%Hh%i') AS heure, description, publique
FROM em_events
INNER JOIN em_comites
ON em_comites.id = em_events.comite_id
WHERE DATE(date) >= CURRENT_DATE()
ORDER BY date";
	$result = mysqli_query($bdd, $query);
	if (!$result)
		echo "there is no result";
	return $result;
}

function get_elem_by_id($table, $id) {

	$bdd = bdd_connexion::get_bdd();

	$query = "SELECT * FROM ".$table." WHERE id=".$id;
	$result = mysqli_query($bdd, $query);
	return ($result);
}
?>
