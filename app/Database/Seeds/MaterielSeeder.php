<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MaterielSeeder extends Seeder
{
    public function run()
    {
        $materiel = [
            [
                'nom' => 'Palmes (Bi-palmes)',
                'description' => 'Palmes de natation classiques ou spécifiques NAP.',
                'pret' => true
            ],
            [
                'nom' => 'Lunettes / masque',
                'description' => "Lunettes de natation ou masque d'apnée.",
                'pret' => false
            ],
            [
                'nom' => 'Tuba',
                'description' => "Tuba frontal indispensable pour l'alignement.",
                'pret' => true
            ],
            [
                'nom' => 'Monopalme',
                'description' => 'La voile mythique pour la glisse pure.',
                'pret' => true
            ],
            [
                'nom' => 'Maillot & Bonnet',
                'description' => 'Tenue de bain classique exigée.',
                'pret' => false
            ],
        ];

        $this->db->table('materiel')->insertBatch($materiel);
    }
}