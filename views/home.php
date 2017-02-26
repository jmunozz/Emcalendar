<!doctype html>
<div class="main">
<?php
	foreach ($events as $event) {
		if ($event['publique'])
			include ('views/event.php');
		else if (isset($_SESSION['user_id']) 
		&& $_SESSION['user_id'] != '')
			include ('views/event.php');
	}
?>
</div>
<script src=<?=$this->url_base.'/assets/js/details.js'?>></script>
