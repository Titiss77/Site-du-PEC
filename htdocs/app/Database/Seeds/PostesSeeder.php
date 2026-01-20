<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PostesSeeder extends Seeder
{
    public function run()
    {
        $postes = [
            [
                'libelle' => 'president',
                'mail' => 'mathisfrances11@gmail.com'
            ],
            [
                'libelle' => 'tresorier',
                'mail' => 'mathisfrances11@gmail.com'
            ],
            [
                'libelle' => 'secretaire',
                'mail' => 'mathisfrances11@gmail.com'
            ],
            [
                'libelle' => 'coach',
                'mail' => 'mathisfrances11@gmail.com'
            ],
        ];

        $this->db->table('postes')->insertBatch($postes);
    }
}