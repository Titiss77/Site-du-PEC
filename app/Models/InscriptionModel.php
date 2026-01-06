<?php

namespace App\Models;

use CodeIgniter\Model;

class InscriptionModel extends Model
{
    /**
     * Retourne la liste des tarifs
     *
     * @return categorie, description, prix sous la forme d'un tableau associatif
     */
    public function getTarifs()
    {
        $req = 'SELECT categorie, description, prix FROM `tarifs`';
		$rs = $this->db->query($req);
		$tarifs = $rs->getResultArray();
		return $tarifs;
    }

    /**
     * Retourne la liste du matériel
     *
     * @return nom, description, pret sous la forme d'un tableau associatif
     */
    public function getMateriel()
    {
        $req = 'SELECT nom, description, pret FROM `materiel`';
		$rs = $this->db->query($req);
		$materiel = $rs->getResultArray();
		return $materiel;
    }
    
    /**
     * Retourne l'adresse mail associée à un poste
     *
     * @param string $poste
     * @return string|null
     */
    public function getMail($poste)
    {
        $req = 'SELECT mail FROM `postes` WHERE libelle = ? LIMIT 1';
        $rs = $this->db->query($req, [$poste]);
        $ligne = $rs->getRowArray();
        return ($ligne) ? $ligne['mail'] : null;
    }
}