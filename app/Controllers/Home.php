<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use Config\Database;
use App\Models\Donnees;

class Home extends BaseController {
    public function index() {
        $donneesModel = new Donnees();

        $data = [
            'cssPage'     => 'accueil.css',
            'titrePage'   => 'Accueil',
            'general'     => $donneesModel->getGeneral(),
            'disciplines' => $donneesModel->getDisciplines(),
            'coaches'     => $donneesModel->getCoachs(),
            'piscines'    => $donneesModel->getPiscines(),
        ];

        return view('v_accueil', $data);
    }
}