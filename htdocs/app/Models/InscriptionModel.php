<?php

namespace App\Models;

use CodeIgniter\Model;

class InscriptionModel extends Model
{
    /**
     * Retourne la liste du matériel
     */
    public function getMateriel()
    {
        return $this
            ->db
            ->table('materiel m')
            // Jointure Image
            ->join('images i', 'm.image_id = i.id', 'left')
            // Jointure Pret
            ->join('pret p', 'p.id = m.idPret', 'left')
            ->select('m.nom, m.description, m.idPret, i.path as image, p.nom as nomPret')
            ->get()
            ->getResultArray();
    }

    /**
     * Retourne l'adresse mail associée à un poste
     * (Pas de changement ici, pas d'images)
     */
    public function getMail(string $poste)
    {
        $result = $this
            ->db
            ->table('postes')
            ->select('mail')
            ->where('libelle', $poste)
            ->limit(1)
            ->get()
            ->getRow(); 

        return $result ? $result->mail : null;
    }
}