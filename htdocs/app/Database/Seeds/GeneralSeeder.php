<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class GeneralSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'nomClub'       => 'Palmes en Cornouailles',
            // On remplace 'image' par 'image_id'
            'image_id'      => $this->getImageId('favicon.ico'),
            'description'   => 'Nous sommes ravis de vous accueillir sur le site officiel de notre club de natation basé à Quimper. Que vous soyez un nageur débutant ou expérimenté, notre club offre une variété de disciplines et d\'activités pour tous les âges et niveaux.',
            'philosophie'   => 'La nage avec palmes apporte gainage et sensation de glisse incomparable.',
            'nombreNageurs' => 109,
            'nombreHommes'  => 24,
            'projetSportif' => 'Decouvrir la natation avec Palmes et pour certains accèder à un niveau important de compétiton',
            'lienFacebook'  => 'https://www.facebook.com/palmesencornouaille',
            'lienInstagram' => 'https://www.instagram.com/palmesencornouaille/',
            'lienffessm'    => 'https://ffessm.fr/',
            'logoffessm'    => 'logo_federation_ffessm.png', // Celui-ci n'a pas été migré, il reste en string
            'lienDrive'     => 'https://drive.google.com/drive/folders/18GiIlRzP7rdLiQx8dArAoSjK9WJZDo3z?usp=drive_link',
        ];
        $this->db->table('general')->insert($data);
    }

    private function getImageId($path)
    {
        if (empty($path)) return null;

        $existing = $this->db->table('images')->where('path', $path)->get()->getRow();
        if ($existing) {
            return $existing->id;
        }

        $this->db->table('images')->insert([
            'path'       => $path,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        return $this->db->insertID();
    }
}