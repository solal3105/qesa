<?php
require_once(PATH_MODELS."DAO.php");

class TelephoneDAO extends DAO{

	public function getTel($tri = null){
		if ($tri == 'annee_sortie') {
			$res = $this->queryAll("SELECT * FROM telephones WHERE pertinence = 1 ORDER BY  annee_sortie DESC, mois_sortie DESC");
		}
		elseif ($tri != null) {
			$res = $this->queryAll("SELECT * FROM telephones WHERE pertinence = 1 ORDER BY $tri ASC");
		}
		else{
			$res = $this->queryAll("SELECT * FROM telephones WHERE pertinence = 1");
		}
		if($res){
			return $res;
		}
		else {
			$this->getErreur();
			return null;
		}
	}

	public function getAllTels(){
		$res = $this->queryAll("SELECT * FROM telephones");
		if($res){
			return $res;
		}
		else {
			$this->getErreur();
			return null;
		}
	}

	public function getNotes(){
		$res = $this->queryAll('SELECT * FROM notes');
		if($res){
			return $res;
		}
		else {
			$this->getErreur();
			return null;
		}
	}

	public function getAllBrands(){
		$res = $this->queryAll("SELECT distinct(Fabricant) FROM telephones");
		if ($res) {
			return $res;
		}
		else return false;
	}

	public function getAllOS(){
		$res = $this->queryAll("SELECT distinct(OS) FROM telephones");
		if ($res) {
			return $res;
		}
		else return false;
	}

	public function getAllVersions($OS){
		$res = $this->queryAll("SELECT distinct(version_OS) FROM telephones WHERE OS = ?", array($OS));
		if ($res) {
			return $res;
		}
		else return false;
	}

	public function getAllCpu(){
		$res = $this->queryAll("SELECT distinct(cpu) FROM telephones WHERE pertinence = 1");
		if($res){
			return $res;
		}
		else return false;
	}

	public function getAllBattType(){
		$res = $this->queryAll("SELECT distinct(type_batterie) FROM telephones WHERE pertinence = 1");
		if ($res) {
			return $res;
		}
		else return false;
	}

	public function getNewsTels(){
        $res = $this->queryAll("SELECT * FROM telephones WHERE newTel = 1");
        if($res){
            return $res;
        }
        else {
            $this->getErreur();
            return null;
        }
    }

	public function updateTel($tab,$idtel){
		$this->queryRowIns("UPDATE telephones SET Fabricant = :fab, modele = :modele, annee_sortie = :annee, mois_sortie = :mois, masse = :masse, epaisseur = :epaisseur, taille_ecran = :taille, largeur_ecran = :largeur, hauteure_ecran = :hauteur, OS = :os, version_OS = :version, cpu = :cpu, ram = :ram, camera = :cam, capacite_batterie = :capac, type_batterie = :type, memoire = :mem, carte_SD = :sd WHERE ID = :id", array(
				'fab' => $tab['Fabricant'],
				'modele' => $tab['modele'],
				'annee' => $tab['annee_sortie'],
				'mois' => $tab['mois_sortie'],
				'masse' => $tab['masse'],
				'epaisseur' => $tab['epaisseur'],
				'taille' => $tab['taille_ecran'],
				'largeur' => $tab['largeur_ecran'],
				'hauteur' => $tab['hauteure_ecran'],
				'os' => $tab['OS'],
				'version' => $tab['version_OS'],
				'cpu' => $tab['cpu'],
				'ram' => $tab['ram'],
				'cam' => $tab['camera'],
				'capac' => $tab['capacite_batterie'],
				'type' => $tab['type_batterie'],
				'mem' => $tab['memoire'],
				'sd' => $tab['carte_SD'],
				'id' => $idtel));
	}

	public function addTel($t){
		$ratio = $t['hauteurEcran'] / $t['largeurEcran'];
		$param = array($t['marque'], $t['modele'], $t['annee'], $t['mois'], $t['masse'], $t['epaisseur'], $t['tailleEcran'], $t['largeurEcran'], $t['hauteurEcran'], $ratio, $t['typeOs'], $t['versionOs'], $t['processeur'], $t['memoireRam'],$t['resolutionCamera'],$t['capaciteBatterie'],$t['typeBatterie'],$t['capaciteStockage'],$t['cardSlot'], 0, 0, 1);
		
		$this->ecrireDonnees("INSERT INTO `telephones` (`Fabricant`, `modele`, `annee_sortie`, `mois_sortie`, `masse`, `epaisseur`, `taille_ecran`, `largeur_ecran`, `hauteure_ecran`, `Ratio`, `OS`, `version_OS`, `cpu`, `ram`, `camera`, `capacite_batterie`, `type_batterie`, `memoire`, `carte_SD`, `pertinence`, `note`, `newTel`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) ", $param);
		
	}

	//recupére un téléphone grâce à son ID
	public function getTelByID($id){
		$res = $this->queryRow("SELECT * FROM telephones WHERE ID = $id");
		if ($res) {
			return $res;
		}
	}

	public function nouvelleNote($idTel, $n_perf, $n_APN, $n_auto){
		$res = $this->queryRowIns("INSERT INTO notes VALUES (?,?,?,?)", array($idTel,$n_perf,$n_APN,$n_auto));
		if ($res) {
			$this->queryRowIns("UPDATE telephones SET note = 1 WHERE ID = $idTel");
		}
		return $res;
	}

	public function verif_note($idTel){
		$tmp = $this->queryRow("SELECT note FROM telephones WHERE ID = $idTel");
		if ($tmp['note'] == 1) {
			$res = $this->queryRow("SELECT * FROM notes WHERE id = $idTel");
		}
		else $res = null;
		return $res;
	}

	public function updateNote($idTel, $n_perf, $n_APN, $n_auto){
		$res = $this->queryRowIns("UPDATE notes SET note_performance = ?, note_photo = ?, note_autonomie = ? WHERE id = $idTel", array($n_perf,$n_APN,$n_auto));
		if ($res != false) {
			$res = True;
		}
		return $res;
	}

	public function supprimerTel($id){
		$note = $this->queryRow('SELECT note FROM telephones WHERE ID = ?', array($id));

		if ($note) {
			$res2 = $this->queryRowIns('DELETE FROM notes WHERE ID = ?', array($id));
			$res1 = $this->queryRowIns('DELETE FROM telephones WHERE ID = ?', array($id));
			$res = $res1*$res2;
		}
		else $res = $this->queryRowIns('DELETE FROM telephones WHERE ID = ?', array($id));
		return $res;
	}
}
