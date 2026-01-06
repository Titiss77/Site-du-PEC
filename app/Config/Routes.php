<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Route principale : affiche la page d'accueil du club
// On appelle la méthode 'index' du contrôleur 'Club'
$routes->get('/', 'Home::index');
$routes->get('calendriers', 'Home::calendriers');   
$routes->get('bureau', 'Home::bureau'); 