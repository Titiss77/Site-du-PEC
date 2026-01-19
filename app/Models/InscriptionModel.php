<?php

namespace App\Models;

use CodeIgniter\Model;

class InscriptionModel extends Model
{
    /**
     * Retourne la liste du matériel
     * * @return array
     */
    public function getMateriel()
    {
        return $this->db->table('materiel')
            ->select('nom, description, pret, image')
            ->get()
            ->getResultArray();
    }

    /**
     * Retourne l'adresse mail associée à un poste
     * * @param string $poste
     * @return string|null
     */
    public function getMail(string $poste)
    {
        $result = $this->db->table('postes')
            ->select('mail')
            ->where('libelle', $poste)
            ->limit(1)
            ->get()
            ->getRow(); // Retourne un objet ou null

        return $result ? $result->mail : null;
    }
}