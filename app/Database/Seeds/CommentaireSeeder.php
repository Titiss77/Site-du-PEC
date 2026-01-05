<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CommentaireSeeder extends Seeder
{
	public function run()
	{
		$data = ['idCommentaire' => '1', 'dateCommentaire' => '2025-10-07 14:00:00', 'auteurCommentaire' => 'Alice', 'contenuCommentaire' => "J'ai adoré lire ton premier billet. Hâte de voir la suite !", 'idBillet' => '1', 'estValide' => '1'];
		$this->db->table('commentaire')->insert($data);

		$data = ['idCommentaire' => '2', 'dateCommentaire' => '2025-10-08 11:15:00', 'auteurCommentaire' => 'Bob', 'contenuCommentaire' => 'Ton billet sur le travail est très pertinent. Continue comme ça !', 'idBillet' => '2', 'estValide' => '1'];
		$this->db->table('commentaire')->insert($data);

		$data = ['idCommentaire' => '3', 'dateCommentaire' => '2025-10-07 16:30:00', 'auteurCommentaire' => 'Charlie', 'contenuCommentaire' => "Bienvenue sur la plateforme Mathis ! Hâte d'en savoir plus sur toi.", 'idBillet' => '3', 'estValide' => '1'];
		$this->db->table('commentaire')->insert($data);

		$data = ['idCommentaire' => '4', 'dateCommentaire' => '2025-10-16 17:45:00', 'auteurCommentaire' => 'Diana', 'contenuCommentaire' => "Félicitations pour la fin du projet ! C'est une étape importante.", 'idBillet' => '4', 'estValide' => '1'];
		$this->db->table('commentaire')->insert($data);

		$data = ['idCommentaire' => '5', 'dateCommentaire' => '2025-10-16 14:45:00', 'auteurCommentaire' => 'Gontran_du_92', 'contenuCommentaire' => "C tro nul se truc !", 'idBillet' => '4', 'estValide' => '1'];
		$this->db->table('commentaire')->insert($data);

		$data = ['idCommentaire' => '6', 'dateCommentaire' => '2025-10-16 14:46:00', 'auteurCommentaire' => 'Benoït', 'contenuCommentaire' => "Eh gontran_du_92 tu vas te calmer, je ne sais pas comment ton commentaire est passé mais il n'est pas permis d'être aussi condescendant. Un peu de respect jeuno !", 'idBillet' => '4', 'estValide' => '1'];
		$this->db->table('commentaire')->insert($data);
	}
}