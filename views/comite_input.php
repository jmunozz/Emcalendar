<select name="comite" id="s_co">
	<option id="comite"  value="" disabled selected hidden>Sélectionnez un comité</option>
<?php
	for($i = 0; $comite[$i]; $i++) {
		echo '<option value="'.$comite[$i]['id'].
		'">'.$comite[$i]['name'].'</option>';
	}
?>
</select>
