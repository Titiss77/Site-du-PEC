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
        'prix', 'image_id', 'ordre', 'codeCouleur' // Changement de 'image' vers 'image_id' ici
    ];

    // Dates
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    /**
     * Récupère tous les groupes triés par ordre
     */
    public function getGroupes()
    {
        return $this->select('groupes.nom, groupes.description, groupes.tranche_age, groupes.horaire_resume, groupes.prix, groupes.codeCouleur')
                    // Jointure et Alias
                    ->select('images.path as image')
                    ->join('images', 'groupes.image_id = images.id', 'left')
                    ->orderBy('groupes.ordre', 'ASC')
                    ->findAll();
    }

    /**
     * Récupère un groupe spécifique par son ID
     */
    public function getGroupeById(int $id)
    {
        return $this->select('groupes.*, images.path as image')
                    ->join('images', 'groupes.image_id = images.id', 'left')
                    ->where('groupes.id', $id)
                    ->first();
    }
}