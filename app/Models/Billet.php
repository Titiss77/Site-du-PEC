<?php 

namespace App\Models;

use CodeIgniter\Model;
class Billet extends Model {
    protected $db ;
    protected $table;

	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
        $this->db = \Config\database::connect();
        $this->table = 'billet' ;
	}

	/**
	 * Renvoie la liste des billets du blog
	 */
	function getLesBillets() {
		$req = 'select idBillet as id, dateBillet as date, titreBillet as titre,
              contenuBillet as contenu from BILLET order by idBillet';
		$rs = $this->db->query($req);
		$lesBillets = $rs->getResultArray();
		return $lesBillets;
	}

	/**
	 * Retourne les informations pour un billet
	 *
	 * @param $idBillet
	 * @return identifiant, titre et le contenu du billet sous la forme d'un tableau associatif
	 */
	public function getUnBillet($idBillet){
		$req = "select idBillet as id, dateBillet as date, titreBillet as titre,
                  contenuBillet as contenu from BILLET where idBillet=?";
		$rs = $this->db->query($req, array ($idBillet));
		$billet = $rs->getFirstRow('array');
		return $billet;
	}
}