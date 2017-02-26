<?php

Class Home {

	public $url_base;
	public $bdd;
	public $bdd_obj;

	public function __construct($url_base) {
		$this->url_base = $url_base;
	}

	public function index() {
		require_once ('models/bdd_model.php');
		require_once ('models/home_model.php');
		$user_rights = Home_model::user_is();
		$events = $this->bdd_obj->get_events();
		$i = 0;
		include ('views/header.php');
		include ('views/menu.php');
		include ('views/home.php');
		include ('views/footer.php');
	}

}
