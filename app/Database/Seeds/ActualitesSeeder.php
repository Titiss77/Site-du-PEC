<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ActualitesSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'titre'           => 'Gala du club 2026',
                'slug'            => 'gala-du-club-2026',
                'type'            => 'actualite',
                'statut'          => 'publie',
                'description'     => 'Un grand gala annuel pour célébrer les succès de nos nageurs et nageuses !',
                'image'           => null,
                'date_evenement'  => '2026-01-17',
                'id_auteur'       => 1,
                'created_at'      => date('Y-m-d H:i:s'),
                'updated_at'      => date('Y-m-d H:i:s'),
            ],
            
        ];

        // Insertion simple dans la table actualites
        $this->db->table('actualites')->insertBatch($data);
    }
}