<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ExtentionSeeder extends Seeder
{
    public function run()
    {
        // Données à insérer dans la table 'extention'
        $data = [
            [
                'site' => 'Nightflix', 'ext' => '.world',
            ],
        ];

        // Insertion des données
        // L'utilisation de $this->db->table('extention')->insertBatch($data)
        // est la méthode recommandée pour insérer plusieurs lignes.
        try {
            $this->db->table('extention')->insertBatch($data);
            echo "ExtentionSeeder : " . count($data) . " enregistrements insérés avec succès.\n";
        } catch (\Exception $e) {
            // Afficher l'erreur si l'insertion échoue (par exemple, si les données existent déjà)
            echo "ExtentionSeeder Error: " . $e->getMessage() . "\n";
        }
    }
}