	<section>
		<center><h1>Add</h1></center>
		<div class="container">
		<form method="post"
		action=<?=$this->url_base.'/add'?>>
			<h3>Entrez vos informations</h3>
			<?php if ($alert) { ?>
				<p class="red"><?php echo $alert;?></p>
			<?php }?>
			<label class="block">Titre</label>
			<input  type="text" name="titre" placeholder="ex: Happy Hour démocratique">
			<label class="block">Catégorie</label>
			<input  type="text" name="categorie" placeholder="ex: Réunion thématique">
			<label class="block">Lieu</label>
			<input type="text" name="lieu" placeholder="ex: Place Marcel Sembat">
			<label class="block">Date</label>
			<div class='wrapper' id='w_date'>
				<input type="date" name="date" placeholder="ex: 11/03/2017">
			</div>
			<label class="block">Heure</label>
			<input type="text" name="heure" placeholder="ex:10:30">
			<label class="block">Comité</label>
			<?php include ('views/comite_input.php'); ?>
			<label class="block">Description</label>
			<textarea name="description" placeholder=
			"ex: Rejoignez-nous pour discuter d'Europe...">
			</textarea>
			<label class="block">Cet évènement est visible pour tous ?</label>
			<?php include ('views/onoff_input.php'); ?>
			<button class="link-button" type="submit" name="submit" value="1">Valider</button>
			</form>
		</div>
	</section>
		<div class="container">
			<a href=<?=$this->url_base?>>
			<span class="button inline right">Accueil</span>
		</a>
	</div>
	<script src=<?=$this->url_base.'/assets/js/dateinput.js'?>></script>
	<script src=<?=$this->url_base.'/assets/js/form.js'?>></script>
