<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('reservas', 'Reservas::index');
$routes->get('reservas/nueva', 'Reservas::nueva');
$routes->post('reservas/confirmar', 'Reservas::confirmar');


$routes->get('/register', 'AuthController::register');
$routes->post('/register', 'AuthController::processRegister');

$routes->get('/login', 'AuthController::login');
$routes->post('/login', 'AuthController::processLogin');

$routes->get('/logout', 'AuthController::logout');

$routes->get('/perfil', 'UsuarioController::perfil'); // Asegúrate de tener el controlador correcto
