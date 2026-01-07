<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ActualitesSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'titre'           => 'Reprise des entraînements - Saison 2026',
                'slug'            => 'reprise-des-entrainements-saison-2026',
                'type'            => 'actualite',
                'statut'          => 'publie',
                'description'     => 'Le PEC est ravi de vous accueillir pour cette nouvelle saison. Pensez à vérifier vos horaires de passage par groupe sur la page planning.',
                'image'           => 'reprise.jpg',
                'date_evenement'  => null,
                'id_auteur'       => rand(1, 8),
                'created_at'      => date('Y-m-d H:i:s'),
                'updated_at'      => date('Y-m-d H:i:s'),
            ],
            [
                'titre'           => 'Championnat Régional de Palmes',
                'slug'            => 'championnat-regional-de-palmes',
                'type'            => 'evenement',
                'statut'          => 'publie',
                'description'     => 'Rendez-vous à la piscine Kerlan Vihan pour soutenir nos nageurs lors des championnats régionaux. Buvette sur place.',
                'image'           => 'competition.jpg',
                'date_evenement'  => '2026-03-15',
                'id_auteur'       => rand(1, 8),
                'created_at'      => date('Y-m-d H:i:s'),
                'updated_at'      => date('Y-m-d H:i:s'),
            ],
            [
                'titre'           => 'Assemblée Générale Ordinaire',
                'slug'            => 'assemblee-generale-ordinaire',
                'type'            => 'annonce',
                'statut'          => 'publie',
                'description'     => 'Tous les membres du club sont invités à participer à l\'AG annuelle. Votre présence est indispensable pour le vote du nouveau bureau.',
                'image'           => null,
                'date_evenement'  => '2026-06-10',
                'id_auteur'       => rand(1, 8),
                'created_at'      => date('Y-m-d H:i:s'),
                'updated_at'      => date('Y-m-d H:i:s'),
            ],
            [
                'titre'           => 'Stage de perfectionnement apnée',
                'slug'            => 'stage-perfectionnement-apnee',
                'type'            => 'evenement',
                'statut'          => 'publie',
                'description'     => 'Un stage intensif de deux jours pour améliorer vos techniques de respiration et gagner en endurance sous l\'eau.',
                'image'           => 'apnee.jpg',
                'date_evenement'  => '2026-04-20',
                'id_auteur'       => rand(1, 8),
                'created_at'      => date('Y-m-d H:i:s'),
                'updated_at'      => date('Y-m-d H:i:s'),
            ],
            [
                'titre'           => 'Article en préparation (Brouillon)',
                'slug'            => 'article-en-preparation',
                'type'            => 'actualite',
                'statut'          => 'brouillon',
                'description'     => 'Contenu secret en cours de rédaction par l\'équipe du club.',
                'image'           => null,
                'date_evenement'  => null,
                'id_auteur'       => rand(1, 8),
                'created_at'      => date('Y-m-d H:i:s'),
                'updated_at'      => date('Y-m-d H:i:s'),
            ],
        ];

        // Insertion simple dans la table actualites
        $this->db->table('actualites')->insertBatch($data);
    }
}