<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TarifsSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'idGroupe'      => '1',
                'description'   => 'Description à prévoir.',
                'prix'          => 200.0,
                
            ],
            [
                'idGroupe'      => '2',
                'description'   => 'Description à prévoir.',
                'prix'          => 200.0,
                
            ],
            [
                'idGroupe'      => '3',
                'description'   => 'Description à prévoir.',
                'prix'          => 200.0,
            ],
            [
                'idGroupe'      => '4',
                'description'   => 'Description à prévoir.',
                'prix'          => 200.0,
            ],
            [
                'idGroupe'      => '5',
                'description'   => 'Description à prévoir.',
                'prix'          => 200.0,
            ],
            [
                'idGroupe'      => '6',
                'description'   => 'Description à prévoir.',
                'prix'          => 200.0,
            ],
        ];

        // Insertion des données
        $this->db->table('tarifs')->insertBatch($data);
    }
}