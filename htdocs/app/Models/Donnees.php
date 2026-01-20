<?php

namespace App\Models;

use CodeIgniter\Model;

class Donnees extends Model
{
	// Pas besoin de redéfinir $db et le constructeur si tu n'as pas de logique spécifique,
	// CodeIgniter gère la connexion automatiquement.

	/**
	 * Retourne les informations générales du blog
	 */
	public function getGeneral()
	{
		return $this
			->db
			->table('general')
			->select('image, nomClub, description, philosophie, nombreNageurs, projetSportif, lienFacebook, lienInstagram, lienffessm, lienDrive')
			// Calculs directement dans le select pour la performance
			->select('ROUND(nombreHommes / nombreNageurs * 100, 1) as pourcentH')
			->select('ROUND((nombreNageurs - nombreHommes) / nombreNageurs * 100, 1) as pourcentF')
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
			->select('m.nom, m.photo')
			->join('membre_fonction mf', 'm.id = mf.membre_id')
			->join('fonctions f', 'mf.fonction_id = f.id')
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
			->table('disciplines')
			->select('nom, description, image')
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
			->select('nom, adresse, type_bassin, photo')
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
			->select('categorie, date, image')
			->where('categorie !=', 'competitions')
			->orderBy('categorie', 'DESC')
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
			->select('categorie, date, image')
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
			->select('m.*, GROUP_CONCAT(f.titre SEPARATOR ", ") AS fonctions')
			->join('membre_fonction mf', 'mf.membre_id = m.id')
			->join('fonctions f', 'f.id = mf.fonction_id')
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
			->select('a.titre, a.slug, a.type, a.description, a.image, a.date_evenement, a.created_at, m.nom as auteur')
			->join('membres m', 'a.id_auteur = m.id')
			->where([
				'a.statut' => 'publie',
				'a.type' => $categorie
			])
			->orderBy('a.created_at', 'DESC')
			->get()
			->getResultArray();
	}
}