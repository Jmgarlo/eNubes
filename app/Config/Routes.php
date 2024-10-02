<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'HomeController::index');

$routes->get('/geHabitaciones', 'HabitacionController::getHabitaciones');
$routes->get('/filtrarHabitaciones', 'HabitacionController::filtrarHabitaciones');

$routes->get('/reservas', 'ReservasController::index');
$routes->get('/reservas/nueva', 'ReservasController::nueva');
$routes->post('/reservas/confirmar', 'ReservasController::confirmar');

$routes->get('/register', 'AuthController::register');
$routes->post('/validregister', 'AuthController::processRegister');

$routes->get('/login', 'AuthController::login');
$routes->post('/validlogin', 'AuthController::processLogin');

$routes->get('/logout', 'AuthController::logout');

$routes->get('/perfil', 'UsuarioController::perfil'); // Asegúrate de tener el controlador correcto
