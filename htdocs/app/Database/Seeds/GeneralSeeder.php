<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class GeneralSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'nomClub'       => 'Palmes en Cornouailles',
            'image'         => '1',
            'logo'         => '2',
            'description'   => 'Nous sommes ravis de vous accueillir sur le site officiel de notre club de natation basé à Quimper. Que vous soyez un nageur débutant ou expérimenté, notre club offre une variété de disciplines et d\'activités pour tous les âges et niveaux.',
            'philosophie'   => 'La nage avec palmes apporte gainage et sensation de glisse incomparable.',
            'nombreNageurs' => 109,
            'nombreHommes'  => 24,
            'projetSportif' => 'Decouvrir la natation avec Palmes et pour certains accèder à un niveau important de compétiton',
            'lienFacebook'  => 'https://www.facebook.com/palmesencornouaille',
            'lienInstagram' => 'https://www.instagram.com/palmesencornouaille/',
            'lienffessm'    => 'https://ffessm.fr/',
            'logoffessm'    => 'logo_federation_ffessm.png',
            'lienDrive'     => 'https://drive.google.com/drive/folders/18GiIlRzP7rdLiQx8dArAoSjK9WJZDo3z?usp=drive_link',
        ];
        $this->db->table('general')->insert($data);
    }
}