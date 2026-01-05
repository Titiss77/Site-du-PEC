<?php

namespace App\Models;

use CodeIgniter\Model;

class Categories extends Model
{
	protected $db;
	protected $table;

	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
		$this->db = \Config\database::connect();
		$this->table = 'categorie';
	}

	/**
	 * Renvoie la liste des Categories du blog
	 */
	function getLesCategories()
	{
		$req = 'SELECT id, libelle, idHeader FROM `categorie` ORDER BY id;';
		$rs = $this->db->query($req);
		$lesCategories = $rs->getResultArray();
		return $lesCategories;
	}

	/**
	 * Retourne les informations pour une Categorie
	 *
	 * @param int $idCategorie
	 * @return array|null
	 */
	public function getUnCategorie($idCategorie)
	{  // Correction ici : singulier
		$req = 'SELECT id, libelle, idHeader FROM `categorie` WHERE id = ?';

		// On utilise bien la variable définie dans les parenthèses au-dessus
		$rs = $this->db->query($req, array($idCategorie));

		return $rs->getFirstRow('array');
	}

	/**
	 * Renvoie les catégories associées à un Header spécifique
	 * @param int $idHeader
	 */
	public function getCategoriesParHeader($idHeader)
	{
		$req = 'SELECT id, libelle, idHeader FROM `categorie` WHERE idHeader = ? ORDER BY libelle;';
		$rs = $this->db->query($req, [$idHeader]);
		return $rs->getResultArray();
	}
}
