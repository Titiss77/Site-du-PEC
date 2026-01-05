<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CategorieSeeder extends Seeder
{
    public function run()
    {
        // Les ID de référence de la table 'header' sont utilisés ici.
        // Assurez-vous que le HeaderSeeder a été exécuté en premier.
        
        $data = [
            // Catégories liées à 'Streaming' (idHeader = 1)
            ['libelle' => 'Films', 'idHeader' => 1],
            ['libelle' => 'Séries', 'idHeader' => 1],
            ['libelle' => 'Animés', 'idHeader' => 1],
            ['libelle' => 'Scans', 'idHeader' => 1],
            
            ['libelle' => 'Outils', 'idHeader' => 2],
            
            // Catégories liées à 'Séries' (idHeader = 3)
            ['libelle' => 'En cours', 'idHeader' => 3],
            ['libelle' => 'Envie de voir', 'idHeader' => 3],
            
            // Catégories liées à 'Films' (idHeader = 4)
            ['libelle' => 'Envie de voir', 'idHeader' => 4],
            ['libelle' => 'En pause', 'idHeader' => 4],
            
            // Catégories liées à 'Animés' (idHeader = 5)
            ['libelle' => 'En cours', 'idHeader' => 5],
            ['libelle' => 'Envie de voir', 'idHeader' => 5],
            ['libelle' => 'En pause', 'idHeader' => 5],
            
            // Catégories liées à 'Mangas' (idHeader = 6)
            ['libelle' => 'En cours', 'idHeader' => 6],
            ['libelle' => 'Envie de lire', 'idHeader' => 6],
            ['libelle' => 'En pause', 'idHeader' => 6],
        ];

        // Insertion des données en lot (batch)
        try {
            $this->db->table('categorie')->insertBatch($data);
            echo "CategorieSeeder : " . count($data) . " enregistrements insérés avec succès.\n";
        } catch (\Exception $e) {
            echo "CategorieSeeder Error: " . $e->getMessage() . "\n";
        }
    }
}