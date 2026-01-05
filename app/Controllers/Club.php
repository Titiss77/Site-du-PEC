<?php
namespace App\Controllers;
use App\Models\CoachModel;

class Club extends BaseController {
    public function index() {
        $model = new CoachModel();
        
        $data = [
            'title'   => 'Accueil - Club de Nage avec Palmes',
            'coaches' => $model->findAll(),
            'stats'   => [
                'total' => 150,
                'hommes' => 70,
                'femmes' => 80,
                'projets' => 'Développement du pôle compétition et initiation jeunes.'
            ]
        ];

        return view('accueil', $data);
    }
}