<?php
namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MasterSeeder extends Seeder
{
    // Fichier : App\Database\Seeds\DatabaseSeeder.php

    public function run()
    {
        // Les parents doivent être insérés avant les enfants
        $this->call('HeaderSeeder');
        $this->call('ExtentionSeeder');
        $this->call('UserSeeder');
        $this->call('CategorieSeeder');  // Dépend de Header
        $this->call('AmfsSeeder');  // Dépend de User et Categorie
    }
}