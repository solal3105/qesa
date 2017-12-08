<?php
//Implementation de pattern Singleton
class Connexion{
	private $_bdd = NULL;
	private static $_instance = NULL;

	private function __construct(){
		$this->_bdd = new PDO('mysql:host='.BD_HOST.'; dbname='.BD_DBNAME.';', BD_USER, BD_PWD);
		$this->_bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}

	private function __clone(){}
	private function __wakeup(){}

	public function getInstance(){
		if(is_null(self::$_instance))
			self::$_instance = new Connexion();
		return self::$_instance;
	}
	public function getBdd(){
		return $this->_bdd;
	}
}