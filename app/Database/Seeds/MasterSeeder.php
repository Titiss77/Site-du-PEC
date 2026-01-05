<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MasterSeeder extends Seeder
{
    public function run()
    {
        $this->call('GeneralSeeder');
        $this->call('CoachSeeder');
        $this->call('DisciplineSeeder');
        $this->call('PiscineSeeder');
		$this->call('PlanningSeeder');
		$this->call('InscriptionSeeder');
    }
}