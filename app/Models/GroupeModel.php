<?php

namespace App\Models;

use CodeIgniter\Model;

class GroupeModel extends Model
{
    protected $table            = 'groupes';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = ['nom', 'description', 'tranche_age', 'horaire_resume', 'prix', 'image', 'ordre', 'codeCouleur'];

    // Dates
    protected $useTimestamps = true;

    /**
     * Récupère les groupes triés par ordre défini
     */
    public function getGroupes()
    {
        return $this->orderBy('ordre', 'ASC')->findAll();
    }
}