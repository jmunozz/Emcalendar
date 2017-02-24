<?php
session_name('em');
session_start();
print_r($_POST);
if ($_POST['deconnexion']) {
	unset($_SESSION['user_id']);
	unset($_SESSION['droits']);
}
?>
