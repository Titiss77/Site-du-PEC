<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ImagesSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'url' => 'groupe.jpg',
            ],
            [
                'url' => 'favicon.ico',
            ],
            [
                'url' => 'monopalme.jpg',
            ],
            [
                'url' => 'bipalmes.jpg',
            ],
            [
                'url' => 'apnee.jpg',
            ],
            [
                'url' => 'is.jpg',
            ],
            [
                'url' => 'triton.jpg',
            ],
            [
                'url' => 'debutant.jpg',
            ],
            [
                'url' => 'jeunes.jpg',
            ],
            [
                'url' => 'master.jpg',
            ],
            [
                'url' => 'Yves_PRIGENT.jpg',
            ],
            [
                'url' => 'Marie_LANDOLSI.jpg',
            ],
            [
                'url' => 'Tifenn_GAUDIN.jpg',
            ],
            [
                'url' => 'Anne_Catherine_CAPITAINE.jpg',
            ],
            [
                'url' => 'Rodolphe_LESPAGNOL.jpg',
            ],
            [
                'url' => 'Thierry_HENRI.jpg',
            ],
            [
                'url' => 'Martin_LESPAGNOL.jpg',
            ],
            [
                'url' => 'Zacharie_LEDUC.jpg',
            ],
            [
                'url' => 'Celian_PRIGENT.jpg',
            ],
            [
                'url' => 'Luca_SOLLAZZO_LE_MOIGNE.jpg',
            ],
            [
                'url' => 'Killian_TORCH.jpg',
            ],
            [
                'url' => 'vide.jpg',
            ],
            [
                'url' => 'Eloise_KERJEAN.jpg',
            ],
            [
                'url' => 'bi-palmes.jpg',
            ],
            [
                'url' => 'masque.jpg',
            ],
            [
                'url' => 'tuba.jpg',
            ],
            [
                'url' => 'monopalmes.png',
            ],
            [
                'url' => 'lunettes.jpg',
            ],
            [
                'url' => 'bi-palmes-decat.jpg',
            ],
            [
                'url' => 'kerlan_vian.jpg',
            ],
            [
                'url' => 'aquarive.png',
            ],
            [
                'url' => 'aquaform.jpg',
            ],
            [
                'url' => 'planning_scolaire.jpg',
            ],
            [
                'url' => 'planning_vacances.jpg',
            ],
            [
                'url' => 'calendrier_competitions.pdf',
            ],
            
        ];
        $this->db->table('images')->insertBatch($data);
    }
}