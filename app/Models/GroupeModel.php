<?php

namespace App\Models;

use CodeIgniter\Model;

class GroupeModel extends Model
{
    protected $table = 'groupes';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $protectFields = true;

    protected $allowedFields = [
        'nom', 'description', 'tranche_age', 'horaire_resume',
        'prix', 'image', 'ordre', 'codeCouleur'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    /**
     * Récupère tous les groupes triés par ordre
     * * @return array
     */
    public function getGroupes()
    {
        return $this
            // On sélectionne le nom, et pour les autres colonnes, on prend la "première" valeur trouvée
            ->select('nom')
            ->select('MAX(groupes.description) as description')
            ->select('MAX(tarifs.description) as descriptionTatifs')
            ->select('MAX(tranche_age) as tranche_age')
            ->select('MAX(horaire_resume) as horaire_resume')
            ->select('MAX(image) as image')
            ->select('MAX(codeCouleur) as codeCouleur')
            ->select('MAX(prix) as prix')
            ->join('tarifs', 'tarifs.idGroupe = groupes.id', 'left')
            ->groupBy('groupes.nom')
            ->orderBy('MAX(ordre)', 'ASC')
            ->findAll();
    }

    public function getTarifs()
    {
        return $this
            // On sélectionne le nom, et pour les autres colonnes, on prend la "première" valeur trouvée
            ->select('groupes.nom')
            ->select('tarifs.description as prix')
            ->select('tarifs.prix as prix')
            ->join('tarifs', 'tarifs.idGroupe = groupes.id', 'left')
            ->groupBy('groupes.nom')
            ->orderBy('MAX(ordre)', 'ASC')
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