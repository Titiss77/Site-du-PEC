<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Utilisation du service de mot de passe de CI4 ou de password_hash() de PHP
        // Note: CI4 recommande d'utiliser le helper 'text' et password_hash() pour le hachage par défaut.
        
        $passwordAdmin = password_hash('admin123', PASSWORD_DEFAULT);
        $passwordUser = password_hash('userpass', PASSWORD_DEFAULT);
        
        $data = [
            // 1. Utilisateur Administrateur
            [
                'login'        => 'admin',
                'nom'          => 'Doe',
                'prenom'       => 'John',
                'author'       => '0', // 0 = admin
                // 'dateDeCreation' est géré par la valeur par défaut du schéma
                'motDePasse'   => $passwordAdmin,
            ],
            // 2. Utilisateur Standard
            [
                'login'        => 'user1',
                'nom'          => 'Smith',
                'prenom'       => 'Alice',
                'author'       => '1', // 1 = user
                'motDePasse'   => $passwordUser,
            ],
            // 3. Un autre utilisateur (author = 2 si c'est un niveau spécial)
            [
                'login'        => 'moderator',
                'nom'          => 'Garcia',
                'prenom'       => 'Carlos',
                'author'       => '2', 
                'motDePasse'   => $passwordUser, // Même mot de passe haché pour la démo
            ],
        ];

        // Insertion des données en lot
        try {
            $this->db->table('user')->insertBatch($data);
            echo "UserSeeder : " . count($data) . " enregistrements insérés avec succès.\n";
        } catch (\Exception $e) {
            echo "UserSeeder Error: " . $e->getMessage() . "\n";
        }
    }
}