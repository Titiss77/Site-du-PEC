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
$routes->group('admin', ['filter' => 'auth'], function($routes) {
    $routes->get('/', 'Admin\Dashboard::index');
    
    // Ressources pour toutes les tables
    $routes->resource('actualites', ['controller' => 'Admin\ActualiteAdmin']);
    $routes->resource('boutique',   ['controller' => 'Admin\BoutiqueAdmin']);
    $routes->resource('membres',    ['controller' => 'Admin\MembreAdmin']);
    $routes->resource('plannings',  ['controller' => 'Admin\PlanningAdmin']);
    $routes->resource('piscines',   ['controller' => 'Admin\PiscineAdmin']);
    $routes->resource('tarifs',     ['controller' => 'Admin\TarifAdmin']);
    $routes->resource('materiel',   ['controller' => 'Admin\MaterielAdmin']);
    
    // Pages de configuration unique
    $routes->get('general', 'Admin\GeneralAdmin::index');
    $routes->post('general/update', 'Admin\GeneralAdmin::update');
});