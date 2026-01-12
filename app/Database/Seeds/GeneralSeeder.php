<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class GeneralSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'nomClub'       => 'Palmes en Cornouailles (PEC)',
            'image'         => 'favicon.ico',
            'description'   => 'Nous sommes ravis de vous accueillir sur le site officiel de notre club de natation basé à Quimper. Que vous soyez un nageur débutant ou expérimenté, notre club offre une variété de disciplines et d\'activités pour tous les âges et niveaux.',
            'philosophie'   => 'La nage avec palmes apporte gainage et sensation de glisse incomparable.',
            'nombreNageurs' => 100,
            'nombreHommes'  => 45,
            'projetSportif' => 'Compétitions régionales et nationales, championnats de France',
            'lienFacebook'  => 'https://www.facebook.com/palmesencornouaille',
            'lienInstagram' => 'https://www.instagram.com/palmesencornouaille/',
        ];
        $this->db->table('general')->insert($data);
    }
}