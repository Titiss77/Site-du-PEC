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
		projetSportif, lienFacebook, lienInstagram
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
		$req = 'SELECT m.nom, m.photo FROM `membres` m JOIN membre_fonction mf ON m.id=mf.membre_id JOIN fonctions f ON mf.fonction_id=f.id WHERE f.titre = "Coach"';
		$rs = $this->db->query($req);
		$coachs = $rs->getResultArray();
		return $coachs;
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
		$calendrier = $rs->getResultArray();
		return $calendrier;
	}

	public function getBureau()
    {
        $req = 'SELECT m.*, GROUP_CONCAT(f.titre SEPARATOR ", ") as fonctions FROM membres m JOIN membre_fonction mf ON mf.membre_id = m.id JOIN fonctions f ON f.id = mf.fonction_id GROUP BY m.id HAVING fonctions NOT LIKE "Coach"';
		$rs = $this->db->query($req);
		$general = $rs->getResultArray();
		return $general;
    }

	public function getBoutique()
	{
		$req = 'SELECT nom, url, description, tranchePrix FROM `boutique`';
		$rs = $this->db->query($req);
		$boutique = $rs->getResultArray();
		return $boutique;
	}
	
	public function getActualites()
	{
		$req = 'SELECT titre, contenu, datePublication, image FROM `actualites` ORDER BY datePublication DESC';
		$rs = $this->db->query($req);
		$actualites = $rs->getResultArray();
		return $actualites;
	}

	
}