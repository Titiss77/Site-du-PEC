<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Route principale : affiche la page d'accueil du club
// On appelle la méthode 'index' du contrôleur 'Club'
$routes->get('/', 'Club::index');

// Si vous souhaitez des URLs plus explicites pour le SEO
$routes->get('notre-club', 'Club::index');
$routes->get('nos-entraineurs', 'Club::index'); // Vous pouvez utiliser des ancres (#) dans la vue