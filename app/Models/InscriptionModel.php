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
}