<html>
<?php
	include('../insert.php');
	include('../class.bdd.php');
	include ('../header/header.html');
	include ('../header/menu.php');
?>
	<div class='add'>
	</div>
	<div class='form'>
		<section id="i">
			<p> S'inscrire</p>
		</section>
		<section>
			<input id='s_nom' type='text' placeholder="Prénom"></input>
		</section>
		<section>
			<input id='s_prenom' type='text' placeholder="Nom"></input>
		</section>
		<section>
			<input id='s_mail' type='text' placeholder="Mail"></input>
		</section>
		<section>
			<input id='s_pwd' type='password' placeholder="Choisissez un Mot de passe"></input>
		</section>
		<section>
		<div class="inline"><span>Faîtes-vous parti d'un comité ?</span></div>
		<div class="inline onoffswitch">
			<input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch">
			<label class="onoffswitch-label" for="myonoffswitch">
				<span class="onoffswitch-inner"></span>
				<span class="onoffswitch-switch"></span>
			</label>
		</div>
		</section>
		<section id="s_co_section">
			<div class='select-style'>
        	<select id="s_co">
			    <option id="comite" value="" disabled selected hidden>Sélectionnez un comité</option>
<?php
				$result = get_table_field('em_comites', 'id', 'name');
				while (($res = mysqli_fetch_assoc($result)))
					echo '<option value="'.$res['id'].'">'.$res['name'].'</option>';
?>
			</select>
			</div>
		</section>
		<section>
			<center>
				<span class='button b_form' id="form_val">Valider</span>
			</center>
		</section>
	</div>
	</body>
	<script src="signin.js"></script>
<html>
</html>
