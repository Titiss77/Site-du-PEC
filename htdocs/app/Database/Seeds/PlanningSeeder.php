<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PlanningSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'categorie' => 'scolaire',
                'date'      =>  '2025 - 2026',    
                'image'     => 'planning_scolaire.jpg',
            ],
            [
                'categorie' => 'vacances',
                'date'      =>  'du 15/12 au 20/12',    
                'image'     => 'planning_vacances.jpg',
            ],
            [
                'categorie' => 'competitions',
                'date'      =>  '2025 - 2026',    
                'image'     => 'calendrier_competitions.pdf',
            ],
        ];

        $newData = [];
        foreach ($data as $row) {
            $imagePath = $row['image'];
            unset($row['image']);
            $row['image_id'] = $this->getImageId($imagePath);
            $newData[] = $row;
        }

        $this->db->table('plannings')->insertBatch($newData);
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