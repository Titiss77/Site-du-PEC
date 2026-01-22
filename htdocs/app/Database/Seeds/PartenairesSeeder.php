<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PartenairesSeeder extends Seeder
{
    public function run()
    {
        $partenaires = [
            [
                'nom' => 'Mr et Mme Guillou Boulanger Quimper ( PARTENAIRE de notre tenue club et de l’opération de Noël Paquets cadeaux au profit du stage à Lanzarote)',
                'image_url' => 'boulanger.jpg',
                'ordre' => 1,
            ],
            [
                'nom' => 'Mr DA RU : Entreprise Guichard Briec ( partenaire de notre tenue club)',
                'image_url' => 'guichard.jpg',
                'ordre' => 2,
            ],
            [
                'nom' => 'Mr Lespagnol : Entreprise Alizé Quimper (partenaire de notre tenue club)',
                'image_url' => 'alize.jpg',
                'ordre' => 3,
            ],
            [
                'nom' => 'Entreprise Dadypac Quimper (partenaire de fonctionnement club)',
                'image_url' => 'dadypac.jpg',
                'ordre' => 4,
            ],
            [
                'nom' => 'Entreprise Ysblue Douarnenez (partenaire Bonnet Club)',
                'image_url' => 'ysblue.jpg',
                'ordre' => 5,
            ],
            [
                'nom' => 'Mr Hénaff: Entreprise Hénaff Pouldreuzic (partenaire stand restauration compétitions locales)',
                'image_url' => 'henaff.jpg',
                'ordre' => 6,
            ],
            [
                'nom' => 'Famille Planchet: Piscine Aquaform Ergué Gaberic (partenaire structure sportive)',
                'image_url' => 'aquaform.jpg',
                'ordre' => 7,
            ],
            [
                'nom' => 'Entreprise Leclerc Quimper ( partenaire Stand et restauration compétitions)',
                'image_url' => 'leclerc.jpg',
                'ordre' => 8,
            ],
            [
                'nom' => 'Cross Fit Be Safe Quimper (partenaire prestation sportive)',
                'image_url' => 'crossfitbesafe.jpg',
                'ordre' => 9,
            ],
        ];

        $this->db->table('partenaires')->insertBatch($partenaires);
    }
}