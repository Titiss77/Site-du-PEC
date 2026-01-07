<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Donnees;

class Dashboard extends BaseController
{
    protected $donneesModel;

    public function __construct()
    {
        $this->donneesModel = new Donnees();
    }

    /**
     * Affiche la page d'accueil de l'administration
     */
    public function index()
    {
        // Nous récupérons les données essentielles pour les statistiques du tableau de bord
        $data = [
            'cssPage'   => 'admin/dashboard.css',
            'titrePage' => 'Tableau de bord - Admin',
            'general'   => $this->donneesModel->getGeneral(), //
            'count'     => [
                'actualites' => count($this->donneesModel->getActualites('actualite')), //
                'boutique'   => count($this->donneesModel->getBoutique()), //
                'membres'    => count($this->donneesModel->getBureau()), //
            ]
        ];

        return view('admin/v_dashboard', $data);
    }
}