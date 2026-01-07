<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ActualitesSeeder extends Seeder
{
    public function run()
    {
        $actualites = [
            [
            'Titre' => 'Grand Tournoi de Printemps',
            'image' => 'grand_tournoi.jpg',
            'description' => 'Grand tournoi annuel avec des équipes de toute la région. Venez nombreux encourager vos équipes favorites !',
            'datePublication' => '2024-03-01',
            'dateEvenement' => '2024-04-15',
            'idAuteur' => 8,
            ],
        ];

        $this->db->table('actualites')->insertBatch($actualites);
    }
}