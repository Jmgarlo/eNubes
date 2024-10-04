<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'HomeController::index');
$routes->post('/set-language', 'LanguageController::setLanguage');

$routes->get('/geHabitaciones', 'HabitacionController::getHabitacionesIndex');
$routes->get('/habitaciones', 'HabitacionController::index');
$routes->get('/habitaciones/listado', 'HabitacionController::filtrarHabitaciones');

$routes->get('/reservas', 'ReservasController::index');
$routes->get('/reservas/resumen', 'ReservasController::resumen');
$routes->get('/reservas/confirmacion', 'ReservasController::confirmar');
$routes->post('/reservas/pago', 'ReservasController::pagar');
$routes->post('/reservas/delete', 'ReservasController::delete');
$routes->get('/reservas/detalles', 'ReservasController::detalles');
$routes->get('/reservas/actualizacion', 'ReservasController::actualizar');


$routes->get('/register', 'AuthController::register');
$routes->post('/validregister', 'AuthController::processRegister');

$routes->get('/login', 'AuthController::login');
$routes->post('/validlogin', 'AuthController::processLogin');

$routes->get('/logout', 'AuthController::logout');

$routes->get('/perfil', 'PerfilController::index');
$routes->get('/perfil/reservas', 'PerfilController::reservas');
$routes->post('/perfil/update', 'PerfilController::update');
$routes->delete('/perfil/delete', 'PerfilController::delete');

$routes->get("cron/actualizar-estados", "BackgroundController::index");
