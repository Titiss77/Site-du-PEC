<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class GroupesSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nom'            => 'Tritons & Sirène',
                'description'    => 'Description à prévoir.',
                'tranche_age'    => '6 - 8 ans',
                'horaire_resume' => 'Samedi',
                'prix'           => 201.00,
                'image'          => 'g1.jpg',
                'ordre'          => 1
            ],
            [
                'nom'            => 'Débutants',
                'description'    => 'Description à prévoir.',
                'tranche_age'    => '9 ans et +',
                'horaire_resume' => '3x / semaine',
                'prix'           => 000.00,
                'image'          => 'g1.jpg',
                'ordre'          => 2
            ],
            [
                'nom'            => 'Jeunes',
                'description'    => 'Description à prévoir.',
                'tranche_age'    => null,
                'horaire_resume' => '4x / semaine',
                'prix'           => 282.00,
                'image'          => 'g1.jpg',
                'ordre'          => 3
            ],
            [
                'nom'            => 'Espoirs',
                'description'    => 'Description à prévoir.',
                'tranche_age'    => null,
                'horaire_resume' => '4x / semaine',
                'prix'           => 282.00,
                'image'          => 'g1.jpg',
                'ordre'          => 4
            ],
            [
                'nom'            => 'Masters',
                'description'    => 'Description à prévoir.',
                'tranche_age'    => null,
                'horaire_resume' => '4x / semaine',
                'prix'           => 000.00,
                'image'          => 'g1.jpg',
                'ordre'          => 5
            ],
        ];

        // Insertion des données
        $this->db->table('groupes')->insertBatch($data);
    }
}