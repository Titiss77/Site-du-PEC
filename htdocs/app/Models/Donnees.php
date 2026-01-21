<?php

namespace App\Models;

use CodeIgniter\Model;

class Donnees extends Model
{
	// Define the table name here
	protected $table = 'general';
	protected $primaryKey = 'id';
	protected $useAutoIncrement = true;
	protected $returnType = 'array';  // or 'object'
	protected $useSoftDeletes = false;

	// Define the fields that can be inserted or updated
	protected $allowedFields = [
		'nomClub',
		'image',
		'logo',
		'description',
		'adresse',
		'email',
		'telephone',
		'facebook',
		'instagram'
	];

	public function getGeneral()
	{
		return $this
			->db
			->table('general')
			->select('i.url as image, i.url as logo, nomClub, description, philosophie, nombreNageurs, projetSportif, lienFacebook, lienInstagram, lienffessm, i.url as logoffessm, lienDrive')
			// Calculs directement dans le select pour la performance
			->select('ROUND(nombreHommes / nombreNageurs * 100, 1) as pourcentH')
			->select('ROUND((nombreNageurs - nombreHommes) / nombreNageurs * 100, 1) as pourcentF')
			->join('images i', 'i.id = general.image and i.id = general.logo and i.id = general.logoffessm')
			->get()
			->getRowArray();
	}

	/**
	 * Méthode générique interne pour récupérer des membres par fonction
	 * Évite la répétition de code (DRY - Don't Repeat Yourself)
	 */
	private function getMembresParFonction(string $titreFonction)
	{
		return $this
			->db
			->table('membres m')
			->select('m.nom, i.url as photo')
			->join('membre_fonction mf', 'm.id = mf.membre_id')
			->join('fonctions f', 'mf.fonction_id = f.id')
			->join('images i', 'i.id = m.photo')
			->where('f.titre', $titreFonction)
			->get()
			->getResultArray();
	}

	public function getCoachs()
	{
		return $this->getMembresParFonction('Coach');
	}

	public function getCoachsFormation()
	{
		return $this->getMembresParFonction('Coach en formation');
	}

	/**
	 * Retourne la liste des disciplines
	 */
	public function getDisciplines()
	{
		return $this
			->db
			->table('disciplines d')
			->select('nom, description, i.url as image')
			->join('images i', 'i.id = d.image')
			->get()
			->getResultArray();
	}

	/**
	 * Retourne la liste des piscines
	 */
	public function getPiscines()
	{
		return $this
			->db
			->table('piscines')
			->select('nom, adresse, type_bassin, i.url as photo')
			->join('images i', 'i.id = piscines.photo')
			->get()
			->getResultArray();
	}

	/**
	 * Retourne les plannings (Scolaire/Vacances)
	 */
	public function getPlannings()
	{
		return $this
			->db
			->table('plannings')
			->select('categorie, date, i.url as image')
			->join('images i', 'i.id = plannings.image')
			->where('categorie !=', 'competitions')
			->orderBy('categorie', 'ASC')
			->get()
			->getResultArray();
	}

	/**
	 * Retourne le calendrier des compétitions
	 */
	public function getCalendrier()
	{
		return $this
			->db
			->table('plannings')
			->select('categorie, date, i.url as image')
			->join('images i', 'i.id = plannings.image')
			->where('categorie', 'competitions')
			->get()
			->getResultArray();
	}

	/**
	 * Retourne le bureau (Exclut les coachs)
	 * Optimisation : Utilisation de GROUP_CONCAT si un membre a plusieurs fonctions
	 */
	public function getBureau()
	{
		return $this
			->db
			->table('membres m')
			->select('m.id, m.nom, i.url as photo, GROUP_CONCAT(f.titre SEPARATOR ", ") AS fonctions')
			->join('membre_fonction mf', 'mf.membre_id = m.id')
			->join('fonctions f', 'f.id = mf.fonction_id')
			->join('images i', 'i.id = m.photo')
			->where('f.titre !=', 'Coach')
			->where('f.titre !=', 'Coach en formation')
			->groupBy('m.id')
			->get()
			->getResultArray();
	}

	public function getBoutique()
	{
		return $this
			->db
			->table('boutique')
			->select('nom, url, description, tranchePrix')
			->get()
			->getResultArray();
	}

	/**
	 * Retourne les actualités par catégorie
	 */
	public function getActualites($categorie)
	{
		return $this
			->db
			->table('actualites a')
			->select('a.titre, a.slug, a.type, a.description, i.url as image, a.date_evenement, a.created_at, m.nom as auteur')
			->join('membres m', 'a.id_auteur = m.id')
			->join('images i', 'i.id = a.image')
			->where([
				'a.statut' => 'publie',
				'a.type' => $categorie
			])
			->orderBy('a.created_at', 'DESC')
			->get()
			->getResultArray();
	}
}