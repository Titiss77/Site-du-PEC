<?php

namespace App\Controllers\Admin;

use App\Models\Admin\BoutiquesModel;

class Boutiques extends BaseAdminController
{
    protected $boutiquesModel;

    public function __construct()
    {
        // On instancie le modèle
        $this->boutiquesModel = new BoutiquesModel();
    }

    public function index()
    {
        $data = $this->getCommonData('Gestion Boutiques', 'Admin/boutique.css');

        // Récupération via le modèle
        $data['boutiques'] = $this->boutiquesModel->getBoutiquesWithRelations();

        return view('Admin/boutiques/index', $data);
    }

    

}