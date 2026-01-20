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
            ['nom' => 'Yves PRIGENT', 'numTel' => '06 30 85 78 60', 'photo' => 'Yves_PRIGENT.jpg', 'mail' => 'yvesandra.prigent@gmail.com'],
            ['nom' => 'Marie LANDOLSI', 'numTel' => '06 88 97 53 77', 'photo' => 'Marie_LANDOLSI.jpg', 'mail' => 'marie_le_moigne@yahoo.fr'],
            ['nom' => 'Tifenn GAUDIN', 'numTel' => '06 95 30 29 09', 'photo' => 'Tifenn_GAUDIN.jpg', 'mail' => 'tifenngaudin@yahoo.fr'],
            ['nom' => 'Anne Catherine CAPITAINE', 'numTel' => '06 48 70 38 45', 'photo' => 'Anne_Catherine_CAPITAINE.jpg', 'mail' => 'a.c.capitaine@gmail.com'],
            ['nom' => 'Rodolphe LESPAGNOL', 'numTel' => '06 22 26 70 61', 'photo' => 'Rodolphe_LESPAGNOL.jpg', 'mail' => 'rodolespagnol@gmail.com'],
            ['nom' => 'Thierry HENRI', 'numTel' => NULL, 'photo' => 'Thierry_HENRI.jpg', 'mail' => NULL],
            ['nom' => 'Martin LESPAGNOL', 'numTel' => NULL, 'photo' => 'Martin_LESPAGNOL.jpg', 'mail' => NULL],
            ['nom' => 'Zacharie LEDUC', 'numTel' => NULL, 'photo' => 'vide.jpg', 'mail' => NULL],
            ['nom' => 'Célian PRIGENT', 'numTel' => NULL, 'photo' => 'vide.jpg', 'mail' => NULL],
            ['nom' => 'Luca SOLLAZZO LE MOIGNE', 'numTel' => NULL, 'photo' => 'vide.jpg', 'mail' => NULL],
            ['nom' => 'Killian TORCH', 'numTel' => NULL, 'photo' => 'vide.jpg', 'mail' => NULL],
            ['nom' => 'Florie BOUTOUILLER', 'numTel' => NULL, 'photo' => 'vide.jpg', 'mail' => NULL],
            ['nom' => 'Eloise KERJEAN', 'numTel' => NULL, 'photo' => 'vide.jpg', 'mail' => NULL],
            
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