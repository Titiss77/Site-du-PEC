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
            ['nom' => 'Yves PRIGENT', 'numTel' => '06 12 34 56 78', 'photo' => 'Yves_PRIGENT.jpg', 'mail' => 'exemple@exemple.com'],
            ['nom' => 'Marie LANDOLSI', 'numTel' => '06 12 34 56 78', 'photo' => 'Marie_LANDOLSI.jpg', 'mail' => 'exemple@exemple.com'],
            ['nom' => 'Tifenn GAUDIN', 'numTel' => '06 12 34 56 78', 'photo' => 'Tifenn_GAUDIN.jpg', 'mail' => 'exemple@exemple.com'],
            ['nom' => 'Sandra PRIGENT', 'numTel' => '06 12 34 56 78', 'photo' => 'Sandra_PRIGENT.jpg', 'mail' => 'exemple@exemple.com'],
            ['nom' => 'Anne Catherine CAPITAINE', 'numTel' => '06 12 34 56 78', 'photo' => 'Anne_Catherine_CAPITAINE.jpg', 'mail' => 'exemple@exemple.com'],
            ['nom' => 'Sandra KERGOURLAY', 'numTel' => '06 12 34 56 78', 'photo' => 'Sandra_KERGOURLAY.jpg', 'mail' => 'exemple@exemple.com'],
            ['nom' => 'Rodolphe LESPAGNOL', 'numTel' => '06 12 34 56 78', 'photo' => 'Rodolphe_LESPAGNOL.jpg', 'mail' => 'exemple@exemple.com'],
            ['nom' => 'Valérie THOMAS', 'numTel' => '06 12 34 56 78', 'photo' => 'Valérie_THOMAS.jpg', 'mail' => 'exemple@exemple.com'],
            ['nom' => 'Mathis FRANCES', 'numTel' => '06 12 34 56 78', 'photo' => 'Mathis_FRANCES.jpg', 'mail' => 'exemple@exemple.com'],
            
        ];
        $db->table('membres')->insertBatch($membres);

        // 2. Insertion des fonctions
        $fonctions = [
            ['titre' => 'President'], //1
            ['titre' => 'Vice-Président'], //2
            ['titre' => 'Comptable'], //3
            ['titre' => 'Secrétaire'],//4
            ['titre' => 'Partenariat / sponsoring'],//5
            ['titre' => 'Informatique'],//6
            
        ];
        $db->table('fonctions')->insertBatch($fonctions);
        
        $liaisons = [
            ['membre_id' => 1, 'fonction_id' => 1],
            
            ['membre_id' => 2, 'fonction_id' => 2],
            
            ['membre_id' => 3, 'fonction_id' => 3],
            
            ['membre_id' => 4, 'fonction_id' => 3],
            
            ['membre_id' => 5, 'fonction_id' => 4],

            ['membre_id' => 6, 'fonction_id' => 4],

            ['membre_id' => 7, 'fonction_id' => 5],
            
            ['membre_id' => 8, 'fonction_id' => 5],

            ['membre_id' => 9, 'fonction_id' => 6],
            
        ];
        $db->table('membre_fonction')->insertBatch($liaisons);
    }
}