<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use Config\Database;
use App\Models\Donnees;

class Home extends BaseController {
    /*  Retourne la page d'accueil avec les données nécessaires
     *
     * @return vue de la page d'accueil avec les données
     */
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

    /*  Retourne la page des calendriers avec les données nécessaires
     *
     * @return vue de la page des calendriers avec les données
     */
    public function calendriers() {
        $donneesModel = new Donnees();
        $data = [
            'cssPage'     => 'calendrier.css',
            'titrePage'   => 'Calendriers',
            'general'     => $donneesModel->getGeneral(),
            'plannings'   => $donneesModel->getPlannings(),
            'calendrierCompet'   => $donneesModel->getCalendrier(),
        ];
        
        return view('v_calendriers', $data);
    }
}