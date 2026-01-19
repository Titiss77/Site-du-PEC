<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ActualitesSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'titre'           => 'Competition Angers',
                'slug'            => 'competition-angers',
                'type'            => 'actualite',
                'statut'          => 'publie',
                'description'     => 'Grosse compétition !',
                'image'           => null,
                'date_evenement'  => '2026-01-25',
                'id_auteur'       => 1,
                'created_at'      => date('Y-m-d H:i:s'),
                'updated_at'      => date('Y-m-d H:i:s'),
            ],
            
        ];

        // Insertion simple dans la table actualites
        $this->db->table('actualites')->insertBatch($data);
    }
}