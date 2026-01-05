<?php 

namespace App\Models;

use CodeIgniter\Model;
class Donnees extends Model {
    protected $db ;

	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
        $this->db = \Config\database::connect();
	}

	/**
	 * Retourne les informations générales du blog
	 *
	 * @return nom du club, description, nombre de nageurs, nombre d'hommes, nombre de femmes sous la forme d'un tableau associatif
	 */
	function getGeneral() {
		$req = 'SELECT image, nomClub, description, philosophie, 
		nombreNageurs, 
		ROUND(nombreHommes / nombreNageurs * 100, 1) as pourcentH, 
		ROUND((nombreNageurs-nombreHommes) / nombreNageurs * 100, 1) as pourcentF,
		projetSportif 
		FROM `general` LIMIT 1';
		$rs = $this->db->query($req);
		$general = $rs->getRowArray();
		return $general;
	}

	/**
	 * Retourne la liste des coachs
	 *
	 * @return nom, description, photo, numTel, mail sous la forme d'un tableau associatif
	 */
	function getCoachs() {
		$req = 'SELECT nom, description, photo, numTel, mail FROM `coaches`';
		$rs = $this->db->query($req);
		$general = $rs->getResultArray();
		return $general;
	}
	
	/**
	 * Retourne la liste des disciplines
	 *
	 * @return nom, description, image sous la forme d'un tableau associatif
	 */
	function getDisciplines() {
		$req = 'SELECT nom, description, image FROM `disciplines`';
		$rs = $this->db->query($req);
		$disciplines = $rs->getResultArray();
		return $disciplines;
	}

	/**
	 * Retourne la liste des piscines
	 *
	 * @return nom, adresse, type_bassin, photo sous la forme d'un tableau associatif
	 */
	function getPiscines() {
		$req = 'SELECT nom, adresse, type_bassin, photo FROM `piscines`';
		$rs = $this->db->query($req);
		$piscines = $rs->getResultArray();
		return $piscines;
	}

	/**
	 * Retourne la liste des plannings (scolaire et vacances)
	 *
	 * @return categorie, date, image sous la forme d'un tableau associatif
	 */
	function getPlannings() {
		$req = 'SELECT categorie, date, image FROM `plannings` WHERE categorie != "competitions" ORDER BY categorie DESC';	

		$rs = $this->db->query($req);
		$plannings = $rs->getResultArray();
		return $plannings;
	}

	/**
	 * Retourne le calendrier des compétitions
	 *
	 * @return categorie, date, image sous la forme d'un tableau associatif
	 */
	function getCalendrier() {
		$req = 'SELECT categorie, date, image FROM `plannings` WHERE categorie = "competitions"';	

		$rs = $this->db->query($req);
		$calendrier = $rs->getRowArray();
		return $calendrier;
	}

	
}