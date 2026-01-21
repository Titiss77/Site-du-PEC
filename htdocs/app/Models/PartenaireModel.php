<?php

namespace App\Models;

use CodeIgniter\Model;

class PartenaireModel extends Model
{
    protected $table = 'partenaires';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';  // Vous pouvez mettre 'object' si vous préférez manipuler des objets
    protected $useSoftDeletes = false;  // Mettre à true si vous voulez une corbeille (champ deleted_at)
    protected $protectFields = true;

    // Les champs modifiables par le code
    protected $allowedFields = [
        'nom',
        'image_url',
        'site_web',
        'ordre'
    ];

    // Gestion automatique des dates
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    // Règles de validation (sécurité)
    protected $validationRules = [
        'nom' => 'required|min_length[3]|max_length[100]',
        'image_url' => 'required|max_length[255]',
        'site_web' => 'permit_empty|valid_url|max_length[255]',
        'ordre' => 'permit_empty|integer'
    ];

    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    public function getPartenaires()
    {
        return $this
            ->db
            ->table('partenaires')
            ->select('nom, i.url as image, site_web, ordre')
            ->join('images i', 'i.id = partenaires.image')
            ->orderBy('ordre', 'ASC')
            ->get()
            ->getResultArray();
    }
}