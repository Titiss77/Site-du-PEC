<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//$routes->get('/', 'Home::index');
$routes->get('/', 'Blog::index');
$routes->get('apropos', 'Blog::apropos');
$routes->get('billet-(:num)', 'Blog::billet/$1');
$routes->post('ajoutCommentaire', 'Blog::ajoutCommentaire');