<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MasterSeeder extends Seeder
{
    public function run()
    {
        $this->call('GeneralSeeder');
        $this->call('DisciplineSeeder');
        $this->call('PiscineSeeder');
		$this->call('PlanningSeeder');
        $this->call('MaterielSeeder');
        $this->call('PersonnelSeeder');
        $this->call('PostesSeeder');
        $this->call('TarifsSeeder');
        $this->call('BoutiqueSeeder');
    }
}