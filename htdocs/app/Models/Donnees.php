<?php

namespace App\Models;

use CodeIgniter\Model;

class Donnees extends Model
{
    /**
     * Retourne les informations générales du blog
     */
    public function getGeneral()
    {
        return $this
            ->db
            ->table('general g')
            // On joint la table images
            ->join('images i', 'g.image_id = i.id', 'left')
            // On alias i.path en 'image' pour la compatibilité
            ->select('i.path as image, g.nomClub, g.description, g.philosophie, g.nombreNageurs, g.projetSportif, g.lienFacebook, g.lienInstagram, g.lienffessm, g.logoffessm, g.lienDrive')
            ->select('ROUND(g.nombreHommes / g.nombreNageurs * 100, 1) as pourcentH')
            ->select('ROUND((g.nombreNageurs - g.nombreHommes) / g.nombreNageurs * 100, 1) as pourcentF')
            ->get()
            ->getRowArray();
    }

    /**
     * Méthode générique interne pour récupérer des membres par fonction
     */
    private function getMembresParFonction(string $titreFonction)
    {
        return $this
            ->db
            ->table('membres m')
            // Jointure pour l'image
            ->join('images i', 'm.image_id = i.id', 'left')
            // On récupère le path en tant que 'photo'
            ->select('m.nom, i.path as photo')
            ->join('membre_fonction mf', 'm.id = mf.membre_id')
            ->join('fonctions f', 'mf.fonction_id = f.id')
            ->where('f.titre', $titreFonction)
            ->get()
            ->getResultArray();
    }

    public function getCoachs()
    {
        return $this->getMembresParFonction('Coach');
    }

    public function getCoachsFormation()
    {
        return $this->getMembresParFonction('Coach en formation');
    }

    /**
     * Retourne la liste des disciplines
     */
    public function getDisciplines()
    {
        return $this
            ->db
            ->table('disciplines d')
            ->join('images i', 'd.image_id = i.id', 'left')
            ->select('d.nom, d.description, i.path as image')
            ->get()
            ->getResultArray();
    }

    /**
     * Retourne la liste des piscines
     */
    public function getPiscines()
    {
        return $this
            ->db
            ->table('piscines p')
            ->join('images i', 'p.image_id = i.id', 'left')
            ->select('p.nom, p.adresse, p.type_bassin, i.path as photo')
            ->get()
            ->getResultArray();
    }

    /**
     * Retourne les plannings (Scolaire/Vacances)
     */
    public function getPlannings()
    {
        return $this
            ->db
            ->table('plannings p')
            ->join('images i', 'p.image_id = i.id', 'left')
            ->select('p.categorie, p.date, i.path as image')
            ->where('p.categorie !=', 'competitions')
            ->orderBy('p.categorie', 'ASC')
            ->get()
            ->getResultArray();
    }

    /**
     * Retourne le calendrier des compétitions
     */
    public function getCalendrier()
    {
        return $this
            ->db
            ->table('plannings p')
            ->join('images i', 'p.image_id = i.id', 'left')
            ->select('p.categorie, p.date, i.path as image')
            ->where('p.categorie', 'competitions')
            ->get()
            ->getResultArray();
    }

    /**
     * Retourne le bureau (Exclut les coachs)
     */
    public function getBureau()
    {
        return $this
            ->db
            ->table('membres m')
            // Jointure image
            ->join('images i', 'm.image_id = i.id', 'left')
            // On sélectionne m.* MAIS on force photo via l'alias
            ->select('m.id, m.nom, i.path as photo, GROUP_CONCAT(f.titre SEPARATOR ", ") AS fonctions')
            ->join('membre_fonction mf', 'mf.membre_id = m.id')
            ->join('fonctions f', 'f.id = mf.fonction_id')
            ->where('f.titre !=', 'Coach')
            ->where('f.titre !=', 'Coach en formation')
            ->groupBy('m.id')
            ->get()
            ->getResultArray();
    }

    public function getBoutique()
    {
        // La boutique n'a pas d'image dans votre migration actuelle, donc pas de changement
        return $this
            ->db
            ->table('boutique')
            ->select('nom, url, description, tranchePrix')
            ->get()
            ->getResultArray();
    }

    /**
     * Retourne les actualités par catégorie
     */
    public function getActualites($categorie)
    {
        return $this
            ->db
            ->table('actualites a')
            // Jointure image
            ->join('images i', 'a.image_id = i.id', 'left')
            // Jointure auteur
            ->join('membres m', 'a.id_auteur = m.id')
            ->select('a.titre, a.slug, a.type, a.description, i.path as image, a.date_evenement, a.created_at, m.nom as auteur')
            ->where([
                'a.statut' => 'publie',
                'a.type' => $categorie
            ])
            ->orderBy('a.created_at', 'DESC')
            ->get()
            ->getResultArray();
    }
}