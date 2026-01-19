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
                'image'          => 'g1.jpg',
                'ordre'          => 1,
                'codeCouleur'    => '#92C47D'
            ],
            [
                'nom'            => 'Débutants',
                'description'    => 'Description à prévoir.',
                'tranche_age'    => '9 ans et +',
                'horaire_resume' => '3x / semaine',
                'image'          => 'g1.jpg',
                'ordre'          => 2,
                'codeCouleur'    => '#9FC6E7'
            ],
            [
                'nom'            => 'Jeunes',
                'description'    => 'Description à prévoir.',
                'tranche_age'    => null,
                'horaire_resume' => '4x / semaine',
                'image'          => 'g1.jpg',
                'ordre'          => 3,
                'codeCouleur'    => '#FED966'
            ],
            [
                'nom'            => 'Espoirs',
                'description'    => 'Description à prévoir.',
                'tranche_age'    => null,
                'horaire_resume' => '4x / semaine',
                'image'          => 'g1.jpg',
                'ordre'          => 4,
                'codeCouleur'    => '#F9BEDC'
            ],
            [
                'nom'            => 'Masters',
                'description'    => 'Description à prévoir.',
                'tranche_age'    => null,
                'horaire_resume' => '4x / semaine',
                'image'          => 'g1.jpg',
                'ordre'          => 5,
                'codeCouleur'    => '#B4A7D5'
            ],
            [
                'nom'            => 'Masters',
                'description'    => 'Description à prévoir.',
                'tranche_age'    => null,
                'horaire_resume' => '4x / semaine',
                'image'          => 'g1.jpg',
                'ordre'          => 5,
                'codeCouleur'    => '#B4A7D5'
            ],
        ];

        // Insertion des données
        $this->db->table('groupes')->insertBatch($data);
    }
}