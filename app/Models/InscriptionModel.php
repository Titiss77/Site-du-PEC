<?php

namespace App\Models;

use CodeIgniter\Model;

class InscriptionModel extends Model
{
    // Récupère les tarifs classés par catégorie (Adulte, Jeune, etc.)
    public function getTarifs()
    {
        $req = 'SELECT categorie, description, prix FROM `tarifs`';
		$rs = $this->db->query($req);
		$tarifs = $rs->getResultArray();
		return $tarifs;
    }

    // Récupère la liste du matériel (masque, palmes, tuba...) et si le club le prête
    public function getMateriel()
    {
        $req = 'SELECT nom, description, pret FROM `materiel`';
		$rs = $this->db->query($req);
		$materiel = $rs->getResultArray();
		return $materiel;
    }

    public function getMail($poste)
    {
        $req = 'SELECT mail FROM `postes` WHERE libelle = ? LIMIT 1';
        $rs = $this->db->query($req, [$poste]);
        $ligne = $rs->getRowArray();

        // On vérifie si on a trouvé un résultat pour éviter les erreurs
        // et on retourne uniquement la valeur du mail (string)
        return ($ligne) ? $ligne['mail'] : null;
    }
}