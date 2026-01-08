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
        $data = [
            'cssPage' => 'admin/dashboard.css',
            'titrePage' => 'Dashboard - Admin',
            'general' => $this->donneesModel->getGeneral(),
            'count' => [
                'actualites' => count($this->donneesModel->getActualites('actualite')),
                'boutique' => count($this->donneesModel->getBoutique()),
                'membres' => count($this->donneesModel->getBureau()),
                // Ajoute ici d'autres comptages si nécessaire
            ]
        ];
        return view('admin/v_dashboard', $data);
    }
}