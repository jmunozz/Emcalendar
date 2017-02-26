	<section>
		<center><h1>Signin</h1></center>
		<div class="container">
		<form method="post"
		action=<?=$this->url_base.'/signin'?>>
			<h3>Entrez vos informations</h3>
			<?php if ($alert) { ?>
				<p class="red"><?php echo $alert;?></p>
			<?php }?>
			<label class="block">Nom</label>
			<input  type="text" name="nom" placeholder="ex: Jordan">
			<label class="block">Prenom</label>
			<input  type="text" name="prenom" placeholder="ex: Munoz">
			<label class="block">Mot de passe</label>
			<input type="text" name="pwd" placeholder="ex:root">
			<label class="block">Mail</label>
			<input type="text" name="email" placeholder="ex:abc@hotmail.com">
			<label class="block">Comité</label>
			<?php include ('views/comite_input.php'); ?>
			<button class="link-button" type="submit" name="submit" value="1">Valider</button>
			</form>
		</div>
	</section>
		<div class="container">
			<a href=<?=$this->url_base?>>
			<span class="button inline right">Accueil</span>
		</a>
	</div>
