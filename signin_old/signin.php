<?php
include ('../insert.php');
include ('../class.bdd.php');

$pre = $_GET['prenom'];
$nom = $_GET['nom'];
$mail = $_GET['mail'];
$co = $_GET['comite'];
$pwd = hash('whirlpool', $_GET['pwd']);
if ($co == 'null' || $co == 'NULL' || $co == 'undefined')
	$co = NULL;
$dr = 'membre';
$result = get_table_field('em_users', 'mail');
while (($res = mysqli_fetch_assoc($result))) {
	if ($mail === $res['mail']){
		echo 'Attention cet utilisateur existe déjà';
		exit();
	}
}
$ret = insert_user($nom, $pre, $mail,$pwd,  $co, $dr);
if ($ret == FALSE)
	echo 'Impossible d\'exécuter la requête';

?>
