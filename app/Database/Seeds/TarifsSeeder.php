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
                
            ],
            [
                'idGroupe'      => '2',
                'description'   => 'Description à prévoir.',
                
            ],
            [
                'idGroupe'      => '3',
                'description'   => 'Description à prévoir.',
            ],
            [
                'idGroupe'      => '4',
                'description'   => 'Description à prévoir.',
            ],
            [
                'idGroupe'      => '5',
                'description'   => 'Description à prévoir.',
            ],
            [
                'idGroupe'      => '6',
                'description'   => 'Description à prévoir.',
            ],
        ];

        // Insertion des données
        $this->db->table('tarifs')->insertBatch($data);
    }
}