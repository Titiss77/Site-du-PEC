<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PartenairesSeeder extends Seeder
{
    public function run()
    {
        $partenaires = [
            [
                'nom' => 'Boulanger',
                'image_url' => 'boulanger.jpg',
                'site_web' => 'https://www.boulanger.com/',
                'ordre' => 1,
            ],
            [
                'nom' => 'Pomodoro e Basilico',
                'image_url' => 'pomodoro-e-basilico.jpg',
                'site_web' => 'https://www.tripadvisor.fr/Restaurant_Review-g187100-d3381946-Reviews-Pizzeria_Pomodoro_Basilico-Quimper_Finistere_Brittany.html',
                'ordre' => 1,
            ],
        ];

        $this->db->table('partenaires')->insertBatch($partenaires);
    }
}