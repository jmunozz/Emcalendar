<?php
include ('../insert.php');
include ('../class.bdd.php');
session_name('em');
if (FALSE === session_start()) {
	echo 'La session n\' pu être démarrée';
	exit();
}

$user = $_POST['user'];
file_put_contents('logs_connexion.txt', 'id: user:'+$_POST['user'].' pwd: '.$_POST['pwd'].PHP_EOL, FILE_APPEND);
$pwd = hash('whirlpool', $_POST['pwd']);
$result = get_table_field('em_users', 'id', 'mail', 'pwd', 'droits');
while (($res = mysqli_fetch_array($result))) {
	file_put_contents('logs_connexion.txt', 'test:mail '.$res['mail'].PHP_EOL, FILE_APPEND);
	if ($user === $res['mail']) {
		if ($pwd !== $res['pwd'])
		{
			echo 'Le mot de passe n\'est pas valide';
			exit();
		}
		else {
			$_SESSION['user_id'] = $res['id'];
			$_SESSION['droits'] = $res['droits'];
			exit();
		}
	}
}
echo 'Cette adresse mail n\'existe pas';
exit();
?>
