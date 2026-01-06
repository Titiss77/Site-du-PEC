<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CoachSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nom'         => 'Thierry Henri',
                'description' => 'Coach principal pour les jeunes et espoirs.',
                'photo'       => 'thierry_henri.jpg'
            ],
            [
                'nom'         => "Martin Lespagnol",
                'description' => 'Coach des jeunes le samedi et section.',
                'photo'       => 'martin_lespagnol.jpg'
            ],
        ];
        $this->db->table('coaches')->insertBatch($data);
    }
}