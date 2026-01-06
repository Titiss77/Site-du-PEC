<?php

namespace App\Models;

use CodeIgniter\Model;

class BureauModel extends Model
{
    protected $table = 'membres';

    public function getTrombinoscope()
    {
        return $this->db->table('membres m')
            ->select('m.*, GROUP_CONCAT(f.titre SEPARATOR ", ") as fonctions')
            ->join('membre_fonction mf', 'mf.membre_id = m.id', 'left')
            ->join('fonctions f', 'f.id = mf.fonction_id', 'left')
            ->groupBy('m.id')
            ->get()
            ->getResultArray();
    }
}