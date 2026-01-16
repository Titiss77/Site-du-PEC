<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Donnees;
use App\Controllers\Root;

class Home extends BaseController
{
    public function __construct()
    {
        $this->donneesModel = new Donnees();
        $this->root = new Root();
    }

    public function index()
    {

        $data = [
            'root' => $this->root->getRootStyles(),
            'cssPage' => 'accueil.css',
            'titrePage' => $this->donneesModel->getGeneral()['nomClub'],
            'general' => $this->donneesModel->getGeneral(),
            'disciplines' => $this->donneesModel->getDisciplines(),
            'coaches' => $this->donneesModel->getCoachs(),
            'piscines' => $this->donneesModel->getPiscines(),
            'actualites' => $this->donneesModel->getActualites('actualite'),
            'evenements' => $this->donneesModel->getActualites('evenement'),
            
        ];

        return view('v_accueil', $data);
    }

    public function groupes()
    {

        $data = [
            'root' => $this->root->getRootStyles(),
            'cssPage' => 'groupes.css',
            'titrePage' => $this->donneesModel->getGeneral()['nomClub'],
            'general' => $this->donneesModel->getGeneral(),
            'groupes' => $this->donneesModel->getDisciplines(),
            
        ];

        return view('v_groupes', $data);
    }

    public function calendriers()
    {
        $data = [
            'root' => $this->root->getRootStyles(),
            'cssPage' => 'calendrier.css',
            'titrePage' => 'Calendriers',
            'general' => $this->donneesModel->getGeneral(),
            'plannings' => $this->donneesModel->getPlannings(),
            'calendrierCompet' => $this->donneesModel->getCalendrier(),
        ];

        return view('v_calendriers', $data);
    }

    public function boutique()
    {
        
        $data = [
            'root' => $this->root->getRootStyles(),
            'cssPage' => 'boutique.css',
            'titrePage' => 'Boutique du PEC',
            'general' => $this->donneesModel->getGeneral(),
            'boutique' => $this->donneesModel->getBoutique(),
        ];

        return view('v_boutique', $data);
    }
}