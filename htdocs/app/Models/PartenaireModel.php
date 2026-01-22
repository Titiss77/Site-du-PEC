<?php

namespace App\Models;

use CodeIgniter\Model;

class PartenaireModel extends Model
{
    protected $table = 'partenaires';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nom', 'image_id', 'site_web', 'ordre'];

    public function getPartenaires()
    {
        return $this->select('partenaires.nom, partenaires.ordre')
            ->select('images.path as image_url')
            ->join('images', 'partenaires.image_id = images.id', 'left')
            ->orderBy('partenaires.ordre', 'ASC')
            ->findAll();
    }
}