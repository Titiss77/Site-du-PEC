<?php

namespace App\Controllers;

use App\Models\Cartes;
use App\Models\Categories;
use App\Models\Header;
use App\Models\User;
use CodeIgniter\Controller;

class Auth extends BaseController
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

    // Affiche le formulaire de connexion
    public function loginView()
    {
        $modelHeaders = new Header();
        $modelCategories = new Categories();

        $data = $this->header();
        $data['titrePage'] = 'Connexion';

        // Si l'utilisateur est déjà connecté, le rediriger vers l'accueil
        if (session()->get('isLoggedIn')) {
            return redirect()->to(base_url('/'));
        }

        $data['titrePage'] = 'Connexion';
        return view('v-login', $data);  // Nouvelle vue à créer
    }

    public function loginAction()
    {
        $session = session();
        $model = new User();
        $login = $this->request->getPost('login');
        $password = $this->request->getPost('motDePasse');

        $user = $model->getUserByLogin($login);

        if ($user) {
            // Vérification du mot de passe haché
            if (password_verify($password, $user['motDePasse'])) {
                $ses_data = [
                    'idUser' => $user['id'],
                    'login' => $user['login'],
                    'prenom' => $user['prenom'],
                    'author' => $user['author'],
                    'isLoggedIn' => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to(base_url('/'))->with('success', 'Connexion réussie. Bienvenue ' . $user['prenom'] . '!');
            } else {
                $session->setFlashdata('error', 'Mot de passe incorrect.');
                return redirect()->back();
            }
        } else {
            $session->setFlashdata('error', "Nom d'utilisateur introuvable.");
            return redirect()->back();
        }
    }

    /**
     * Affiche le formulaire d'inscription (utilise la même vue que la connexion pour l'instant)
     */
    public function registerView()
    {
        $data = $this->header();
        $data['titrePage'] = 'Inscription';
        return view('v-register', $data);  // Création d'une nouvelle vue v-register.php
    }

    /**
     * Traite l'action d'inscription
     */
    public function registerAction()
    {
        $session = session();
        $model = new User();

        // 1. Récupération des données du formulaire
        $login = $this->request->getPost('login');
        $password = $this->request->getPost('motDePasse');
        $nom = $this->request->getPost('nom');
        $prenom = $this->request->getPost('prenom');

        // 2. Vérification si le login existe déjà
        if ($model->getUserByLogin($login)) {
            $session->setFlashdata('error', "Ce nom d'utilisateur est déjà pris.");
            return redirect()->back()->withInput();
        }

        // 3. Préparation des données et hachage du mot de passe
        $data = [
            'login' => $login,
            'nom' => $nom,
            'prenom' => $prenom,
            'motDePasse' => password_hash($password, PASSWORD_DEFAULT),
            'author' => '1',  // 1 = utilisateur standard
        ];

        // 4. Tentative de création
        if ($model->createUser($data)) {
            return redirect()->to(base_url('login'))->with('success', 'Compte créé avec succès. Vous pouvez maintenant vous connecter.');
        } else {
            $session->setFlashdata('error', 'Erreur lors de la création du compte.');
            return redirect()->back()->withInput();
        }
    }

    // Déconnexion
    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('login'))->with('success', 'Vous avez été déconnecté avec succès.');
    }
}
