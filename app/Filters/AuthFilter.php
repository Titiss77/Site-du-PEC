<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthFilter implements FilterInterface
{
    /**
     * Vérifie si l'utilisateur est connecté avant d'autoriser l'accès à la route.
     * @param RequestInterface $request
     * @param array|null $arguments
     * @return mixed
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        // Si l'utilisateur n'est PAS connecté
        if (!session()->get('isLoggedIn')) {
            // Le forcer à se connecter
            return redirect()->to(base_url('login'))->with('error', 'Veuillez vous connecter pour accéder à cette page.');
        }
    }

    /**
     * @param RequestInterface $request
     * @param ResponseInterface $response
     * @param array|null $arguments
     * @return mixed
     */
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Pas d'action après l'exécution du contrôleur
    }
}