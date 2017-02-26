<?php

define('ERROR_VALUES', serialize(array('comite', 'date et heure')));
define('EMPTY_VALUES', serialize(array('titre', 'categorie', 'comite', 'lieu',
'date', 'heure', 'description')));

Class Add {

	public $url_base;
	public $bdd;
	public $bdd_obj;

	public function __construct($url_base) {
		$this->url_base = $url_base;
	}

	public function index() {

		require_once('models/bdd_model.php');
/*
		if (!$_SESSION['droits'] || $_SESSION['droits'] == 'membre') {
			include ('views/header.php');
			include ('views/unauthorized.php');
			include ('views/footer.php');
		}
*/
//attention pas oublier de changer if en else if
		if (!$_POST['submit'])
			$this->defaut();
		else if ($_POST['submit'])
			$this->traitement();
	}

	private function defaut($alert = NULL) {
		$comite = $this->bdd_obj->get_table_field('em_comites', 'id', 'name');
		include ('views/header.php');
		include ('views/add.php');
		include ('views/footer.php');
	}

	private function traitement() {
		
		require_once('models/add_model.php');
		require_once('models/check_model.php');

		$ti = $this->bdd->quote($_POST['titre']);
		$ca = $this->bdd->quote($_POST['categorie']);
		$co = $_POST['comite'];
		$li = $this->bdd->quote($_POST['lieu']);
		$date = $_POST['date'];
		$heure = $_POST['heure'];
		$de = $this->bdd->quote($_POST['description']);
		$pu = ($_POST['public'] === 'true') ? 1 : 0;

		if (($i = 0) || !$ti || !(++$i)|| !$ca || !(++$i) || !$co
		|| !(++$i)|| !$li || !(++$i)|| !$date || !(++$i) || !$heure || !(++$i) 
		|| !$de) {
			$alert = 'Le champ '.unserialize(EMPTY_VALUES)[$i].' est vide'.PHP_EOL;
			$this->defaut($alert);
			return;
		}

		$da = Add_model::get_date($_POST['date'], $_POST['heure']);
		if (($i = 0) || !Check::_int($co) || !(++$i) || !Check::_datetime($da)) {
			$alert = 'Le champ '.unserialize(ERROR_VALUES)[$i].' est invalide'.PHP_EOL;
			$this->defaut($alert);
			return;
		}
		if (!$this->bdd_obj->insert_event($ti, $ca, $co, $li, $da, $de, $pu)) {
			$alert = $this->bdd_obj->log;
			$this->defaut($alert);
			return;
		}
		$this->success();
		return;
	}

	private function success() {
		$success_message = 'L\'évènement a bien été ajouté';
		include ('views/header.php');
		include ('views/success.php');
		include ('views/footer.php');
	}
}

?>
