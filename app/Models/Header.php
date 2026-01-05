<?php 

namespace App\Models;

use CodeIgniter\Model;
class Header extends Model {
    protected $db ;
    protected $table;

	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
        $this->db = \Config\database::connect();
        $this->table = 'header' ;
	}

	/**
	 * Renvoie la liste des Header du blog
	 */
	function getLesHeaders() {
		$req = 'SELECT id, libelle FROM `header` ORDER BY libelle';
		$rs = $this->db->query($req);
		$lesHeader = $rs->getResultArray();
		return $lesHeader;
	}

	/**
	 * Retourne les informations pour un Header
	 *
	 * @param $idHeader
	 * @return identifiant, titre et le contenu du Header sous la forme d'un tableau associatif
	 */
	public function getUnHeader($idHeader){
		$req = "SELECT id, libelle FROM `header` WHERE id = ?";
		$rs = $this->db->query($req, array ($idHeader));
		$header = $rs->getFirstRow('array');
		return $header;
	}
}