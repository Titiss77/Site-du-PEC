<?php

namespace App\Models;

use CodeIgniter\Model;

class GroupeModel extends Model
{
    protected $table            = 'groupes';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $protectFields    = true;
    protected $allowedFields    = [
        'nom', 'description', 'tranche_age', 'horaire_resume', 
        'prix', 'image', 'ordre', 'codeCouleur'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    /**
     * Récupère tous les groupes triés par ordre
     * * @return array
     */
    public function getGroupes()
    {
        return $this->select('nom, description, tranche_age, horaire_resume, prix, image, codeCouleur')
                    ->orderBy('ordre', 'ASC')
                    ->findAll();
    }

    /**
     * Récupère un groupe spécifique par son ID
     * * @param int $id
     * @return array|null
     */
    public function getGroupeById(int $id)
    {
        return $this->where('id', $id)->first();
    }
}