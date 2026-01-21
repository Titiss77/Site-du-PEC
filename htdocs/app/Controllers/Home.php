<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Controllers\Root;
use App\Models\Donnees;
use App\Models\GroupeModel;
use App\Models\PartenaireModel;  // Correction : pas de \ devant si importé au dessus

class Home extends BaseController
{
    protected $donneesModel;
    protected $groupeModel;
    protected $root;
    protected $generalData;
    protected $partenaireModel;

    public function __construct()
    {
        $this->donneesModel = new Donnees();
        $this->groupeModel = new GroupeModel();
        $this->root = new Root();
        $this->partenaireModel = new PartenaireModel();

        // --- CORRECTION ICI ---
        // 1. Utilisation de $this->donneesModel (car $donneesModel n'existe pas localement)
        // 2. On récupère les données une seule fois de manière sécurisée
        $this->generalData = $this->donneesModel->first() ?? [];

        // Si votre modèle Donnees a une méthode spécifique getGeneral(),
        // assurez-vous qu'elle ne renvoie pas null.
        // $this->generalData = $this->donneesModel->getGeneral() ?? [];
    }

    /**
     * Helper to merge page-specific data with global data (Header, Footer, Styles)
     */
    private function _render(string $view, array $pageData = [])
    {
        // Vérification de sécurité pour éviter l'erreur "offset on value of type null"
        $nomClub = (isset($this->generalData['nomClub'])) ? $this->generalData['nomClub'] : 'Club de Natation';

        $globalData = [
            'root' => $this->root->getRootStyles(),
            'general' => $this->generalData,
            'titrePage' => $pageData['titrePage'] ?? $nomClub,
        ];

        return view($view, array_merge($globalData, $pageData));
    }

    public function index()
    {
        $data = [
            'cssPage' => 'accueil.css',
            'disciplines' => $this->donneesModel->getDisciplines(),
            'coaches' => $this->donneesModel->getCoachs(),
            'coachesForm' => $this->donneesModel->getCoachsFormation(),
            'piscines' => $this->donneesModel->getPiscines(),
            'actualites' => $this->donneesModel->getActualites('actualite'),
            'evenements' => $this->donneesModel->getActualites('evenement'),
            'groupes' => $this->groupeModel->getGroupes(),
            // Assurez-vous que cette méthode existe dans votre PartenaireModel
            'partenaires' => $this->partenaireModel->findAll()
        ];

        return $this->_render('v_accueil', $data);
    }

    public function groupes()
    {
        $data = [
            'cssPage' => 'groupes.css',
            'groupes' => $this->groupeModel->getGroupes(),
        ];

        return $this->_render('v_groupes', $data);
    }

    public function calendriers()
    {
        $data = [
            'cssPage' => 'calendrier.css',
            'titrePage' => 'Calendriers',
            'plannings' => $this->donneesModel->getPlannings(),
            'calendrierCompet' => $this->donneesModel->getCalendrier(),
        ];

        return $this->_render('v_calendriers', $data);
    }

    public function boutique()
    {
        $data = [
            'cssPage' => 'boutique.css',
            'titrePage' => 'Boutique du PEC',
            'boutique' => $this->donneesModel->getBoutique(),
        ];

        return $this->_render('v_boutique', $data);
    }
}