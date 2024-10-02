<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'HomeController::index');

$routes->get('/geHabitaciones', 'HabitacionController::getHabitacionesIndex');
$routes->get('/habitaciones', 'HabitacionController::index');
$routes->get('/habitaciones/listado', 'HabitacionController::filtrarHabitaciones');

$routes->get('/reservas', 'ReservasController::index');
$routes->post('/reservar/resumen', 'ReservasController::resumen');
$routes->post('/reservar/confirmacion', 'ReservasController::confirmar');
$routes->post('/reservar/delete', 'ReservasController::delete');

$routes->get('/register', 'AuthController::register');
$routes->post('/validregister', 'AuthController::processRegister');

$routes->get('/login', 'AuthController::login');
$routes->post('/validlogin', 'AuthController::processLogin');

$routes->get('/logout', 'AuthController::logout');

$routes->get('/perfil', 'PerfilController::index');
$routes->post('/perfil/update', 'PerfilController::update');
$routes->delete('/perfil/delete', 'PerfilController::delete');

$routes->get('/getProfileData', 'ProfileController::getProfileData');
