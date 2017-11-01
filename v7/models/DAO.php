<?php
require_once(PATH_MODELS.'Connexion.php');

abstract class DAO{
	private $_erreur;
	private $_debug;

	public function __construct($debug){
		$this->_debug = $debug;
	}

	public function getErreur(){
		return $this->_erreur;
	}

	private function _requete($sql, $args = NULL){
		if($args == NULL){
			$pdos = Connexion::getInstance()->getBdd()->query($sql);
		}
		else{
			$pdos = Connexion::getInstance()->getBdd()->prepare($sql);
			$pdos->execute($args);
		}
		return $pdos;
	}

	//retourne un tableau 1D ou false
	public function queryRow($sql, $args = NULL){
		try {
			$pdos = $this->_requete($sql,$args);
			$res = $pdos->fetch();
			$pdos->closeCursor();
		} catch (PDOException $e) {
			if ($this->_debug) {
				die($e->getMessage());
			}
			$this->_erreur = 'query';
			$res = false;
		}
		return $res;
	}

	public function queryRowIns($sql, $args = NULL){
		try {
			$pdos = $this->_requete($sql,$args);
			$res = $pdos;
			$pdos->closeCursor();
		} catch (PDOException $e) {
			if ($this->_debug) {
				die($e->getMessage());
			}
			$this->_erreur = 'query';
			$res = false;
		}
		return $res;
	}

	//retourne un tableau 2D ou false
	public function queryAll($sql,$args = NULL){
		try {
			$pdos = $this->_requete($sql,$args);
			$res = $pdos->fetchAll();
			$pdos->closeCursor();
		} catch (PDOException $e) {
			if ($this->_debug) {
				die($e->getMessage());
			}
			$this->_erreur = 'query';
			$res = false;
		}
		return $res;
	}
}