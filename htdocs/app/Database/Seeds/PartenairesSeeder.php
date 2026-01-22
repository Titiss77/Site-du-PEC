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
                'image_url' => 'partenaires/boulanger.jpg',
                'ordre' => 1,
            ],
            [
                'nom' => 'Mr DA RU : Entreprise Guichard Briec ( partenaire de notre tenue club)',
                'image_url' => 'partenaires/guichard.jpg',
                'ordre' => 2,
            ],
            [
                'nom' => 'Mr Lespagnol : Entreprise Alizé Quimper (partenaire de notre tenue club)',
                'image_url' => 'partenaires/alize.jpg',
                'ordre' => 3,
            ],
            [
                'nom' => 'Entreprise Dadypac Quimper (partenaire de fonctionnement club)',
                'image_url' => 'partenaires/dadypac.jpg',
                'ordre' => 4,
            ],
            [
                'nom' => 'Entreprise Ysblue Douarnenez (partenaire Bonnet Club)',
                'image_url' => 'partenaires/ysblue.jpg',
                'ordre' => 5,
            ],
            [
                'nom' => 'Mr Hénaff: Entreprise Hénaff Pouldreuzic (partenaire stand restauration compétitions locales)',
                'image_url' => 'partenaires/henaff.jpg',
                'ordre' => 6,
            ],
            [
                'nom' => 'Famille Planchet: Piscine Aquaform Ergué Gaberic (partenaire structure sportive)',
                'image_url' => 'partenaires/aquaform.jpg',
                'ordre' => 7,
            ],
            [
                'nom' => 'Entreprise Leclerc Quimper ( partenaire Stand et restauration compétitions)',
                'image_url' => 'partenaires/leclerc.jpg',
                'ordre' => 8,
            ],
            [
                'nom' => 'Cross Fit Be Safe Quimper (partenaire prestation sportive)',
                'image_url' => 'partenaires/crossfitbesafe.jpg',
                'ordre' => 9,
            ],
        ];

        $newData = [];
        foreach ($partenaires as $row) {
            $imagePath = $row['image_url']; // Attention: c'était 'image_url' ici
            unset($row['image_url']);
            $row['image_id'] = $this->getImageId($imagePath);
            $newData[] = $row;
        }

        $this->db->table('partenaires')->insertBatch($newData);
    }

    private function getImageId($path)
    {
        if (empty($path)) return null;
        $existing = $this->db->table('images')->where('path', $path)->get()->getRow();
        if ($existing) return $existing->id;
        $this->db->table('images')->insert(['path' => $path, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
        return $this->db->insertID();
    }
}