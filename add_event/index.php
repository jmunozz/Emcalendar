<!DOCTYPE html>
<html>
<?php
	include('../insert.php');
	include('../class.bdd.php');
	include ('../header/header.html');
?>
	<body>
<?php
	include ('../header/menu.php');
?>
	<div class="main">
	<div class='form'>
		<section id="i">
			<p> Ajouter un évènement </p>
		</section>
		<section>
			<input id='titre' type='text' placeholder="Nom de l'évènement"></input>
		</section>
		<section>
			<input id='categorie' type='text' placeholder="Catégorie"></input>
		</section>
		<section>
			<input id='lieu' type='text' placeholder="Lieu"></input>
		</section>
		<section>
			<div class='wrapper' id='w_date'>
			<input type='date' id='date' name="date3" placeholder='Date'/>
			</div>
		</section>
		<section>
			<input id='heure' type='text' placeholder="Heure (hh:mm)"></input>
		</section>
		<section>
			<div class='select-style'>
        	<select id="f_co">
			    <option id="comite" value="" disabled selected hidden>Comité organisateur</option>
<?php
				$result = get_table_field('em_comites', 'id', 'name');
				while (($res = mysqli_fetch_assoc($result)))
					echo '<option value="'.$res['id'].'">'.$res['name'].'</option>';
?>
			</select>
			</div>
		</section>
		<script src="dateinput.js"></script>
		<section>
			<textarea placeholder='Description' id='wrapper_des' name="description" cols="50" rows="5"></textarea>
		</section>
		<section>
		<div class="inline"><p>Cet évènement est privé (visible uniquement par les adhérents)</p></div>
		<div class="inline onoffswitch">
			<input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch" checked>
			<label class="onoffswitch-label" for="myonoffswitch">
				<span class="onoffswitch-inner"></span>
				<span class="onoffswitch-switch"></span>
			</label>
		</div>
		</section>
		<section>
			<center>
				<span class='button b_form' id="form_prev">Prévisualiser</span>
				<span class='button b_form' id="form_val">Valider</span>
			</center>
		</section>
	</div>
	</div>
	<script src="form.js"></script>
	</body>
<html>
