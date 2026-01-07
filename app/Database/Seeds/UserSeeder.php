<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'username' => 'admin',
            'nom'      => 'Responsable PEC',
            // Génération du hachage sécurisé
            'password' => password_hash('admin123', PASSWORD_DEFAULT),
        ];

        $this->db->table('utilisateurs')->insert($data);
    }
}