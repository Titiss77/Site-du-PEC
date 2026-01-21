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
                'url' => 'favicon.ico',
            ],
        ];
        $this->db->table('images')->insert($data);
    }
}