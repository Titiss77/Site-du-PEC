<?php

namespace App\Models;

use CodeIgniter\Model;

class PartenaireModel extends Model
{
    protected $table = 'partenaires';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array'; 
    protected $useSoftDeletes = false;
    protected $protectFields = true;

    // Mise à jour des champs autorisés
    protected $allowedFields = [
        'nom',
        'image_id', // Remplacé image_url par image_id
        'site_web',
        'ordre'
    ];

    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    // Règles de validation mises à jour
    protected $validationRules = [
        'nom' => 'required|min_length[3]|max_length[100]',
        'image_id' => 'required|integer', // Validation sur l'ID maintenant
        'site_web' => 'permit_empty|valid_url|max_length[255]',
        'ordre' => 'permit_empty|integer'
    ];

    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    public function getPartenaires()
    {
        return $this
            ->select('partenaires.nom, partenaires.ordre')
            // Jointure et on garde le nom de clé 'image_url' pour ne pas casser la vue
            ->select('images.path as image_url')
            ->join('images', 'partenaires.image_id = images.id', 'left')
            ->orderBy('partenaires.ordre', 'ASC')
            ->findAll();
    }
}