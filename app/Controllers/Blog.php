<?php

namespace App\Controllers;

use App\Models\Cartes;
use App\Models\Categories;
use App\Models\Header;
use App\Models\Extention;

class Blog extends BaseController
{
    private function header(): array
    {
        $modelHeaders = new Header();
        $modelCategories = new Categories();
        return [
            'lesHeaders' => $modelHeaders->getLesHeaders(),
            'lesCategories' => $modelCategories->getLesCategories(),
        ];
    }

    public function index()
    {
        $modelHeaders = new Header();
        $modelCategories = new Categories();

        $data = $this->header();
        $data['titrePage'] = 'Accueil';

        return view('v-accueil', $data);
    }

    public function conditions()
    {
        $modelHeaders = new \App\Models\Header();
        $modelCategories = new \App\Models\Categories();

        // On garde la structure du header pour le menu
        $data = [
            'titreHeader' => 'Mentions Légales',
            'lesHeaders' => $modelHeaders->getLesHeaders(),
            'lesCategories' => $modelCategories->getLesCategories(),
            'pageHeader' => ['libelle' => 'Mentions Légales']
        ];

        $data['titrePage'] = 'Conditions & Mentions Légales';

        return view('v-conditions', $data);
    }

    public function gestion()
    {
        $modelHeaders = new \App\Models\Header();
        $modelCategories = new \App\Models\Categories();

        $data = [
            'titreHeader' => 'Espace Gestion',
            'lesHeaders' => $modelHeaders->getLesHeaders(),
            'lesCategories' => $modelCategories->getLesCategories(),
            'pageHeader' => ['libelle' => 'Administration']
        ];

        $data['titrePage'] = 'Espace Gestion';
        
        return view('v-enDev', $data);
    }

    public function headerPage($idHeader)
    {
        $modelCartes = new Cartes();
        $modelHeaders = new Header();
        $modelCategories = new Categories();
        $modelExtention = new Extention(); // NOUVEAU: Initialisation du modèle Extention

        $idUser = session()->get('idUser');

        $data = $this->header();

        $data['pageHeader'] = $modelHeaders->getUnHeader($idHeader);

        if (empty($data['pageHeader'])) {
            return redirect()->to(base_url('/'))->with('error', 'Section introuvable.');
        }

        // ... (Logique existante pour charger et regrouper les cartes)
        $categoriesParHeader = $modelCategories->getCategoriesParHeader($idHeader);
        $lesCartes = $modelCartes->getLesCartes($idHeader, $idUser);

        $cartesParCategorie = [];
        
        foreach ($categoriesParHeader as $categorie) {
            $cartesParCategorie[$categorie['id']] = [
                'libelle' => $categorie['libelle'],
                'id' => $categorie['id'],
                'items' => []
            ];
        }

        foreach ($lesCartes as $carte) {
            $idCategorie = $carte['idCategorie'] ?? 0;
            if (isset($cartesParCategorie[$idCategorie])) {
                $cartesParCategorie[$idCategorie]['items'][] = $carte;
            }
        }
        
        $data['cartesParCategorie'] = $cartesParCategorie;
        $data['idHeader'] = $idHeader;
        
        // NOUVEAU : Charger les extensions et les passer à la vue
        $data['extensions'] = $modelExtention->getExtensions(); 

        $data['titrePage'] = $data['pageHeader']['libelle'];

        return view('v-page', $data);
    }
}