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
                'image'     => 'planning_scolaire.jpg',
            ],
            [
                'categorie' => 'vacances',
                'date'      =>  'du 15/12 au 20/12',    
                'image'     => 'planning_vacances.jpg',
            ],
            [
                'categorie' => 'competitions',
                'date'      =>  '2025 - 2026',    
                'image'     => 'calendrier_competitions.pdf',
            ],
        ];

        // Utilisation de insertBatch pour plus d'efficacité
        $this->db->table('plannings')->insertBatch($data);
    }
}