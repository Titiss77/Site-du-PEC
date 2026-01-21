<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PlanningSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'categorie' => 'scolaire',
                'date'      =>  '2025 - 2026',    
                'image'     => '33',
            ],
            [
                'categorie' => 'vacances',
                'date'      =>  'du 15/12 au 20/12',    
                'image'     => '34',
            ],
            [
                'categorie' => 'competitions',
                'date'      =>  '2025 - 2026',    
                'image'     => '35',
            ],
        ];

        // Utilisation de insertBatch pour plus d'efficacité
        $this->db->table('plannings')->insertBatch($data);
    }
}