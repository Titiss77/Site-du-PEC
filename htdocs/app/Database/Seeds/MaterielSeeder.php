<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MaterielSeeder extends Seeder
{
    public function run()
    {

    $pret = [
            [
                'nom' => "À acheter via le club",
            ],
            [
                'nom' => 'À acheter en magasin',
            ],
        ];
        
        $materiel = [
            [
                'nom' => 'Palmes (Bi-palmes)',
                'description' => 'Palmes de natation spécifiques NAP.',
                'idPret' => '1',
                'image' => '24',
            ],
            [
                'nom' => 'Masque',
                'description' => 'Masque de natation.',
                'idPret' => '1',
                'image' => '25',
            ],
            [
                'nom' => 'Tuba',
                'description' => "Tuba frontal indispensable pour l'alignement.",
                'idPret' => '1',
                'image' => '26',
            ],
            [
                'nom' => 'Monopalme',
                'description' => 'La voile mythique pour la glisse pure.',
                'idPret' => '1',
                'image' => '27',
                
            ],
            [
                'nom' => 'Maillot & Bonnet',
                'description' => 'Tenue de bain classique exigée.',
                'idPret' => '2',
                'image' => null,
            ],
            [
                'nom' => 'Lunettes',
                'description' => 'Lunettes de natation.',
                'idPret' => '2',
                'image' => '28',
            ],
            [
                'nom' => 'Palmes',
                'description' => 'Palmes de natation classiques decathlon.',
                'idPret' => '2',
                'image' => '29',
            ],
        ];

        $this->db->table('pret')->insertBatch($pret);
        $this->db->table('materiel')->insertBatch($materiel);
    }
}