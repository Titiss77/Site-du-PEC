<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PiscineSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nom'         => 'Kerlan vian',
                'adresse'     => '47 avenue des oiseaux, 29000, Quimper',
                'type_bassin' => '25m',
                'photo'       => 'kerlan_vian.jpg'
            ],
            [
                'nom'         => 'Aquarive',
                'adresse'     => '1 Boulevard de Creach Gwin, 29000 Quimper',
                'type_bassin' => '25m',
                'photo'       => 'aquarive.png'
            ],
        ];
        $this->db->table('piscines')->insertBatch($data);
    }
}