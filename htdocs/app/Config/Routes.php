<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// --- ROUTES PUBLIQUES ---
$routes->get('/', 'Home::index');
$routes->get('groupes', 'Home::groupes');
$routes->get('calendriers', 'Home::calendriers');
$routes->get('boutique', 'Home::boutique');

$routes->get('contact', 'Contact::index');
$routes->post('contact/envoyer', 'Contact::envoyer');
$routes->get('contact/confirmer/(:any)', 'Contact::confirmer/$1');

$routes->get('login', 'Admin\Login::index'); 
$routes->post('login/auth', 'Admin\Login::authenticate');
$routes->get('logout', 'Admin\Login::logout');

$routes->get('liste', 'Liste::index');
$routes->post('login/auth/liste', 'Liste::authenticate');
$routes->get('logout/liste', 'Liste::logout');

// --- GROUPE ADMIN SÉCURISÉ ---
// Le filtre 'auth' intercepte tout accès à /admin/*
// Groupe d'administration sécurisé par le filtre 'auth'
$routes->group('admin', ['filter' => 'auth', 'namespace' => 'App\Controllers\Admin'], function($routes) {
    
    // 1. Tableau de bord
    $routes->get('/', 'Dashboard::index');

    // 2. Configuration Générale (Page unique)
    $routes->get('general', 'General::index');
    $routes->post('general/update', 'General::update');

    // 3. Ressources CRUD (Create, Read, Update, Delete)
    // CodeIgniter créera automatiquement les routes : index, new, create, show, edit, update, delete
    
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