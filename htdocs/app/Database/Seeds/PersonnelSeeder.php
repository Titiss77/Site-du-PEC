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
            ['nom' => 'Yves PRIGENT', 'photo' => 'Yves_PRIGENT.jpg'],
            ['nom' => 'Marie LANDOLSI', 'photo' => 'Marie_LANDOLSI.jpg'],
            ['nom' => 'Tifenn GAUDIN', 'photo' => 'Tifenn_GAUDIN.jpg'],
            ['nom' => 'Anne Catherine CAPITAINE', 'photo' => 'Anne_Catherine_CAPITAINE.jpg'],
            ['nom' => 'Rodolphe LESPAGNOL', 'photo' => 'Rodolphe_LESPAGNOL.jpg'],
            ['nom' => 'Thierry HENRI', 'photo' => 'Thierry_HENRI.jpg'],
            ['nom' => 'Martin LESPAGNOL', 'photo' => 'Martin_LESPAGNOL.jpg'],
            ['nom' => 'Zacharie LEDUC', 'photo' => 'Zacharie_LEDUC.jpg'],
            ['nom' => 'Célian PRIGENT', 'photo' => 'Celian_PRIGENT.jpg'],
            ['nom' => 'Luca SOLLAZZO LE MOIGNE', 'photo' => 'Luca_SOLLAZZO_LE_MOIGNE.jpg'],
            ['nom' => 'Killian TORCH', 'photo' => 'Killian_TORCH.jpg'],
            ['nom' => 'Florie BOUTOUILLER', 'photo' => 'vide.jpg'],
            ['nom' => 'Eloise KERJEAN', 'photo' => 'Eloise_KERJEAN.jpg'],
            
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