<?php

namespace App\Models;

use CodeIgniter\Model;

class User extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id';
    // Ajout de 'motDePasse' aux champs autorisés pour l'insertion/modification
    protected $allowedFields = ['login', 'nom', 'prenom', 'author', 'motDePasse']; 

    /**
     * Tente de trouver un utilisateur par son login.
     * @param string $login
     * @return array|null
     */
    public function getUserByLogin($login)
    {
        return $this->where('login', $login)->first();
    }
    
    /**
     * Crée un nouvel utilisateur. Le mot de passe DOIT être déjà haché
     * avant d'appeler cette méthode.
     * @param array $data Données de l'utilisateur.
     * @return bool
     */
    public function createUser($data)
    {
        // La fonction save() de CI4 gère automatiquement l'insertion
        // si la clé primaire n'est pas présente dans $data.
        return $this->save($data); 
    }
}