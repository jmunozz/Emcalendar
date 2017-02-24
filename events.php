<div class='event' <?php echo 'id="event_'.$i.'"' ?>>
	<div class='event_date'>
		<span class='white align_center block'><h5><?php echo $res['jour'] ?></h5></span>
		<span class='white align_center block'><?php echo utf8_encode($res['mois']); ?></span>
	</div><!--
	--><div class='content'>
			<div class='content_hover white align_center'>
				<br />
				<span>En savoir plus</span>
			</div>
			<div class='content_top block'>
				<span class='event_type'><b><?php echo $res['categorie'] ?></b></span><span class="event_titre"><?php echo $res['titre']?></span>
			</div>
			<div class='content_bottom'>
			<span class='material-icons'>schedule</span><span class="e_heure"><?php echo $res['heure'] ?>
			</span><span class='material-icons'>account_circle</span>
			<span class="e_comite"><?php echo $res['comite'] ?></span>
			<span class='material-icons'>place</span>
			<span class="e_lieu"><?php echo $res['lieu'] ?></span>
			</div>
			<div class="content_hidden">
			<span class="e_des"><?php echo $res['description'] ?></span>
			</div>
	</div>
</div>
