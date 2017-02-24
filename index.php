<!DOCTYPE html>
<html>
<?php
	include ('header/header.html');
	require_once ('insert.php');
	require_once ('class.bdd.php');
?>
<?php
	include('header/menu.php');
?>
	<body>
	<div class="main">
<?php
	$result = get_events();
	$i = 0;
	while (($res = mysqli_fetch_assoc($result)) && ++$i) {
		if ($res['publique'])
			include ('events.php');
		else if (isset($_SESSION['user_id']) && $_SESSION['user_id'] != "")
				include ('events.php');
	}
?>
	</div>
	<script src="details.js"></script>
	</body>
</html>
