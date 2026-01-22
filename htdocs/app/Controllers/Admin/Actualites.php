<?php

namespace App\Controllers\Admin;

use App\Models\ActualiteModel;

class Actualites extends BaseAdminController
{
    protected $actuModel;

    public function __construct()
    {
        // On instancie le modèle
        $this->actuModel = new ActualiteModel();
    }

    // 1. LISTE DES ACTUALITÉS
    public function index()
    {
        $data = $this->getCommonData('Gestion Actualités', 'admin/actualite.css');
        
        // Récupération via le modèle
        $data['actualites'] = $this->actuModel->getActualitesWithRelations();

        return view('admin/actualites/index', $data);
    }

    // 2. FORMULAIRE DE CRÉATION
    public function new()
    {
        $data = $this->getCommonData('Nouvelle Actualité', 'admin/form.css');
        return view('admin/actualites/create', $data);
    }

    // 3. TRAITEMENT DE CRÉATION
    public function create()
    {
        // Règles de validation
        if (!$this->validate([
            'titre'       => 'required|min_length[3]|max_length[150]',
            'description' => 'required',
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Upload de l'image via la méthode du BaseAdminController
        $imageId = $this->handleImageUpload('image', 'actualites');

        $data = [
            'titre'          => $this->request->getPost('titre'),
            'slug'           => url_title($this->request->getPost('titre'), '-', true),
            'description'    => $this->request->getPost('description'),
            'date_evenement' => $this->request->getPost('date_evenement') ?: null,
            'statut'         => $this->request->getPost('statut'),
            'type'           => 'actualite',
            'id_auteur'      => session()->get('user_id') ?? 1, // ID de l'admin connecté
            'image_id'       => $imageId
        ];

        $this->actuModel->insert($data);

        return redirect()->to('/admin/actualites')->with('success', 'Actualité créée avec succès.');
    }

    // 4. FORMULAIRE D'ÉDITION
    public function edit($id = null)
    {
        $data = $this->getCommonData('Modifier Actualité', 'admin/form.css');
        
        $item = $this->actuModel->getActualitesWithRelations($id);
        
        if (!$item) {
            return redirect()->to('/admin/actualites')->with('error', 'Article introuvable.');
        }

        $data['item'] = $item;

        return view('admin/actualites/edit', $data);
    }

    // 5. TRAITEMENT DE MISE À JOUR
    public function update($id = null)
    {
        // Validation
        if (!$this->validate([
            'titre' => 'required|min_length[3]',
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Upload nouvelle image (si présente)
        $imageId = $this->handleImageUpload('image', 'actualites');

        $data = [
            'titre'          => $this->request->getPost('titre'),
            'slug'           => url_title($this->request->getPost('titre'), '-', true),
            'description'    => $this->request->getPost('description'),
            'date_evenement' => $this->request->getPost('date_evenement') ?: null,
            'statut'         => $this->request->getPost('statut'),
        ];

        // On ne met à jour l'image que si une nouvelle a été envoyée
        if ($imageId) {
            $data['image_id'] = $imageId;
        }

        $this->actuModel->update($id, $data);

        return redirect()->to('/admin/actualites')->with('success', 'Actualité mise à jour.');
    }

    // 6. SUPPRESSION
    public function delete($id = null)
    {
        // Note: Cela ne supprime pas physiquement l'image du serveur (sécurité), juste l'entrée BDD
        $this->actuModel->delete($id);
        return redirect()->to('/admin/actualites')->with('success', 'Actualité supprimée.');
    }
}