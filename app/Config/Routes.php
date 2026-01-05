<?php

// app/Config/Routes.php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// --- Routes d'Authentification (NON protégées) ---
// La page d'accueil sera notre page de connexion si l'utilisateur n'est pas loggé
// --- Routes d'Authentification (NON protégées) ---
// La page d'accueil sera notre page de connexion si l'utilisateur n'est pas loggé
$routes->get('login', 'Auth::loginView');
$routes->post('login', 'Auth::loginAction');

// ******* NOUVEAU *******
$routes->get('register', 'Auth::registerView'); 
$routes->post('register', 'Auth::registerAction');
// ***********************

$routes->get('logout', 'Auth::logout');
$routes->get('conditions', 'Blog::conditions'); // Laissez les pages publiques ici

// --- Routes Protégées par le filtre 'auth' ---
$routes->group('', ['filter' => 'auth'], function($routes) {
    // 1. Pages d'affichage
    $routes->get('/', 'Blog::index');
    $routes->get('gestion', 'Blog::gestion'); // Espace Gestion doit être protégé
    $routes->get('(:num)', 'Blog::headerPage/$1'); // Pages de sections (/1, /2, etc.)

    // 2. Routes pour la gestion des AMFS (CRUD)
    
    // NOUVEAU : Route pour afficher le formulaire d'ajout (utilise ID Header / ID Catégorie)
    $routes->get('add/(:num)/(:num)', 'Amfs::add/$1/$2'); 
    // NOUVEAU : Route pour traiter l'ajout (POST)
    $routes->post('create', 'Amfs::create'); 

    $routes->get('edit/(:num)', 'Amfs::edit/$1');
    $routes->post('update/(:num)/(:num)', 'Amfs::update/$1/$2');
    $routes->get('delete/(:num)/(:num)', 'Amfs::delete/$1/$2');
});