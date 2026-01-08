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
$routes->get('boutique', 'Home::boutique');
$routes->get('actualites', 'Home::actualite');

$routes->get('contact', 'Contact::index');
$routes->post('contact/envoyer', 'Contact::envoyer');
$routes->get('contact/confirmer/(:any)', 'Contact::confirmer/$1');