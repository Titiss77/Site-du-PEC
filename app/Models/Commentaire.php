<?php 

namespace App\Models;

use CodeIgniter\Model;
class Commentaire extends Model {
    protected $db ;
    protected $table;

	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
        $this->db = \Config\database::connect();
        $this->table = 'commentaire' ;
	}

	/**
	 * Renvoie la liste des billets du blog
	 */
	function getLesCommentaires($idBillet) {
		$req = 'select idCommentaire, dateCommentaire, auteurCommentaire, contenuCommentaire from commentaire where idBillet = ? and estValide = "1";';
		$rs = $this->db->query($req, array ($idBillet));
		$lesBillets = $rs->getResultArray();
		return $lesBillets;
	}

	function ajoutCommentaire($nom, $contenu, $idBillet) {
		$req = "INSERT INTO commentaire 
				(dateCommentaire, auteurCommentaire, contenuCommentaire, idBillet, estValide) 
				VALUES (Now(), ?, ?, ?, '0')";
	
		return $this->db->query($req, array($nom, $contenu, $idBillet));
	}
	
	
}