<?php

/*
** Singleton pattern to call database connexion.
*/

class bdd_connexion {

	static private $_host = 'localhost';
	static private $_user = 'root';
	static private $_pwd = 'root';
	static private $_base = 'em_database';

	public static  $bdd = null;

	static function get_bdd() {
		if (is_null(self::$bdd)) {
			self::$bdd = self::_sql_connexion();
		}
		return (self::$bdd);
	}

	static private function _sql_connexion() {
	try {
		$bdd = new mysqli(self::$_host, self::$_user, self::$_pwd, self::$_base);
	}
	catch (Exception $e)  {
		echo "'Error: ".$e->get_message();
		return (NULL);
	}
		return($bdd);
	}

	private function __construct() {
	}
}
?>
