<?php
session_name('em');
session_start();
?>
<div class='menu'>
	<div>
		<a href='/'>
		<img alt='logo_emcalendar' src='../img/logo_emcalendar.png'/>
		</a>
	</div>
	<div>
		<span><center><h5>BOULOGNE</h5></center></span>
	</div>
	<div>
<?php
	if (isset($_SESSION['user_id']) && $_SESSION['user_id'] !== "") {
		if (isset($_SESSION['user_id']) && $_SESSION['user_id'] != NULL
		&& isset($_SESSION['droits']) && $_SESSION['droits'] != NULL
		&& $_SESSION['droits'] != 'membre') {
?>
		<div>
		<a href='/add_event' ><span class="button">Ajouter un évènement</span></a>
		</div>
<?php	}
?>
		<div>
		<a href='/'><span class='button' id="deco">Deconnexion</span></a>
		</div>
<?php
	}
	else {
?>
		<div>
			<span class='button' id="co">Connexion</span>
		</div>
		<div>
			<a href="/signin/"><span class='button' id="signin">S'inscrire</span></a>
		</div>
<?php
	}
?>
	</div>
</div>
<script src="../header/menu.js"></script>
