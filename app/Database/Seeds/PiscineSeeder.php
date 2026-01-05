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
                'adresse'     => '61 Av. des Oiseaux, 29000 Quimper, France',
                'type_bassin' => '25m',
                'photo'       => 'kerlan_vian.jpg'
            ],
            [
                'nom'         => 'Aquarive',
                'adresse'     => "159 Bd de Créac'h Gwen, 29000 Quimper, France",
                'type_bassin' => '25m',
                'photo'       => 'aquarive.png'
            ],
        ];
        $this->db->table('piscines')->insertBatch($data);
    }
}