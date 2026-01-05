<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class InscriptionSeeder extends Seeder
{
    public function run()
    {
        // 1. Données pour les Tarifs
        $tarifs = [
            [
                'categorie' => '(Tritons & Sirènes)',
                'description' => 'Enfants de 6 à 8 ans',
                'prix'      => 201.00
            ],
            [
                'categorie' => 'Jeunes',
                'description' => 'Pour les personnes nées après 2002',
                'prix'      => 282.00
            ],
            [
                'categorie' => 'Masters',
                'description' => 'Pour les personnes nées avant 2002',
                'prix'      => 240.00
            ],
        ];

        // 2. Données pour le Matériel
        $materiel = [
            [
                'nom'         => 'Palmes (Bi-palmes)',
                'description' => 'Palmes de natation classiques ou spécifiques NAP.',
                'pret'        => true
            ],
            [
                'nom'         => 'Lunettes / masque',
                'description' => 'Lunettes de natation ou masque d\'apnée.',
                'pret'        => false
            ],
            [
                'nom'         => 'Tuba',
                'description' => 'Tuba frontal indispensable pour l\'alignement.',
                'pret'        => true
            ],
            [
                'nom'         => 'Monopalme',
                'description' => 'La voile mythique pour la glisse pure.',
                'pret'        => true
            ],
            [
                'nom'         => 'Maillot & Bonnet',
                'description' => 'Tenue de bain classique exigée.',
                'pret'        => false
            ],
        ];

        // Insertion dans la base de données
        $this->db->table('tarifs')->insertBatch($tarifs);
        $this->db->table('materiel')->insertBatch($materiel);
    }
}