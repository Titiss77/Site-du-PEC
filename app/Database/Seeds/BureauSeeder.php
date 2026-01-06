<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BureauSeeder extends Seeder
{
    public function run()
    {
        $db = \Config\Database::connect();

        // 1. Insertion des membres uniques
        $membres = [
            ['nom' => 'Yves PRIGENT', 'numTel' => '06 12 34 56 78', 'mail' => 'exemple@exemple.com'],
            ['nom' => 'Marie LANDOLSI', 'numTel' => '06 12 34 56 78', 'mail' => 'exemple@exemple.com'],
            ['nom' => 'Tifenn GAUDIN', 'numTel' => '06 12 34 56 78', 'mail' => 'exemplefenn@exemple.com'],
            ['nom' => 'Sandra PRIGENT', 'numTel' => '06 12 34 56 78', 'mail' => 'exemplefenn@exemple.com'],
            ['nom' => 'Anne Catherine CAPITAINE', 'numTel' => '06 12 34 56 78', 'mail' => 'exemplefenn@exemple.com'],
            ['nom' => 'Sandra KERGOURLAY', 'numTel' => '06 12 34 56 78', 'mail' => 'exemplefenn@exemple.com'],
            ['nom' => 'Isabelle LECLERC', 'numTel' => '06 12 34 56 78', 'mail' => 'exemplefenn@exemple.com'],
            ['nom' => 'Lorette LE MOIGNE', 'numTel' => '06 12 34 56 78', 'mail' => 'exemplefenn@exemple.com'],
            ['nom' => 'Christophe KERJEAN', 'numTel' => '06 12 34 56 78', 'mail' => 'exemplefenn@exemple.com'],
            ['nom' => 'Valérie THOMAS', 'numTel' => '06 12 34 56 78', 'mail' => 'exemplefenn@exemple.com'],
            ['nom' => 'Rodolphe LESPAGNOL', 'numTel' => '06 12 34 56 78', 'mail' => 'exemplefenn@exemple.com'],
            ['nom' => 'Mathis FRANCES', 'numTel' => '06 12 34 56 78', 'mail' => 'exemplefenn@exemple.com'],
            ['nom' => 'Corrinne LE MEUR', 'numTel' => '06 12 34 56 78', 'mail' => 'exemplefenn@exemple.com'],
            ['nom' => 'Anne FRINAULT', 'numTel' => '06 12 34 56 78', 'mail' => 'exemplefenn@exemple.com'],
            
            
        ];
        $db->table('membres')->insertBatch($membres);

        // 2. Insertion des fonctions
        $fonctions = [
            ['titre' => 'President'], //1
            ['titre' => 'Comptable'], //2
            ['titre' => 'Secrétaire'],//3
            ['titre' => 'Organisation compétitions'],//4
            ['titre' => 'Partenariat / sponsoring'],//5
            ['titre' => 'Informatique'],//6
            ['titre' => 'Convivialité du club'],//7
            ['titre' => 'Eau libre'],//8
            
        ];
        $db->table('fonctions')->insertBatch($fonctions);
        
        $liaisons = [
            ['membre_id' => 1, 'fonction_id' => 1],
            ['membre_id' => 1, 'fonction_id' => 4],
            
            ['membre_id' => 2, 'fonction_id' => 1],
            ['membre_id' => 2, 'fonction_id' => 7],
            
            ['membre_id' => 3, 'fonction_id' => 2],
            ['membre_id' => 3, 'fonction_id' => 8],
            
            ['membre_id' => 4, 'fonction_id' => 2],
            
            ['membre_id' => 5, 'fonction_id' => 3],
            ['membre_id' => 5, 'fonction_id' => 4],

            ['membre_id' => 6, 'fonction_id' => 3],

            ['membre_id' => 7, 'fonction_id' => 4],

            ['membre_id' => 8, 'fonction_id' => 4],

            ['membre_id' => 9, 'fonction_id' => 4],

            ['membre_id' => 10, 'fonction_id' => 5],

            ['membre_id' => 11, 'fonction_id' => 5],

            ['membre_id' => 12, 'fonction_id' => 6],

            ['membre_id' => 13, 'fonction_id' => 7],

            ['membre_id' => 14, 'fonction_id' => 8],
            
        ];
        $db->table('membre_fonction')->insertBatch($liaisons);
    }
}