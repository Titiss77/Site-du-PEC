<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class HeaderSeeder extends Seeder
{
    public function run()
    {
        // Données à insérer dans la table 'header'
        $data = [
            [
                'libelle' => 'Streaming',
            ],
            [
                'libelle' => 'IA',
            ],
            [
                'libelle' => 'Séries',
            ],
            [
                'libelle' => 'Films',
            ],
            [
                'libelle' => 'Animés',
            ],
            [
                'libelle' => 'Mangas',
            ],
        ];

        // Insertion des données
        // L'utilisation de $this->db->table('header')->insertBatch($data)
        // est la méthode recommandée pour insérer plusieurs lignes.
        try {
            $this->db->table('header')->insertBatch($data);
            echo "HeaderSeeder : " . count($data) . " enregistrements insérés avec succès.\n";
        } catch (\Exception $e) {
            // Afficher l'erreur si l'insertion échoue (par exemple, si les données existent déjà)
            echo "HeaderSeeder Error: " . $e->getMessage() . "\n";
        }
    }
}