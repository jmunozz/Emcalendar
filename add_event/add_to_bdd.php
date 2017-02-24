<?php
require_once('../class.bdd.php');
require_once('../insert.php');

file_put_contents('logs', 'La page a bien ete appelee',FILE_APPEND); 
$ti = $_GET['titre'];
$ca = $_GET['categorie'];
$co = $_GET['comite'];
$li = $_GET['lieu'];
$da = get_date($_GET['date'], $_GET['heure']);
$de = $_GET['description'];
$pu = ($_GET['public'] === 'true') ? 1 : 0;

if (insert_event($ti, $ca, $co, $li, $da, $de, $pu) == FALSE)
	echo 'FALSE';

function get_date($date, $hour) {

echo 'date avant: '.$date.PHP_EOL;
$elem = explode('/', $date);
$date = '20'.$elem[2].'-'.$elem[0].'-'.$elem[1];
$hour = ' '.$hour.':00';
echo 'date apres apres: '.$date.$hour.PHP_EOL;
return($date.$hour);

}
?>
