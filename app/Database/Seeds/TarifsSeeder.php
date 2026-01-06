<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TarifsSeeder extends Seeder
{
    public function run()
    {
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
        
        $this->db->table('tarifs')->insertBatch($tarifs);
    }
}