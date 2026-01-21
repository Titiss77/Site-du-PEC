<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PersonnelSeeder extends Seeder
{
    public function run()
    {
        $db = \Config\Database::connect();

        // 1. Insertion des membres uniques
        $membres = [
            ['nom' => 'Yves PRIGENT', 'photo' => '11'],
            ['nom' => 'Marie LANDOLSI', 'photo' => '12'],
            ['nom' => 'Tifenn GAUDIN', 'photo' => '13'],
            ['nom' => 'Anne Catherine CAPITAINE', 'photo' => '14'],
            ['nom' => 'Rodolphe LESPAGNOL', 'photo' => '15'],
            ['nom' => 'Thierry HENRI', 'photo' => '16'],
            ['nom' => 'Martin LESPAGNOL', 'photo' => '17'],
            ['nom' => 'Zacharie LEDUC', 'photo' => '18'],
            ['nom' => 'Célian PRIGENT', 'photo' => '19'],
            ['nom' => 'Luca SOLLAZZO LE MOIGNE', 'photo' => '20'],
            ['nom' => 'Killian TORCH', 'photo' => '21'],
            ['nom' => 'Florie BOUTOUILLER', 'photo' => '22'],
            ['nom' => 'Eloise KERJEAN', 'photo' => '23'],
            
        ];
        $db->table('membres')->insertBatch($membres);

        // 2. Insertion des fonctions
        $fonctions = [
            ['titre' => 'President'], //1
            ['titre' => 'Vice-Président'], //2
            ['titre' => 'Comptable'], //3
            ['titre' => 'Secrétaire'],//4
            ['titre' => 'Sponsoring'],//5
            ['titre' => 'Informatique'],//6
            ['titre' => 'Coach'],//7
            ['titre' => 'Coach en formation'],//8
            
        ];
        $db->table('fonctions')->insertBatch($fonctions);
        
        $liaisons = [
            ['membre_id' => 1, 'fonction_id' => 1],
            
            ['membre_id' => 2, 'fonction_id' => 2],
            
            ['membre_id' => 3, 'fonction_id' => 3],
            
            ['membre_id' => 4, 'fonction_id' => 4],

            ['membre_id' => 5, 'fonction_id' => 5],

            ['membre_id' => 6, 'fonction_id' => 7],

            ['membre_id' => 7, 'fonction_id' => 7],
            ['membre_id' => 2, 'fonction_id' => 7],

            ['membre_id' => 8, 'fonction_id' => 8],
            ['membre_id' => 9, 'fonction_id' => 8],
            ['membre_id' => 10, 'fonction_id' => 8],
            ['membre_id' => 11, 'fonction_id' => 8],
            ['membre_id' => 12, 'fonction_id' => 8],
            ['membre_id' => 13, 'fonction_id' => 8],
            
        ];
        $db->table('membre_fonction')->insertBatch($liaisons);
    }
}