<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Donnees;
use App\Controllers\Root;

class Login extends BaseController
{
    protected $donneesModel;

    public function __construct()
    {
        $this->donneesModel = new Donnees();
        $this->root = new Root();
    }

    /**
     * Affiche le formulaire de connexion
     */
    public function index()
    {
        // On récupère les infos générales pour le logo et le nom du club dans le layout
        $data = [
            'root' => $this->root->getRootStyles(),
            'titrePage' => 'Connexion Administration',
            'cssPage' => 'contact.css',  // On réutilise le CSS contact pour les formulaires
            'general' => $this->donneesModel->getGeneral(),
        ];

        return view('admin/v_login', $data);
    }

    /**
     * Gère la tentative d'authentification
     */
    public function authenticate()
    {
        $session = session();
        $db = \Config\Database::connect();
        $username = $this->request->getPost('identifiant');
        $passwordRaw = $this->request->getPost('password');

        // Recherche de l'utilisateur en base
        $user = $db
            ->table('utilisateurs')
            ->where('username', $username)
            ->get()
            ->getRowArray();

        if ($user) {
            // Vérification du mot de passe haché
            if (password_verify($passwordRaw, $user['password'])) {
                $session->set([
                    'user_id' => $user['id'],
                    'nom' => $user['nom'],
                    'isLoggedIn' => true,
                ]);

                return redirect()->to(base_url('admin'));
            }
        }

        // En cas d'échec (utilisateur inconnu OU mauvais mot de passe)
        return redirect()->back()->with('error', 'Identifiants invalides.');
    }

    /**
     * Déconnecte l'utilisateur et redirige vers la page demandée
     */
    public function logout()
    {
        session()->destroy(); // Détruit la session

        // Vérifie si une URL de retour est demandée (ex: ?return=boutique)
        // Sinon, par défaut, on renvoie vers l'accueil '/'
        $returnUrl = $this->request->getGet('return') ?? '/';

        return redirect()->to(base_url($returnUrl))->with('success', 'Vous avez été déconnecté.');
    }
}