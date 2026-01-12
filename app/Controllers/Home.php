<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Donnees;

class Home extends BaseController
{
    // Dans Home.php

    private function getRootStyles()
    {
        $db = \Config\Database::connect();
        $settings = $db->table('root')->get()->getResultArray();

        $rootData = [];
        foreach ($settings as $setting) {
            // Remplace 'primary_color' par 'primary' (ou garde tel quel selon votre préférence)
            $key = str_replace('_', '-', $setting['libelle']);
            $rootData[$key] = $setting['value'];
        }
        return $rootData;
    }

    public function index()
    {
        $donneesModel = new Donnees();

        $data = [
            'root' => $this->getRootStyles(),
            'cssPage' => 'accueil.css',
            'titrePage' => $donneesModel->getGeneral()['nomClub'],
            'general' => $donneesModel->getGeneral(),
            'disciplines' => $donneesModel->getDisciplines(),
            'coaches' => $donneesModel->getCoachs(),
            'piscines' => $donneesModel->getPiscines(),
            'actualites' => $donneesModel->getActualites('actualite'),
            'evenements' => $donneesModel->getActualites('evenement'),
            
        ];

        return view('v_accueil', $data);
    }

    public function calendriers()
    {
        $donneesModel = new Donnees();
        $data = [
            'root' => $this->getRootStyles(),
            'cssPage' => 'calendrier.css',
            'titrePage' => 'Calendriers',
            'general' => $donneesModel->getGeneral(),
            'plannings' => $donneesModel->getPlannings(),
            'calendrierCompet' => $donneesModel->getCalendrier(),
        ];

        return view('v_calendriers', $data);
    }

    public function boutique()
    {
        $donneesModel = new Donnees();
        $data = [
            'root' => $this->getRootStyles(),
            'cssPage' => 'boutique.css',
            'titrePage' => 'Boutique du PEC',
            'general' => $donneesModel->getGeneral(),
            'boutique' => $donneesModel->getBoutique(),
        ];

        return view('v_boutique', $data);
    }
}