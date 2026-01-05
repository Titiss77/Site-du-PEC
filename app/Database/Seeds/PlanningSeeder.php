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
                'image'     => 'planning_scolaire.jpg',
            ],
            [
                'categorie' => 'vacances',
                'image'     => 'planning_vacances.jpg',
            ],
            [
                'categorie' => 'competitions',
                'image'     => 'calendrier_competitions.jpg',
            ],
        ];

        // Utilisation de insertBatch pour plus d'efficacité
        $this->db->table('plannings')->insertBatch($data);
    }
}