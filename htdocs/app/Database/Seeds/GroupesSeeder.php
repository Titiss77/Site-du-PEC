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
                'description'    => '6 - 8 ans',
                'tranche_age'    => '6 - 8 ans',
                'horaire_resume' => 'Samedi',
                'prix'           => '201.00',
                'image'          => '7',
                'ordre'          => 1,
                'codeCouleur'    => '#92C47D'
            ],
            [
                'nom'            => 'Débutants',
                'description'    => 'à partir de 9 ans',
                'tranche_age'    => '9 et +',
                'horaire_resume' => '3x / semaine',
                'prix'           => '282.00',
                'image'          => '8',
                'ordre'          => 2,
                'codeCouleur'    => '#9FC6E7'
            ],
            [
                'nom'            => 'Jeunes / Espoirs',
                'description'    => 'à partir de 9 ans',
                'tranche_age'    => null,
                'horaire_resume' => '4x / semaine',
                'prix'           => '282.00',
                'image'          => '9',
                'ordre'          => 3,
                'codeCouleur'    => '#FED966'
            ],
            [
                'nom'            => 'Masters',
                'description'    => '1 séance hebdo 282€ /   2 séances hebdo 360€',
                'tranche_age'    => null,
                'horaire_resume' => '1-2x / semaine',
                'prix'           => '282.00 - 360.00',
                'image'          => '10',
                'ordre'          => 5,
                'codeCouleur'    => '#B4A7D5'
            ],
        ];

        // Insertion des données
        $this->db->table('groupes')->insertBatch($data);
    }
}