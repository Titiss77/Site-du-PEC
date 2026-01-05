<?php

namespace App\Models;

use CodeIgniter\Model;

class Cartes extends Model
{
    protected $db;
    protected $table;

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->db = \Config\database::connect();
        $this->table = 'amfs';
    }

    /**
     * Crée un nouvel enregistrement dans la table amfs
     * @param array $data Tableau associatif des colonnes à insérer
     */
    public function creerCarte($data)
    {
        // Utilisation du Query Builder pour plus de simplicité et de sécurité sur l'INSERT
        // La fonction insert() de CI4 est préférée ici.
        return $this->db->table($this->table)->insert($data);
    }

    /**
     * Renvoie la liste des Cartes du blog en filtrant par Header et par Utilisateur
     * @param int $idHeader
     * @param int $idUser L'ID de l'utilisateur connecté
     */
    function getLesCartes($idHeader, $idUser)
    {  // <-- AJOUT de $idUser
        // AJOUT de 'AND a.idUser=?' dans la requête
        $req = 'SELECT a.id, a.idUser, a.idCategorie, c.libelle categorie_libelle, h.id idHeader, a.libelle, a.image, a.lien, a.dateLimite dateSortie, a.description, a.saison, a.episode FROM `amfs` a JOIN categorie c ON c.id=a.idCategorie JOIN header h ON h.id=c.idHeader WHERE h.id=? AND a.idUser=?;';
        $rs = $this->db->query($req, [$idHeader, $idUser]);  // <-- PASSAGE de $idUser
        $lesCategories = $rs->getResultArray();
        return $lesCategories;
    }

    /**
     * Récupère les détails d'une seule carte pour le formulaire d'édition
     */
    public function getUneCarte($id)
    {
        $req = 'SELECT * FROM `amfs` WHERE id = ?';
        $rs = $this->db->query($req, [$id]);
        return $rs->getRowArray();
    }

    /**
     * Modifie un enregistrement dans la table amfs
     * @param array $data Tableau associatif des colonnes à modifier
     * @param int $id Identifiant de la carte
     */
    public function modifierCarte($data, $id)
    {
        // Utilisation du Query Builder pour plus de simplicité et de sécurité sur l'UPDATE
        return $this
            ->db
            ->table($this->table)
            ->update($data, ['id' => $id]);
    }

    /**
     * Supprime une carte de la base de données
     */
    public function supprimerCarte($id)
    {
        $req = 'DELETE FROM `amfs` WHERE id = ?';
        return $this->db->query($req, [$id]);
    }
}