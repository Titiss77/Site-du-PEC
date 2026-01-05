<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MasterSeeder extends Seeder
{
	public function run()
	{
		// Tables de référence
		$this->call('CoachSeeder');
	}
}