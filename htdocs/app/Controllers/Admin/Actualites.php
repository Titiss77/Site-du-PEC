<?php

namespace App\Controllers\Admin;

use CodeIgniter\API\ResponseTrait;

class Actualites extends BaseAdminController
{
    use ResponseTrait; // Utile si vous voulez renvoyer du JSON par moment

    protected $db;
    protected $table = 'actualites';

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    // LISTE (GET /admin/actualites)
    public function index()
    {
        $data = $this->getCommonData('Gestion Actualités', 'admin/actualite.css');
        
        // On récupère les actus avec l'image jointe
        $data['actualites'] = $this->donneesModel->getActualites('actualite'); // Réutilisation de votre méthode existante
        // OU requête directe si besoin de champs admin spécifiques
        
        return view('admin/actualites/index', $data); // Créez ce dossier vues
    }

    // FORMULAIRE CRÉATION (GET /admin/actualites/new)
    public function new()
    {
        $data = $this->getCommonData('Nouvelle Actualité', 'admin/form.css');
        return view('admin/actualites/create', $data);
    }

    // TRAITEMENT CRÉATION (POST /admin/actualites)
    public function create()
    {
        // 1. Gestion Image
        $imageId = $this->handleImageUpload('image', 'actualites');

        // 2. Insertion
        $data = [
            'titre' => $this->request->getPost('titre'),
            'slug'  => url_title($this->request->getPost('titre'), '-', true),
            'description' => $this->request->getPost('description'),
            'date_evenement' => $this->request->getPost('date_evenement'),
            'type' => 'actualite',
            'statut' => 'publie', // ou via formulaire
            'id_auteur' => session()->get('id') ?? 1, // L'ID de l'admin connecté
            'image_id' => $imageId,
            'created_at' => date('Y-m-d H:i:s')
        ];

        $this->db->table($this->table)->insert($data);

        return redirect()->to('/admin/actualites')->with('success', 'Actualité créée avec succès.');
    }

    // FORMULAIRE ÉDITION (GET /admin/actualites/id/edit)
    public function edit($id = null)
    {
        $data = $this->getCommonData('Modifier Actualité', 'admin/form.css');
        
        $data['item'] = $this->db->table($this->table)
            ->select('actualites.*, images.path as image_path')
            ->join('images', 'actualites.image_id = images.id', 'left')
            ->where('actualites.id', $id)
            ->get()->getRowArray();

        if (!$data['item']) return redirect()->to('/admin/actualites')->with('error', 'Introuvable');

        return view('admin/actualites/edit', $data);
    }

    // TRAITEMENT MISE À JOUR (PUT/PATCH /admin/actualites/id)
    // Note: Les formulaires HTML ne supportent que POST, utilisez <input type="hidden" name="_method" value="PUT">
    public function update($id = null)
    {
        // 1. Gestion Image (Si nouvelle image uploadée)
        $imageId = $this->handleImageUpload('image', 'actualites');

        $data = [
            'titre' => $this->request->getPost('titre'),
            'slug'  => url_title($this->request->getPost('titre'), '-', true),
            'description' => $this->request->getPost('description'),
            'date_evenement' => $this->request->getPost('date_evenement'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        // Si une nouvelle image a été envoyée, on met à jour l'ID
        if ($imageId) {
            $data['image_id'] = $imageId;
        }

        $this->db->table($this->table)->where('id', $id)->update($data);

        return redirect()->to('/admin/actualites')->with('success', 'Mise à jour effectuée.');
    }

    // SUPPRESSION (DELETE /admin/actualites/id)
    public function delete($id = null)
    {
        $this->db->table($this->table)->where('id', $id)->delete();
        return redirect()->to('/admin/actualites')->with('success', 'Actualité supprimée.');
    }
}