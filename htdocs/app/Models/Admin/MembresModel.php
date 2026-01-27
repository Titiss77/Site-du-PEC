<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class MembresModel extends Model
{
    protected $table            = 'membres';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = ['nom', 'image_id'];

    /**
     * Récupère les membres avec leur image et la liste de leurs fonctions concaténées
     */
    public function getMembresWithRelations($id = null)
    {
        $builder = $this->select('membres.*, images.path as image_path, images.alt')
                        // Astuce SQL : GROUP_CONCAT regroupe les titres des fonctions en une seule chaine (ex: "Coach, Président")
                        ->select('GROUP_CONCAT(fonctions.titre SEPARATOR ", ") as roles_string')
                        // On récupère aussi les IDs pour pré-cocher les cases dans le formulaire d'édition
                        ->select('GROUP_CONCAT(fonctions.id) as roles_ids')
                        ->join('images', 'membres.image_id = images.id', 'left')
                        ->join('membre_fonction', 'membres.id = membre_fonction.membre_id', 'left')
                        ->join('fonctions', 'membre_fonction.fonction_id = fonctions.id', 'left')
                        ->groupBy('membres.id');

        if ($id) {
            return $builder->where('membres.id', $id)->first();
        }

        return $builder->orderBy('membres.nom', 'ASC')->findAll();
    }

    /**
     * Gère la mise à jour des rôles (Table pivot)
     */
    public function updateRoles($membreId, $fonctionIds)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('membre_fonction');

        // 1. On nettoie les anciens rôles pour ce membre
        $builder->where('membre_id', $membreId)->delete();

        // 2. On insère les nouveaux (si y'en a)
        if (!empty($fonctionIds)) {
            $data = [];
            foreach ($fonctionIds as $fId) {
                $data[] = [
                    'membre_id' => $membreId,
                    'fonction_id' => $fId
                ];
            }
            $builder->insertBatch($data);
        }
    }
}