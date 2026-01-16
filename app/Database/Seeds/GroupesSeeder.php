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
                'description'    => 'Apprentissage des fondamentaux de la natation et découverte de la palme. Ludique et pédagogique.',
                'tranche_age'    => '6 - 8 ans',
                'horaire_resume' => 'Samedi',
                'prix'           => 201.00,
                'image'          => 'g1.jpg',
                'ordre'          => 1
            ],
            [
                'nom'            => 'Débutants',
                'description'    => 'Apprentissage des fondamentaux de la natation et découverte de la palme. Ludique et pédagogique.',
                'tranche_age'    => '9 ans et +',
                'horaire_resume' => '3x / semaine',
                'prix'           => 000.00,
                'image'          => 'g1.jpg',
                'ordre'          => 2
            ],
            [
                'nom'            => 'Jeunes',
                'description'    => 'Perfectionnement technique et préparation aux premières compétitions régionales et nationales.',
                'tranche_age'    => null,
                'horaire_resume' => '4x / semaine',
                'prix'           => 282.00,
                'image'          => 'g1.jpg',
                'ordre'          => 3
            ],
            [
                'nom'            => 'Espoirs',
                'description'    => 'Entretien physique, perfectionnement ou compétition adulte dans une ambiance conviviale.',
                'tranche_age'    => null,
                'horaire_resume' => '4x / semaine',
                'prix'           => 282.00,
                'image'          => 'g1.jpg',
                'ordre'          => 4
            ],
            [
                'nom'            => 'Masters',
                'description'    => 'Séances intenses axées sur le cardio et le renforcement musculaire aquatique.',
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