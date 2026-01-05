<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BilletSeeder extends Seeder
{
	public function run()
	{
		$data = ['idBillet' => '1', 'dateBillet' => '2025-10-07 13:46:00', 'titreBillet' => 'Mon premier billet', 'contenuBillet' => 'Bonjour le monde ! Ceci est le premier billet sur mon blog.'];
		$this->db->table('billet')->insert($data);

		$data = ['idBillet' => '2', 'dateBillet' => '2025-10-08 10:30:00', 'titreBillet' => 'Au travail', 'contenuBillet' => "Il faut enrichir ce blog dès maintenant. L'aventure ne fait que commencer ;)"];
		$this->db->table('billet')->insert($data);

		$data = ['idBillet' => '3', 'dateBillet' => '2025-10-07 15:01:15', 'titreBillet' => 'Hello tous le monde !', 'contenuBillet' => "Bonjours je m'appel Mathis, j'ai 19 ans et je suis étudiant en BTS SIO à Chaptal."];
		$this->db->table('billet')->insert($data);

		$data = ['idBillet' => '4', 'dateBillet' => '2025-10-16 16:11:21', 'titreBillet' => 'Grande annonce !', 'contenuBillet' => "Voici enfin terminé le dernier TP, le numéro 3. Je suis effectivement très fier de vous annoncer que le dernier TP est enfin terminé. Ce fut une grande joie de travailler sur ces 3 tps et c'est donc avec émotions que je vous annonce également la clôture du projet. Cordialement. Quelqu'un"];
		$this->db->table('billet')->insert($data);
	}
}