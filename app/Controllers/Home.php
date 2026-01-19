<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Controllers\Root;  // Note: Ensure this is intended to be used as a library object
use App\Models\Donnees;
use App\Models\GroupeModel;

class Home extends BaseController
{
    protected $donneesModel;
    protected $groupeModel;
    protected $root;
    protected $generalData;

    public function __construct()
    {
        $this->donneesModel = new Donnees();
        $this->groupeModel = new GroupeModel();
        $this->root = new Root();

        // Pre-fetch general data to use in all methods (Performance)
        $this->generalData = $this->donneesModel->getGeneral();
    }

    /**
     * Helper to merge page-specific data with global data (Header, Footer, Styles)
     */
    private function _render(string $view, array $pageData = [])
    {
        $globalData = [
            'root' => $this->root->getRootStyles(),
            'general' => $this->generalData,
            'titrePage' => $pageData['titrePage'] ?? $this->generalData['nomClub'],  // Default to Club Name
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
