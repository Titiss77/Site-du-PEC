<?php

namespace App\Models;

use CodeIgniter\Model;

class Extention extends Model
{
    protected $table = 'extention';
    protected $primaryKey = 'id'; // Supposons une colonne 'id' auto-incrémentée

    protected $allowedFields = ['site', 'ext']; // Colonnes de la table

    /**
     * Récupère la liste de toutes les extensions et sites.
     * @return array
     */
    public function getExtensions()
    {
        // Retourne un tableau simple {site: 'Nightflix', ext: '.world'}
        return $this->findAll();
    }
}