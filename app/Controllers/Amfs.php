<?php

namespace App\Controllers;

use App\Models\Cartes;
use App\Models\Categories;
use App\Models\Header;

class Amfs extends BaseController
{
    // Charge les données nécessaires uniquement pour les VUES
    private function header(): array
    {
        $modelHeaders = new Header();
        $modelCategories = new Categories();
        return [
            'lesHeaders' => $modelHeaders->getLesHeaders(),
            'lesCategories' => $modelCategories->getLesCategories(),
        ];
    }
    
    // NOUVEAU : Méthode pour afficher le formulaire d'ajout
    public function add($idHeader, $idCategorie)
    {
        $data = $this->header();
        $modelCategories = new Categories();
        $modelHeaders = new Header();

        // 1. Vérifier si le header existe
        $pageHeader = $modelHeaders->getUnHeader($idHeader);
        if (empty($pageHeader)) {
             return redirect()->to('/')->with('error', 'Section cible introuvable.');
        }

        // 2. Charger UNIQUEMENT les catégories de ce Header
        $data['categories'] = $modelCategories->getCategoriesParHeader($idHeader);

        // 3. Préparer les infos pour la vue
        $data['pageHeader'] = [
            'id' => $idHeader,
            'libelle' => 'Ajout de contenu'
        ];
        $data['titrePage'] = 'Ajouter un nouvel élément';
        
        // 4. Passer l'ID de la catégorie présélectionnée
        $data['idCategoriePreselectionnee'] = $idCategorie;

        return view('amfs_add', $data); // Nouvelle vue à créer
    }
    
    // NOUVEAU : Méthode pour traiter l'ajout
    public function create()
    {
        $modelCartes = new Cartes();
        $session = session();
        
        // Assurez-vous que l'utilisateur est connecté et récupérez son ID
        $idUser = $session->get('idUser'); 
        if (!$idUser) {
             return redirect()->to('login')->with('error', 'Session expirée. Veuillez vous reconnecter.');
        }

        // Récupérer l'ID du Header pour la redirection
        $idHeader = $this->request->getPost('idHeader'); 
        if (empty($idHeader)) {
             return redirect()->to('/')->with('error', 'ID de section cible manquant.');
        }

        $postData = [
            'idUser'      => $idUser, // Clé étrangère pour l'utilisateur
            'libelle'     => $this->request->getPost('libelle'),
            'idCategorie' => $this->request->getPost('idCategorie'),
            'image'       => $this->request->getPost('image'),
            'lien'        => $this->request->getPost('lien'),
            'saison'      => $this->request->getPost('saison'),
            'episode'     => $this->request->getPost('episode'),
            'description' => $this->request->getPost('description'),
            // dateLimite utilise CURRENT_TIMESTAMP par défaut si non spécifié (voir DB migration)
        ];

        if ($modelCartes->creerCarte($postData)) {
            return redirect()->to('/' . $idHeader)->with('success', 'Élément ajouté avec succès !');
        } else {
            return redirect()->back()->withInput()->with('error', 'Erreur lors de l\'ajout de l\'élément.');
        }
    }

    public function edit($id)
    {
        $data = $this->header();
        $modelCartes = new Cartes();
        $modelCategories = new Categories();

        // 1. Charger la carte
        $data['carte'] = $modelCartes->getUneCarte($id);

        if (empty($data['carte'])) {
            return redirect()->to('/')->with('error', 'Carte introuvable.');
        }

        // 2. Trouver à quel Header appartient cette carte
        $maCategorie = $modelCategories->getUnCategorie($data['carte']['idCategorie']);
        $idHeaderActuel = $maCategorie['idHeader'];

        // 3. Charger UNIQUEMENT les catégories de ce Header
        $data['categories'] = $modelCategories->getCategoriesParHeader($idHeaderActuel);

        // 4. Préparer les infos du header pour la vue (pour le bouton annuler et le titre)
        $data['pageHeader'] = [
            'id' => $idHeaderActuel,
            'libelle' => 'Modification'
        ];
        $data['titrePage'] = $data['pageHeader']['libelle'];

        return view('amfs_edit', $data);
    }

    /**
     * La méthode update doit maintenant accepter deux paramètres pour la redirection
     */
    public function update($id, $idHeader)
    {
        $data = $this->header();

        $modelCartes = new Cartes();

        $postData = [
            'libelle' => $this->request->getPost('libelle'),
            'idCategorie' => $this->request->getPost('idCategorie'),
            'image' => $this->request->getPost('image'),
            'lien' => $this->request->getPost('lien'),
            'saison' => $this->request->getPost('saison'),
            'episode' => $this->request->getPost('episode'),
            'description' => $this->request->getPost('description'),
        ];

        if ($modelCartes->modifierCarte($postData, $id)) {
            // Redirection vers la page du header d'origine
            return redirect()->to('/' . $idHeader)->with('success', 'Mise à jour réussie !');
        } else {
            return redirect()->back()->with('error', 'Erreur lors de la mise à jour.');
        }
        $data['titrePage'] = $data['pageHeader']['libelle'];
    }

    public function delete($id, $idHeader)
    {
        $data = $this->header();

        $modelCartes = new Cartes();
        $modelHeaders = new Header();

        // 1. Vérifier si la carte existe
        $carte = $modelCartes->getUneCarte($id);
        if (empty($carte)) {
            return redirect()->to('/')->with('error', 'Carte introuvable.');
        }

        // 2. Vérifier si le header existe (pour valider la destination)
        $headerData = $modelHeaders->getUnHeader($idHeader);
        if (empty($headerData)) {
            return redirect()->to('/')->with('error', 'Destination introuvable.');
        }

        // 3. Suppression
        if ($modelCartes->supprimerCarte($id)) {
            // ON UTILISE LA VARIABLE $idHeader QUI EST LE CHIFFRE
            return redirect()->to('/' . $idHeader)->with('success', 'Carte supprimée avec succès.');
        } else {
            return redirect()->to('/' . $idHeader)->with('error', 'Erreur lors de la suppression.');
        }
        $data['titrePage'] = $data['pageHeader']['libelle'];
    }

    
}