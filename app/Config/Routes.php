<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

/** Esclusivamente para mi Proyecto UDG - PHP **/
$route['default_controller'] = 'users';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
