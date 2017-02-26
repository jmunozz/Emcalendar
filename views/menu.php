<!doctype html>
<div class='menu'>
	<div>
		<a href=<?php echo $this->url_base; ?>><img alt='logo_emcalendar' 
		src="assets/img/logo_emcalendar.png"/>
		</a>
	</div>
		<span><center><h5>BOULOGNE</h5></center></span>
	<div>
<?php	
	if (isset($_SESSION['user_id']) && $_SESSION['user_id'] !='') {
		if ($user_rights == 'al' || $user_rights == 'admin') {
?>
		<div>
			<a href="<?php echo $this->url_base.'/home/ev'; ?>">
			<span class="button">Mes  évènements</span>
			</a>
		</div>
		<div>
			<a href="<?php echo $this->url_base.'/home/co'; ?>">
			<span class="button">Mon  comité</span>
			</a>
		</div>
<?php } ?>
		<div>
			<span class='button' id="deco">Deconnexion</span>
		</div>
<?php
	} else {
?>
		<div>
			<span class='button' id="co">Connexion</span>
		</div>
		<div>
			<a href="<?php echo $this->url_base.'/signin'; ?>">
			<span class='button' id="signin">S'inscrire</span>
			</a>
		</div>
<?php } ?>
	</div>
</div>
