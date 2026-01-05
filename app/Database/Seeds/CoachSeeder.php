<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CoachSeeder extends Seeder
{
	public function run()
	{
		$data = ['idCoach' => '1', 'nom' => 'Thierry Henri', 'photo' => 'coach.png', 'description' => 'Thierry est un entraîneur expérimenté avec plus de 10 ans dans le domaine de la natation.'];
		$this->db->table('coachs')->insert($data);
		
	}
}