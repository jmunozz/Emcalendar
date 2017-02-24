<html>
<?php
	include ('insert.php');
	include ('class.bdd.php');
	include ('header/header.html');
	include('install.php');
?>
<body>
		<section class="form" id="bdd">
			<h4>Base de donnée</h4>
			<span class="button" id="tester_bdd">Tester</span>
			<span class="button"id="creer_bdd">Créer</span>
		</section>
		<section class="form" id="nom_ville">
			<h4>Ma ville</h4>
			<input type="text" placeholder="Nom de la ville"></input>
		</section>
		<div class="form">
		<section  id="comites">
			<h4>Les comités</h4>
<?php
			$result = get_table_field('em_comites', 'name',
			'animateur', 'animateur_mail');
			if (!$result) {
?>
			<span id="no_comite">Il n'y a aucun comités</span>
<?php
			}
			else {
				$i = 0;
				while (($res = mysqli_fetch_assoc($result)) && ++$i) {
?>
			<ul id=<?php echo '"comite_'.$i.'"' ?>>
				<li class="name">
					<span><b>Nom:</b></span> 
					<span><?php echo $res['name'] ?></span>
				</li>
				<li class="animateur">
					<span><b>Animateur:</b></span> 
					<span><?php echo $res['animateur'] ?></span>
				</li>
				<li class="animateur_mail">
					<span><b>Mail:</b></span>
					<span><?php echo $res['animateur_mail'] ?></span>
					</li>
				<li>
				<span class="button comite modifier">Modifier</span>
				<span class="button comite supprimer">Supprimer</span>
				</li>
			</ul>
<?php
				}
			}
?>
		</section>
		<span class="button" id="comite_creer">Créer un nouveau comité</span>
		</div>
		<script src="config.js"></script>
</body>
</html>
