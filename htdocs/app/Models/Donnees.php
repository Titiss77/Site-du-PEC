<?php

namespace App\Models;

use CodeIgniter\Model;

class Donnees extends Model
{
    public function getGeneral()
    {
        return $this->db->table('general g')
            ->join('images i', 'g.image_id = i.id', 'left')
            ->join('images ig', 'g.image_groupe_id = ig.id', 'left')
            ->join('images il', 'g.logoffessm_id = il.id', 'left')
            ->select('i.path as image, ig.path as image_groupe, il.path as logoffessm')
            ->select('g.nomClub, g.description, g.philosophie, g.nombreNageurs, g.projetSportif, g.lienFacebook, g.lienInstagram, g.lienffessm, g.lienDrive')
            ->select('ROUND(g.nombreHommes / g.nombreNageurs * 100, 1) as pourcentH')
            ->select('ROUND((g.nombreNageurs - g.nombreHommes) / g.nombreNageurs * 100, 1) as pourcentF')
            ->get()->getRowArray();
    }

    private function getMembresParFonction(string $titreFonction)
    {
        return $this->db->table('membres m')
            ->join('images i', 'm.image_id = i.id', 'left')
            ->select('m.nom, i.path as photo')
            ->join('membre_fonction mf', 'm.id = mf.membre_id')
            ->join('fonctions f', 'mf.fonction_id = f.id')
            ->where('f.titre', $titreFonction)
            ->get()->getResultArray();
    }

    public function getCoachs() { return $this->getMembresParFonction('Coach'); }
    public function getCoachsFormation() { return $this->getMembresParFonction('Coach en formation'); }

    public function getDisciplines()
    {
        return $this->db->table('disciplines d')
            ->join('images i', 'd.image_id = i.id', 'left')
            ->select('d.nom, d.description, i.path as image')
            ->get()->getResultArray();
    }

    public function getPiscines()
    {
        return $this->db->table('piscines p')
            ->join('images i', 'p.image_id = i.id', 'left')
            ->select('p.nom, p.adresse, p.type_bassin, i.path as photo')
            ->get()->getResultArray();
    }

    public function getCalendriers()
    {
        return $this->db->table('calendriers c')
            ->join('images i', 'c.image_id = i.id', 'left')
            ->select('c.categorie, c.date, i.path as image')
            ->where('c.categorie !=', 'competitions')
            ->orderBy('c.categorie', 'ASC')
            ->get()->getResultArray();
    }

    public function getCalendrier()
    {
        return $this->db->table('calendriers c')
            ->join('images i', 'c.image_id = i.id', 'left')
            ->select('c.categorie, c.date, i.path as image')
            ->where('c.categorie', 'competitions')
            ->get()->getResultArray();
    }

    public function getBureau()
    {
        return $this->db->table('membres m')
            ->join('images i', 'm.image_id = i.id', 'left')
            ->select('m.*, i.path as photo, GROUP_CONCAT(f.titre SEPARATOR ", ") AS fonctions')
            ->join('membre_fonction mf', 'mf.membre_id = m.id')
            ->join('fonctions f', 'f.id = mf.fonction_id')
            ->where('f.titre !=', 'Coach')
            ->where('f.titre !=', 'Coach en formation')
            ->groupBy('m.id')
            ->get()->getResultArray();
    }

    public function getBoutique()
    {
        return $this->db->table('boutique')->select('nom, url, description, tranchePrix')->get()->getResultArray();
    }

    public function getActualites($categorie)
    {
        return $this->db->table('actualites a')
            ->join('images i', 'a.image_id = i.id', 'left')
            ->select('a.titre, a.slug, a.type, a.description, i.path as image, a.date_evenement, a.created_at, m.nom as auteur')
            ->join('membres m', 'a.id_auteur = m.id')
            ->where(['a.statut' => 'publie', 'a.type' => $categorie])
            ->orderBy('a.created_at', 'DESC')
            ->get()->getResultArray();
    }
}