<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// --- ROUTES PUBLIQUES ---
$routes->get('/', 'Public\Home::index');
$routes->get('groupes', 'Public\Home::groupes');
$routes->get('calendriers', 'Public\Home::calendriers');
$routes->get('boutique', 'Public\Home::boutique');
$routes->get('contact', 'Public\Contact::index');
$routes->post('contact/envoyer', 'Public\Contact::envoyer');
$routes->get('contact/confirmer/(:any)', 'Public\Contact::confirmer/$1');
$routes->get('liste', 'Public\Liste::index');
$routes->post('login/auth/liste', 'Public\Liste::authenticate');
$routes->get('logout/liste', 'Public\Liste::logout');


$routes->get('login', 'Admin\Login::index'); 
$routes->post('login/auth', 'Admin\Login::authenticate');
$routes->get('logout', 'Admin\Login::logout');

// --- GROUPE ADMIN SÉCURISÉ ---
$routes->group('admin', ['filter' => 'auth', 'namespace' => 'App\Controllers\Admin'], function($routes) {
    
    // 1. Tableau de bord
    $routes->get('/', 'Dashboard::index');

    // 2. Configuration Générale (Page unique)
    $routes->get('general', 'General::index');
    $routes->post('general/update', 'General::update');

    $routes->get('actualites/(:num)/delete', 'Actualites::delete/$1');
    
    $routes->resource('actualites',  ['controller' => 'Actualites']);
    $routes->resource('boutique',    ['controller' => 'Boutique']);
    $routes->resource('calendriers', ['controller' => 'Calendriers']); // Remplace 'plannings' (selon votre migration)
    $routes->resource('disciplines', ['controller' => 'Disciplines']); // Ajouté (manquant avant)
    $routes->resource('groupes',     ['controller' => 'Groupes']);     // Correspond à "Tarifs"
    $routes->resource('materiel',    ['controller' => 'Materiel']);
    $routes->resource('membres',     ['controller' => 'Membres']);
    $routes->resource('partenaires', ['controller' => 'Partenaires']); // Ajouté (manquant avant)
    $routes->resource('piscines',    ['controller' => 'Piscines']);
    $routes->resource('utilisateurs',['controller' => 'Utilisateurs']); // Pour gérer les admins/users
});