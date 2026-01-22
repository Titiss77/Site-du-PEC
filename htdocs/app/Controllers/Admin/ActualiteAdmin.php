<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Donnees;
use App\Controllers\Root;    

class ActualiteAdmin extends BaseController
{
    protected $donneesModel;

    public function __construct()
    {
        $this->donneesModel = new Donnees();
        $this->root = new Root();
    }

    /**
     * Affiche la page d'accueil de l'administration
     */
    public function index()
    {
        $data = [
            'root' => $this->root->getRootStyles(),
            'cssPage' => 'admin/actualité.css',
            'titrePage' => 'Actualités - Admin',
            'general' => $this->donneesModel->getGeneral(),
        ];
        return view('admin/v_actualites', $data);
    }
}