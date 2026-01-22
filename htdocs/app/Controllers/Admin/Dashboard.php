<?php

namespace App\Controllers\Admin;

class Dashboard extends BaseAdminController
{
    public function index()
    {
        $data = $this->getCommonData('Dashboard - Admin', 'admin/dashboard.css');

        // Récupération des compteurs via le modèle Donnees (ou des modèles spécifiques)
        // Note: count($this->donneesModel->get...) n'est pas très optimisé mais fonctionne pour l'instant.
        // Idéalement : $db->table('actualites')->countAll();
        
        $db = \Config\Database::connect();

        $data['count'] = [
            'actualites' => $db->table('actualites')->countAll(),
            'boutique'   => $db->table('boutique')->countAll(),
            'membres'    => $db->table('membres')->countAll(),
            'groupes'    => $db->table('groupes')->countAll(),
        ];

        return view('admin/v_dashboard', $data);
    }
}