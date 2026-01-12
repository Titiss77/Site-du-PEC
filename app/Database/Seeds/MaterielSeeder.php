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
                'pret' => true,
                'image' => 'Bi-Palmes.jpg',
            ],
            [
                'nom' => 'Lunettes ou masque',
                'description' => 'Lunettes ou masque de natation.',
                'pret' => false,
                'image' => 'masque.jpg',
            ],
            [
                'nom' => 'Tuba',
                'description' => "Tuba frontal indispensable pour l'alignement.",
                'pret' => true,
                'image' => 'tuba.jpg',
            ],
            [
                'nom' => 'Monopalme',
                'description' => 'La voile mythique pour la glisse pure.',
                'pret' => true,
                'image' => 'monopalmes.png',
                
            ],
            [
                'nom' => 'Maillot & Bonnet',
                'description' => 'Tenue de bain classique exigée.',
                'pret' => false,
                'image' => null,
            ],
        ];

        $this->db->table('materiel')->insertBatch($materiel);
    }
}