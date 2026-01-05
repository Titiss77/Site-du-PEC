<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DisciplineSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['nom' => 'Monopalme', 'description' => 'Vitesse et ondulations.', 'image' => 'monopalme.jpg'],
            ['nom' => 'Bi-palmes', 'description' => 'Technique et cardio.', 'image' => 'bipalmes.jpg'],
            ['nom' => 'Apnée', 'description' => 'Maîtrise et relaxation.', 'image' => 'apnee.jpg'],
        ];
        $this->db->table('disciplines')->insertBatch($data);
    }
}