<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'username' => 'admin',
                'nom' => 'Responsable PEC',
                'password' => password_hash('admin123', PASSWORD_DEFAULT),
                'role' => 'admin',
            ],
            [
                'username' => 'Adhérant',
                'nom' => 'Adhérant du club',
                'password' => password_hash('adherant', PASSWORD_DEFAULT),
                'role' => 'user',
            ],
        ];

        $this->db->table('utilisateurs')->insertBatch($data);
    }
}
