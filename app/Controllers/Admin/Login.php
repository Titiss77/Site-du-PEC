<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Donnees;

class Login extends BaseController
{
    protected $donneesModel;

    public function __construct()
    {
        $this->donneesModel = new Donnees();
    }

    /**
     * Affiche le formulaire de connexion
     */
    public function index()
    {
        // On récupère les infos générales pour le logo et le nom du club dans le layout
        $data = [
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

    public function logout()
    {
        session()->destroy();  // Détruit toutes les variables de session (isLoggedIn, nom, etc.)
        return redirect()->to(base_url('login'))->with('success', 'Vous avez été déconnecté.');
    }
}
