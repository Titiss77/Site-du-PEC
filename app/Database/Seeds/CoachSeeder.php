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
                'description' => 'Coach principal.',
                'photo'       => 'thierry_henri.jpg'
            ],
            [
                'nom'         => "Martin L'espagnol",
                'description' => 'Coach des jeunes le samedi et de la section.',
                'photo'       => 'martin_lespagnol.jpg'
            ],
        ];
        $this->db->table('coaches')->insertBatch($data);
    }
}