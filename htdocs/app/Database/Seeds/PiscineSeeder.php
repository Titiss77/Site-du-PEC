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
                'adresse'     => '47 Av. des Oiseaux, 29000 Quimper, France',
                'type_bassin' => '25m',
                'photo'       => '30'
            ],
            [
                'nom'         => 'Aquarive',
                'adresse'     => "159 Bd de Créac'h Gwen, 29000 Quimper, France",
                'type_bassin' => '25m',
                'photo'       => '31'
            ],
            [
                'nom'         => 'Aquaform',
                'adresse'     => "Piscine aqua forme, Av. du Rouillen, 29500 Ergué-Gabéric, France",
                'type_bassin' => '25m',
                'photo'       => '32'
            ],
        ];
        $this->db->table('piscines')->insertBatch($data);
    }
}